<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class logoutController extends Controller
{

    public function logout()
    {
    Session::flush();

    Session::flash('error', 'logged out sucessfully');
    return view('login');

    }
}
