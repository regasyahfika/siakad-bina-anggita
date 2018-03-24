@extends('admin.layouts.app')

@section('title', 'Siswa')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Edit Siswa
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Home</a></li>
	    <li><a href="{{ route('siswa.index') }}">Siswa</a></li>
	    <li class="active">Edit</li>
	  </ol>
	</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Siswa</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('siswa.update', $siswa->id_siswa) }}" method="post" enctype="multipart/form-data">
	            {{ csrf_field() }}
	            {{ method_field('PATCH') }}
	            	<div class="box-body">
	            	<div class="col-md-6">
					
		                <div class="form-group">
		                  <label for="nis">Nis</label>
		                  <input type="text" class="form-control" id="nis" name="nis" placeholder="Nis" value="{{ $siswa->nis }}" disabled>
		                </div>

		                <div class="form-group">
		                  <label for="nama">Nama</label>
		                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $siswa->nama }}">
		                </div>

		                <div class="form-group">
		                  <label for="tempat_lahir">Tempat Lahir</label>
		                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ $siswa->tempat_lahir }}">
		                </div>

						<div class="form-group">
							<label>Tanggal Lahir</label>

							<div class="input-group date">
							  <div class="input-group-addon">
							    <i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" name="tanggal_lahir" class="form-control pull-right" id="datepicker" value="{{ $siswa->tanggal_lahir }}">
							</div>
							<!-- /.input group -->
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control select2" name="jenis_kelamin">
								<option disabled="disabled" selected="selected">Pilih Jenis Kelamin</option>
								<option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
								<option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">

		                <div class="form-group">
							<label>Agama</label>
							<select class="form-control select2" name="agama">
								<option disabled="disabled" selected="selected">--- Select Jenis Agama ---</option>
								<option value="Islam" {{ $siswa->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
								<option value="Kristen" {{ $siswa->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
								<option value="Katholik" {{ $siswa->agama == 'Katholik' ? 'selected' : '' }}>Katholik</option>
								<option value="Hindu" {{ $siswa->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
								<option value="Budha" {{ $siswa->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
								<option value="Khong Hu Chu" {{ $siswa->agama == 'Khong Hu Chu' ? 'selected' : '' }}>Khong Hu Chu</option>
							</select>
						</div>

						<div class="form-group">
		                  <label>Alamat</label>
		                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat ...">{{ $siswa->alamat }}</textarea>
		                </div>

		            	<div class="form-group box-profile">
							<label for="foto">foto</label><br>
			            	<img class="profile-user-img img-responsive img-thumbnail" src="{{ $siswa->foto_url }}" alt="User profile picture"><br><br>
							<input type="file" name="foto" id="foto">
						</div>
					</div>
		            </div>
		            <div class="box-footer">
					    <button type="submit" class="btn btn-success">Submit</button>
					    <a href="{{ route('siswa.index') }}" class="btn btn-info"><i class="fa fa-undo"></i> Back</a>
		            	
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
	$('#datepicker').datepicker({
	  autoclose: true,
	  format: 'yyyy-mm-dd'
	})
	  $( "#datepicker" ).datepicker( "input", "dateFormat", $( this ).val() );
</script>
<script>
	$(document).ready(function(){
		$('.select2').select2({
		    placeholder: "Select a state",
		    allowClear: true
		});
	});
</script>
@endsection