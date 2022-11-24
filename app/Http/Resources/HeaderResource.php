<?php

namespace App\Http\Resources;

use App\Models\Header;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Header
 */
class HeaderResource extends JsonResource
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
            'banner_image' => $this->banner_image
        ];
    }
}
