<?php

namespace App\Http\Controllers;

use App\Models\Metier;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homePage()
    {
        return view('index');
    }
    public function usersPage()
    {
        $users = User::paginate(4);
        return view('admin.users', compact('users'));
    }
}
