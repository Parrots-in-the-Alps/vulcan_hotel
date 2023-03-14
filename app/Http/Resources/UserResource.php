<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        //TODO
        // dd($request);
        // il manque des entrées (les 3 commentaires du return) en base de donnée pour la table user, pour le profile (voir /components/profile/Profile.vue)

        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'lastName' => $this->lastName,
            'address_id' => $this->address_id,
            // 'streetNumber' => $this->streetNumber,
            // 'streetName' => $this->streetName,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
        ];
    }
}
