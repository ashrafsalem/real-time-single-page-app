<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $guarded = [];

    // search key, change the way of search,
    // provide the key i want to search with
    // the function must be like this , getRouteKeyName,
    public function getRouteKeyName()
    {
        return 'slug';
    }
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

    // create new path field with the format of getter getPathAttribute
    public function getPathAttribute()
    {
        return asset("api/questions/$this->slug");
    }
}
