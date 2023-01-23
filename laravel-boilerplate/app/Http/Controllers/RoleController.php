<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $role = true;
        $permission = Permission::orderBy('name','DESC')->get()->toArray();
        $permission_list['User'] = [];
        $permission_list['Role']= [];
        $permission_list['Customer']= [];
        $permission_list['Product'] = [];
        foreach ($permission as $item) {
            $item['name'] = substr($item['name'], 0, strrpos($item['name'], " "));
            $item['key'] = explode("_", $item['key'])[1];
            if ($item['name'] == 'User') {
                array_push($permission_list['User'],$item);
            }elseif ($item['name'] == 'Role') {
                array_push($permission_list['Role'],$item);
            }elseif ($item['name'] == 'Customer') {
                array_push($permission_list['Customer'],$item);
            }else{
                array_push($permission_list['Product'],$item);
            }
        }

        $role_list = Role::get()->toArray();
        $role_data = array();
        foreach ($role_list as $item) {
            $permission_name = Permission::whereIn('id',json_decode($item['permissions']))->orderBy('name','DESC')->pluck('name')->toArray();
            $count = User::where('role_id',$item['id'])->get()->count();

            array_push($role_data,['id' => $item['id'],'role_name' => $item['name'],'permission' => $permission_name,'count'=>$count]);
        }
        return view('roles.roleList',compact('permission_list','role','role_data'));
    }


    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_name' => 'required|unique:roles,name',
            'permission' => 'array|min:1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Please fill the role name and one permission select');
        }
        $role = Role::create(['name'=>$request->role_name,'permissions'=>json_encode($request->permission)]);
        return redirect()->route('roles.index');
    }


    public function role_view(Request $request ,$id)
    {
        $role = true;
        $role_list = Role::where('id',$id)->get()->toArray();
        $role_data = array();
        foreach ($role_list as $item) {
            $permission_name = Permission::whereIn('id',json_decode($item['permissions']))->orderBy('name','DESC')->pluck('name')->toArray();
            array_push($role_data,['id' => $item['id'],'role_name' => $item['name'],'permission' => $permission_name]);
        }
        $count = User::where('role_id',$item['id'])->get()->count();
        $user_data = User::where('role_id',$id)->get()->toArray();
        $role_permission = $role_list[0]['permissions'];

        $permission = Permission::orderBy('name','DESC')->get()->toArray();
        $permission_list['User'] = [];
        $permission_list['Role']= [];
        $permission_list['Customer']= [];
        $permission_list['Product'] = [];
        foreach ($permission as $item) {
            $item['name'] = substr($item['name'], 0, strrpos($item['name'], " "));
            $item['key'] = explode("_", $item['key'])[1];
            if ($item['name'] == 'User') {
                array_push($permission_list['User'],$item);
            }elseif ($item['name'] == 'Role') {
                array_push($permission_list['Role'],$item);
            }elseif ($item['name'] == 'Customer') {
                array_push($permission_list['Customer'],$item);
            }else{
                array_push($permission_list['Product'],$item);
            }
        }
        $id = $role_list[0]['id'];
        return view('roles.viewRole',compact('role','role_data','user_data','count','role_permission','permission_list','id'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_name' => 'required',
            'permission' => 'array|min:1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Please fill the role name and one permission select');
        }
        try {
            Role::where('id',$request->role_id)->update([
                "name" => $request->role_name,
                "permissions" => $request->permission
            ]);
            return redirect()->back();
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Role name all ready exists');
        }
    }

    public function delete(Request $request,$id)
    {
        $data = Role::where('id',$id)->delete();
        return response()->json(['status'=>true]);
    }
}
