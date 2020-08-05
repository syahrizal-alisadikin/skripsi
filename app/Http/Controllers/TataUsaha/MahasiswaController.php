<?php

namespace App\Http\Controllers\TataUsaha;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jurusan;
use App\Mahasiswa;
use App\Semester;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        $semester = Semester::orderBy('name', 'asc')->get();
        $mahasiswa = Mahasiswa::with(['semester', 'jurusan'])->get();
        // dd($mahasiswa);
        return view('tu.mahasiswa.index', compact('jurusan', 'semester', 'mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mahasiswa::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'id_semester' => $request->semester,
            'id_jurusan' => $request->jurusan,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('tu-mahasiswa.index')->with('create', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mahasiswa::with('semester', 'jurusan')->findOrFail($id);
        $semester = Semester::orderBy('name', 'asc')->get();
        $jurusan = Jurusan::all();
        return view('tu.mahasiswa.update', compact('data', 'semester', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->password) {
            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->nim = $request->nim;
            $mahasiswa->name = $request->name;
            $mahasiswa->id_semester = $request->semester;
            $mahasiswa->id_jurusan = $request->jurusan;
            $mahasiswa->email = $request->email;
            $mahasiswa->password = $request->password;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->update();
            return redirect()->route('tu-mahasiswa.index')->with('create', 'Data Berhasil Diupdate!!');
        } else {
            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->nim = $request->nim;
            $mahasiswa->name = $request->name;
            $mahasiswa->id_semester = $request->semester;
            $mahasiswa->id_jurusan = $request->jurusan;
            $mahasiswa->email = $request->email;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->update();
            return redirect()->route('tu-mahasiswa.index')->with('create', 'Data Berhasil Diupdate!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mahasiswa::findOrFail($id);
        $data->delete();
        return redirect()->route('tu-mahasiswa.index')->with('create', 'Data Berhasil Dihapus!!');
    }
}
