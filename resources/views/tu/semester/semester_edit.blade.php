@extends('tu.dashboard')
@section('content')

<main>
  <div class="container-fluid">
    <div class="col-lg-12">
      <h1 class="mt-4">Dashboard</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Jurusan Mahasiswa </li>
      </ol>

      <div class="card mb-4">
        <div class="card-header d-flex">
         <div class="data">
          <i class="fas fa-table mr-1"></i>
          DataTable Example
        </div>
      </div>
      <div class="card-body">
        <div class="col-lg-12">
          <form action="{{ route('semester.update',$data->id) }}" method="POST">
            {{ method_field('PUT') }}
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama" required value="{{ $data->name }}">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success d-block w-100">Tambah Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
    
@endsection