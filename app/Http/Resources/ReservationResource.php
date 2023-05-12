<?php
namespace App\Http\Resources;

use App\Models\Reservation;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Reservation
 */
class ReservationResource extends JsonResource
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
            'entryDate' => $this->entryDate,
            'exitDate' => $this->exitDate,
            'user_id' => $this->user_id,
            'isDue' => $this->isDue,
            'room_id' => $this->room_id,
            'service_id' => $this->service_id
        ];
    }
}
