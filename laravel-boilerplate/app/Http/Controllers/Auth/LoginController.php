<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->email)->first();
            if ($user) {
                Auth::login($user);
                return redirect('/');
            } else {
                $role_id = Role::where('name','User')->value('id');
                $data = ['name' => ucwords($google_user->name), 'email' => $google_user->email, 'password' => Hash::make('123456'),'role_id' => $role_id];
                $new_user = User::create($data);
                User::where('email', $google_user->email)->update([
                    'email_verified_at' => Carbon::now()
                ]);
                Auth::attempt(['email' =>$google_user->email, 'password' => '123456']);
                return redirect('/');

            }
        } catch (\Throwable $th) {
            abort(404);
            return redirect('/login');
        }
    }
}
