<?php

namespace App\Http\Controllers\TataUsaha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dosen;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all();

        return view('tu.dosen.index', compact('dosen'));
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
        Dosen::create([
            'name' => $request->name,
            'kode' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('tu-dosen.index')->with('create', 'Data Berhasil Ditambahkan!!');
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
        $data = Dosen::findOrFail($id);
        return view('tu.dosen.update', compact('data'));
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
        $dosen = Dosen::findOrFail($id);
        if ($request->password) {
            $dosen->name = $request->name;
            $dosen->kode = $request->kode;
            $dosen->password = Hash::make($request['password']);
        } else {
            $dosen->name = $request->name;
            $dosen->kode = $request->kode;
        }
        $dosen->update();
        return redirect()->route('tu-dosen.index')->with('create', 'Data Berhasil Diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Dosen::findOrFail($id);
        $data->delete();
        return redirect()->route('tu-dosen.index')->with('create', 'Data Berhasil Dihapus!!');
    }

    // Absensi Dosen  
    public function absenDosen()
    {
        $select_dosen = ['dosen.name as nama_dosen', 'dosen.kode', 'dosen.id as id_dosen', 'dosen.*'];
        $data_dosen = Dosen::all();

        // echo json_encode($detail_dosen); die();

        return view('tu.absen.index', compact('data_dosen'));
    }

    // Detail Dosen
    public function detailDosen($id_dosen)
    {
        $select = ['dosen.name as nama_dosen', 'dosen.kode', 'dosen.id as id_dosen', 'dosen.*', 'jadwal.*', 'jadwal.name as name_matkul', 'absen.*'];

        // Data relasi dari 3 table dosen, absen, dan jadwal
        $detail_dosen = Dosen::select($select)
                    ->join('absen', 'dosen.id', '=', 'absen.id_dosen')
                    ->join('jadwal', 'absen.id_jadwal', '=', 'jadwal.id')
                    ->where('dosen.id', $id_dosen)
                    ->get();

        // Data Dosen Doang
        $dosen = Dosen::findOrFail($id_dosen);

        // echo json_encode($dosen); die();

        return view('tu.absen.absen_detail', compact('dosen', 'detail_dosen'));
    }
}
