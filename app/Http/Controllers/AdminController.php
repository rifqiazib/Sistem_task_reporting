<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function dataadmin()
    {
        return view('admin.dataadmin');
    }
}

