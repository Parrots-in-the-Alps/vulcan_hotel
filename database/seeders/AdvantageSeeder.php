<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advantage;
use File;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/advantages.json");
        $advantages = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($advantages as $key => $value) {

        $advantage = new Advantage();
        $advantage->price = $value["price"];
        $advantage->image_icon = $value["image_icon"];
        $advantage
            ->setTranslations('title', $value["title"])
            ->setTranslations('description', $value["description"])
            ->save();

        }
    }
}
