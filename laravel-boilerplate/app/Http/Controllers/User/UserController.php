<?php

namespace App\Http\Controllers\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = true;
        $role_list = Role::get();
        return view('users.user_list',compact('user','role_list'));
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "name" => 'required',
            "email" => 'required|email|unique:users,email',
            "password"=> 'required',
            "role" => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Please fill the all filed!');
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role
        ]);
        return redirect()->route('users.index');
    }

    public function edit(Request $request,$id)
    {
        $user = true;
        $user_data = User::find($id);
        $role_list = Role::get();
        $role_name = Role::where('id',$user_data->role_id)->value('name');
        return view('users.user_view',compact('user','user_data','role_list','role_name'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required',
            "email" => 'required|email',
            "role" => 'required'
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
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->route('users.edit');
            }
            else{
                User::where('id',$id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role_id' => $request->role,
                    'updated_at' => Carbon::now()
                ]);
                return redirect()->route('users.edit');
            }
        }catch(Exception $e){
            return redirect()->back()->with('error',$e);
        }
    }

    public function delete(Request $request,$id)
    {
        $data = User::where('id',$id)->delete();
        return response()->json(['status'=>true]);
    }
}
