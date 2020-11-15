<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function mainPage()
    {
        return view('main-page', ['categories' => Category::all()]);
    }
}
