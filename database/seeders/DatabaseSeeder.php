<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Job::factory(10)->create();
    }
}
