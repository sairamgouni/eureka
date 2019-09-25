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
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasSlug, Notifiable, Gamify;
    use  EntrustUserTrait;
    use CanFollow, CanBeFollowed, CanBookmark, CanLike, CanFavorite, CanSubscribe, CanVote;
    use  CanComment;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'last_login',
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
    public function getSlugOptions(): \Spatie\Sluggable\SlugOptions
    {
        return \Spatie\Sluggable\SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public $success_message = ['status' => 1, 'message' => 'record saved successfully', 'type' => MSG_SUCCESS];
    public $error_message = ['status' => 0, 'message' => 'please try again later', 'type' => MSG_ERROR];

    /**
     * This method will return the rule of the user
     * @param string $value [description]
     * @return [type]        [description]
     */
    public function role($value = '')
    {
        return $this->belongsToMany('App\Role', 'role_user');
    }

    /**
     * This method will return the rule of the user
     * @param string $value [description]
     * @return [type]        [description]
     */
    public function country()
    {
        return $this->belongsTo('App\Country', 'cid', 'id');
    }

    /**
     * This method will send the role name of the user
     * @param string $value [description]
     * @return [type]        [description]
     */
    public function getRoleName($value = '')
    {
        $role = $this->role()->first();
        if ($role)
            return $role->display_name;
        return '-';
    }

    /**
     * This method will return the rule of the user
     * @param string $value [description]
     * @return [type]        [description]
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'cid');
    }


    /**
     * This method will send the role name of the user
     * @param string $value [description]
     * @return [type]        [description]
     */
    public function getCampaignName($value = '')
    {
        $campaign = $this->campaign()->first();
        if ($campaign)
            return $campaign->campaign;
        return '-';
    }


    /**
     * This method will send the edit path for the record
     * @return [type] [description]
     */
    public function getEditPath()
    {
        return URL_USERS_EDIT . $this->slug;
    }

    /**
     * This method will handle the total saving job of the module
     * Thsis accepts the UsersRequest Object
     * @param UsersRequest $request [description]
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
        if ($request->has('password')) {
            if ($request->password)
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


        if ($response)
            return $static_object->getMessage('success');
        else
            return $static_object->getMessage('error');

    }

    public static function updateRecord(UsersRequest $request, $slug)
    {

        $static_object = (new self);
        $user = User::getRecord($slug);

        if (!$user)
            return false;

        $user->name = $request->name;


        if ($request->has('password')) {
            if ($request->password)
                $user->password = bcrypt($request->password);
        }
        $user->role()->sync($request->role);
        $response = $user->save();
        $static_object->processUpload($request, $user);

        if ($response)
            return $static_object->getMessage('success');
        else
            return $static_object->getMessage('error');
    }

    public function getMessage($type)
    {
        if ($type == 'success') {
            $this->success_message['message'] = $this->success_message['message'];
            return $this->success_message;
        }

        $this->error_message['message'] = $this->error_message['message'];
        return $this->error_message;
    }

    public function processUpload($request, $user)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('users');
            $user->image = $path;
            $response = $user->save();
            return $response;
        }
    }


    public function getUserImage()
    {
        $url = Storage::url($this->image);
        return BASE_PATH . $url;
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
            if ($record) {
                // $old_image = $record;
                $status = $record->delete();

                // if($old_image)
                // {
                //     \File::delete($static_object->upload_path.$old_image);
                //     \File::delete($static_object->upload_path_thumbnail.$old_image);
                // }
                return ['status' => $status, 'message' => 'record deleted successfully'];
            }
        } catch (\Exception $ex) {
            return ['status' => $status, 'message' => $ex->getMessage()];

        }
    }

    public function challenges()
    {
        return $this->hasMany('\App\Challenge', 'created_by', 'id');
    }


    public function getFriendSuggestions($limit = 5)
    {
        $following_users = $this->followings()->select('followables.followable_id')
            ->get()
            ->pluck('followable_id')
            ->toArray();

        $list = \App\User::whereNotIn('id', $following_users)
            ->where('id', '!=', $this->id)
            ->limit($limit)->get();
        return \App\User::processFrendSuggestions($list);
    }

    public static function processFrendSuggestions($friends)
    {
        $user = \Auth::user();
        $list = [];
        foreach ($friends as $friend) {
            $item['id'] = $friend->id;
            $item['name'] = $friend->name;
            $item['slug'] = $friend->slug;
            $item['about'] = $friend->about;
            $item['challenges'] = $friend->challenges()->count();
            $item['following'] = $friend->followings(User::class)->get()->count();
            $item['followers'] = $friend->followers(User::class)->get()->count();
            $item['image'] = $friend->getProfileImage();
            $item['background_image'] = $friend->getBackgroundImage();
            $item['is_following'] = (int)$user->isFollowing($friend);
            $item['location'] = $friend->country->title;
            $item['reputation'] = $friend->reputation;
            $item['member_from'] = date('M Y', strtotime($user->updated_at));

            $list[] = $item;
        }
        return $list;
    }


    public function getFriendsList($limit = 5)
    {
        $following_users = $this->followings()->limit($limit)->get();
        return \App\User::processFrendSuggestions($following_users);

    }

    public function getProfileImage()
    {
        if ($this->image)
            return $this->image;
        return '/users/thumbs/boy.png';
    }

    public function getProfileLink()
    {
        return 'profile/' . $this->id . '/' . $this->slug;
    }

    public function getBackgroundImage()
    {
        if ($this->image)
            return $this->background_image;
        return '/users/backgrounds/default.jpg';
    }

    public function processNotifications($notifications)
    {
        // dd($notifications);
        $list = [];
        foreach ($notifications as $item) {
            $data = $item->data;
            if (!count($data))
                continue;
            $data = $data[0];
            $data['read_at'] = !!$item->read_at;
            $data['ref_id'] = $item->id;
            $data = (object)$data;
            // dd($data->type);
            if (isset($data->type)) {
                if ($data->type == 'follow')
                    continue;

            } else {
                continue;
            }

            $list[] = $this->prepareNotificationData(
                $data,
                $item->notifiable_id,
                $item->created_at
            );
        }

        return $list;
    }

    public function prepareNotificationData($data, $userId, $created_at)
    {
        $type = $data->type;
        $notifier = \App\User::where('id', '=', $data->liked_by)->first();
        $notifiable_user = \App\User::where('id', '=', $userId)->first();

        $item_data['ref_id'] = $data->ref_id;
        $item_data['notifier_id'] = $notifier->id;
        $item_data['notifier_name'] = $notifier->name;
        $item_data['notifier_slug'] = $notifier->slug;
        $item_data['notifier_image'] = $notifier->getProfileImage();
        $item_data['notifier_seen'] = $data->read_at;
        $item_data['message'] = $data->message;
        $item_data['created_at'] = \Carbon\Carbon::createFromTimeStamp(strtotime($created_at))
            ->diffForHumans();
        if ($type == 'comment' || $type == 'like') {
            $challenge = \App\Challenge::where('id', '=', $data->challenge_id)->first();
            $item_data['item_title'] = $challenge->title;
            $item_data['item_id'] = $challenge->id;
            $item_data['item_slug'] = $challenge->slug;
        }

        return $item_data;

    }
    public function getImageAttribute($value)
    {
        return $value ?? '/users/thumbs/boy.png';
    }

}
