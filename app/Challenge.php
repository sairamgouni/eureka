<?php

namespace App;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;
use Overtrue\LaravelFollow\Traits\CanBeVoted;
use Overtrue\LaravelFollow\Traits\CanBeBookmarked;
use Spatie\Activitylog\Traits\LogsActivity;
use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;


class Challenge extends Model implements Commentable
{
	use HasSlug;
    use CanBeLiked, CanBeFavorited, CanBeVoted, CanBeBookmarked, HasComments;

	protected $table = 'challenges';
    protected static $recordEvents = ['created'];

    protected $fillable = ['name', 'text'];

    protected static $logAttributes = ['name', 'text'];

	public $success_message = [	'status' => 1,
    							'message'=> 'record_saved_successfully',
    							'type'   => 'success'
    						];
    public $error_message = [	'status' => 0,
    							'message'=> 'please_try_again_later',
    							'type'   => 'error'
    						];
	private $base_path = 'http://localhost/euraka-live/public/';
   	private $upload_path = 'uploads/challenges/';
   	private $upload_path_thumbnail = 'uploads/challenges/thumbnails/';
   	private $edit_path = 'challenges/edit/';



    public function mustBeApproved(): bool
    {
        return false; // default false
    }
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }



    /**
     * This method will handle the total saving job of the module
     * Thsis accepts the UsersRequest Object
     * @param  UsersRequest $request [description]
     * @return [type]                [description]
     */
    public static function saveRecord(Request $request)
    {

          $static_object 	= (new self);
          $record 			= new \App\Challenge();
        $response = $static_object->doSaveOperation($request, $record);

          if($response)
              return $static_object->getMessage('success');
          else
              return $static_object->getMessage('error');

    }

    // M3cjk*BBR,ib
    public function doSaveOperation($request, $record)
    {
         $static_object     = (new self);

          $record->title    = $request->title;
          $record->slug   = $request->slug;
          $record->description    = $request->description;
          $record->image    = $request->image;
          $record->status    = $request->status;
          $record->category_id    = 0;
          $record->active_from   = $request->active_from;
          $record->description    = $request->description;
          $record->created_by = \Auth::user()->id;
		  $response = $record->save();
          $record->categories()->sync($request->categories);
          $static_object->processUpload($request, $record);

          return $response;
    }

    /**
     * This method will assign appropriate message based on type
     * @param  [type] $type [description]
     * @return [type]       [description]
     */
    public function getMessage($type)
    {
        if($type=='success')
        {
          $this->success_message['message'] = $this->success_message['message'];
          return $this->success_message;
        }

        $this->error_message['message'] = $this->error_message['message'];
        return $this->error_message;
    }

    /**
     * This method will upload the file submitted by user
     * @param  [type] $request [description]
     * @param  [type] $record  [description]
     * @return [type]          [description]
     */
    public function processUpload($request, $record)
    {

    	if($request->hasFile('image'))
        {
    		$path = $request->file('image')->store('challenges');
        	$record->image = $path;
        	$response =    $record->save();
        	return $response;
    	}

    }

    /**
     * This method will send the edit path for the record
     * @return [type] [description]
     */
    public function getEditPath()
    {
        return $this->edit_path.$this->slug;
    }

     /**
     * This method will send the image path
     * If no image available it will create a named image with first 2 characters
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function getImage()
    {
        $url = Storage::url($this->image);
        return $this->base_path.$url;
    }

    /**
     * This method will return the selected based on slug
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public static function getRecord($slug)
    {

    return \App\Challenge::leftJoin('eureka_categories','id','challenges.category_id')
       ->where('challenges.slug','=', $slug)->first();
    }

    /**
     * This method will update the existing record
     * @param  CategoriesRequest $request [description]
     * @param  [type]                $slug    [description]
     * @return [type]                         [description]
     */
    public static function updateRecord(Request $request, $slug)
    {

        $static_object = (new self);
        $record =  Challenge::getRecord($slug);

        if(!$record)
            return false;
       $response = $static_object->doSaveOperation($request, $record);

        if($response)
            return $static_object->getMessage('success');
        else
            return $static_object->getMessage('error');
    }

    public function user()
    {
        return $this->belongsTo('\App\User','created_by','id');
    }

    public function categories()
    {
        return $this->belongsToMany('\App\Category');
    }

    public static function prepareAjaxData($records)
    {
        $list = [];
        $user = \Auth::user();
        foreach($records as $record)
        {
            $item['id'] = $record->id;
            $item['title'] = $record->title;
            $item['slug'] = $record->slug;
            $item['image'] = $record->image;
            $item['status'] = $record->status;
            $item['description'] = $record->description;
            $item['likes'] = $record->likers()->count();
            $item['comments'] = $record->comments()->count();

            if($user)
            {
                $item['isUserLiked'] = (int) $user->hasLiked($record);
                $item['isAuthor'] = ($user->id == $record->created_by) ? 1 : 0;
            }

            $item['otherUsersLiked'] = $item['likes'];// - $item['isUserLiked'];
            $item['created_at'] =   \Carbon\Carbon::createFromTimeStamp(strtotime($record->created_at))->diffForHumans();
            $item['user']['id'] = $record->user->id;
            $item['user']['name'] = $record->user->name;
            $item['user']['slug'] = $record->user->slug;
            $item['user']['image'] = '/assets/img/boy.png';
            $list[] = $item;
        }
        return $list;
    }

    public static function prepareAjaxComments($comments)
    {
        $list = [];
        foreach($comments as $record)
        {
            $user = \App\User::where('id', '=', $record->commented_id)
                                ->select(['id','name','slug','image'])
                                ->first();
            $item['comment_id'] = $record->id;
            $item['comment'] = $record->comment;
            $item['created_at'] =
            \Carbon\Carbon::createFromTimeStamp(strtotime($record->created_at))->diffForHumans();
            $item['rate'] = $record->rate;
            $item['user'] = $user;
            $list[] = $item;
        }
        return $list;
    }
}
