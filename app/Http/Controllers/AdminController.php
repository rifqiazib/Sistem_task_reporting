<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\ReportTask;
use Auth;

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

    public function datauser(Request $request) {
        $data_user = User::all();
        
        return view('admin.datauser', ['users' => $data_user]);
    }

    public function formuser(){
        $data_role = Role::all();
        return view('admin.form_user', ['roles' => $data_role]);
    }

    public function create(Request $request) {
        $data_user = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
            
        ];
        $save_user = User::create($data_user);

        $data_role = [
            "user_id" => $save_user->id,
            "role_id" => $request->role
        ];
        UserRole::create($data_role);
        $request->session()->flash('sukses', 'Data User Berhasil Ditambahkan');
        return redirect('/admin/datauser');
    }

    public function edit(Request $request, $id) {
        $data_user = User::find($id);
        $request->session()->flash('editsukses', 'Data User Berhasil Diubah');
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

    public function view($id)
    {
        $data_user = User::find($id);
        $data_task = ReportTask::where('created_by', $data_user)->get();
        
        dd($data_task);
        
        //return view('admin.taskreport', ['report_task' => $data_task]);
    }

    public function taskreport()
    {
        $data_task = ReportTask::all();
        return view('admin.taskreport', ['report_task' => $data_task] );
    }

    public function search(Request $request)
    {
        $form_date = $request->input('created_date');
        $to_date = $request->input('created_to');

        $data_task = ReportTask::select()
        ->where('created_date', '>=', $form_date)
        ->where('created_date', '<=', $to_date)
        ->get();
        return view('admin.taskreport', ['report_task' => $data_task]);
        
    }

   
}

