<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;
use File;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/hero.json");
        $heroes = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($heroes as $key => $value) {
            $hero = new Hero();
            $hero->logo = $value["logo"];
            $hero->image = $value["image"];
            $hero
            ->setTranslations('slogan', $value["slogan"])
                ->save();
        }

    }
}
