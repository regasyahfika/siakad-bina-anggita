@extends('user.apps')

@section('title', 'Guru SKABA - Sekolah Khusus Autis Bina Anggita Yogyakarta')

@section('judul')
  Guru Bina Anggita
@endsection

@section('main-content')
<!-- content -->
<section class="bg-light" id="team">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
      </div>
    </div>
    <div class="row">
      @foreach ($guru as $itemGuru)
      <div class="col-sm-4">
        <div class="team-member">
          <img class="mx-auto rounded-circle" src="{{ $itemGuru->foto_url }}" alt="">
          <h4>{{ $itemGuru->nama }}</h4>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
