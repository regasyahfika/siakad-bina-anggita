@extends('user.apps')

@section('title', 'SKABA - Sekolah Khusus Autis Bina Anggita Yogyakarta')

@section('judul')
Visi Misi
@endsection

@section('main-content')
<!-- blog content -->
<section class="bg-light" id="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title" align="center">
              SUSUNAN ORGANISASI SEKOLAH KHUSUS  AUTIS BINA ANGGITA YOGYAKARTA
            </h5><br>
            <p class="card-text" align="center">
              <img src="{{ asset('image/struktur.png') }}" alt="">
            </p>
          </div>
        </div>
      </div>
    </div><br>
    <!-- /.row -->
  </div>
</section>

@endsection
