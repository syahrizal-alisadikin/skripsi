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
        $semester = Semester::all();
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
        $jurusan = Jurusan::all();
        $semester = Semester::all();
        $mahasiswa = Mahasiswa::with(['semester', 'jurusan'])->where('mahasiswa.id', $id)->first();

        // return $mahasiswa; die();

        return view('tu.mahasiswa.mahasiswa_edit', compact('mahasiswa', 'semester', 'jurusan'));
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

            if ($request->input('password')) {

                $data = Mahasiswa::find($id);
                $data->nim = $request->nim;
                $data->name =  $request->name;
                $data->id_semester =  $request->semester;
                $data->id_jurusan =  $request->jurusan;
                $data->email =  $request->email;
                $data->password =  Hash::make($request['password']);
                $data->alamat =  $request->alamat;
                $data->update();

                return redirect('admin/tu-mahasiswa')->with('sukses', 'Data Berhasil Di Update');
            } else{

                $data = Mahasiswa::find($id);
                $data->nim = $request->nim;
                $data->name =  $request->name;
                $data->id_semester =  $request->semester;
                $data->id_jurusan =  $request->jurusan;
                $data->email =  $request->email;
                // $data->password =  Hash::make($request['password']);
                $data->alamat =  $request->alamat;

                return redirect('admin/tu-mahasiswa')->with('sukses', 'Data Berhasil Di Update');
            }

        } catch (Exception $e) {
            return redirect('admin/tu-mahasiswa')->with('gagal', 'Data Gagal Di Update');
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
