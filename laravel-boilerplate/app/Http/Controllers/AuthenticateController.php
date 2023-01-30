<?php

namespace App\Http\Controllers;

use DateTime;

use App\Models\Role;
use App\Models\User;
use App\Mail\VerifyUser;
use App\Models\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthenticateController extends Controller
{

    public function GernreteOTP()
    {
        $now = new DateTime();
        $Otp =  $now->format('u');
        return $Otp;
    }

    public function index(Request $request)
    {
        return view('authenticate.login');
    }

    public function login(Request $request)
    {
        $messages = array(
            'email.required'=>'User email address field required',
            'password.required'=>'User password field required',
        );

        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );

        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Please fill the details');
        }
        if (User::where('email',$request->email)->exists() && Hash::check($request->password, User::where('email',$request->email)->value('password'))) {
            $user = User::where('email',$request->email)->value('email_verified_at');
            if(empty($user)){
                $otp = $this->GernreteOTP();
                $verify = 'Email verify';
                $verify_data = VerifyEmail::create(['email'=>$request->email,'otp'=>$otp]);
                $verify_id = $verify_data->id;
                Mail::to('chaudharypravinbhai944@gmail.com')->send(new VerifyUser ($verify,'Verfiy email',$otp));
                return view('authenticate.verify_email',compact('verify_id'));
            }else{
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    return redirect()->route('home.index');
                }
                else{
                    return response()->json(['error'=>'Unauthorised',"message"=>"Enter Valid password"], 401);
                }
            }
        }else{
            return redirect()->back()->withInput()->with('error','User does not exists!');
        }
    }

    public function register(Request $request)
    {
        return view('authenticate.register');
    }

    public function register_create(Request $request)
    {
        $role_id = Role::where('name','User')->value('id');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Please fill the details');
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        unset($input['confirm_password']);
        $input['role_id'] = $role_id;
        $user = User::create($input);
        if (empty($user)) {
            return redirect()->back()->withInput()->with('error','User Not created');
        }
        return redirect()->route('login');
    }

    public function forgot(Request $request)
    {
        return view('authenticate.forget');
    }

    public function forgot_password(Request $request)
    {
        $email = $request->email;
        $otp = $this->GernreteOTP();

        // $verify_data = VerifyOtp::create(['email'=>$request->email,'otp'=>$otp]);
        // $verify_id = $verify_data->id;
        $verify = 'Email verify';
        Mail::to('chaudharypravinbhai944@gmail.com')->send(new VerifyUser ($verify,'Verfiy otp',$otp));
        return view('authenticate.two_staps',compact('verify_id'));
    }

    public function verify_email(Request $request)
    {
        return view('authenticate.verify_email');
    }

    public function verify_email_create(Request $request)
    {
        $verify_id = trim($request->verify_id);
        $ver_otp = implode($request->verify_otp);

        if(VerifyEmail::where(['id'=>$verify_id,'otp'=>$ver_otp])->exists()){
            $email = VerifyEmail::where(['id'=>$verify_id,'otp'=>$ver_otp])->value('email');
            User::where('email',$email)->update([
                'email_verified_at' => Carbon::now()
            ]);
            VerifyEmail::where('email',$email)->delete();
            return redirect()->route('login');
        }else{
            return view('authenticate.verify_email',compact('verify_id'))->with('error','please enter correct otp');
        }
    }

    public function verify_otp(Request $request)
    {
        return view('authenticate.two_staps');
    }

    public function verify_otp_check(Request $request)
    {
        $verify_id = trim($request->verify_id);
        $ver_otp = implode($request->verify_otp);
        // if(VerifyOtp::where(['id'=>$verify_id,'otp'=>$ver_otp])->exists()){
        //     $email = VerifyOtp::where(['id'=>$verify_id,'otp'=>$ver_otp])->value('email');
        //     VerifyOtp::where('id',$verify_id)->delete();
        //     return view('authenticate.change_password',compact('email'));
        // }else{
        //     return view('authenticate.verify_email',compact('verify_id'))->with('error','please enter correct otp');
        // }
    }

    public function change_password(Request $request)
    {
        return view('authenticate.change_password');
    }

    public function update_change_password(Request $request)
    {
        dd($request);
        $email = $request->email;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;

        $validator = Validator::make($request->all(), [

            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
}

