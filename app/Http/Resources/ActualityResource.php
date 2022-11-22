<?php

namespace App\Http\Resources;

use App\Models\Actuality;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Actuality
 */
class ActualityResource extends JsonResource
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
            'title' => $this->getTranslations('title', [App::getLocale()]),
            'image' => $this->image,
            'description' => $this->getTranslations('description', [App::getLocale()]),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date
        ];
    }
}
