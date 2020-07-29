@extends('tu.dashboard')
@section('content')
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Detail Absen Dosen</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Detail Absen Dosen</li>
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
        Abseni Dosen {{ $dosen->name }}
      </div>
      <div class="ml-auto">
        <input class="form-control" type="date" name="">
      </div>
      <div class="button ml-auto">
        <a href="" class="btn btn-danger btn-md">Print PDF</a>
      </div>
    </div>
    <div class="card-body">

      <!-- pengecekan jika absen dosen kosong -->
      @empty($detail_dosen->count() > 0)
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>Upsss!! Absen Anda Kosong</strong>
      </div>
      @endempty

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Dosen</th>
              <th>Nama Matkul</th>
              <th>Jenis Kelas</th>
              <th>Tanggal</th>
              <th>Keterangan Absen</th>
              <th>Alesan Absen</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($detail_dosen as $key)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $key->nama_dosen }}</td>
              <td>{{ $key->name_matkul }}</td>
              <td>{{ $key->jenis_kelas }}</td>
              <td>{{ $key->tanggal }}</td>
              <td>{{ $key->keterangan }}</td>
              <td>{{ $key->alesan }}</td>
              <td>
                <button class="btn btn-danger btn-sm"><a href="#"></a>Print PDF</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      {{-- @foreach($detail_dosen->chunk(3) as $items)
      <div class="row">
        @foreach($items as $key)
        <div class="col-md-4">
          <div class="card">
            
          </div>
        </div>
        @endforeach
      </div>
      @endforeach --}}
      </div>
    </div>
  </div>
</main>

@endsection

@section('javascript')

<!-- javascript Modal Detail  -->
<script type="text/javascript">
  $(document).on('click', '#select', function() {
    var id_dosen = $(this).data('id_dosen');
    var nama_dosen = $(this).data('nama_dosen');
    var kode_dosen = $(this).data('kode_dosen');
    var hari = $(this).data('hari');
    var name_matkul = $(this).data('name_matkul');
    var jam_mulai = $(this).data('jam_mulai');
    var jam_selesai = $(this).data('jam_selesai');
    var jenis_kelas = $(this).data('jenis_kelas');
    var keterangan = $(this).data('keterangan');
    var alesan = $(this).data('alesan');

    // console.log(id_task)
    $('#id_dosen').val(id_dosen);
    $('#nama_dosen').val(nama_dosen);
    $('#kode_dosen').val(kode_dosen);
    $('#hari').val(hari);
    $('#name_matkul').val(name_matkul);
    $('#jam_mulai').val(jam_mulai);
    $('#jam_selesai').val(jam_selesai);
    $('#jenis_kelas').val(jenis_kelas);
    $('#keterangan').val(keterangan);
    $('#alesan').val(alesan);
    $('#myModal').modal('show');
  });
</script>

@endsection