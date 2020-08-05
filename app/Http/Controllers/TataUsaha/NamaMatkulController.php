<?php

namespace App\Http\Controllers\Tatausaha;

use App\Http\Controllers\Controller;
use App\NamaMatkul;
use Illuminate\Http\Request;

class NamaMatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkul = NamaMatkul::all();
        return view('tu.namamatkul.index', compact('matkul'));
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
        NamaMatkul::create([
            'kode' => $request->kode,
            'nama' => $request->name,
            'sks' => $request->sks,
        ]);

        return redirect()->route('namamatkul.index')->with('create', 'Data Berhasil Ditambahkan');
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
        $data = NamaMatkul::findOrFail($id);
        return view('tu.namamatkul.update', compact('data'));
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
        $matkul = NamaMatkul::findOrFail($id);
        $matkul->kode = $request->kode;
        $matkul->nama = $request->name;
        $matkul->sks = $request->sks;

        $matkul->update();
        return redirect()->route('namamatkul.index')->with('create', 'Data Berhasil Diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = NamaMatkul::findOrfail($id);
        $data->delete();
        return redirect()->route('namamatkul.index')->with('create', 'Data Berhasil Dihapus!');
    }
}
