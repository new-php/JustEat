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

    /**
     * Update a new address correctly
     *
     * @return void
     */
    public function testUpdateAddressOk()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $address = Address::factory()->create([
            'user_id' => $user->id,
        ]);

        $data = array(
            'name' => 'Fernando',
            'address_name' => 'Casa',
            'phone' => '923 23 12 02',
            'address_line_1' => 'Carrer de Sants, 129',
            'address_line_2' => '4º 1ª',
            'observations' => 'Dejar en puerta',
            'city' => 'Barcelona',
            'postal_code' => '08028'
        );

        $response = $this->put('/api/v1/address/' . $address->id, $data, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(200);
        $this->assertEquals("Fernando", json_decode($response->content())->data->name);
        $this->assertEquals("Casa", json_decode($response->content())->data->address_name);
        $this->assertEquals("923 23 12 02", json_decode($response->content())->data->phone);
        $this->assertEquals("Carrer de Sants, 129", json_decode($response->content())->data->address_line_1);
        $this->assertEquals("4º 1ª", json_decode($response->content())->data->address_line_2);
        $this->assertEquals("Dejar en puerta", json_decode($response->content())->data->observations);
        $this->assertEquals("Barcelona", json_decode($response->content())->data->city);
        $this->assertEquals("08028", json_decode($response->content())->data->postal_code); 
    }

    /**
     * Update a new address correctly not sending all values
     *
     * @return void
     */
    public function testUpdateIncompleteAddressOk()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $address = Address::factory()->create([
            'user_id' => $user->id,
        ]);

        $data = array(
            'name' => 'Juan',
        );

        $response = $this->put('/api/v1/address/' . $address->id, $data, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(200);
        $this->assertEquals("Juan", json_decode($response->content())->data->name);
        $this->assertEquals($address->address_name, json_decode($response->content())->data->address_name);
        $this->assertEquals($address->phone, json_decode($response->content())->data->phone);
        $this->assertEquals($address->address_line_1, json_decode($response->content())->data->address_line_1);
        $this->assertEquals($address->address_line_2, json_decode($response->content())->data->address_line_2);
        $this->assertEquals($address->observations, json_decode($response->content())->data->observations);
        $this->assertEquals($address->city, json_decode($response->content())->data->city);
        $this->assertEquals($address->postal_code, json_decode($response->content())->data->postal_code); 
    }

    /**
     * Update an address that is not yours, should fail
     *
     * @return void
     */
    public function testUserUpdatingAnotherUsersAddressFails()
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $address = Address::factory()->create([
            'user_id' => $user2->id,
        ]);

        $data = array(
            'name' => 'Juan',
        );

        $response = $this->put('/api/v1/address/' . $address->id, $data, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(403);
    }

    /**
     * Update an address that doesn't exist, should fail
     *
     * @return void
     */
    public function testUserUpdatingNonExistingAddressFails()
    {
        $user = User::factory()->create();

        $this->artisan('passport:install');

        Passport::actingAs(
            $user,
            ['create-servers']
        );

        $data = array(
            'name' => 'Juan',
        );

        $response = $this->put('/api/v1/address/2', $data, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(404);
    }

}