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

    /**
     * To get the all child comments for a parent comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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
}
