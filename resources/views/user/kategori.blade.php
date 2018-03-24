@extends('user.apps')

@section('title', 'SKABA - Sekolah Khusus Autis Bina Anggita Yogyakarta')

@section('judul')
Kategori
@endsection

@section('main-content')
<!-- blog content -->
<section class="bg-light" id="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        {{-- <h2 class="section-heading">Artikel</h2> --}}
        @foreach ($posts as $post)
        <div class="card">
          <div class="card-body">
            <h6 class="card-title"><b>
              <a href="{{ route('post', $post->slug) }}">{{ $post->judul }}</a>
            </b></h6>
            <p class="card-text">{!! substr($post->konten, 0,200) !!}.</p>
          </div>
          <div class="card-footer text-muted">
            {{ $post->created_at->format('d F Y') }} -
{{--             @foreach ($post->kategori as $kate) 
            <a href="{{ route('kategori', $kate->nama) }}">{{ $kate->nama }}</a>
            @endforeach --}}
            <a href="{{ route('kategori', $post->kategori->nama) }}">{{ $post->kategori->nama }}</a>
          </div>
        </div>
        @endforeach
      </div>
      @include('user.layouts.sidebar')

    </div><br>
    <!-- /.row -->
    {{ $posts->links() }}
  </div>
</section>

@endsection
