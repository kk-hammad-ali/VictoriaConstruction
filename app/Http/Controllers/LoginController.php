<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (session()->has('admin_id')) {
            return redirect('/admin/dashboard');
        } else if (session()->has('agent_id')) {
            return redirect('/agent/dashboard');
        } else {
            // return view('login')->with(compact('title'));
            return view('public.login');
        }
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            if($user->role == "0"){
                $admin_session = session()->put('admin_id', '$user->id');
                session()->put('user', $user);
                return redirect('/admin/dashboard');
            }
            else{
                $agent_session = session()->put('agent_id', '$user->id');
                session()->put('user', $user);
                return redirect('/agent/dashboard');
            }
        }
        else{
            // dd ("error login");
            return redirect('/login')->withErrors(['old_password' => 'Wrong email or password.']);
        }
    }
}
