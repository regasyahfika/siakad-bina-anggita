@extends('admin.layouts.app')

@section('title', 'Wali Murid')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
      <h1>
        Edit Data Wali Murid
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ route('walimurid.index') }}">Wali Murid</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-body box-profile" style="float: left;">
              <img class="profile-user-img img-responsive img-thumbnail" src="{{ $walimurid->siswa->foto_url }}" alt="User profile picture">
            </div>
            <div class="box-body box-success">
              <table class="table table-bordered">
                <tr>
                  <td><b>Nama Siswa</b></td>
                  <td>{{ $walimurid->siswa->nama }}</td>
                </tr>
                <tr>
                  <td><b>NIS</b></td>
                  <td>{{ $walimurid->siswa->nis }}</td>
                </tr>
                <tr>
                  <td><b>Jenis Kelamin</b></td>
                  <td>{{ $walimurid->siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                  <td><b>Agama</b></td>
                  <td>{{ $walimurid->siswa->agama }}</td>
                </tr>
                <tr>
                  <td><b>Tempat Lahir</b></td>
                  <td>{{ $walimurid->siswa->tempat_lahir }}</td>
                </tr>
                <tr>
                  <td><b>Tanggal Lahir</b></td>
                  <td>{{ date('d F Y', strtotime($walimurid->siswa->tanggal_lahir))  }}</td>
                </tr>
                <tr>
                  <td><b>Alamat</b></td>
                  <td>{{ $walimurid->siswa->alamat }}</td>
                </tr>
                
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Wali Siswa / Orangtua Siswa</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('walimurid.update', $walimurid->id_walimurid) }}" method="post" enctype="multipart/form-data">
	            {{ csrf_field() }}
	            {{ method_field('PATCH') }}
	              <div class="box-body">

	                <div class="form-group">
	                  <label for="nama">Nama Wali Murid</label>
	                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $walimurid->nama }}">
	                </div>

	                {{-- <div class="form-group">
	                  <label for="password">Password</label>
	                  <input type="text" class="form-control" id="password" name="password" placeholder="password" value="{{ $walimurid->password }}">
	                </div> --}}

	                <div class="form-group">
	                  <label for="pekerjaan">Pekerjaan</label>
	                  <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="{{ $walimurid->pekerjaan }}">
	                </div>

	                <div class="form-group">
	                  <label for="telphone">Telephone</label>
	                  <input type="text" class="form-control" id="telphone" name="telp" placeholder="Telephone" value="{{ $walimurid->telp }}">
	                </div>

	                <div class="form-group">
        						<label>Agama</label>
        						<select class="form-control select2" name="agama">
                      <option disabled="disabled" selected="selected">Pilih Agama</option>
                      <option value="Islam" {{ $walimurid->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                      <option value="Kristen" {{ $walimurid->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                      <option value="Katholik" {{ $walimurid->agama == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                      <option value="Hindu" {{ $walimurid->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                      <option value="Budha" {{ $walimurid->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                      <option value="Khong Hu Chu" {{ $walimurid->agama == 'Khong Hu Chu' ? 'selected' : '' }}>Khong Hu Chu</option>
        						</select>
        					</div>

					<div class="form-group">
	                  <label>Alamat</label>
	                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat ...">{{ $walimurid->alamat }}</textarea>
	                </div>


				    <button type="submit" class="btn btn-success">Submit</button>
				    <a href="{{ route('walimurid.index') }}" class="btn btn-info">Back</a>
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
        placeholder: "Select a state",
        allowClear: true
    });
  });
</script>
@endsection