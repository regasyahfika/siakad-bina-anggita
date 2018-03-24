@extends('admin.layouts.app')

@section('title', 'Guru')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Guru
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('guru.index') }}">Guru</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Guru</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('guru.update', $guru->id_guru) }}" method="post" enctype="multipart/form-data">
	            {{ csrf_field() }}
	            {{ method_field('PATCH') }}
	              	<div class="box-body">
						<div class="col-md-6">
			                <div class="form-group">
			                  <label for="nip">NIP / NUPTK</label>
			                  <input type="text" class="form-control" id="nip" name="nip" placeholder="Nip" value="{{ $guru->nip }}" disabled>
			                </div>

			                <div class="form-group">
			                  <label for="nama">Nama</label>
			                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $guru->nama }}">
			                </div>

			                <div class="form-group">
			                  <label for="email">Email</label>
			                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $guru->email }}">
			                </div>

			                <div class="form-group">
			                  <label for="tempat_lahir">Tempat Lahir</label>
			                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ $guru->tempat_lahir }}">
			                </div>

							<div class="form-group">
								<label>Tanggal Lahir</label>

								<div class="input-group date">
								  <div class="input-group-addon">
								    <i class="fa fa-calendar"></i>
								  </div>
								  <input type="text" name="tanggal_lahir" class="form-control pull-right" id="datepicker" value="{{ $guru->tanggal_lahir }}">
								</div>
								<!-- /.input group -->
							</div>

							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control select2" name="jenis_kelamin">
									<option disabled="disabled" selected="selected">Pilih Agama</option>
									<option value="P" {{ $guru->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
									<option value="L" {{ $guru->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>


								</select>
							</div>

							<div class="form-group">
			                  <label for="notelp">No Telp</label>
			                  <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No Telphone" value="{{ $guru->notelp }}">
			                </div>

			                <div class="form-group">
								<label>Agama</label>
								<select class="form-control select2" name="agama">
									<option disabled="disabled" selected="selected">Pilih Agama</option>
									<option value="Islam" {{ $guru->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
									<option value="Kristen" {{ $guru->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
									<option value="Katholik" {{ $guru->agama == 'Katholik' ? 'selected' : '' }}>Katholik</option>
									<option value="Hindu" {{ $guru->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
									<option value="Budha" {{ $guru->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
									<option value="Khong Hu Chu" {{ $guru->agama == 'Khong Hu Chu' ? 'selected' : '' }}>Khong Hu Chu</option>
								</select>
							</div>

			            </div>

			            <div class="col-md-6">

			                <div class="form-group">
			                  <label for="pendidikan">Pendidikan</label>
			                  <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan" value="{{ $guru->pendidikan }}">
			                </div>

			                <div class="form-group">
			                  <label for="jabatan">Jabatan</label>
			                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ $guru->jabatan }}">
			                </div>
							
			                {{-- <div class="form-group">
								<label for="foto">Foto</label>
								<input type="file" name="foto" id="foto">
							</div> --}}

							<div class="form-group">
			                  <label>Alamat</label>
			                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat ...">{{ $guru->alamat }}</textarea>
			                </div>

			                <div class="form-group box-profile">
								<label for="foto">foto</label><br>
								<img class="profile-user-img img-responsive img-thumbnail" src="{{ $guru->foto_url }}" alt="User profile picture"><br><br>
								<input type="file" name="foto" id="foto">
							</div>
			        	</div>
		            </div>
		            <div class="box-footer">
					    <button type="submit" class="btn btn-success">Submit</button>
					    <a href="{{ route('guru.index') }}" class="btn btn-info">Back</a>
		            	
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