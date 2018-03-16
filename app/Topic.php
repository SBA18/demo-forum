<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Reply;

class Topic extends Model
{
    
    protected $fillable = [
        'uuid', 'title', 'user_id', 'message', 'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
