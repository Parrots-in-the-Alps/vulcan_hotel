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
         \App\Models\User::factory(10)->create();
         $this->call([
            // CallToActionSeeder::class,
            ActualitySeeder::class,
            // AdvantageSeeder::class,
            // AddressSeeder::class,
            // VideoSeeder::class,
            // HeroSeeder::class,
            RoomSeeder::class,
            // FooterSeeder::class,
            // HeaderSeeder::class,
            // MailingListSeeder::class,
            // ReviewSeeder::class,
            // LinkSeeder::class
        ]);
    }
}
