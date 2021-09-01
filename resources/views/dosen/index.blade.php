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
        @if (session('izin'))
        <div class="alert alert-primary">
            {{ session('izin') }}
            
        </div>
        @endif
        
        <div class="card mb-4">
            <div class="card-header d-flex">
               <div class="data">
                <i class="fas fa-table mr-1"></i>
                Jadwal Dosen
            </div>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Matakuliah</th>
                            <th>Kode</th>
                            <th>Sks </th>
                            <th>Hari</th>
                            <th style="width: 20px;">Jam Mulai</th>
                            <th style="width: 20px;">Jam Selesai</th>
                            <th>Sesi</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $i = 1?>
                        @foreach ($jadwal as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$item->matkul->nama}}</td>
                            <td>{{$item->matkul->kode }}</td>
                            <td>{{$item->matkul->sks}}</td>
                            <td>{{$item->hari}}</td>
                            <td>{{$item->jam_mulai}}</td>
                            <td>{{$item->jam_selesai}}</td>
                            <td>{{$item->jenis_kelas}}</td>
                            <td>{{$item->jurusan->name}}</td>
                            <td align="center">
                                <a href="{{route('dosen.show',$item->id)}}" class="btn btn-success btn-sm">Masuk Kelas</a>
                                {{-- <form method="POST" action="{{ route('process.absen') }}">
                                    @csrf
                                    <input type="hidden" name="id_jadwal" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-primary btn-sm">Absen</button>
                                </form> --}}
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>



<div class="modal fade" id="absenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Absen Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
      <form action="{{route('dosen.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" id="matkul" class="form-control" value="">
            <input type="hidden" name="id_jadwal" id="id_jadwal" class="form-control" value="">
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
        <div class="form-group">
            <button type="submit" class="btn btn-success d-block w-100">Absen Dosen</button>
        </div>
    </form>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
      <form action="{{route('dosen.store')}}" method="POST">
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
</div>

</div>
</div>
</div>

@endsection