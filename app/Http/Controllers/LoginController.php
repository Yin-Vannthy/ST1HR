<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(Request $request){
        $intended_url = $request->session()->get('url.intended');
        session()->put('intended_url', $intended_url);

        if (Auth::check()){
           return redirect('/admin');
        }

        return view('login');
    }

    public function do_login(Request $request){
        $this->checkValidation($request);
        $credentials = $request->only('name', 'password');

        if(Auth::attempt($credentials)){
            return redirect('/admin');
        }

        return redirect('/login')->with('status', 'Incorrect Username or Passowrd');
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }

    public function checkValidation($data){
        $this->validate($data, [
            'name' => 'required|max:100',
            'password' => 'required|max:100',
        ]);
    }
}
