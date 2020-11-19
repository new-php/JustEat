<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OauthClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::insert('insert into oauth_clients (name, secret, provider, redirect, personal_access_client, password_client, revoked) values (?, ?, ?, ?, ?, ?, ?)', ['jUBsteat Personal Access Client', '8jE6zPkvOYAS3FXHnGe1A1CTmFAG98DQcEz5R5iN', null, 'http://localhost', 1, 0, 0]);
        \DB::insert('insert into oauth_clients (name, secret, provider, redirect, personal_access_client, password_client, revoked) values (?, ?, ?, ?, ?, ?, ?)', ['jUBsteat Password Grant Client', 'WzcCcKmUuZGpa8fq46MCZl6TDRKLoGmkEEimjaAq', 'users', 'http://localhost', 0, 1, 0]);
        \DB::insert('insert into oauth_personal_access_clients (client_id) values(?)', [1]);
    }
}
