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
}
