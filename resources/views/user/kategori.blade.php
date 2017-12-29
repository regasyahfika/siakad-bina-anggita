@extends('user.apps')

@section('title', 'SKABA - Sekolah Khusus Autis Bina Anggita Yogyakarta')

@section('tema', 'Kategori')

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


      <div class="col-lg-4">
          <div class="card my-4">
            <h5 class="card-header">Kategori</h5>
            <div class="card-body">
              <div class="col-lg-12">
                <ul class="list-unstyled mb-0">
                  @foreach ($kategori as $kate)
                    <li>
                      <a href="{{ route('kategori', $kate->nama) }}">{{ $kate->nama }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>

          <div class="card my-4">
            <h5 class="card-header">Tag</h5>
            <div class="card-body">
              <div class="col-lg-12">
                <p>
                @foreach ($tags as $tag)
                  <a class="btn btn-success" href="{{ route('tag', $tag->nama) }}">{{ $tag->nama }}</a>
                @endforeach 
                </p>
              </div>

            </div>
          </div>
        </div>

    </div><br>
    <!-- /.row -->
    {{ $posts->links() }}
  </div>
</section>

@endsection
