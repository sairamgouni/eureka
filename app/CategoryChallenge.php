<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryChallenge extends Model
{
    protected $table = 'category_challenge';

    protected $fillable = [
        'challenge_id',
        'category_id',
        'created_at',
        'updated_at',
    ];

    /**
     * To get challenge data
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function challenge()
    {
        return $this->belongsTo(Challenge::class, 'challenge_id');
    }

    /**
     * To get Category master data
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
