<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentAttachment extends Model
{
    protected $fillable = [
        'comment_id',
        'path'
    ];

//    protected $appends = ['path'];

    public function getPathAttribute()
    {
        return asset('storage/'.$this->attributes['path']);
    }
}
