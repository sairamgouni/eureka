<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Spatie\Sluggable\HasSlug;
use Illuminate\Http\Request;
use \App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Storage;
use QCod\Gamify\Gamify;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanLike;
use Overtrue\LaravelFollow\Traits\CanFavorite;
use Overtrue\LaravelFollow\Traits\CanSubscribe;
use Overtrue\LaravelFollow\Traits\CanVote;
use Overtrue\LaravelFollow\Traits\CanBookmark;
use Actuallymab\LaravelComment\CanComment;

class User extends Authenticatable
{
     use HasSlug,  Notifiable, Gamify;
     use  EntrustUserTrait ;
     use CanFollow, CanBeFollowed, CanBookmark, CanLike, CanFavorite, CanSubscribe, CanVote;
     use  CanComment;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : \Spatie\Sluggable\SlugOptions
    {
        return \Spatie\Sluggable\SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public $success_message = ['status' => 1, 'message'=> 'record saved successfully', 'type'      => MSG_SUCCESS];
    public $error_message = ['status' => 0, 'message'=> 'please try again later', 'type'      => MSG_ERROR];

    /**
     * This method will return the rule of the user
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function role($value='')
    {
        return $this->belongsToMany('App\Role', 'role_user');
    }

    /**
     * This method will send the role name of the user
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function getRoleName($value='')
    {
        $role = $this->role()->first();
        if($role)
            return $role->display_name;
        return '-';
    }

    /**
     * This method will return the rule of the user
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function campaign($value='')
    {
        return $this->belongsToMany('App\Campaign', 'campaign_user');
    }

    /**
     * This method will send the role name of the user
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function getCampaignName($value='')
    {
        $campaign = $this->campaign()->first();
        if($campaign)
            return $campaign->campaign;
        return '-';
    }


    /**
     * This method will send the edit path for the record
     * @return [type] [description]
     */
    public function getEditPath()
    {
        return URL_USERS_EDIT.$this->slug;
    }

    /**
     * This method will handle the total saving job of the module
     * Thsis accepts the UsersRequest Object
     * @param  UsersRequest $request [description]
     * @return [type]                [description]
     */
    public static function saveRecord(UsersRequest $request)
    {

          $static_object = (new self);

          $user = new \App\User();
          $user->name = $request->name;
          $user->email = $request->email;
          
        /**
         * If admin does not enter password, it will create the default password
         */
        $password = 'password';
         if($request->has('password'))
         {
           if($request->password)
              $password = $request->password;
         }

         $user->password = bcrypt($password);
         $response = $user->save();

          /**
           * User created, Assign Roles
           */

          $user->role()->attach($request->role);

          /**
           * Roles Assigned successfully, upload images if any available
           */

          /**
          * Assign campaign
          */
          $user->campaign()->attach($request->campaign);

          $static_object->processUpload($request, $user);
          

          if($response)
              return $static_object->getMessage('success');
          else
              return $static_object->getMessage('error');

    }

    public static function updateRecord(UsersRequest $request, $slug)
    {

        $static_object = (new self);
        $user =  User::getRecord($slug);

        if(!$user)
            return false;

        $user->name = $request->name;

        

       if($request->has('password'))
       {
        if($request->password)
            $user->password = bcrypt($request->password);
       }
        $user->role()->sync($request->role);
        $user->campaign()->sync($request->campaign);
        $response = $user->save();
        $static_object->processUpload($request, $user);

        if($response)
            return $static_object->getMessage('success');
        else
            return $static_object->getMessage('error');
    }

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

    public function processUpload($request, $user)
    {
        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('users');
            $user->image = $path;
            $response =    $user->save();
            return $response;
        }
    }


    public function getUserImage()
    {
        $url = Storage::url($this->image);
        return BASE_PATH.$url;
    }

     public static function getRecord($slug)
    {
        return \App\User::where('slug', '=', $slug)->first();
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
            $record = \App\User::getRecord($slug);
            if($record)
            {
                // $old_image = $record;
                $status =   $record->delete();

            // if($old_image)
            // {
            //     \File::delete($static_object->upload_path.$old_image);
            //     \File::delete($static_object->upload_path_thumbnail.$old_image);
            // }
              return ['status' => $status, 'message' => 'record deleted successfully'];
            }
        }
        catch( \Exception $ex)
        {
             return ['status' => $status, 'message' => $ex->getMessage()];

        }
    }

    public function challenges()
    {
        return $this->hasMany('\App\Challenge','created_by','id');
    }


    public function getFriendSuggestions($limit=5)
    {
        $following_users = $this->followings()->select('followables.followable_id')
                                ->get()
                                ->pluck('followable_id')
                                ->toArray();
        
        $list = \App\User::whereNotIn('id',$following_users)
                            ->where('id','!=', $this->id)
                            ->limit($limit)->get();
        return \App\User::processFrendSuggestions($list);
    }

    public static function processFrendSuggestions($friends)
    {
        $user = \Auth::user();
        $list = [];
        foreach($friends as $friend)
        {
            $item['id'] = $friend->id;
            $item['name'] = $friend->name;
            $item['slug'] = $friend->slug;
            $item['following'] = $friend->followings(User::class)->get()->count();
            $item['image'] = '';
            $item['is_following'] = (int) $user->isFollowing($friend);
            $list[] = $item;
        }
        return $list;
    }


    public function getFriendsList($limit=5)
    {
        $following_users = $this->followings()->limit($limit)->get();
        return \App\User::processFrendSuggestions($following_users);
                                
    }

}
