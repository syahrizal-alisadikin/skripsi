@extends('tu.dashboard')
@section('content')
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Absen Dosen</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Absen Dosen</li>
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
        Absen Dosen
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Kode Dosen</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data_dosen as $key)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $key->name }}</td>
              <td>{{ $key->kode }}</td>
              <td align="center">
                <a class="btn btn-primary btn-sm" href="{{ url('admin/absen-dosen/detail/' . $key->id) }}">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>
</main>

@endsection

@section('javascript')

<!-- Javascript Modal Detail -->
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