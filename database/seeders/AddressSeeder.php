<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use File;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/adresse.json");
        $addresses = json_decode($json, JSON_OBJECT_AS_ARRAY);
  
        foreach ($addresses as $key => $value) {
            $address = new Address();
            $address->street_num = $value["street_num"];
            $address->street_name = $value["street_name"];
            $address->zip = $value["zip"];
            $address->city_name = $value["city_name"];
            $address->country = $value["country"];
    }
}

}
