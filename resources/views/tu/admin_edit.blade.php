@extends('tu.dashboard')
@section('content')

<main>
  <div class="container-fluid">
    <div class="col-lg-12">
      <h1 class="mt-4">Dashboard</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Admin </li>
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
          <form action="{{ url('admin/admin/' . $data->id) }}" method="POST">
            {{ method_field('PUT') }}
            @csrf
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="email" value="{{ $data->email }}">
              </div>
              <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" value="{{ $data->name }}">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="text" name="password" value="">
                <small style="color: red">* Kosongkan Jika Password Tidak Di Ganti</small>
              </div>
              <button class="btn btn-sm btn-success">Update</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
    
@endsection