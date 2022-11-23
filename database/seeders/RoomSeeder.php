<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use File;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/room.json");
        $rooms = json_decode($json);
  
        foreach ($rooms as $key => $value) {
            Room::create([
                "number" => $value->number,
                "type" => json_encode($value->type),
                "capacity" => $value->capacity,
                "price" => $value->price,
                "status" => json_encode($value->status),
                "image" => $value->image,
                "name" => $value->name,
                "description" => json_encode($value->description),
            ]);
        }
    }
}