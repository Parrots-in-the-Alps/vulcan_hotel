<?php

namespace App\Http\Resources;

use App\Models\Room;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

/**
 * @mixin Room
 */
class RoomResource extends JsonResource
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
            'name' => $this->getTranslation('name', App::getLocale()),
            'type' => $this->getTranslation('type', App::getLocale()),
            'status' => $this->getTranslation('status', App::getLocale()),
            'description' => $this->getTranslation('description', App::getLocale()),
            'isActive' =>$this->isActive,
            'price' => $this->price,
            'number' => $this->number,
            'capacity' => $this->capacity,
            'image' => $this->image
        ];
    }
}
