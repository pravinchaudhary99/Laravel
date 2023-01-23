<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function index(Request $request)
    {
        $profile = true;
        return view('profile',compact('profile'));
    }

    public function logs(Request $request,$id)
    {
        $logs = true;
        return view('logs',compact('logs'));
    }
}
