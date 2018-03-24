@extends('admin.layouts.app')

@section('title', 'Posting')

@section('head')
  <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Posting
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('post.index') }}">Posting</a></li>
        <li class="active">Tampil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Data Posting</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="col-lg-6">
            <dl>
                  <h4><dt>Judul</dt></h4>
                  <dd>{{ $post->judul }}</dd><br>

                  <h4><dt>Slug</dt></h4>
                  <dd>{{ $post->slug }}</dd><br>

                  <h4><dt>Konten</dt></h4>
                  <dd>{!! $post->konten !!}</dd>
            </dl>
          </div>
          <div class="col-lg-6">
            <dl>
                  <h4><dt>Kategori</dt></h4>
                  <dd>{{ $post->kategori->nama }}</dd><br>

                  <h4><dt>Gambar</dt></h4>
                  {{-- <dd><img src="{{ Storage::disk('local')->url($post->image) }}" alt="" style="width: 40%;height: 30%"></dd> --}}
                  <dd><img class="profile-user-img img-responsive img-thumbnail" src="{{ $post->image_url }}" alt="User profile picture" style="margin-bottom: 10px;"></dd>
            </dl>
          </div>
          {{-- <a href="{{ route('post.edit', $post->id_posting) }}" class="btn btn-success">edit</a> --}}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
