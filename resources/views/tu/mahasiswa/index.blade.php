@extends('tu.dashboard')
@section('content')
    <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Mahasiswa</li>
                        </ol>
                       @if (session('create'))
                        <div class="alert alert-primary">
                            {{ session('create') }}
                
                        </div>
                        @endif

                        @if ($message = Session::get('sukses'))
                        <div class="alert alert-primary alert-block">
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
                                
                        <div class="card mb-4">
                            <div class="card-header d-flex">
                               <div class="data">
                                    <i class="fas fa-table mr-1"></i>
                                DataTable Example
                                </div>
                                <div class="button ml-auto">
                                    <a href="#" class="btn btn-success" name="tambah" id="tambah" data-toggle="modal" data-target="#exampleModal">Tambah Mahasiswa</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nim</th>
                                                <th>Name</th>
                                                <th>Semsester</th>
                                                <th>Jurusan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                          <?php $i=1 ?>
                                           @foreach ($mahasiswa as $item)
                                               <tr>
                                                   <td><?= $i ?></td>
                                               <td>{{$item->nim}}</td>
                                               <td>{{$item->name}}</td>
                                               <td>{{$item->semester->name}}</td>
                                               <td>{{$item->jurusan->name}}</td>
                                               <td class="text-center">
                                                    <a href="{{route('tu-mahasiswa.edit',$item->id)}}"  class="btn btn-primary btn-sm">Edit</a>
                                                        <form action="{{ route('tu-mahasiswa.destroy', $item->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('Yakin Data Mau Dihapus??');"> Hapus</button>
                                                        </form>
                                               </td>
                                               </tr>
                                               <?php $i++?>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('tu-mahasiswa.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nim">Nim</label>
            <input type="text" id="nim" name="nim" class="form-control" placeholder="Masukan Nim" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama" required>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <select name="semester" id="semester" class="form-control">
                @foreach ($semester as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
         <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan" class="form-control">
                @foreach ($jurusan as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
      
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email">
        </div>
         <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
        </div>
         <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan alamat">
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