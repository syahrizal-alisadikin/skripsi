<?php

namespace App\Http\Controllers;


use Auth;
use Session;
use App\Matakuliah;

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
            'password' => 29081997
        ];

        // Mahasiwa Request
        $mahasiswa = [
            'nim'      => $request->nim,
            'password' => 'admin123'
        ];

        // Admin Request
        $admin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        // Passwordnya pake bcrypt
        if (Auth::guard('admin')->attempt($admin)) {

            return redirect()->intended('/admin');
        } elseif (Auth::guard('dosen')->attempt($dosen)) {

           // Check Dosen Ada Jadwal Atau Tidak
           $id = Auth::guard('dosen')->user()->id;
           $jadwal =  Matakuliah::where('id_dosen', $id)->with(['semester', 'jurusan', 'matkul'])->count();

           // Jika jadwal dosen kosong
           if ($jadwal === 0) { 
               Session::flash('jadwal_dosen', 'Maaf Anda Tidak Ada Jadwal !');
               return redirect('/');
           }

           return redirect()->intended('/dosen');

        }elseif (Auth::guard('mahasiswa')->attempt($mahasiswa)) {
           return redirect()->intended('/mahasiswa');
        }else {
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
        }elseif (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        }

        return redirect('/');
    }

    // 29081997
}
