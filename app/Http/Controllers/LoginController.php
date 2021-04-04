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
        if (Auth::attempt($request->only('email', 'password'))) 
        {
            if(Auth::user()->hasrole('Admin')) 
            {
                return redirect('admin');
            } elseif(Auth::user()->hasrole('Tim')) 
            {
                return redirect('tim');
            } else 
            {
                return 'Error';
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
