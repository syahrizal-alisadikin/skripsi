@extends('tu.dashboard')
@section('content')

<main>
  <div class="container-fluid">
    <div class="col-lg-12">
      <h1 class="mt-4">Dashboard</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Mahasiswa </li>
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
          <form action="{{ route('tu-mahasiswa.update',$mahasiswa->id) }}" method="POST">
            {{ method_field('PUT') }}
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="nim">Nim</label>
                  <input type="text" id="nim" name="nim" class="form-control" placeholder="Masukan Nim" value="{{ $mahasiswa->nim }}" required>
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama" value="{{ $mahasiswa->name}}" required>
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
                  <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" value="{{ $mahasiswa->email }}">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" value=""
                  >
                  <small style="color: red">* Kosongkan Jika Password Tidak Di Ganti</small>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan alamat" value="{{ $mahasiswa->alamat }}">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success d-block w-100">Update Data</button>
                </div>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
    
@endsection