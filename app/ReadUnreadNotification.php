<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadUnreadNotification extends Model
{
    protected $fillable = [
        'seen_user_id',
        'notification_id',
    ];

    public function notification()
    {
//        return $this->belongsTo(Notifican)
    }
}
