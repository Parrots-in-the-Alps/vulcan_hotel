<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            ActualitySeeder::class,
            ServiceSeeder::class,
            AddressSeeder::class,
            VideoSeeder::class,
            HeroSeeder::class,
            RoomSeeder::class,
            SampleRoomSeeder::class,
            FooterSeeder::class,
            HeaderSeeder::class,
            ReviewSeeder::class,
            LinkSeeder::class,
            UserSeeder::class,
            ReservationSeeder::class,
            // AccessSeeder::class,
            //LockSeeder::class
        ]);
    }
}
