<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Topic;
use App\User;

class Reply extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'topic_id', 'user_id', 'reply',
    ];


    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
