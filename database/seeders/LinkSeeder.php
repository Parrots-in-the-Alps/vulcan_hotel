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
        $links = json_decode($json);
  
        foreach ($links as $key => $value) {
            Link::create([
                "url" => $value->url,
                "name" => json_encode($value->name),
            ]);
        }
    }
}
