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
        $advantages = json_decode($json);
  
        foreach ($advantages as $key => $value) {
            Advantage::create([
                "price" => $value->price,
                "image_icon" => $value->image_icon,
                "title" => json_encode($value->title),
                "description" => json_encode($value->description),
            ]);
        }
    }
}
