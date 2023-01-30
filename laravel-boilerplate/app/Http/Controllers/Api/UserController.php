<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\LoginSession;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user_data = [];
        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;
        $search = $request->search['value'];
        $order = $request->order[0]['column'] ?? null;
        $sort_order = $request->order[0]['dir'] ?? null;
        $filter = $request->search['regex'];
        $sort_query = null;
        if ($order) {
            $sort_query = $request->columns[$order]['data'];
        }
        $start_number = intval((int)$start * (int)$length);
        if(!empty($search)) {
            $user_data = User::where('name', 'like', '%' . $search . '%')->orWhere('email','like','%' . $search . '%')->skip($start_number)->take((int)$length)->get();
        }else {
            if (!empty($sort_order)) {
                $user_data = User::orderBy($sort_query,$sort_order)->skip($start_number)->take((int)$length)->get();
            }else{
                $user_data = User::orderBy('created_at','desc')->skip($start_number)->take((int)$length)->get();
            }
        }
        if($filter == "filter"){
            $user_data = User::whereMonth('created_at','=',$search)->skip($start_number)->take((int)$length)->get();
        }
        $count = User::get()->count();
        $data = [
            "draw"=> $draw,
            "recordsTotal"=> $count,
            "recordsFiltered"=> $count,
        ];
        $data['data'] = $user_data;
        return response()->json($data);
    }

    public function login_session(Request $request)
    {
        $user_data = [];
        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;
        $search = $request->search['value'];
        $order = $request->order[0]['column'] ?? null;
        $sort_order = $request->order[0]['dir'] ?? null;
        $filter = $request->search['regex'];
        $sort_query = null;
        if ($order) {
            $sort_query = $request->columns[$order]['data'];
        }
        $start_number = intval((int)$start * (int)$length);
        if(!empty($search)) {
            $user_data = LoginSession::where('location', 'like', '%' . $search . '%')->orWhere('device','like','%' . $search . '%')->skip($start_number)->take((int)$length)->get();
        }else {
            if (!empty($sort_order)) {
                $user_data = LoginSession::orderBy($sort_query,$sort_order)->skip($start_number)->take((int)$length)->get();
            }else{
                $user_data = LoginSession::orderBy('created_at','desc')->skip($start_number)->take((int)$length)->get();
            }
        }

        $count = LoginSession::get()->count();
        $data = [
            "draw"=> $draw,
            "recordsTotal"=> $count,
            "recordsFiltered"=> $count,
        ];
        $data['data'] = $user_data;
        return response()->json($data);
    }
}
