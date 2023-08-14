<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;



use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);



        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);

        Session::flash('success', 'Registration has done sucessfully!');
        return redirect()->route('register');
    }

    public function login(Request $request)
    {
        $previousUrl = URL::previous();

        dd($previousUrl);

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $data['email'];
        $password = $data['password'];

        $users = DB::table('users')
            ->where('email', $email)
            ->first();

        if ($users && Hash::check($password, $users->password)) {
            Session::flash('success', 'Logged in sucessfully!');

            Session::put('users', $users);
            return redirect()->route('login');
        } else {
            Session::flash('error', 'wrong email and password!');
            return redirect()->route('login');
        }
    }
}
