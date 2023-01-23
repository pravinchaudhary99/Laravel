<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        if ($order) {
            $sort_query = $request->columns[$order]['data'];
        }
        if (!empty($search)) {
            dd($search);
        }else {
            if (!empty($sort_order) && $sort_order == 'asc') {
                $user_data = User::get();
            }else{
                $user_data = User::get();
            }
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
}
