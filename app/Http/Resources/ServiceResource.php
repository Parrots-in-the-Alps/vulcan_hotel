<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Service
 */
class ServiceResource extends JsonResource
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
            'billing_type' =>$this->billing_type,
            'image_icon' => $this->image_icon,
            'description' => $this->getTranslation('description', App::getLocale()),
            'price' => $this->price,
            'isActive' =>$this->isActive
        ];
    }
}
