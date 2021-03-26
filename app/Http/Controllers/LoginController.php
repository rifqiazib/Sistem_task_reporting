<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function postlogin(Request $request)
    {
        
        if($request->user()->hasrole('Tim'))
        {
            return redirect('tim');
        }

        if($request->user()->hasrole('Admin'))
        {
            return redirect('admin');
        }
        
        //dd($request->all());
       // if (Auth::attempt($request->only('email', 'password')))
        //{
          //  return redirect('/admin');
        //}
        //return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
