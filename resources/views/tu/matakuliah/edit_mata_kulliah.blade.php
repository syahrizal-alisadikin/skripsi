@extends('tu.dashboard')
@section('content')

<main>
  <div class="container-fluid">
    <div class="col-lg-12">
      <h1 class="mt-4">Dashboard</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Jadwal Mata Kuliah </li>
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
          <form action="{{ route('tu-mahasiswa.update',$matakuliah->id) }}" method="POST">
            {{ method_field('PUT') }}
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Masukan Nama" required value="{{ $matakuliah->matkul->nama }}">
            </div>
            <div class="form-group">
              <label for="kode_matkul">Kode Matkul</label>
              <input type="text" id="kode_matkul" name="kode_matkul" class="form-control" placeholder="Masukan kode_matkul" required value="{{ $matakuliah->matkul->kode }}">
            </div>
            <div class="form-group">
              <label for="sks">Sks</label>
              <input type="text" id="sks" name="sks" class="form-control" placeholder="Masukan sks" required value="{{ $matakuliah->matkul->sks }}">
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
</main>
    
@endsection