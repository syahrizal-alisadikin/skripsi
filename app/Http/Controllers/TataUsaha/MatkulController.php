<?php

namespace App\Http\Controllers\TataUsaha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('mata_kuliah')->get();
        return view('tu.pelajaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = array(
            'kode' => $request->kode,
            'nama' => $request->nama,
            'sks' => $request->sks
        );

        DB::table('mata_kuliah')->insert($insert);

        return redirect('admin/matkul')->with('sukses', 'Berhasil Menambahkan Data');
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
        $data_matkul = DB::table('mata_kuliah')->where('id', $id)->first();

        return view('tu.pelajaran.matkul_edit', compact('data_matkul'));
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
         $update = array(
            'nama' => $request->nama,
            'kode' => $request->kode,
            'sks' => $request->sks
        );

        DB::table('mata_kuliah')->where('id', $id)->update($update);

        return redirect('admin/matkul')->with('sukses', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('mata_kuliah')->where('id', $id)->delete();

        if ($data === null) {
            
            return redirect('admin/matkul')->with('gagal', 'Gagal Delete Data');
        }

        return redirect('admin/matkul')->with('sukses', 'Berhasil Delete Data');
    }
}
