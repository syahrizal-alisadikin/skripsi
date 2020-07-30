<?php

namespace App\Http\Controllers\TataUsaha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;


class TataUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::all();
        return view('tu.index', compact('data'));
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
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('admin.index')->with('create', 'Data Berhasil Ditambahkan!!');
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
        $data = Admin::findOrFail($id);

        return view('tu.admin_edit', compact('data'));
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
                $data = Admin::find($id);
                $data->email = $request->email;
                $data->name = $request->name;
                $data->update();
                Session::flash('sukses', 'Berhasil Update Data');
                return redirect('admin');
            } else {
              $data = Admin::find($id);
              $data->email = $request->email;
              $data->name = $request->name;
              $data->password = Hash::make($request->password);
              $data->update();
              Session::flash('sukses', 'Berhasil Update Data');
              return redirect('admin');
          }


      } catch (Exception $e) {

        Session::flash('gagal', 'Gagal Update Data');
        return redirect('admin');
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
        $data = DB::table('admin')->where('id', $id);
        $data->delete();

        return redirect('/admin')->with('create', 'Sukses Delete Admin');        
    }
}
