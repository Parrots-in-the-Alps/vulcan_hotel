<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use App\Models\SampleRoom;

/**
 * @mixin Sample_room
 */
class SampleRoomResource extends JsonResource
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
            'description' => $this->getTranslation('description', App::getLocale()),
            'isActive' =>$this->isActive,
            'price' => $this->price,
            'capacity' => $this->capacity,
            'image' => $this->image
        ];
    }
}
