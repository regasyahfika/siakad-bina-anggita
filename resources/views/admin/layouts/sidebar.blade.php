 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      {{-- <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> --}}
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if (!empty($halaman)&& $halaman == 'home')
          <li class="active">
            <a href="{{ route('admin.home') }}">
              <i class="fa fa-home text-primary"></i> <span>Home</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('admin.home') }}">
              <i class="fa fa-home text-primary"></i> <span>Home</span>
            </a>
          </li>
        @endif

        <!-- active menu  -->
      @if(!empty($halaman) && $halaman == 'kategori' || $halaman == 'post' || $halaman == 'tag')
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <!-- active category -->
          @if(!empty($halaman) && $halaman == 'kategori')
            <li class="active"><a href="{{ route('kategori.index') }}"><i class="fa fa-circle-o"></i> Kategori</a></li>
          @else
            <li><a href="{{ route('kategori.index') }}"><i class="fa fa-circle-o"></i> Kategori</a></li>
          @endif

          <!-- active post -->
          @if(!empty($halaman) && $halaman == 'post')
            <li class="active"><a href="{{ route('post.index') }}"><i class="fa fa-circle-o"></i> Posting</a></li>
          @else
            <li><a href="{{ route('post.index') }}"><i class="fa fa-circle-o"></i> Posting</a></li>
          @endif

          <!-- active comment -->
          
          @if(!empty($halaman) && $halaman == 'tag')
            <li class="active"><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i> Tag</a></li>
          @else
            <li><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i> Tag</a></li>
          @endif
          </ul>

        </li>

      @else
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('kategori.index') }}"><i class="fa fa-circle-o"></i> Kategori</a></li>
            <li><a href="{{ route('post.index') }}"><i class="fa fa-circle-o"></i> Posting</a></li>
            <li><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i> Tag</a></li>
          </ul>

        </li>
      @endif
      <!-- stop active menu  -->
        @if (!empty($halaman)&& $halaman == 'user')
          <li class="active"><a href="{{ route('user.index') }}"><i class="fa fa-user text-success"></i> <span>User</span></a></li>
        @else
          <li><a href="{{ route('user.index') }}"><i class="fa fa-user text-success"></i> <span>User</span></a></li>
        @endif

        <li><a href="{{ url('/') }}"><i class="fa fa-globe text-primary"></i> <span>Blog</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>