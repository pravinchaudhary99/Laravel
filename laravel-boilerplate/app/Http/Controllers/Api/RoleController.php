<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    public function index(Request $request,$id)
    {
      
        $role_data = Role::find($id);
        return response()->json($role_data);
    }
}
