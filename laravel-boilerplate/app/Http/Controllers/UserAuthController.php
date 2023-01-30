<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class UserAuthController extends Controller
{

    public function index(Request $request)
    {
        $profile = true;
        $role_list = Role::get();
        return view('profile',compact('profile','role_list'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required',
            "email" => 'required|email',
            "role" => 'required',
            "contact_no" => 'min:9|max:10'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Please fill the all filed!');
        }
        try{
            if(!empty($request->image)){
                $imageName = time().'.'.$request->image->extension();
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $image_path = '/images/'. $imageName;
                User::where('id',$id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role_id' => $request->role,
                    'profile_picture' => $image_path,
                    'address'=> $request->address,
                    'contact_no'=> $request->contact_no,
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->route('users.edit');
            }
            else{
                User::where('id',$id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role_id' => $request->role,
                    'address'=> $request->address,
                    'contact_no'=> $request->contact_no,
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->route('users.edit');
            }
        }catch(Exception $e){
            return redirect()->back()->with('error',$e);
        }
    }

}
