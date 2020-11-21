<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
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
    public function store(Request $request)
    {
        $user = Auth::user();
        
        $validator = $request->validate([
            'user_id' => 'required|alpha_num',
            'restaurant_id' => 'required|alpha_num',
            'details' => 'nullable|string',
            'products' => 'required|array',
            'products.*.id' => 'required|alpha_num',
            'products.*.quantity' => 'required|alpha_num',
            'products.*.price' => 'required|alpha_num'
            ]);

        # TODO assign rider_id

        $status = 'SELECTED';
        
        $total = 0;
        foreach ($request->products as &$product) {
            $total = $total + $product->price * $product->quantity;
        }

        $order = Order::create([
            'user_id' => $request->user_id,
            'restaurant_id' => $request->restaurant_id,
            'details' => $request->details,
            'total' => $total,
            'status' => $status,
        ]);

        foreach ($request->products as &$product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'price' => $product->id,
                'quantity' => $product->quantity
            ]);
        }

        return $order;
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
