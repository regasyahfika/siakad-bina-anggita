@extends('user.apps')

@section('title', 'SKBA - Sekolah Khusus Autis Bina Anggita Yogyakarta')

@section('judul')
Kegiatan
@endsection

@section('head')
<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<link href="{{ asset('fancybox/dist/jquery.fancybox.min.css') }}" rel="stylesheet">
<script src="{{ asset('fancybox/dist/jquery.fancybox.min.js') }}"></script>
@endsection

@section('main-content')
<!-- blog content -->
<section class="bg-light" id="services">
  <div class="container">
    <div class="row">
      
      @include('user.layouts.sidebar_kegiatan')

      <div class="col-lg-8">
        @foreach ($ekskul as $data)
        <div class="card">
          <div class="card-body">
            <h6 class="card-title"><b>
              Ekstrakurikuler - {{ $data->nama_ekskul }}
            </b></h6>
            <p>
              <a class="galeri-link" data-toggle="modal" href="{{ $data->gambar_url }}" data-fancybox="group1" data-caption="{{ $data->nama_ekskul }}"><img src="{{ $data->gambar_url }}" alt="" style="width: 20%; text-align: right;">
              </a>
            </p>
            <p class="card-text">{{ $data->keterangan }}</p>
          </div>
          <div class="card-footer text-muted">
            {{ $data->created_at->format('d F Y') }}
          </div>
        </div>
        @endforeach
      </div>
      
    </div><br>
    <!-- /.row -->
    {{-- {{ $ekskul->links() }} --}}
  </div>
</section>

@endsection

@section('footer')
    <script type="text/javascript">
    $('[data-fancybox="group1"], [data-fancybox="group2"], [data-fancybox="group3"]').fancybox({
      thumbs : {
        autoStart : true
      },
      protect: true,
      buttons : [
        'zoom',
        'thumbs',
        'close'
      ]
    });
  </script>
@endsection
