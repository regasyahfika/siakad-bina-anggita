<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      @if (!empty($halaman)&& $halaman == 'home')
      <li class="active">
        <a href="{{ route('admin.home') }}">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
      </li>
      @else
      <li>
        <a href="{{ route('admin.home') }}">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
      </li>
      @endif

       <!-- active menu Konten  -->
      @if(!empty($halaman) && $halaman == 'kategori' || $halaman == 'post' || $halaman == 'prestasi' || $halaman == 'ekskul')
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-list"></i> <span>Data Konten</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('kategori.index') }}"><i class="fa fa-list-alt"></i> Kategori</a></li>
            <li><a href="{{ route('post.index') }}"><i class="fa fa-book"></i> Posting</a></li>
            <li><a href="{{ route('ekskul.index') }}"><i class="fa fa-futbol-o"></i> Ekstrakurikuler</a></li>
            <li><a href="{{ route('prestasi.index') }}"><i class="fa fa-trophy"></i> Prestasi</a></li>
            {{-- <li><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i> Tag</a></li> --}}
          </ul>

        </li>
      @else
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>Data Konten</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('kategori.index') }}"><i class="fa fa-list-alt"></i> Kategori</a></li>
            <li><a href="{{ route('post.index') }}"><i class="fa fa-book"></i> Posting</a></li>
            <li><a href="{{ route('ekskul.index') }}"><i class="fa fa-futbol-o"></i> Ekstrakurikuler</a></li>
            <li><a href="{{ route('prestasi.index') }}"><i class="fa fa-trophy"></i> Prestasi</a></li>
            {{-- <li><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i> Tag</a></li> --}}
          </ul>

        </li>
      @endif
      <!-- stop active menu Konten -->

      <!-- active menu master -->
      @if (!empty($halaman == 'kelas' || $halaman == 'ruang' || $halaman == 'programkelas' || $halaman == 'matapelajaran' || $halaman == 'tahunakademik' || $halaman == 'pembagiankelas'))
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-indent"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('kelas.index') }}"><i class="fa fa-group"></i> Kelas</a></li>
            <li><a href="{{ route('ruang.index') }}"><i class="fa fa-home"></i> Ruang</a></li>
            <li><a href="{{ route('programkelas.index') }}"><i class="fa fa-building-o"></i> Program Kelas</a></li>
            <li><a href="{{ route('pembagiankelas.index') }}"><i class="fa fa-building"></i> Pembagian Kelas</a></li>
            <li><a href="{{ route('matapelajaran.index') }}"><i class="fa fa-book"></i> Mata Pelajaran</a></li>
            <li><a href="{{ route('tahunakademik.index') }}"><i class="fa fa-calendar"></i> <span>Tahun Akademik</span></a></li>
          </ul>

        </li>
      @else
        <li class="treeview">
          <a href="#">
            <i class="fa fa-indent"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('kelas.index') }}"><i class="fa fa-group"></i> Kelas</a></li>
            <li><a href="{{ route('ruang.index') }}"><i class="fa fa-home"></i> Ruang</a></li>
            <li><a href="{{ route('programkelas.index') }}"><i class="fa fa-building-o"></i> Program Kelas</a></li>
            <li><a href="{{ route('pembagiankelas.index') }}"><i class="fa fa-building"></i> Pembagian Kelas</a></li>
            <li><a href="{{ route('matapelajaran.index') }}"><i class="fa fa-book"></i> Mata Pelajaran</a></li>
            <li><a href="{{ route('tahunakademik.index') }}"><i class="fa fa-calendar"></i> <span>Tahun Akademik</span></a></li>
          </ul>

        </li>
        
      @endif
      <!-- stop active menu master -->

      <!-- active menu galeri -->
      @if (!empty($halaman == 'galeri' || $halaman == 'album'))
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-image"></i> <span>Galeri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('album.index') }}"><i class="fa fa-check-square-o"></i> <span>Album</span></a></li>
            <li><a href="{{ route('galeri.index') }}"><i class="fa fa-check-square-o"></i> <span>Galeri</span></a></li>
          </ul>

        </li>
      @else
        <li class="treeview">
          <a href="#">
            <i class="fa fa-image"></i> <span>Galeri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('album.index') }}"><i class="fa fa-check-square-o"></i> <span>Album</span></a></li>
            <li><a href="{{ route('galeri.index') }}"><i class="fa fa-check-square-o"></i> <span>Galeri</span></a></li>
          </ul>

        </li>
        
      @endif
      <!-- stop active menu galeri -->

      {{-- Active Guru --}}
      @if (!empty($halaman == 'guru'))
        <li class="active"><a href="{{ route('guru.index') }}"><i class="fa fa-graduation-cap"></i> <span>Guru</span></a></li>
      @else
        <li><a href="{{ route('guru.index') }}"><i class="fa fa-graduation-cap"></i> <span>Guru</span></a></li>
      @endif

      {{-- Active Siswa --}}
      @if (!empty($halaman == 'siswa'))
        <li class="active"><a href="{{ route('siswa.index') }}"><i class="fa fa-users"></i> <span>Siswa</span></a></li>
      @else
        <li><a href="{{ route('siswa.index') }}"><i class="fa fa-users"></i> <span>Siswa</span></a></li>
      @endif

      {{-- Active wali murid --}}
      @if (!empty($halaman == 'walimurid'))
        <li class="active"><a href="{{ route('walimurid.index') }}"><i class="fa fa-user"></i> <span>Wali Murid</span></a></li>
      @else
        <li><a href="{{ route('walimurid.index') }}"><i class="fa fa-user"></i> <span>Wali Murid</span></a></li>
      @endif

      {{-- Active Absensi --}}
      @if (!empty($halaman == 'absensi'))
      <li class="active">
        <a href="{{ route('absensi.index') }}">
          <i class="fa fa fa-bell"></i> <span>Absensi</span>
        </a>
      </li>
      @else
      <li>
        <a href="{{ route('absensi.index') }}">
          <i class="fa fa fa-bell"></i> <span>Absensi</span>
        </a>
      </li>
      @endif

      {{-- Active Ulangan Harian --}}
      @if (!empty($halaman == 'ulangan'))
      <li class="active">
        <a href="{{ route('ulangansiswa.index') }}">
          <i class="fa fa-pencil-square-o"></i> <span>Nilai Ulangan</span>
        </a>
      </li>
      @else
      <li>
        <a href="{{ route('ulangansiswa.index') }}">
          <i class="fa fa-pencil-square-o"></i> <span>Nilai Ulangan</span>
        </a>
      </li>
      @endif

      <!-- active menu galeri -->
      @if (!empty($halaman == 'laporan_ulangan' || $halaman == 'laporan_absensi'))
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('laporan_ulangan.index') }}"><i class="fa fa-check-square-o"></i> <span>laporan Ulangan</span></a></li>
            <li><a href="{{ route('laporan_absensi.index') }}"><i class="fa fa-check-square-o"></i> <span>Laporan Absensi</span></a></li>
          </ul>

        </li>
      @else
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('laporan_ulangan.index') }}"><i class="fa fa-check-square-o"></i> <span>Laporan Ulangan</span></a></li>
            <li><a href="{{ route('laporan_absensi.index') }}"><i class="fa fa-check-square-o"></i> <span>Laporan Absensi</span></a></li>
          </ul>

        </li>
        
      @endif
      <!-- stop active menu galeri -->


      {{-- <li><a href="{{ route('laporan.index') }}"><i class="fa fa-file-text"></i> <span>Laporan</span></a></li> --}}
      <li><a href="{{ url('/') }}" target="_blank"><i class="fa fa-globe"></i> <span>Website Bina Anggita</span></a></li>
      <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>