<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function homePage()
    {
        return view('index');
    }
}
