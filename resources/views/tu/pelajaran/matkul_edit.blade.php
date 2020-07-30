@extends('tu.dashboard')
@section('content')

<main>
  <div class="container-fluid">
    <div class="col-lg-12">
      <h1 class="mt-4">Dashboard</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Mata Kuliah </li>
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
          <form action="{{ route('matkul.update',$data_matkul->id) }}" method="POST">
            {{ method_field('PUT') }}
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="nama" class="form-control" placeholder="Masukan Nama" required value="{{ $data_matkul->nama }}">
            </div>
            <div class="form-group">
              <label for="name">Kode Mata Kuliah</label>
              <input type="text" id="name" name="kode" class="form-control" placeholder="Masukan Kode Mata Kuliah" required value="{{ $data_matkul->kode }}">
            </div>
            <div class="form-group">
              <label for="name">Sks</label>
              <input type="text" id="name" name="sks" class="form-control" placeholder="Masukan SKS Mata Kuliah" required value="{{ $data_matkul->sks }}">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success d-block w-100">Update Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
    
@endsection