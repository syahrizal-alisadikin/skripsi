<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Matakuliah;
use App\Materi;
use DB;
use Str;
use Session;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('dosen')->user()->id;
        $jadwal =  Matakuliah::where('id_dosen', $id)->with(['semester', 'jurusan'])->get();
        
        // var_dump($jadwal); die();

        return view('dosen.index', compact('jadwal'));
    }

    // Upload Materi
    public function uploadMateri(Request $request)
    {
        try {
          $avatar = Str::random(9);
          $request->file('materi')->move(storage_path('image'), $avatar);

          $upload = array(
              'name' =>  $request->input('name_materi'),
              'id_jadwal' => $request->input('id_jadwal'),
              'materi' => $avatar 
          ); 

          DB::table('materi')->insert($upload);

          Session::flash('sukses','Upload Materi Berhasil !!');
          return redirect()->back();

        } catch (Exception $e) {

            Session::flash('gagal','Upload Materi Gagal !!');
            // print_r($e);
        }
    }

    // Absen Process 
    public function absenProcess(Request $request)
    {
        try {
                
            $id_dosen = Auth::guard('dosen')->user()->id;

            $absen = array(
                'id_dosen' => $id_dosen,
                'id_jadwal' => $request->input('id_jadwal'),
                'alesan' => $request->input('alesan'),
                'keterangan' => $request->input('keterangan'),
                'tanggal' => date('Y-m-d'),
                'jam_masuk' => date('Y-m-d h:i:s'),
                'jam_keluar' => date('Y-m-d h:i:s'),
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            );

            DB::table('absen')->insert($absen);

            return redirect()->back()->with('sukses_absen', 'Data Berhasil Ditambahkan!!');

        } catch (Exception $e) {
            print_r($e);
        }
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
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('dosen.index')->with('create', 'Data Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Matakuliah::findOrFail($id);
        $materi = Materi::all();
        return view('dosen.lihat-kelas', compact('data', 'materi'));
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

    // Buat Ngelihat File Materi Nya / Get File Materi Nya 
    public function fileMateri($file)
    {
       $avatar_path = storage_path('image') . '/' . $file;

       if (file_exists($avatar_path)) {
        $file = file_get_contents($avatar_path);
        return response($file, 200)->header('Content-Type', 'application/pdf');
       }

       return "Data File Tidak Di Temukan";
    }
}
