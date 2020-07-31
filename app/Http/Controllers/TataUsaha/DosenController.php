<?php

namespace App\Http\Controllers\TataUsaha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dosen;
use Illuminate\Support\Facades\Hash;
use DB;
use PDF;
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
            $dosen->password = Hash::make($request->password);
            $dosen->update();
            return redirect()->route('tu-dosen.index')->with('create', 'Data Berhasil Diupdate!!');
        } else {
            $dosen->name = $request->name;
            $dosen->kode = $request->kode;
            $dosen->update();
            return redirect()->route('tu-dosen.index')->with('create', 'Data Berhasil Diupdate!!');
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
        $data = DB::table('dosen')->where('id', $id);
        $data->delete();
        
        return redirect()->route('tu-dosen.index')->with('create', 'Data Berhasil Dihapus!!');
    }

    // Absensi Dosen  
    public function absenDosen()
    {
        $select_dosen = ['dosen.name as nama_dosen', 'dosen.kode', 'dosen.id as id_dosen', 'dosen.*'];
        $data_dosen = Dosen::all();

        // return json_encode($data_dosen); die();

        return view('tu.absen.index', compact('data_dosen'));
    }

    // Detail Dosen
    public function detailDosen($id_dosen)
    {
        $select = ['dosen.name as nama_dosen', 'dosen.kode', 'dosen.id as id_dosen', 'dosen.*', 'jadwal.*', 'absen.*', 'mata_kuliah.*', 'absen.id as id_absen'];

        // Data relasi dari 4 table dosen, absen, jadwal dan mata_kuliah
        $detail_dosen = Dosen::select($select)
        ->join('absen', 'dosen.id', '=', 'absen.id_dosen')
        ->join('jadwal', 'absen.id_jadwal', '=', 'jadwal.id')
        ->join('mata_kuliah', 'jadwal.id_matkul', '=', 'mata_kuliah.id')
        ->where('dosen.id', $id_dosen)
        ->get();

        $matkul = DB::table('mata_kuliah')
        ->join('jadwal', 'jadwal.id', '=', 'jadwal.id_matkul')
        ->get();

        // Data Dosen Doang
        $dosen = Dosen::findOrFail($id_dosen); 

        // echo json_encode($detail_dosen); die();

        return view('tu.absen.absen_detail', compact('dosen', 'detail_dosen'));
    }

    // Cetak PDF 1 Bulan
    public function cetakPDF(Request $req, $id_dosen)
    {
     $start = $req->get('tanggal_start');
     $end = $req->get('tanggal_end');

     $select = ['dosen.name as nama_dosen', 'dosen.kode', 'dosen.id as id_dosen', 'dosen.*', 'jadwal.*', 'absen.*', 'mata_kuliah.*'];

     $dosen = Dosen::select(['*'])->where('id', $id_dosen)->first();

     $cetak_detail_dosen = Dosen::select($select)
     ->join('absen', 'dosen.id', '=', 'absen.id_dosen')
     ->join('jadwal', 'absen.id_jadwal', '=', 'jadwal.id')
     ->join('mata_kuliah', 'jadwal.id_matkul', '=', 'mata_kuliah.id')
     ->where('dosen.id', $id_dosen)
     ->orderBy('absen.tanggal', 'desc')
     ->whereBetween('absen.tanggal', [$start, $end])
     ->get();

     $pdf = PDF::loadview('tu.absen.laporan_absen_perbulan',['data'=>$cetak_detail_dosen, 'dosen' => $dosen]);
     return $pdf->stream(); 

 }

    // Cetak PDF Perhari
 public function cetakPDFPerhari(Request $req, $id_dosen)
 {

   $select = ['dosen.name as nama_dosen', 'dosen.kode', 'dosen.id as id_dosen', 'dosen.*', 'jadwal.*', 'absen.*', 'mata_kuliah.*', 'absen.id as id_absen'];

       // Get Tanggal Start
   $start = $req->get('tanggal_start');

   $dosen = Dosen::select(['*'])->where('id', $id_dosen)->first();

   $detail_dosen_perhari = Dosen::select($select)
   ->join('absen', 'dosen.id', '=', 'absen.id_dosen')
   ->join('jadwal', 'absen.id_jadwal', '=', 'jadwal.id')
   ->join('mata_kuliah', 'jadwal.id_matkul', '=', 'mata_kuliah.id')
   ->where('absen.id_dosen', $id_dosen)
   ->orderBy('absen.tanggal', 'desc')
    // ->where('absen.id', $req->input('id_absen'))
   ->where('absen.tanggal', $start)
   ->get();

   $pdf = PDF::loadview('tu.absen.laporan_absen_perhari',['data_perhari' => $detail_dosen_perhari, 'dosen' => $dosen, 'start' => $start]);
   return $pdf->stream(); 
}
}
