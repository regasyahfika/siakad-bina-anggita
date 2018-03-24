 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if (!empty($halaman)&& $halaman == 'home')
          <li class="active">
            <a href="{{ route('walimurid.home') }}">
              <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('walimurid.home') }}">
              <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
          </li>
        @endif

        @if (!empty($halaman)&& $halaman == 'profil_wali')
          <li class="active">
            <a href="{{ route('profil_wali.index') }}">
              <i class="fa fa-user"></i> <span>Profil</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('profil_wali.index') }}">
              <i class="fa fa-user"></i> <span>Profil</span>
            </a>
          </li>
        @endif

        {{-- Halaman Ubah password --}}
        @if (!empty($halaman)&& $halaman == 'ulangan')
          <li class="active">
            <a href="{{ route('tampil_ulangan.index') }}">
              <i class="fa fa-pencil-square-o"></i> <span>Nilai Ulangan</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('tampil_ulangan.index') }}">
              <i class="fa fa-pencil-square-o"></i> <span>Nilai Ulangan</span>
            </a>
          </li>
        @endif

        {{-- Halaman Perkembangan Siswa --}}
        @if (!empty($halaman)&& $halaman == 'perkembangan')
          <li class="active">
            <a href="{{ route('perkembangan.index') }}">
              <i class="fa fa-line-chart"></i> <span>Perkembangan Siswa</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('perkembangan.index') }}">
              <i class="fa fa-line-chart"></i> <span>Perkembangan Siswa</span>
            </a>
          </li>
        @endif

        {{-- Halaman Ubah password --}}
        @if (!empty($halaman)&& $halaman == 'ubahpassword')
          <li class="active">
            <a href="{{ route('ubahpassword.index') }}">
              <i class="fa fa-gears"></i> <span>Ubah Password</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('ubahpassword.index') }}">
              <i class="fa fa-gears"></i> <span>Ubah Password</span>
            </a>
          </li>
        @endif

      <li><a href="{{ url('/') }}" target="_blank"><i class="fa fa-globe"></i> <span>Website Bina Anggita</span></a></li>
      <li><a href="{{ route('walimurid.logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>