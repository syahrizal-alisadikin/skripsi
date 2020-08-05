@extends('dosen.dashboard')
@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Jadwal Dosen {{Auth::guard('dosen')->user()->name}}</li>
        </ol>
        @if (session('create'))
        <div class="alert alert-primary">
            {{ session('create') }}

        </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header d-flex">
                        <div class="data">
                            <i class="fas fa-table mr-1"></i>
                            {{$data->name}}
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            @if ($message = Session::get('sukses'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif

                            @if ($message = Session::get('gagal'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif

                            @if ($message = Session::get('peringatan'))
                            <div class="alert alert-warning alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>File Materi</th>
                                        <th>Nama Materi</th>
                                        <th class="text-center">Materi </th>

                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- <?php $i = 1?> --}}
                                    @forelse ($materi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><iframe src="{{ url('/dosen/upload/' . $item->materi)}}"></iframe></td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <span class="badge badge-primary">File PDF Saja</span>
                                        </td>
                                    </tr>
                                    {{-- <?php $i++?> --}}

                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Belum Ada Materi <br>

                                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadFile">
                                          Upload File
                                      </button>
                                  </td>
                              </tr>
                              @endforelse
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('sukses_absen'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('gagal_absen'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('peringatan_absen'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @php
                $absen = App\Absen::where('id_jadwal', $data->id)->where('id_dosen',Auth::guard('dosen')->user()->id)->count();

                @endphp


                <form action="{{ route('process.absen') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="matkul" class="form-control" value="{{$data->matkul->nama}}">
                        <input type="hidden" name="id_jadwal" id="id_jadwal" class="form-control" value="{{$data->id}}">
                    </div>
                    <div class="form-group">
                        <select name="keterangan" id="keterangan" class="form-control">
                            <option value="hadir">Hadir</option>
                            <option value="izin">Izin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="alesan" id="alesan" class="form-control" cols="30" rows="3" placeholder="keterangan"></textarea>
                        <small style="color: red;">* Kosongkan Jika Hadir</small>
                    </div>
                    <div>
                        @if ($absen > 0)

                        <button type="submit" class="btn btn-success d-block w-100" disabled>Absen Sudah DiKirim</button>
                           @else 
                           <button type="submit" class="btn btn-success d-block w-100">Kirim</button>
                        @endif
                    </div>
                </form>



            </div>
        </div>
    </div>
</div>
</div>
</main>

<div>

</div>

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
      <form action="#" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Masukan Email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Masukan Password" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success d-block w-100">Tambah Data</button>
        </div>
    </form>
</div> --}}

<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Materi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
      <form action="{{ route('upload.materi') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama Materi</label>
            <input type="text" name="name_materi" class="form-control" placeholder="Nama Materi" required>
            <input type="hidden" class="btn btn-primary" name="id_jadwal" value="{{ $data->id }}">
        </div>
        <div class="form-group">
            <label>File Materi</label>
            <input type="file" name="materi" class="form-control"required>
            <small style="color: red">* khusus File PDF</small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary d-block w-100">Upload Materi</button>

        </div>
    </form>
</div>

</div>
</div>
</div>

@endsection