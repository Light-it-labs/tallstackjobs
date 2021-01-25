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
        $company = new Company();
        $company->setRawAttributes([
            'name' => 'Test Company',
            'logo' => public_path('images/company_logo_placeholder.jpg'),
        ]);

        Job::factory(10)
        ->hasHashtags(random_int(1,6))
        ->forCompany($company->toArray())
        ->create();

        User::create([
            'name' => 'User',
            'company_id' => 1,
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ]);
        
    }
}
