@extends('tu.dashboard')
@section('content')
    <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Update MataKuliah</li>
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
                                            <h4 class="text-center">Update MataKuliah</h4>
                                        <form action="{{route('namamatkul.update',$data->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="name">Kode</label>
                                                    <input type="text" name="kode" id="kode" class="form-control" value="{{$data->kode}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Nama Matakuliah</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{$data->nama}}">
                                                </div>

                                                 <div class="form-group">
                                                    <label for="name">Sks</label>
                                                    <input type="text" name="sks" id="sks" class="form-control" value="{{$data->sks}}">
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