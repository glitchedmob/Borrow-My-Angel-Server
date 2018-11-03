<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NationalResource extends Model
{
    public function category()
    {
        return $this->belongsTo(ResourceCategory::class);
    }
}
