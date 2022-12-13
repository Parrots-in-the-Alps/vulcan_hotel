<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sample_Room;
use File;

class SampleRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/sample_room.json");
        $rooms = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($rooms as $key => $value) {
            $room = new Sample_Room();
            $room->capacity = $value["capacity"];
            $room->price = $value["price"];
            $room->image = $value["image"];
            $room->isActive = true;
            $room
            ->setTranslations('name', $value["name"])
            ->setTranslations('description', $value["description"])
            ->setTranslations('type', $value["type"])
                ->save();
        }
    }
}
