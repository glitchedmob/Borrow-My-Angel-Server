<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Room extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'created_by_id' => $this->created_by_id,
            'member_user_ids' => $this->member_user_ids,
            'private' => $this->private,
            'updated_at' => $this->updated_at,
        ];
    }
}
