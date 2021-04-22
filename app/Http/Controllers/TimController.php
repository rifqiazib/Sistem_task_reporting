<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\ReportTask;
use App\User;

class TimController extends Controller
{
    public function index()
    {
        if(request()->user()->hasrole('Tim'))
        {
            $data_user = User::where('id', Auth::user()->id)->get();
            
            return view('tim.index', ['data_user' => $data_user]);
        }
        else
        {
            return redirect('/login');
        }
        
    }

    public function view()
    {
        $data_task = ReportTask::where('created_by', Auth::user()->id)->get();
        return view('tim.view', ['report_task' => $data_task]);
    }

    public function form()
    {
        return view('tim.form');
    }

    public function message()
    {
        return view('tim.message');
    }

    public function create(Request $request)
    {
        $dataTask = [
            "task_desc" => $request->task_desc,
            "created_date" => $request->created_date,
            "created_by" => Auth::user()->id,
        ];
        ReportTask::create($dataTask);
        $request->session()->flash('sukses', 'Data Added Succsessfully');
        return redirect('/tim/view');

    }

    public function edit($id)
    {
        $report = ReportTask::find($id);
        return view('tim/edit',['report_task' => $report]);
    }

    public function update(Request $request, $id)
    {
        $report = ReportTask::find($id);
        $report -> update($request->all());
        return redirect('/tim/view');
    }

    public function delete($id)
    {
        $report = ReportTask::find($id);
        $report -> delete();
        return redirect('tim/view');
    }


}
