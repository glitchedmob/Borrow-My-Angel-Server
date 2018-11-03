<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ResourceCategory;

class Resource extends Model
{
    public function categories()
    {
        return $this->belongsToMany(ResourceCategory::class)->withTimestamps();
    }
}
