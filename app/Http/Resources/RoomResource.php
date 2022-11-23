<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

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
            'name' => $this->getTranslations('name', [App::getLocale()]),
            'type' => $this->getTranslations('type', [App::getLocale()]),
            'status' => $this->getTranslations('status', [App::getLocale()]),
            'description' => $this->getTranslations('description', [App::getLocale()]),
            'price' => $this->price,
            'number' => $this->number,
            'capacity' => $this->capacity,
            'image' => $this->image
        ];
    }
}
