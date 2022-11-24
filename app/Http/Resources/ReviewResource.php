<?php

namespace App\Http\Resources;

use App\Models\Review;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @mixin Review
 */
class ReviewResource extends JsonResource
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
            'user_name' => $this->user_name,
            'isActive' => $this->isActive,
            'image_user_avatar' => $this->image_user_avatar,
            'rating' => $this->rating,
            'comment'=> $this->comment,
            'creation_date' =>$this->creation_date
        ];
    }
}
