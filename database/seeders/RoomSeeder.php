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
        $rooms = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($rooms as $key => $value) {
            $room = new Room();
            $room->number = $value["number"];
            $room->capacity = $value["capacity"];
            $room->price = $value["price"];
            $room->image = $value["image"];
            $room->isActive = true;
            $room
            ->setTranslations('name', $value["name"])
            ->setTranslations('description', $value["description"])
            ->setTranslations('type', $value["type"])
            ->setTranslations('status', $value["status"])
                ->save();
        }

    }
}