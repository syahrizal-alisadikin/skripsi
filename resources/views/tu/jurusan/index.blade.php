@extends('tu.dashboard')
@section('content')
    <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Jurusan</li>
                        </ol>
                       @if (session('create'))
                        <div class="alert alert-primary">
                            {{ session('create') }}
                
                        </div>
                        @elseif(session('gagal'))
                        <div class="alert alert-danger">
                            {{ session('gagal') }}
                        </div>
                        @endif
                                
                        <div class="card mb-4">
                            <div class="card-header d-flex">
                               <div class="data">
                                    <i class="fas fa-table mr-1"></i>
                                DataTable Example
                                </div>
                                <div class="button ml-auto">
                                    <a href="#" class="btn btn-success" name="tambah" id="tambah" data-toggle="modal" data-target="#exampleModal">Tambah Jurusan</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                           <?php $i=1 ?>
                                           @foreach ($jurusan as $item)
                                               <tr>
                                                   <td><?= $i ?></td>
                                               <td>{{$item->name}}</td>
                                               <td class="text-center">
                                                    <a href="{{route('jurusan.edit',$item->id)}}"  class="btn btn-primary btn-sm">Edit</a>
                                                        <form action="{{ route('jurusan.destroy', $item->id) }}" method="POST" class="d-inline">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('jurusan.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama" required>
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