<?php

namespace Database\Seeders;

use App\Models\Actuality;
use Illuminate\Database\Seeder;
use File;

class ActualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/actuality.json");
        $actualities = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($actualities as $key => $value) {
            $actuality = new Actuality();
            $actuality->image = $value["image"];
            $actuality->start_date = $value["start_date"];
            $actuality->end_date = $value["end_date"];
            $actuality->isActive = true;
            $actuality
            ->setTranslations('title', $value["title"])
            ->setTranslations('description', $value["description"])
                ->save();
        }
    }
}
