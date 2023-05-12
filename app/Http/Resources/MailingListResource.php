<?php

namespace App\Http\Resources;

use App\Models\MailingList;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin MailingList
 */
class MailingListResource extends JsonResource
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
            'email' => $this->email
        ];
    }
}
