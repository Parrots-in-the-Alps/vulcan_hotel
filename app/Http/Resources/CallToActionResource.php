<?php

namespace App\Http\Resources;

use App\Models\CallToAction;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin CallToAction
 */
class CallToActionResource extends JsonResource
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
            'isActive' =>$this->isActive,
            'modal_title' => $this->getTranslation('modal_title', App::getLocale()),
            'modal_content' => $this->getTranslation('modal_content', App::getLocale()),
            'action' => $this->image_icon,
            'hero_id' => $this->hero_id
        ];
    }
}
