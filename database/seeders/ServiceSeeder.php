<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use File;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/services.json");
        $services = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($services as $key => $value) {

        $service = new Service();
        $service->price = $value["price"];
        $service->image_icon = $value["image_icon"];
        $service
            ->setTranslations('title', $value["title"])
            ->setTranslations('description', $value["description"])
            ->save();

        }
    }
}
