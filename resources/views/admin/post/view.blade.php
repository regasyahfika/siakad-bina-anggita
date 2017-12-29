@extends('admin.layouts.app')

@section('title', 'Larablog | Posting')

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
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
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
                  @foreach ($post->kategori as $kate)
                  <dd>{{ $kate->nama }}</dd><br>
                  @endforeach

                  <h4><dt>Tag</dt></h4>
                  @foreach ($post->tags as $tag)
                  <dd>{{ $tag->nama }}</dd><br>
                  @endforeach

                  <dt>Gambar</dt>
                  {{-- <dd><img src="{{ Storage::disk('local')->url($post->image) }}" alt="" style="width: 40%;height: 30%"></dd> --}}
                  <dd><img src="{{ $post->image_url }}" alt="" style="width: 25%;height: 15%"></dd>
            </dl>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
