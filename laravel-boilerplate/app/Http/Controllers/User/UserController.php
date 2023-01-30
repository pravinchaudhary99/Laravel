<?php

namespace App\Http\Controllers\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\UserSchedule;
use App\Models\UserTask;
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
        $user_data['user_list'] = json_encode(User::pluck('email')->toArray());
        $user_task = UserTask::where('user_id',$id)->get();
        return view('users.user_view',compact('user','user_data','role_list','role_name','user_task'));
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

    public function delete(Request $request,$id)
    {
        $data = User::where('id',$id)->delete();
        return response()->json(['status'=>true]);
    }


    public function task_create(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required',
            "duedate" => 'required',
            "description" => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Please fill the all filed!');
        }
        UserTask::create([
            'name' => $request->name,
            'due_date' => $request->duedate,
            'description' => $request->description,
            'user_id' => $id,
        ]);
        return redirect()->back();
    }


    public function task_update(Request $request,$id)
    {
        $status = $request->task_status;
        UserTask::where('user_id', $id)->update([
            'status' => $status
        ]);
        return redirect()->back();
    }
}
