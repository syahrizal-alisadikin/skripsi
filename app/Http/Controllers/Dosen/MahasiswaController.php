<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Matakuliah;

class MahasiswaController extends Controller
{
    public function index()
    {
        $id = Auth::guard('dosen')->user()->id;
        $mahasiswas =  Mahasiswa::with('jurusan')->get();
        return view('dosen.mahasiswa.index', compact('mahasiswas'));
    }
}
