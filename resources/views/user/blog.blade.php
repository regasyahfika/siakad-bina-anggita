@extends('user.app')

@section('title', 'SKABA - Sekolah Khusus Autis Bina Anggita Yogyakarta')


@section('main-content')
<!-- blog content -->
<section class="bg-light" id="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 class="section-heading">Artikel</h2>
        @foreach ($artikel as $post)
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{ route('post', $post->slug) }}">{{ $post->judul }}</a>
            </h5>
            <p class="card-text">{!! substr($post->konten, 0,200) !!}.</p>
          </div>
          <div class="card-footer text-muted">
            {{ $post->created_at->format('d F Y') }} -
            @foreach ($post->kategori as $kate) 
            <a href="{{ route('kategori', $kate->slug) }}">{{ $kate->nama }}</a>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>

      <div class="col-lg-6">
        <h2 class="section-heading">Berita</h2>
        @foreach ($berita as $post)
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{ route('post', $post->slug) }}">{{ $post->judul }}</a>
            </h5>
            <p class="card-text">{!! substr($post->konten, 0,200) !!}.</p>
          </div>
          <div class="card-footer text-muted">
            {{ $post->created_at->format('d F Y') }} -
            @foreach ($post->kategori as $kate) 
            <a href="{{ route('kategori', $kate->slug) }}">{{ $kate->nama }}</a>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>



    </div><br>
    <!-- /.row -->
    {{-- {{ $posts->links() }} --}}
  </div>
</section>

@endsection
