<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;

class ResourceCategory extends Model
{
    public function resources()
    {
        return $this->belongsToMany(Resource::class)->withTimestamps();
    }
}
