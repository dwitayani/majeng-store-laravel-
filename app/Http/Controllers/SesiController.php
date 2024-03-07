<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    //
    function index() {
        return view('login');
    }

    function login(Request $request) {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email Wajib diisi',
            'password.required'=>'Password Wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('dashboard/admin');
            } elseif(Auth::user()->role == 'petugas'){
                return redirect('dashboard/petugas');
            } elseif(Auth::user()->role == 'member'){
                return redirect('dasboard/member');
            }
        }else{
            return redirect('')->withErrors('Username dan Password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout() {
        Auth::logout();
        return redirect('');
    }
}
