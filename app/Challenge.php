<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
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
use \App\Gamify\Points\ChallengeCreated;

class Challenge extends Model
{
    use HasSlug, CanBeLiked, CanBeFavorited, CanBeVoted, CanBeBookmarked;

    protected $table = 'challenges';
    protected static $recordEvents = ['created'];

    protected $fillable = ['name', 'text'];

    protected static $logAttributes = ['name', 'text'];

    public $success_message = ['status' => 1,
        'message' => 'record_saved_successfully',
        'type' => 'success'
    ];
    public $error_message = ['status' => 0,
        'message' => 'please_try_again_later',
        'type' => 'error'
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
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }


    /**
     * This method will handle the total saving job of the module
     * Thsis accepts the UsersRequest Object
     * @param UsersRequest $request [description]
     * @return [type]                [description]
     */
    public static function saveRecord(Request $request)
    {

        $static_object = (new self);
        $record = new \App\Challenge();
        $response = $static_object->doSaveOperation($request, $record);
        // return $response;
        $user = \Auth::user();

        $log_message = ' has posted a new challenge ' . '<a href="/#/challenge-details/' . $record->id . '/' . $record->slug . '">' . $record->title . '</a>';
        activity()
            ->performedOn($record)
            ->log($log_message);

        $user = \Auth::user();
        $user->givePoint(new ChallengeCreated($record));

        if ($response)
            return $static_object->getMessage('success');
        else
            return $static_object->getMessage('error');

    }

