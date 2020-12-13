<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderViewController extends Controller
{
    public function deliveryAddressPage(Order $order)
    {
        if ($order->status != 'COMPLETED') {
            return view('order.delivery-address', ['order' => $order]);
        }

        return redirect('/');
    }

    public function deliveryTimePage(Order $order)
    {
        if ($order->status != 'COMPLETED') {
            return view('order.delivery-time', ['order' => $order]);
        }

        return redirect('/');
    }

    public function paymentPage(Order $order)

    {
        if ($order->status != 'COMPLETED') {
            $order->load('restaurant', 'orderItems', 'address');
            return view('order.payment', ['order' => $order]);
        }

        return redirect('/');
    }

    public function informationPage($id)
    {
        return view('order.information', ['id' => $id]);
    }

}
