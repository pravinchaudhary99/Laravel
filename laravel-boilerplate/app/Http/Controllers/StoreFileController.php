<?php

namespace App\Http\Controllers;

use App\Mail\SendMassage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class StoreFileController extends Controller
{
    public function index(Request $request)
    {
        return view('email');
    }
    public function storeFile(Request $request)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time().'.'.$image->extension();
            if(!File::isDirectory(public_path('uploads'))){
                File::makeDirectory(public_path('uploads'), 0777, true, true);
            }
            $image -> move(public_path('uploads'), $imageName);
            return response()->json(['success' => $imageName]);
        }
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        $path=public_path().'/uploads/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function storeFormData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'compose_to' =>   'required',
            'compose_subject' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Please fill the filed (to,subject)');
        }
        $email_to = json_decode($request->compose_to,true);
        $email_cc = json_decode($request->compose_cc,true);
        $email_to = implode(', ', array_map(function ($item) {
            return $item['value'];
        }, $email_to));
        if(!empty($email_cc)){
            $email_cc = implode(', ', array_map(function ($item) {
                return $item['value'];
            }, $email_cc));
        }
        $data = ['cc' => $email_cc,'subject' => $request->compose_subject,'description' => $request->description];
        $send_message = array_map('trim',explode(",", ($email_to)));
        $path = $request->storeFiles;
        try{
            Mail::to($send_message)->send(new SendMassage ($data, $path));
            if (!empty($path)) {
                foreach ($path as $key => $value) {
                    unlink(public_path() . '/uploads/' . $value);
                }
            }
            return redirect()->route('users.index');
        } catch(Exception $e){
            return redirect()->back()->withInput()->with('error',$e->getMessage());
        }
    }
}
