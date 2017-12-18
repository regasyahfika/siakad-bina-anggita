@extends('user.apps')

@section('title', 'Guru SKABA - Sekolah Khusus Autis Bina Anggita Yogyakarta')

@section('tema', 'Guru Sekolah Khusus Autis Bina Anggita')

@section('main-content')
<!-- content -->
<section class="bg-light" id="team">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="{{ asset('image/guru/ami.png') }}" alt="">
          <h4>Kay Garland</h4>
          <p class="text-muted">Lead Designer</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="{{ asset('image/guru/anis.png') }}" alt="">
          <h4>Larry Parker</h4>
          <p class="text-muted">Lead Marketer</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="{{ asset('image/guru/bayu.png') }}" alt="">
          <h4>Diana Pertersen</h4>
          <p class="text-muted">Lead Developer</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="{{ asset('image/guru/ambarsih.jpg') }}" alt="">
          <h4>Diana Pertersen</h4>
          <p class="text-muted">Lead Developer</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="{{ asset('image/guru/ervi.png') }}" alt="">
          <h4>Diana Pertersen</h4>
          <p class="text-muted">Lead Developer</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="{{ asset('image/guru/evie.png') }}" alt="">
          <h4>Diana Pertersen</h4>
          <p class="text-muted">Lead Developer</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
      </div>
    </div>
  </div>
</section>

@endsection
