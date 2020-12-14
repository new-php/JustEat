<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Address;
use App\Models\Restaurant;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user();

        $orders = $user->orders()->with('restaurant', 'orderItems')->get();

        return ['data' => $orders];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth('api')->user();

        $validator = $request->validate([
            'restaurant_id' => 'required|integer',
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|integer',
            'products.*.quantity' => 'required|numeric|min:1',
            'shipping' => 'required',
            'delivery_mode' => 'required',
        ]);

        $products = [];

        $total = 0;
        foreach ($validator['products'] as $product) {
            $db_product = Product::findOrFail($product['id']);
            $db_product->quantity = $product['quantity'];
            array_push($products, $db_product);

            $total += $db_product->price * $db_product->quantity;
        }

        $order = Order::create([
            'user_id' => $user->id,
            'restaurant_id' => $request->restaurant_id,
            'shipping' => $validator['shipping'],
            'total' => $total,
            'delivery_mode' => $validator['delivery_mode'],
        ]);

        foreach ($products as $product) {
            $order->orderItems()->create([
                'product_id' => $product->id,
                'price' => $product->price,
                'quantity' => $product->quantity,
            ]);
        };

        return response()->json([
            'data' => $order->fresh(),
        ], 201);
    }

    public function addAddress(Request $request, Order $order)
    {
        $user = auth('api')->user();

        if (!$user->orders()->where('id', $order->id)->exists() || $order->status == 'COMPLETED') {
            return response()->json([
                "message" => 'Permission denied',
            ], 403);
        }

        $validator = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => '',
            'details' => '',
            'city' => 'required',
            'post_code' => 'required',
        ]);

        $address = $user->addresses()->firstOrCreate([
            'name' => $validator['name'],
            'phone' => $validator['phone'],
            'address_line_1' => $validator['address_line_1'],
            'address_line_2' => $validator['address_line_2'],
            'observations' => $validator['details'],
            'city' => $validator['city'],
            'postal_code' => $validator['post_code'],
        ]);

        $order->update([
            'address_id' => $address->id,
            'status' => 'ADDRESSED',
        ]);

        return response()->json([
                'data' => $order,
            ], 200);
    }

    public function addDeliveryTime(Request $request, Order $order)
    {
        $user = auth('api')->user();

        if (!$user->orders()->where('id', $order->id)->exists() || $order->status == 'COMPLETED') {
            return response()->json([
                "message" => 'Permission denied',
            ], 403);
        }

        $validator = $request->validate([
            'delivery_time' => 'required|string',
            'description' => 'string|nullable',
        ]);

        $order->update([
            'delivery_time' => $validator['delivery_time'],
            'details' => isset($validator['description']) ? $validator['description'] : null,
            'status' => 'TIMED'
        ]);

        return response()->json([
            'data' => $order,
        ], 200);
    }

    public function pay(Request $request, Order $order)
    {
        $user = auth('api')->user();

        if (!$user->orders()->where('id', $order->id)->exists() || $order->status == 'COMPLETED') {
            return response()->json([
                "message" => 'Permission denied',
            ], 403);
        }

        $validator = $request->validate([
            'payed' => 'required|boolean',
        ]);

        $order->update([
            'payed' => $validator['payed'],
            'order_status' => 'RECEIVED',
            'status' => 'COMPLETED',
        ]);

        return response()->json($order, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $user = auth('api')->user();

        if (!$user->orders()->where('id', $order->id)->exists() || $order->status != 'COMPLETED') {
            return response()->json([
                "message" => 'Permission denied',
            ], 403);
        }

        $address = Address::where('id', '=', $order->address_id)->get();
        $restaurant = Restaurant::where('id', '=', $order->restaurant_id)->get();
        $order_items = OrderItem::where('order_id', '=', $order->id)->get();
        $products = array();

        foreach ($order_items as &$order_item) {
            $product = Product::where('id', '=', $order_item->product_id)->get();
            array_push($products, $product);
        }

        $order->load('address', 'restaurant', 'orderItems', 'orderItems.product');

        return response()->json([
            'data' => [
                'order' => $order,
                'address' => $address,
                'restaurant' => $restaurant,
                'order_items' => $order_items,
                'products' => $products
            ]
            ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        //
    }*/

}
