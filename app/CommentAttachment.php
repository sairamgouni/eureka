<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentAttachment extends Model
{
    protected $fillable = [
        'comment_id',
        'path'
    ];

    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        return url(\Storage::url($this->path));
    }
}
