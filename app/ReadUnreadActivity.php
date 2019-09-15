<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadUnreadActivity extends Model
{
    protected $fillable = [
        'seen_user_id',
        'activity_log_id',
    ];

    public function activity()
    {
//        return $this->belongsTo(ActivityLo)
    }
}
