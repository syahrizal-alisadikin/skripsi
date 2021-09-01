<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Yadika</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{url('vendor/login/main.css')}}" rel="stylesheet" />
  </head>

  <body>
 
  {{-- @if (session('success-message'))
        <div class="alert alert-success text-center">
            {{ session('success-message') }}
            
        </div>
   @endif --}}
    <!-- Page Content -->
    <div class="page-content page-login">
      <section class="store-login" data-aos="fade-up">
        <div class="container">
          @if ($message = Session::get('gagal'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
          </div>
          @endif
          @if ($message = Session::get('jadwal_dosen'))
          <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
          </div>
          @endif
          <div class="row align-item-center row-login">
            <div class="col-lg-6 text-center" style="">
              <h3>Universitas <br> Satya Negara Indonesia</h3>
            <img src="{{asset('img/yadika.png')}}"  width="50%"/>

            </div>
            <div class="col-lg-5">
              <h2>Selamat Datang</h2>
              <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#one">Dosen</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#two">Admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#tree">Mahasiswa</a>
                </li>
              </ul>
              <div class="tab-content pt-3" id="myTabContent">
                <div class="tab-pane fade active show" id="one">
                  <form action="/login" method="POST" class="mt-3">
                    @csrf
                    <form-group>
                      <label> Kode Dosen</label>
                      <input type="text" class="form-control w-75 @error('kode') is-invalid @enderror" name="kode" id="kode" />
                      @error('kode')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </form-group>
                    <div class="form-check mt-3" id="ceklis">
                      <input class="form-check-input" type="checkbox" value="" id="ceklis"  >
                      <label class="form-check-label" for="ceklis">
                        Ambil Lpk
                      </label>
                    </div>
                    <button type="submit" id="login" disabled class="btn btn-success d-block w-75 mt-4"
                    >Masuk</button>
                  </form>
                </div>
                <div class="tab-pane fade" id="two">
                  <form action="/login" method="POST" class="mt-3">
                    @csrf
                    <form-group>
                      <label>Admin</label>
                      <input type="text" class="form-control w-75 @error('email') is-invalid @enderror" name="email" id="email" />
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </form-group>
                    <form-group>
                      <label> Password</label>
                      <input type="password" class="form-control w-75  @error('password') is-invalid @enderror" name="password" id="password" />
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </form-group>
                    <!--<div class="form-check mt-3" id="ceklis_admin">-->
                    <!--  <input class="form-check-input" type="checkbox" value="" id="ceklis_admin"  >-->
                    <!--  <label class="form-check-label" for="ceklis_admin">-->
                    <!--    Ambil Lpk-->
                    <!--  </label>-->
                    <!--</div>-->
                    <button type="submit" id="login_admin"  class="btn btn-success d-block w-75 mt-4"
                    >Login</button>
                  </form>
                </div>
                <div class="tab-pane fade" id="tree">
                  <form action="/login" method="POST" class="mt-3">
                    @csrf
                    <form-group>
                      <label>NIM</label>
                      <input type="text" class="form-control w-75 @error('nim') is-invalid @enderror" name="nim" id="nim" />
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </form-group>
                    <!--<div class="form-check mt-3" id="ceklis_admin">-->
                    <!--  <input class="form-check-input" type="checkbox" value="" id="ceklis_admin"  >-->
                    <!--  <label class="form-check-label" for="ceklis_admin">-->
                    <!--    Ambil Lpk-->
                    <!--  </label>-->
                    <!--</div>-->
                    <button type="submit" id="login_admin"  class="btn btn-success d-block w-75 mt-4"
                    >Login</button>
                  </form>
                </div>
              </div>


            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p class="pt-4 pb-2">
              2020 Copy Right Developed By universitas satya negara indonesia
            </p>
          </div>
        </div>
      </div>
    </footer>

 
    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
        $('#ceklis').on('click', 'input[type="checkbox"]', function() {
              // alert('ok');
              if ($(this).is(":checked")) {
                  // alert('ok');
                  $('#login').prop("disabled", false);
                } else if ($(this).is(":not(:checked)")) {
                  $('#login').prop("disabled", true);
                }
              });
      }); 

       $(document).ready(function() {
        $('#ceklis_admin').on('click', 'input[type="checkbox"]', function() {
              // alert('ok');
              if ($(this).is(":checked")) {
                  // alert('ok');
                  $('#login_admin').prop("disabled", false);
                } else if ($(this).is(":not(:checked)")) {
                  $('#login_admin').prop("disabled", true);
                }
              });
      }); 


      $('#role').change(function () {
        if ($('#dosen')) {
          alert('dosen')
          // '<input type="email" class="form-control w-75 @error('kode') is-invalid @enderror" name="email" />'
        } else if ($('#admin')) {
          alert('admin')
        } 
      })
    </script>
    <script>
      AOS.init();
    </script>
  </body>
</html>