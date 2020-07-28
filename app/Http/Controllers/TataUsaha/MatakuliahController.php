<?php

namespace App\Http\Controllers\TataUsaha;

use App\Dosen;
use App\Http\Controllers\Controller;
use App\Jurusan;
use App\Matakuliah;
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
        $matakuliah = Matakuliah::with(['semester', 'jurusan', 'dosen'])->get();
        // dd($matakuliah);
        return view('tu.matakuliah.index', compact('semester', 'jurusan', 'dosen', 'matakuliah'));
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
            'name' => $request->name,
            'kode_matkul' => $request->kode_matkul,
            'sks' => $request->sks,
            'id_dosen' => $request->dosen,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
