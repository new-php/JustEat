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
        if (config('app.env') == 'testing') {
            $this->call(OauthClientsSeeder::class);
        }
    	$this->call(RoleSeeder::class);
    	$this->call(UserSeeder::class);
    }
}
