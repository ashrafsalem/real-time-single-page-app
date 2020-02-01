<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    // for show function
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
