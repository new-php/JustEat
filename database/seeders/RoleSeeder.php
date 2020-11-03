<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Backpack\PermissionManager\app\Models\Role;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'name' => 'admin',
        	'guard_name' => 'web',
        ]);

        Role::create([
        	'name' => 'buyer',
        	'guard_name' => 'web',
        ]);

       	Role::create([
        	'name' => 'restaurant',
        	'guard_name' => 'web',
        ]);

        Role::create([
        	'name' => 'rider',
        	'guard_name' => 'web',
        ]);
    }
}
