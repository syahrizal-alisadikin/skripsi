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
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Sesi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $i = 1?>
                        @foreach ($jadwal as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->matkul->kode }}</td>
                            <td>{{$item->matkul->nama}}</td>
                            <td>{{$item->matkul->sks}}</td>
                            <td>{{$item->hari}}</td>
                            <td>{{$item->jam_mulai}}</td>
                            <td>{{$item->jam_selesai}}</td>
                            <td>{{$item->jenis_kelas}}</td>
                            <td><a href="{{route('dosen.show',$item->id)}}" class="btn btn-success">Masuk Kelas</a></td>
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