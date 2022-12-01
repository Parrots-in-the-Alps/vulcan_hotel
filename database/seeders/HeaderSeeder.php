<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Header;
use File;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/header.json");
        $headers = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($headers as $key => $value) {
            $header = new Header();
            $header->banner_image = $value["banner_image"];
    }
}
}
