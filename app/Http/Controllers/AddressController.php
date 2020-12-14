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
    /*public function index()
    {
        //
    }*/

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
            'name' => $validator['name'],
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
    /*public function show($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $user = auth('api')->user();

        if (!$user->addresses()->where('id', $address->id)->exists()) {
            return response()->json([
                "message" => 'Permission denied',
            ], 403);
        }

        $validator = $request->validate([
            'address_name' => 'nullable|string',
            'name' => 'nullable|string',
            'phone' => 'nullable|string',
            'address_line_1' => 'nullable|string',
            'address_line_2' => 'nullable|string',
            'observations' => 'nullable|string',
            'city' => 'nullable|string',
            'postal_code' => 'nullable|string'
        ]);

        $address->update([
            'address_name' => isset($validator['address_name']) ? $validator['address_name'] : $address->address_name,
            'name' => isset($validator['name']) ? $validator['name'] : $address->name,
            'phone' => isset($validator['phone']) ? $validator['phone'] : $address->phone,
            'address_line_1' => isset($validator['address_line_1']) ? $validator['address_line_1'] : $address->address_line_1,
            'address_line_2' => isset($validator['address_line_2']) ? $validator['address_line_2'] : $address->address_line_2,
            'observations' => isset($validator['observations']) ? $validator['observations'] : $address->observations,
            'city' => isset($validator['city']) ? $validator['city'] : $address->city,
            'postal_code' => isset($validator['postal_code']) ? $validator['postal_code'] : $address->postal_code,
        ]);

        return response()->json([
            'data' => $address,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $user = auth('api')->user();

        if (!$user->addresses()->where('id', $address->id)->exists()) {
            return response()->json([
                "message" => 'Permission denied',
            ], 403);
        }

        $address->delete();

        return response()->json([], 200);
    }

}
