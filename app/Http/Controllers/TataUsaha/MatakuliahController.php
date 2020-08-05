<?php

namespace App\Http\Controllers\TataUsaha;

use App\Dosen;
use App\Http\Controllers\Controller;
use App\Jurusan;
use App\Matakuliah;
use App\NamaMatkul;
use App\Semester;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester = Semester::all();
        $jurusan = Jurusan::all();
        $dosen = Dosen::all();
        $matkul = NamaMatkul::all();
        $matakuliah = Matakuliah::with(['semester', 'jurusan', 'dosen', 'matkul'])->get();
        // dd($matakuliah);
        return view('tu.matakuliah.index', compact('semester', 'jurusan', 'dosen', 'matakuliah','matkul'));
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
        Matakuliah::create([
            'id_matkul' => $request->name,
            
            'id_dosen' => $request->dosen,
            'id_jurusan' => $request->semester,
            'jenis_kelas' => $request->jenis_kelas,
            'hari' => $request->hari,
            'jam_mulai' => $request->mulai,
            'jam_selesai' => $request->selesai,
        ]);

        return redirect()->route('matakuliah.index')->with('create', 'Data Berhasil Ditambah');
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
        $data = Matakuliah::with('matkul', 'dosen')->findOrFail($id);
        $matakuliah = NamaMatkul::all();
        $dosen = Dosen::all();
        return view('tu.matakuliah.update', compact('data', 'matakuliah', 'dosen'));
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
        $matkul = Matakuliah::findOrFail($id);
        $matkul->id_matkul = $request->matkul;
        $matkul->id_dosen = $request->dosen;
        $matkul->jenis_kelas = $request->kelas;
        $matkul->hari = $request->hari;
        $matkul->jam_selesai = $request->mulai;
        $matkul->jam_mulai = $request->selesai;
        $matkul->update();
        return redirect()->route('matakuliah.index')->with('create', 'Data Berhasil Diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Matakuliah::findOrFail($id);
        $data->delete();
        return redirect()->route('matakuliah.index')->with('create', 'Data Berhasil Dihapus');
    }
}
