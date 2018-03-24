@extends('admin.layouts.app')

@section('title', 'Mata Pelajaran')

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Mata Pelajaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('matapelajaran.index') }}"></a>Mata Pelajaran</li>
        <li class="active">Tambah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Mata Pelajaran</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('matapelajaran.store') }}" method="post">
	            {{ csrf_field() }}
				<div class="box-body">
	                <div class="form-group">
	                  <label for="nama_mapel">Nama Pelajaran</label>
	                  <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Nama Pelajaran" value="{{ old('nama_mapel') }}">
	                </div>
	                <div class="form-group">
	                  <label for="keterangan">Keterangan</label>
	                  <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ old('keterangan') }}">
	                </div>
	        
				    <button type="submit" class="btn btn-success">Submit</button>
				    <a href="{{ route('matapelajaran.index') }}" class="btn btn-info">Back</a>
				</div>
	              <!-- /.box-body -->
	            </form>
			</div>
	          <!-- /.box -->
	          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection