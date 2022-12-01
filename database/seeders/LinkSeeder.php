<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Link;
use File;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/link.json");
        $links = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($links as $key => $value) {
            $link = new Link();
            $link->url = $value["url"];
            $link
            ->setTranslations('name', $value["name"])
                ->save();

        }
    }
}
