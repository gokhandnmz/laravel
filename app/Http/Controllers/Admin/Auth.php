<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Authorization;

class Auth extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function checkUser( Request $request ){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if( Authorization::attempt( $credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/');
        }
        return back()->withErrors([
            'email' => 'Kullanıcı Bilgileri Hatalı. Lütfen Tekrar Deneyiniz.'
        ]);
    }
    public function logout(Request $request){
        Authorization::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/admin/login');
    }
}
