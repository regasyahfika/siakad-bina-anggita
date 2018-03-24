@extends('user.app')

@section('title', 'SKABA - Sekolah Khusus Autis Bina Anggita Yogyakarta')


@section('main-content')
<!-- blog content -->
<section class="bg-light" id="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 class="section-heading" style="text-align: center;">Artikel </h2>
        <hr>
        @foreach ($artikel as $post)
        <div class="card">
          <div class="card-body">
            <h6 class="card-title"><b>
              <a href="{{ route('post', $post->slug) }}">{{ $post->judul }}</a>
            </b></h6>
            <p class="card-text">{!! substr($post->konten, 0,200) !!}...</p>
          </div>
          <div class="card-footer text-muted">
            {{ $post->created_at->format('d F Y') }} -
            <a href="{{ route('kategori', $post->kategori->nama) }}">{{ $post->kategori->nama }}</a>

          </div>
        </div>
        @endforeach
      </div>

      <div class="col-lg-6">
        <h2 class="section-heading" style="text-align: center;">Berita</h2>
        <hr>
        @foreach ($berita as $post)
        <div class="card">
          <div class="card-body">
            <h6 class="card-title"><b>
              <a href="{{ route('post', $post->slug) }}">{{ $post->judul }}</a>
            </b></h6>
            <p class="card-text">{!! substr($post->konten, 0,200) !!}.</p>
          </div>
          <div class="card-footer text-muted">
            {{ $post->created_at->format('d F Y') }} -
            <a href="{{ route('kategori', $post->kategori->nama) }}">{{ $post->kategori->nama }}</a>
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
