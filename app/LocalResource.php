<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalResource extends Model
{
    public function category()
    {
        return $this->belongsTo(ResourceCategory::class);
    }
}
