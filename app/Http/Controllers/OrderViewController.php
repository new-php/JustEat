<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderViewController extends Controller
{
    public function deliveryAddressPage()
    {
        return view('order.delivery-address');
    }

    public function deliveryTimePage()
    {
        return view('order.delivery-time');
    }

    public function paymentPage()
    {
        return view('order.payment');
    }
}
