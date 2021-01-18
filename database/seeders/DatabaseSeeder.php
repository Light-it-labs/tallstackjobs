<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $company = Company::create([
            'name' => 'Test Company',
            'logo' => 'http://placehold.it/80x80.jpg',
        ]);

        User::create([
            'name' => 'User',
            'company_id' => $company->id,
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ]);
        
        Job::factory(10)
        ->hasHashtags(random_int(1,6))
        ->forCompany()
        ->create();
    }
}
