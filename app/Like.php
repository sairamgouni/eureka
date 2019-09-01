<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'like_id',
        'like_type'
    ];

    public function like()
    {
        return $this->morphTo();
    }

    public function toggleLike()
    {
        $this->isDeleted() ? $this->restore() : $this->delete();
    }

    public function isDeleted()
    {
        return $this->deleted_at;
    }
}
