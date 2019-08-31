<?php

namespace App;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
	use HasSlug;

	protected $table = 'categories';

	public $success_message = [	'status' => 1,
    							'message'=> 'Record saved successfully',
    							'type'   => 'success'
    						];
    public $error_message = [	'status' => 0,
    							'message'=> 'Please try again later',
    							'type'   => 'error'
    						];
	
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public static function getParents($type='Both')
    {
    	$list = \App\Category::where('status','!=', 'inactive')
    							->where('parent_id', '=', 0)
    							->get();
		$list->prepend(array('id'=>0, 'title'=>'Parent'));					
    	return $list;

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
          $record 			= new \App\Category();
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
          $record->status   = $request->status;
          $record->parent_id    = $request->parent_id;
          $record->about_user    = $request->about_user;
          $record->created_by = \Auth::user()->id;
		  $response = $record->save();
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
    		$path = $request->file('image')->store('categories');
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
        return URL_CATEGORIES_EDIT.$this->slug;
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
        return BASE_PATH.$url;
    }

    /**
     * This method will return the selected based on slug
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public static function getRecord($slug)
    {
        return \App\Category::where('slug', '=', $slug)->first();
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
        $record =  Category::getRecord($slug);

        if(!$record)
            return false;
       $response = $static_object->doSaveOperation($request, $record);

        if($response)
            return $static_object->getMessage('success');
        else
            return $static_object->getMessage('error');
    }

    /**
     * This method will delete the record based on slug
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public static function deleteRecord($slug)
    {
        $static_object = (new static);
        try {
            $record = \App\Category::getRecord($slug);
            if($record)
            {
                // $old_image = $record;
                $status =   $record->delete();

            // if($old_image)
            // {
            //     \File::delete($static_object->upload_path.$old_image);
            //     \File::delete($static_object->upload_path_thumbnail.$old_image);
            // }
              return ['status' => $status, 'message' => 'record_deleted_successfully'];
            }
        }
        catch( \Exception $ex)
        {
             return ['status' => $status, 'message' => $ex->getMessage()];

        }
    }

    public static function getList()
    {
        // $list = \App\Category::select(['id as value','title as text'])
          $list = \App\Category::select(['id as code','title as name'])
                                ->get();
                                // ->pluck('title', 'id');
        return $list;
    }
}
