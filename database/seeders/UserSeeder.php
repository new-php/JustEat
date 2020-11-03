<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'admin',
        	'email' => 'admin@justeat.com',
        	'email_verified_at' => Carbon::now(),
        	'password' => Hash::make('admin'),
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);

        $user->assignRole('admin');
    }
}
