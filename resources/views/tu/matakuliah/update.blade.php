@extends('tu.dashboard')
@section('content')
    <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Update Jadwal</li>
                        </ol>
                       @if (session('create'))
                        <div class="alert alert-primary">
                            {{ session('create') }}
                
                        </div>
                        @endif
                                
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-center">Update Jadwal</h4>
                                        <form action="{{route('matakuliah.update',$data->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="name">Nama Matakuliah</label>
                                                    <select name="matkul" id="matkul" class="form-control">
                                                    <option value="{{$data->id_matkul}}">{{$data->matkul->nama}}</option>
                                                    @foreach ($matakuliah as $matkul)
                                                    <option value="{{$matkul->id}}">{{$matkul->nama}}</option>
                                                    @endforeach
                                                    </select>
                                               
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Nama Dosen</label>
                                                    <select name="dosen" id="dosen" class="form-control">
                                                    <option value="{{$data->id_dosen}}">{{$data->dosen->name}}</option>
                                                    @foreach ($dosen as $dos)
                                                    <option value="{{$dos->id}}">{{$dos->name}}</option>
                                                    @endforeach
                                                    </select>
                                               
                                                </div>
                                                 <div class="form-group">
                                                    <label for="name">Jenis Kelas</label>
                                                    <select name="kelas" id="kelas" class="form-control">
                                                    <option value="{{$data->jenis_kelas}}">{{$data->jenis_kelas}}</option>
                                                    
                                                    <option value="Pagi">Pagi</option>
                                                    <option value="Sore">Sore</option>
                                                    
                                                    </select>
                                               
                                                </div>

                                                 <div class="form-group">
                                                    <label for="name">Hari</label>
                                                    <select name="hari" id="hari" class="form-control">
                                                    <option value="{{$data->hari}}">{{$data->hari}}</option>
                                                    
                                                    <option value="Senis">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jumat">Jumat</option>
                                                    
                                                    </select>
                                               
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Jam Mulai</label>
                                                    <select name="mulai" id="mulai" class="form-control">
                                                    <option value="{{$data->jam_mulai}}">{{$data->jam_mulai}}</option>
                                                    
                                                    <option value="08-00">08-00</option>
                                                    <option value="09-00">09-00</option>
                                                    <option value="10-00">10-00</option>
                                                    <option value="11-00">11-00</option>
                                                    <option value="12-00">12-00</option>
                                                    <option value="13-00">13-00</option>
                                                    <option value="14-00">14-00</option>
                                                    <option value="15-00">15-00</option>
                                                    <option value="16-00">16-00</option>
                                                    <option value="17-00">17-00</option>
                                                    
                                                    
                                                    </select>
                                               
                                                </div>
                                                 <div class="form-group">
                                                    <label for="name">Jam Selesai</label>
                                                    <select name="selesai" id="selesai" class="form-control">
                                                    <option value="{{$data->jam_selesai}}">{{$data->jam_selesai}}</option>
                                                    
                                                    <option value="08-00">08-00</option>
                                                    <option value="09-00">09-00</option>
                                                    <option value="10-00">10-00</option>
                                                    <option value="11-00">11-00</option>
                                                    <option value="12-00">12-00</option>
                                                    <option value="13-00">13-00</option>
                                                    <option value="14-00">14-00</option>
                                                    <option value="15-00">15-00</option>
                                                    <option value="16-00">16-00</option>
                                                    <option value="17-00">17-00</option>
                                                    
                                                    
                                                    </select>
                                               
                                                </div>
                                                

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success d-block w-100"> Update Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>





@endsection