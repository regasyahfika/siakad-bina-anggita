@extends('admin.layouts.app')

@section('title', 'ekstrakurikuler')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Ekstrakurikuler
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ route('ekskul.index') }}">Ekstrakurikuler</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Ekstrakurikuler</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('ekskul.update', $ekstrakurikuler->id_ekskul) }}" method="post" enctype="multipart/form-data">
	            {{ csrf_field() }}
	            {{ method_field('PATCH') }}
	            <div class="box-body">
	                <div class="form-group">
	                	<label for="nama_ekskul">Nama Ekstrakurikuler</label>
	                	<input type="text" class="form-control" id="nama_ekskul" name="nama_ekskul" placeholder="Nama Ekstrakurikuler" value="{{ $ekstrakurikuler->nama_ekskul }}">
	                </div>

	                <div class="form-group" style="margin-top: 18px;">
						<label>Nama Guru</label>
						<select class="form-control select2" style="width: 100%;" name="guru_id">
						@foreach($guru as $dataGuru)
							<option value="{{ $dataGuru->id_guru }}"
								@if ($dataGuru->id_guru == $ekstrakurikuler->guru_id)
								selected
								@endif
							>{{ $dataGuru->nama }}</option>
						@endforeach
						</select>
					</div>

					<div class="form-group">
	                	<label for="keterangan">Keterangan</label>
	                	<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ $ekstrakurikuler->keterangan }}">
	                </div>

	                <div class="form-group" style="margin-top: 18px;">
						<label for="gambar">Gambar</label><br>
						<img class="profile-user-img img-responsive img-thumbnail" src="{{ $ekstrakurikuler->gambar_url }}" alt="User profile picture"> <br><br>
						<input type="file" name="gambar" id="gambar">

						<p class="help-block">Jika tidak merubah gambar langsung submit.</p>
					</div>

				    <button type="submit" class="btn btn-success">Submit</button>
				    <a href="{{ route('ekskul.index') }}" class="btn btn-info">Back</a>
	                
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

@section('footer')
<script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
	$(document).ready(function(){
    $('.select2').select2({
        placeholder: "Pilih",
        allowClear: true
    });
});

</script>
@endsection