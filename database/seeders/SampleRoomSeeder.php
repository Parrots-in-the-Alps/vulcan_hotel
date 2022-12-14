<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SampleRoom;
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
        $json = File::get("database/data/sampleRoom.json");
        $rooms = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($rooms as $key => $value) {
            $room = new SampleRoom();
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
