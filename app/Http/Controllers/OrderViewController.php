<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderViewController extends Controller
{
    public function deliveryAddressPage()
    {
        return view('order.delivery-address');
    }
}
