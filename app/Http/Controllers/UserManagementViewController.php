<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementViewController extends Controller
{
    public function userManagementPage()
    {
        return view('user-management-page');
    }
}
