<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\ReportTask;

class TimController extends Controller
{
    public function index()
    {
        if(request()->user()->hasrole('Tim'))
        {
            return view('tim.index');
        }
        else
        {
            return redirect('/login');
        }
        
    }

    public function view()
    {
        $data_task = ReportTask::all();
        return view('tim.view', ['report_task' => $data_task]);
    }

    public function form()
    {
        return view('tim.form');
    }

    public function create(Request $request)
    {
        $dataTask = [
            "task_desc" => $request->task_desc,
            "created_date" => $request->created_date,
            "created_by" => Auth::user()->id,
        ];
        ReportTask::create($dataTask);
        return redirect('/tim/view')->with('Sukses', 'Data Berhasil Diinputkan');

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
