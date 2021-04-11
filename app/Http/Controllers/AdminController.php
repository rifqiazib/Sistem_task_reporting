<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        if(request()->user()->hasrole('Admin'))
    {
            return view('admin.index');
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function datauser() {
        $data_user = \App\User::all();
        return view('admin.datauser', ['user' => $data_user]);
    }

    public function formuser(){
        return view('admin.form_user');
    }

    public function create(Request $request) {
        $data_user = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => encrypt($request->password)
            
        ];
        User::create($data_user);
        return redirect('/admin/datauser');
    }

    public function edit($id) {
        $data_user = User::find($id);
        return view('admin/edit', ['user' => $data_user]);
    }

    public function update(Request $request, $id){
        $data_user = User::find($id);
        $data_user -> update($request->all());
        return redirect('/admin/datauser');
    }

    public function delete($id){
        $data_user = User::find($id);
        $data_user -> delete();
        return redirect('/admin/datauser');
    }


    public function taskreport()
    {
        $data_task = \App\Models\ReportTask::all();
        return view('admin.taskreport', ['report_task' => $data_task] );
    }

   
}

