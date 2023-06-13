<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Lock::factory(30)->create();
    }
}
