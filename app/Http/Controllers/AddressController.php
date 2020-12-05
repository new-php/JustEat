<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){ 

        $user = auth('api')->user();

        $validator = $request->validate([
            'address_name' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|string',
            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'observations' => 'nullable|string',
            'city' => 'required|string',
            'postal_code' => 'required|string'
        ]);

        $address = Address::create([
            'user_id' => $user->id,
            'address_name' => $validator['address_name'],
            'name' => $validator['address_name'],
            'phone' => $validator['phone'],
            'address_line_1' => $validator['address_line_1'],
            'address_line_2' => isset($validator['address_line_2']) ? $validator['address_line_2'] : null,
            'observations' => isset($validator['observations']) ? $validator['observations'] : null,
            'city' => $validator['city'],
            'postal_code' => $validator['postal_code'],
        ]);

        return response()->json([
            'data' => $address,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
