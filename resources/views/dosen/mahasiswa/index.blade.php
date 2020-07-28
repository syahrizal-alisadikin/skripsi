@extends('dosen.dashboard')
@section('content')

<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Mahasiswa</li>
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
                                Data Mahasiswa
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Semester</th>
                                                <th>Jurusan </th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                         <?php $i = 1 ?>
                                         @foreach ($mahasiswas as $item)
                                             <tr>
                                                 <td><?= $i?></td>
                                                 <td>{{$item->name}}</td>
                                                 <td>{{$item->jurusan->name}}</td>
                                                 <td>{{$item->email}}</td>
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





    
@endsection