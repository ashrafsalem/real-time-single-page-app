<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    // reverse relation with question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // reverse relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // one to many relation with like
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
