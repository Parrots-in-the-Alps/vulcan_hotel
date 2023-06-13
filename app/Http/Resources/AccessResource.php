<?php

namespace App\Http\Resources;

use App\Models\Access;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Access
 */
class AccessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reservation_id' => $this->reservation_id,
            'room_id' => $this->room_id,
            'created_at' => $this->created_at,
        ];
    }
}
