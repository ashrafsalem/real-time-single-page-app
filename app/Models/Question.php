<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    // reverse relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // one to many relation with reply
    public function replies()
    {
        return $this->hasMany(Reply::claa);
    }

    // reverse relation with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
