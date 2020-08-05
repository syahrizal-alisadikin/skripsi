@extends('tu.dashboard')
@section('content')
    <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Update Mahasiswa</li>
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
                                            <h4 class="text-center">Update Mahasiswa</h4>
                                        <form action="{{route('tu-mahasiswa.update',$data->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                 <div class="form-group">
                                                    <label for="nim">Nim</label>
                                                    <input type="text" name="nim" id="nim" class="form-control" value="{{$data->nim}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{$data->name}}">
                                                </div>

                                                 <div class="form-group">
                                                    <label for="semester">Semester</label>
                                                    <select name="semester" id="semester" class="form-control">
                                                    <option value="{{$data->id_semester}}">{{$data->semester->name}}</option>
                                                    @foreach ($semester as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                        
                                                    @endforeach
                                                    </select>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="jurusan">Jurusan</label>
                                                    <select name="jurusan" id="jurusan" class="form-control">
                                                    <option value="{{$data->id_jurusan}}">{{$data->jurusan->name}}</option>
                                                    @foreach ($jurusan as $jurus)
                                                    <option value="{{$jurus->id}}">{{$jurus->name}}</option>
                                                        
                                                    @endforeach
                                                    </select>
                                                </div>
                                                
                                                 <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control" value="{{$data->email}}">
                                                </div>
                                                 <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="password" class="form-control" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="alamat" name="alamat" id="alamat" class="form-control" value="{{$data->alamat}}">
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