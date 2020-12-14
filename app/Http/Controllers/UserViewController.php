<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function userAccountPage(Request $request)
    {
        $tab = $request->input('tab') ? $request->input('tab') : "info-user";
        return view('user.account', ['tab'=>$tab]);
    }
}
