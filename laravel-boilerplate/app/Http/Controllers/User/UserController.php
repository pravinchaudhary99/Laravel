<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = true;
        return view('users.user_list',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = true;
        return view('users.user_view',compact('user'));
    }
}
