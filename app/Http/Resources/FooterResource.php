<?php

namespace App\Http\Resources;

use App\Models\Footer;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Footer
 */
class FooterResource extends JsonResource
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
            'phone_number' => $this->phone_number,
            'isActive' =>$this->isActive,
            'mail' => $this->mail,
            'logo' => $this->logo,
            'address_id' => $this->address_id,
            'link_id' => $this->link_id,
        ];
    }
}
