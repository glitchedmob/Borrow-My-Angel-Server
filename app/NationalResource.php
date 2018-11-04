<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NationalResource extends Model
{
    public function resourceCategory()
    {
        return $this->belongsTo(ResourceCategory::class);
    }
}
