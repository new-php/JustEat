<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function userAccountPage()
    {
        return view('user.account');
    }
}
