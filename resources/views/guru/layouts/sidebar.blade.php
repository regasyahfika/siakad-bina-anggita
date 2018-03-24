 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Auth::user()->foto_url }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->nama }}</p>
          <a href="{{ route('profil_guru.index') }}" class="btn btn-xs btn-success">Lihat Profil</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if (!empty($halaman)&& $halaman == 'home')
          <li class="active">
            <a href="{{ route('guru.home') }}">
              <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('guru.home') }}">
              <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
          </li>
        @endif

        {{-- Siswa --}}
        @if (!empty($halaman)&& $halaman == 'tampil_siswa')
          <li class="active">
            <a href="{{ route('tampil_siswa.index') }}">
              <i class="fa fa-users"></i> <span>Siswa</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('tampil_siswa.index') }}">
              <i class="fa fa-users"></i> <span>Siswa</span>
            </a>
          </li>
        @endif

        {{-- Absensi --}}
        @if (!empty($halaman)&& $halaman == 'absensi')
          <li class="active">
            <a href="{{ route('absensi_siswa.index') }}">
              <i class="fa fa-bell"></i> <span>Absensi</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('absensi_siswa.index') }}">
              <i class="fa fa-bell"></i> <span>Absensi</span>
            </a>
          </li>
        @endif

        {{-- Halaman Ulangan Harian --}}
        @if (!empty($halaman)&& $halaman == 'ulangan')
          <li class="active">
            <a href="{{ route('ulangan.index') }}">
              <i class="fa fa-pencil-square-o"></i> <span>Nilai Ulangan</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('ulangan.index') }}">
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
            <li><a href="{{ route('laporanGuru_ulangan.index') }}"><i class="fa fa-check-square-o"></i> <span>laporan Ulangan</span></a></li>
            <li><a href="{{ route('laporanGuru_absensi.index') }}"><i class="fa fa-check-square-o"></i> <span>Laporan Absensi</span></a></li>
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
            <li><a href="{{ route('laporanGuru_ulangan.index') }}"><i class="fa fa-check-square-o"></i> <span>Laporan Ulangan</span></a></li>
            <li><a href="{{ route('laporanGuru_absensi.index') }}"><i class="fa fa-check-square-o"></i> <span>Laporan Absensi</span></a></li>
          </ul>
        </li>
      @endif
      <!-- stop active menu galeri -->

        {{-- <li><a href="{{ route('laporanGuru_absensi.index') }}"><i class="fa fa-file-text"></i> <span>Laporan</span></a></li> --}}

        {{-- Halaman Ubah password --}}
        @if (!empty($halaman)&& $halaman == 'ubahpassword')
          <li class="active">
            <a href="{{ route('ubah_password.index') }}">
              <i class="fa fa-gears"></i> <span>Ubah Password</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('ubah_password.index') }}">
              <i class="fa fa-gears"></i> <span>Ubah Password</span>
            </a>
          </li>
        @endif
        
      <li><a href="{{ url('/') }}"><i class="fa fa-globe"></i> <span>Website Bina Anggita</span></a></li>
      <li><a href="{{ route('guru.logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>