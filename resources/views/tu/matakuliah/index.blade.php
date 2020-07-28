@extends('tu.dashboard')
@section('content')
    <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">MataKuliah</li>
                        </ol>
                       @if (session('create'))
                        <div class="alert alert-primary">
                            {{ session('create') }}
                
                        </div>
                        @endif
                                
                        <div class="card mb-4">
                            <div class="card-header d-flex">
                               <div class="data">
                                    <i class="fas fa-table mr-1"></i>
                                DataTable Example
                                </div>
                                <div class="button ml-auto">
                                    <a href="#" class="btn btn-success" name="tambah" id="tambah" data-toggle="modal" data-target="#exampleModal">Tambah Jadwal</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>SKS</th>
                                                <th>Jadwal</th>
                                                <th> Mulai</th>
                                                <th> Selesai</th>
                                                <th>Pengajar</th>
                                                <th>Sesi</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        
                                          <?php $i=1 ?>
                                           @foreach ($matakuliah as $item)
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->sks}}</td>
                                                <td>{{$item->hari}}</td>
                                                <td>{{$item->jam_mulai}}</td>
                                                <td>{{$item->jam_selesai}}</td>
                                                <td>{{$item->dosen->name}}</td>
                                                <td>{{$item->jenis_kelas}}</td>
                                                <td class="text-center">
                                                        <a href="{{route('tu-dosen.edit',$item->id)}}"  class="btn btn-success btn-sm"> Kelas</a>
                                                        <a href="{{route('tu-dosen.edit',$item->id)}}"  class="btn btn-primary btn-sm">Edit</a>
                                                        {{-- <form action="{{ route('tu-dosen.destroy', $item->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')

                                                            <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('Yakin Data Mau Dihapus??');"> Hapus</button>
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




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Matakuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('matakuliah.store')}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama" required>
        </div>
        <div class="form-group">
            <label for="kode_matkul">Kode Matkul</label>
            <input type="text" id="kode_matkul" name="kode_matkul" class="form-control" placeholder="Masukan kode_matkul" required>
        </div>
        <div class="form-group">
            <label for="sks">Sks</label>
            <input type="text" id="sks" name="sks" class="form-control" placeholder="Masukan sks" required>
        </div>
        <div class="form-group">
            <label for="semester">Dosen</label>
            <select name="dosen" id="dosen" class="form-control">
                @foreach ($dosen as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
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
             <label for="jenis_kelas">Jenis Kelas</label>
             <select name="jenis_kelas" id="jenis_kelas" class="form-control">
                 <option value="pagi">Pagi</option>
                 <option value="sore">Sore</option>
             </select>
         </div>
        
        <div class="form-group">
            <label for="email">Hari</label>
            <select name="hari" id="hari" class="form-control">
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jum'at">Jum'at</option>
            </select>
        </div>
         <div class="form-group">
            <label for="password">Jam Mulai</label>
            <select name="mulai" id="mulai" class="form-control">
                <option value="06.00">06.00</option>
                <option value="07.00">07.00</option>
                <option value="08.00">08.00</option>
            </select>
        </div>
          <div class="form-group">
            <label for="password">Jam Selesai</label>
            <select name="selesai" id="selesai" class="form-control">
                <option value="10.00">10.00</option>
                <option value="11.00">11.00</option>
                <option value="12.00">12.00</option>
            </select>
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