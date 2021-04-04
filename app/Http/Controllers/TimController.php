<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data_task = \App\Models\ReportTask::all();
        return view('tim.view', ['report_task' => $data_task]);
    }

    public function form()
    {
        return view('tim.form');
    }

    public function create(Request $request)
    {
        \App\Models\ReportTask::create($request->all());
        return redirect('/tim/view')->with('Sukses', 'Data Berhasil Diinputkan');

    }

    public function edit($id)
    {
        $report = \App\Models\ReportTask::find($id);
        return view('tim/edit',['report_task' => $report]);
    }

    public function update(Request $request, $id)
    {
        $report = \App\Models\ReportTask::find($id);
        $report -> update($request->all());
        return redirect('/tim/view');
    }

    public function delete($id)
    {
        $report = \App\Models\ReportTask::find($id);
        $report -> delete();
        return redirect('tim/view');
    }

}
