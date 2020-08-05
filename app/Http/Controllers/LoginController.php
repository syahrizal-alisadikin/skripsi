<?php

namespace App\Http\Controllers;


use Auth;
use Session;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin()
    {
        // $date = date('h:i:s');
        // print_r($date); die();
        return view('login');
    }

    public function postLogin(Request $request)
    {

        // Validate the form data
        // $this->validate($request, [
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);

        //LAKUKAN PENGECEKAN, 
        // $loginType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'kode';

        // Dosen Request
        $dosen = [
            'kode' => $request->kode,
            'password' => $request->password
        ];

        // Admin Request
        $admin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        // Passwordnya pake bcrypt
        if (Auth::guard('admin')->attempt($admin)) {
            return redirect()->intended('/admin');
            // die();
        } elseif (Auth::guard('dosen')->attempt($dosen)) {
            return redirect()->intended('/dosen');
        } else {
            Session::flash('gagal', 'Login Invalid !');
            return redirect('/');
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

    // 29081997
}
