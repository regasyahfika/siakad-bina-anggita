@extends('user.apps')

@section('title', 'SKBA - Sekolah Khusus Autis Bina Anggita Yogyakarta')

@section('judul')
{{ $post->judul }}
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
      <div class="col-lg-8">
        {{-- <h3 class="section-heading">Artikel</h3> --}}
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">
              <a href="{{ route('post', $post->slug) }}">{{ $post->judul }}</a>
            </h3>
            <p>
              <a class="galeri-link" data-toggle="modal" href="{{ $post->image_url }}" data-fancybox="group1" data-caption="{{ $post->judul }}"><img src="{{ $post->image_url }}" alt="" style="width: 50%; text-align: right;">
              </a>
            </p>
            <p class="card-text">{!! $post->konten !!}</p>
          </div>
          <div class="card-footer text-muted">
            {{ $post->created_at->format('d F Y') }} -
{{--             @foreach ($post->kategori as $kate) 
            <a href="{{ route('kategori', $kate->nama) }}">{{ $kate->nama }}</a>
            @endforeach --}}
            <a href="{{ route('kategori', $post->kategori->nama) }}">{{ $post->kategori->nama }}</a>
          </div>
        </div>
      </div>
      
      @include('user.layouts.sidebar')

     
      </div>

    </div><br>
    <!-- /.row -->
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