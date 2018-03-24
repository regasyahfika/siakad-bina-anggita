@extends('admin.layouts.app')

@section('title', 'Wali Siswa')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Wali Murid
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ route('walimurid.index') }}">Wali Murid</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Wali Siswa / Orangtua Siswa</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('walimurid.store') }}" method="post" enctype="multipart/form-data">
	            {{ csrf_field() }}
				<div class="box-body">
					<div class="col-md-6">

		                <div class="form-group">
		                  <label for="nama">Nama Wali</label>
		                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ old('nama') }}">
		                </div>

		                <div class="form-group">
							<label>Nama Siswa</label>
							<select class="form-control select2" style="width: 100%;" name="siswa_id">
								<option disabled="disabled" selected="selected">Pilih Siswa</option>
							@foreach ($siswa as $dataSiswa)
								<option value="{{ $dataSiswa->id_siswa }}">{{ $dataSiswa->nama }}</option>
							@endforeach
							</select>
						</div>

						{{-- <div class="form-group">
							<label>Nama Siswa</label>
							<select class="form-control select2" multiple="multiple" data-placeholder="Pilih Guru"
							style="width: 100%;" name="siswa[]">
							@foreach ($siswa as $dataSiswa)
								<option value="{{ $dataSiswa->id_siswa }}">{{ $dataSiswa->nama }}</option>
							@endforeach
							</select>
						</div> --}}

		                <div class="form-group">
		                  <label for="pekerjaan">Pekerjaan</label>
		                  <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="{{ old('pekerjaan') }}">
		                </div>

		                <div class="form-group">
		                  <label for="telphone">Telephone</label>
		                  <input type="text" class="form-control" id="telphone" name="telp" placeholder="Telephone" value="{{ old('telp') }}">
		                </div>

		                <div class="form-group">
		                  <label>Alamat</label>
		                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat ..."></textarea>
		                </div>
		            </div>

		            <div class="col-md-6">
						<div class="form-group">
							<label>Agama</label>
							<select class="form-control select2" style="width: 100%;" name="agama">
								<option disabled="disabled" selected="selected">Pilih Agama</option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Katholik">Katholik</option>
								<option value="Hindu">Hindu</option>
								<option value="Budha">Budha</option>
								<option value="Khong Hu Chu">Khong Hu Chu</option>
							</select>
						</div>
						

		                <div class="form-group">
		                  <label for="username">Username</label>
		                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
		                </div>

						<div class="form-group">
		                  <label for="password">Password</label>
		                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
		                </div>
		            </div>
		        </div>
	              <!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-success">Submit</button>
					<a href="{{ route('walimurid.index') }}" class="btn btn-info">Back</a>

				</div>
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
		    placeholder: "Select a state",
		    allowClear: true
		});
	});
</script>
@endsection