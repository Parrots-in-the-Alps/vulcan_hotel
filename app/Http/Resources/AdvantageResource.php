<?php

namespace App\Http\Resources;

use App\Models\Advantage;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Advantage
 */
class AdvantageResource extends JsonResource
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
            'title' => $this->getTranslation('title', App::getLocale()),
            'image_icon' => $this->image_icon,
            'description' => $this->getTranslation('description', App::getLocale()),
            'price' => $this->price,
        ];
    }
}
