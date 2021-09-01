@extends('dosen.dashboard')
@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Absen Dosen {{Auth::guard('dosen')->user()->name}}</li>
        </ol>
        @if (session('create'))
        <div class="alert alert-primary">
            {{ session('create') }}
            
        </div>
        @endif
        @if (session('izin'))
        <div class="alert alert-primary">
            {{ session('izin') }}
            
        </div>
        @endif
        
        <div class="card mb-4">
            <div class="card-header d-flex">
             <div class="data">
                <i class="fas fa-table mr-1"></i>
                Absen Dosen
            </div>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Matakuliah</th>
                            <th>Kode</th>
                            <th>Sks </th>
                            <th>Hari</th>
                            <th> Mulai</th>
                            <th>Selesai</th>
                            <th>Sesi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $i =1;?>
                       
                            @forelse ($dosen as $item)
                            <?php 
                            $jm_masuk = explode(" ",$item->jam_masuk);
                            $jm_keluar = explode(" ",$item->jam_keluar);

                            ?>
                                <tr>
                                <td><?=$i?></td>
                                <td>{{$item->jadwal->matkul->nama}}</td>
                                <td>{{$item->jadwal->matkul->kode}}</td>
                                <td>{{$item->jadwal->matkul->sks}}</td>
                                <td>{{$item->jadwal->hari}}</td>
                                <td>{{$jm_masuk[1]}}</td>
                                <td>{{$jm_keluar[1]}}</td>
                                <td>{{$item->jadwal->jenis_kelas}}</td>
                                <td>{{$item->keterangan}}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada absen</td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>






</div>
</div>
</div>

@endsection