@extends('user.apps')

@section('title', 'SKBA - Sekolah Khusus Autis Bina Anggita Yogyakarta')

@section('judul')
Berita
@endsection

@section('main-content')
<!-- blog content -->
<section class="bg-light" id="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        {{-- <h3 class="section-heading">Berita</h3> --}}
        @foreach ($berita as $post)
        <div class="card">
          <div class="card-body">
            <h6 class="card-title"><b>
              <a href="{{ route('post', $post->slug) }}">{{ $post->judul }}</a>
            </b></h6>
            <p class="card-text">{!! substr($post->konten, 0,200) !!}....</p>
          </div>
          <div class="card-footer text-muted">
            {{ $post->created_at->format('d F Y') }} -
            <a href="{{ route('kategori', $post->kategori->nama) }}">{{ $post->kategori->nama }}</a>
          </div>
        </div>
        @endforeach
      </div>
      
      @include('user.layouts.sidebar')

    </div><br>
    <!-- /.row -->
    {{ $berita->links() }}
  </div>
</section>

@endsection
