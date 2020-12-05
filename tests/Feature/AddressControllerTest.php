<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;

class AddressControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Store a new address correctly
     *
     * @return void
     */
    public function testStoreAddressOk()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $data = array(
            'user_id' => $user->id,
            'name' => 'Fernando',
            'address_name' => 'Casa',
            'phone' => '923 23 12 02',
            'address_line_1' => 'Carrer de Sants, 129',
            'address_line_2' => '4º 1ª',
            'observations' => 'Dejar en puerta',
            'city' => 'Barcelona',
            'postal_code' => '08028'
        );

        $response = $this->post('/api/v1/address/', $data, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(201);
        $this->assertEquals("4º 1ª", json_decode($response->content())->data->address_line_2);
    }

    /**
     * Store an address with no user fails
     * 
     * @return void
     */
    public function testStoreAddressNoAuth()
    {
        $data = array(
            'user_id' => 0,
            'address_name' => 'Casa',
            'name' => 'Fernando',
            'phone' => '923 23 12 02',
            'address_line_1' => 'Carrer de Sants, 129',
            'address_line_2' => '4º 1ª',
            'observations' => 'Dejar en puerta',
            'city' => 'Barcelona',
            'postal_code' => '08028'
        );

        $response = $this->post('/api/v1/address/', $data, [
            'Accept' => 'application/json',
        ]);


        $response->assertStatus(401);
    }

    /**
     * Store a new address correctly with no nullable values
     *
     * @return void
     */
    public function testStoreAddressOkWithNoNullableValues()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $data = array(
            'user_id' => $user->id,
            'address_name' => 'Casa',
            'name' => 'Fernando',
            'phone' => '923 23 12 02',
            'address_line_1' => 'Carrer de Sants, 129',
            'city' => 'Barcelona',
            'postal_code' => '08028'
        );

        $response = $this->post('/api/v1/address/', $data, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(201);
        $this->assertEquals("Carrer de Sants, 129", json_decode($response->content())->data->address_line_1);
    }

    /**
     * Store a badly formatted address, should fail
     *
     * @return void
     */
    public function testStoreAddressBadFormat()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $data = array(
            'user_id' => $user->id,
            'address_name' => 'Casa',
            'name' => 'Fernando',
            'city' => 'Barcelona',
            'postal_code' => '08028'
        );

        $response = $this->post('/api/v1/address/', $data, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(422);
    }

}