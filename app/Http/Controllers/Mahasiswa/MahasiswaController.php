<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\{Matakuliah, Mahasiswa};

class MahasiswaController extends Controller
{
    public function index()
    {
        $id = Auth::guard('mahasiswa')->user()->id;
        $mahasiswas =  Mahasiswa::with('jurusan')->get();
        return view('mahasiswa.index');
    }
}
