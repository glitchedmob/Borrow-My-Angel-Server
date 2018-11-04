<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceCategory extends Model
{
    public function localResources()
    {
        return $this->hasMany(LocalResource::class);
    }

    public function nationalResources()
    {
        return $this->hasMany(NationalResource::class);
    }
}
