<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Advantage::factory(5)->create();
    }
}
