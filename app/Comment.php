<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'challenge_id',
        'user_id',
        'comment',
        'parent_id',
        'comment_id',
        'comment_type',
        'finalized',
        'winner',
    ];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function childComments()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    /**
     * To get parent comment for a replies/child comment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->morphOne(Like::class, 'like');
    }

    public function ownerCommentLike()
    {
        return $this->morphOne(Like::class, 'like')->whereUserId(\Auth::id());
    }

    public function ownerCommenttick()
    {
        return $this->morphOne(Like::class, 'like')->whereUserId(\Auth::id());
    }

    public function tick()
    {
        return $this->morphOne(Tick::class, 'tick')->whereUserId(\Auth::id());
    }

    public function win()
    {
        return $this->morphOne(Win::class, 'win')->whereUserId(\Auth::id());
    }

    public function attachments()
    {
        return $this->hasMany(CommentAttachment::class, 'comment_id');
    }
}
