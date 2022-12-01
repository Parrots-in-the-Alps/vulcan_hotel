<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Footer;
use File;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/footer.json");
        $footers = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($footers as $key => $value) {
            $footer = new Footer();
            $footer->phone_number = $value["phone_number"];
            $footer->mail = $value["mail"];
            $footer->logo = $value["logo"];
            $footer->address_id = $value["address_id"];
    }
    }
}
