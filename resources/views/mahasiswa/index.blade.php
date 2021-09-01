@extends('mahasiswa.dashboard')
@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard Mahasiswa</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Hallo Mahasiswa {{Auth::guard('mahasiswa')->user()->name}}</li>
        </ol>
    </div>
</div>
</main>


</div>
</div>
</div>

@endsection