<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TodosSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([TodosSeeder::class]);
    }
}
