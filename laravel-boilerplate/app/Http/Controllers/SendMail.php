<?php

namespace App\Http\Controllers;

use App\Mail\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class SendMail extends Controller
{

    public $name ;
    public function index(Request $request){
        $name = 'Pravin Chaudhary';
        $verify = "Email Verify";
        $otp = "121212";
        Mail::to('prachis.wot2022@gmail.com')->send(new VerifyUser ($verify,$name,$otp));

        return 'Email sent Successfully';
    }

}