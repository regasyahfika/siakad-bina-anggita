@extends('user.app')

@section('title', 'SKABA - Sekolah Khusus Autis Bina Anggita Yogyakarta')


@section('main-content')
<!-- blog content -->
<section class="bg-light" id="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 class="section-heading" style="text-align: center;">Artikel </h2>
        <hr style="width: 100px;">
        @foreach ($artikel as $post)
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{ route('post', $post->slug) }}">{{ $post->judul }}</a>
            </h5>
            <p class="card-text">{!! substr($post->konten, 0,200) !!}...</p>
          </div>
          <div class="card-footer text-muted">
            {{ $post->created_at->format('d F Y') }} -
            @foreach ($post->kategori as $kate) 
            <a href="{{ route('kategori', $kate->nama) }}">{{ $kate->nama }}</a>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>

      <div class="col-lg-6">
        <h2 class="section-heading" style="text-align: center;">Berita</h2>
        <hr style="width: 100px;">
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
            <a href="{{ route('kategori', $kate->nama) }}">{{ $kate->nama }}</a>
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
