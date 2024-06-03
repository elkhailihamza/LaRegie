<?php

namespace App\Http\Controllers;

use App\Models\User;

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
