<?php

namespace App\Http\Controllers;


use Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {

        // Validate the form data
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);


        //LAKUKAN PENGECEKAN, 
        $loginType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'kode';
        $login = [
            $loginType => $request->email,
            'password' => $request->password
        ];
        
        // Passwordnya pake bcrypt
        if (Auth::guard('dosen')->attempt($login)) {
            return redirect()->intended('/dosen');
        } elseif (Auth::guard('admin')->attempt($login)) {
            return redirect()->intended('/admin');
        }
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('dosen')->check()) {
            Auth::guard('dosen')->logout();
        }

        return redirect('/');
    }
}
