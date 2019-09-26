<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class win extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'win_id',
        'win_type'
    ];

    public function win()
    {
        return $this->morphTo();
    }

    public function togglewin()
    {
        $this->isDeleted() ? $this->restore() : $this->delete();
    }

    public function isDeleted()
    {
        return $this->deleted_at;
    }
}
