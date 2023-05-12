<?php

namespace App\Http\Resources;

use App\Models\Hero;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

/**
 * @mixin Hero
 */
class HeroResource extends JsonResource
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
            'isActive' =>$this->isActive,
            'slogan' => $this->getTranslation('slogan', App::getLocale()),
            'image' => $this->image,
            'logo' => $this->logo
        ];
    }
}
