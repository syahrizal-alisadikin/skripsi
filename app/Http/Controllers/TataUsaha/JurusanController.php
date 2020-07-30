<?php

namespace App\Http\Controllers\TataUsaha;

use App\Jurusan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('tu.jurusan.index', compact('jurusan'));
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
        Jurusan::create([
            'name' => $request->name
        ]);

        return redirect()->route('jurusan.index')->with('create', 'Data Berhasil Ditambahkan');
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
        $data = Jurusan::findOrFail($id);

        return view('tu.jurusan.edit_jurusan', compact('data'));
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
        try {
            
            $data = Jurusan::find($id);
            $data->name = $request->name;
            $data->update();

            return redirect('/admin/jurusan')->with('create', 'Berhasil Update Jurusan !');

        } catch (Exception $e) {

            return redirect('/admin/jurusan')->with('gagal', 'Gagal Update Jurusan !');
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
        try {
            $data = Jurusan::findOrFail($id);
            $data->delete();

            return redirect('/admin/jurusan')->with('create', 'Berhasil Delete Jurusan !');
        
        } catch (Exception $e) {
            
            return redirect('/admin/jurusan')->with('Gagal', 'Gagal Delete Jurusan !');
        }

    }
}
