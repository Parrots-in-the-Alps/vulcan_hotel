<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CallToAction;
use File;

class CallToActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/callToAction.json");
        $cta = json_decode($json);
  
        foreach ($cta as $key => $value) {
            CallToAction::create([
                "action" => $value->action,
                "title" => json_encode($value->title),
            ]);
        }
    }
}
