<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function getNameAttribute($value='')
    {
    	return $value;
    }

    public function getDisplayNameAttribute($value='')
    {
    	return ucfirst($value);
    }

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user');
    }

    public static function getRoles()
    {
       return \App\Role::get()->pluck('display_name','id');
    }

}