    // M3cjk*BBR,ib
    public function doSaveOperation($request, $record)
    {
        $static_object = (new self);

        $record->title = $request->title;
        $record->slug = $request->slug;
        $record->description = $request->description;
        $record->status = $request->status;
        $record->category_id = 0;

        $record->active_from = Date::createFromFormat('D M d Y H:i:s e+', $request->active_from)->startOfDay();
        $record->active_to = Date::createFromFormat('D M d Y H:i:s e+', $request->active_to)->endOfDay();
        $record->description = $request->description;
        $record->created_by = \Auth::user()->id;
        $response = $record->save();
        $record->categories()->sync(explode(",", $request->categories));
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
        if ($type == 'success') {
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
//        if ($request->hasFile('image')) {
//            $path = $request->file('image')->store('challenges');
//            $record->image = $path;
//            $response = $record->save();
//            return $response;
//        }
        if ($request->hasFile('image')) {
            $resize = \Image::make($request->image)->resize(337.98, 240.36)->encode('jpg');
            $hash = md5($resize->__toString()) . '.jpg';
            $path = 'public/challenges/resize/' . $hash;
            Storage::disk('local')->put($path, $resize, 'public');

            $resize = \Image::make($request->image)->encode('jpg');
            $path = 'public/challenges/' . $hash;
            Storage::disk('local')->put($path, $resize, 'public');
//            $resize->save(storage_path($path));
//            $path = $request->file('image')->store('challenges');
            $record->image = $hash;
            $response = $record->save();
            return $response;
        }

    }

    /**
     * This method will send the edit path for the record
     * @return [type] [description]
     */
    public function getEditPath()
    {
        return $this->edit_path . $this->slug;
    }

    /**
     * This method will send the image path
     * If no image available it will create a named image with first 2 characters
     * @param string $value [description]
     * @return [type]        [description]
     */
    public function getImage()
    {

        $url = Storage::url($this->image);
        return $this->base_path . $url;
    }

    /**
     * This method will return the selected based on slug
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public static function getRecord($slug)
    {
        return \App\Challenge::where('slug', '=', $slug)->first();
    }

    /**
     * This method will update the existing record
     * @param CategoriesRequest $request [description]
     * @param  [type]                $slug    [description]
     * @return [type]                         [description]
     */
    public static function updateRecord(Request $request, $slug)
    {

        $static_object = (new self);
        $record = Challenge::getRecord($slug);

        if (!$record)
            return false;
        $response = $static_object->doSaveOperation($request, $record);

        if ($response)
            return $static_object->getMessage('success');
        else
            return $static_object->getMessage('error');
    }

    public function user()
    {
        return $this->belongsTo('\App\User', 'created_by', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany('\App\Category', 'category_challenge', 'challenge_id','category_id');
    }

    public static function prepareAjaxData($records)
    {
        $list = [];
        $user = \Auth::user();
        foreach ($records as $record) {
            $item['id'] = $record->id;
            $item['title'] = $record->title;
            $item['slug'] = $record->slug;
            $item['location'] = $record->user->country->title;
            $item['campaign'] = @$record->user->campaign->campaign;
            $item['image'] = $record->image;
            $item['resizeImage'] = $record->getImageResizeFile();
            $item['status'] = $record->status;
            $item['description'] = $record->description;
            $item['likes'] = $record->likers()->count();
            $item['comments'] = $record->comments()->count();
//            $item['comments'] = $record->comments()->count();
            $startDate = Date::parse($record->active_from);
            $endDate = Date::parse($record->active_to);
            $item['can_comment'] = now()->isBetween($startDate, $endDate, true);
            $item['is_valid_challenge'] = $endDate->isFuture();
            $item['is_started'] = $startDate->isPast();
            $item['ideas'] = $record->comments()
                ->whereBetween('created_at', [Date::parse($record->active_from), Date::parse($record->active_to)])
                ->count();

            $item['game_time'] = Like::whereIn('like_id', $record->comments()->pluck('id'))->whereUserId($record->created_by)->count();
            $item['finalized'] = $record->comments()->whereFinalized(1)->count();
            $item['winner'] = $record->comments()->whereWinner(1)->count();
            $item['winuser'] = Comment:: select('*')->join('users', 'users.id', '=', 'comments.user_id')
                ->whereChallengeId($record->id)
                ->whereWinner(1)
                ->first();
            $item['categories'] = $record->categories;
            $item['active_from'] =$startDate;
            $item['active_to'] = $endDate->subDay(1);

            if ($user) {
                $item['isUserLiked'] = (int)$user->hasLiked($record);
                $item['isAuthor'] = ($user->id == $record->created_by) ? 1 : 0;
            }

            $item['otherUsersLiked'] = $item['likes'];// - $item['isUserLiked'];
            $item['created_at'] = \Carbon\Carbon::createFromTimeStamp(strtotime($record->created_at))->diffForHumans();
            $item['user']['id'] = $record->user->id;
            $item['user']['name'] = $record->user->name;
            $item['user']['slug'] = $record->user->slug;
            $item['user']['image'] = $record->user->getProfileImage();
            $item['user']['profile_link'] = $record->user->getProfileLink();
            $list[] = $item;
        }

        return $list;
    }

    public function getImageResizeFile()
    {

        $default_image = 'storage/challenges/default.png';
        // return $default_image;
        $image_path = 'storage/challenges/resize/' . $this->attributes['image'];
        if ($this->attributes['image']) {
            if (file_exists(public_path() . '/' . $image_path))
                return $image_path;
        }

        return $default_image;
    }

    public function getImageFile()
    {
        $default_image = 'storage/challenges/default.png';
        // return $default_image;
        $image_path = 'storage/challenges/' . $this->image;
        if ($this->image) {
            if (file_exists(public_path() . '/' . $image_path))
                return $image_path;
        }

        return $default_image;
    }

    public static function prepareAjaxComments($comments)
    {
        $list = [];
        foreach ($comments as $record) {
            $user = \App\User::where('id', '=', $record->commented_id)
                ->select(['id', 'name', 'slug', 'image'])
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

    public function comments()
    {
        return $this->hasMany(Comment::class, 'challenge_id')->whereNull('parent_id')
            ->with('childComments');
    }

    public function like()
    {
        return $this->morphOne(Like::class, 'like');
    }

    public function hasLiked()
    {
        return $this->like()->whereUserId(Auth::id())->exists();
    }

    public function challengeCategories()
    {
        return $this->hasMany(CategoryChallenge::class, 'challenge_id');
    }

    public function getImageAttribute()
    {
        $default_image = 'storage/challenges/default.png';
        // return $default_image;
        $image_path = 'storage/challenges/' . $this->attributes['image'];
        if ($this->attributes['image']) {
            if (file_exists(public_path() . '/' . $image_path))
                return $image_path;
        }

        return $default_image;
    }




}
