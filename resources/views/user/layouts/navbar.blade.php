<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{ asset('image/bina.png') }}" alt="">SKABA</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profil
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio" style="background: #2dc788;">
            <a class="dropdown-item" href="#">Sejarah</a>
            <a class="dropdown-item" href="#">Visi & Misi</a>
            <a class="dropdown-item" href="#">Struktur Organisasi</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('guru') }}">Guru</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('galeri') }}">Galeri</a>
        </li>
{{--         <li class="nav-item">
          <a class="nav-link" href="{{ route('kategori', $kate->slug) }}">Berita</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>