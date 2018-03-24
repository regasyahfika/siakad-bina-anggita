@extends('admin.layouts.app')

@section('title', 'Galeri')

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Galeri
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('galeri.index') }}"></i> Galeri</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Galeri</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data">
	            {{ csrf_field() }}
	              <div class="box-body">
	                <div class="form-group">
	                	<label for="judul">Judul</label>
	                  	<input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="{{ old('judul') }}">
	                </div>

					<div class="form-group">
						<label>Nama Album</label>
						<select class="form-control select2" style="width: 100%;" name="album_id">
							<option disabled="disabled" selected="selected">Select Album</option>
						@foreach ($albums as $album)
							<option value="{{ $album->id_album }}">{{ $album->nama_album }}</option>
						@endforeach
						</select>
					</div>

	                <div class="form-group">
	                  <label for="keterangan">Keterangan</label>
	                  <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ old('keterangan') }}">
	                </div>

					<div class="form-group">
						<label for="gambar">Gambar</label>
						<input type="file" name="gambar" id="gambar">
					</div>


	        
				    <button type="submit" class="btn btn-success">Submit</button>
				    <a href="{{ route('galeri.index') }}" class="btn btn-info">Back</a>
	                
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