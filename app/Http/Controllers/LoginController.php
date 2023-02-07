<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where("email", $request->email)->first();
        if($user && $user->password === $request->password){
            $request->session()->put('user', $request->email);
            return redirect("/company");
        }else{
            return redirect()->back()->withErrors([
                'email' => 'These credentials do not match our records.',
                'password' => 'These credentials do not match our records.',
            ]);
        }

    }

    public function logout(Request $request){
        $request->session()->flush();
       return redirect("/login");
    }



}
