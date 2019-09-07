<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tick extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'tick_id',
        'tick_type'
    ];

    public function tick()
    {
        return $this->morphTo();
    }

    public function toggletick()
    {
        $this->isDeleted() ? $this->restore() : $this->delete();
    }

    public function isDeleted()
    {
        return $this->deleted_at;
    }
}
