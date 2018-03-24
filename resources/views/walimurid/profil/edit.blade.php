@extends('walimurid.layouts.app')

@section('title', 'Wali Murid')

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Wali Murid
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('walimurid.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('profil_wali.index') }}">walimurid</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Edit Wali Murid</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('profil_wali.update', $profils->id_walimurid) }}" method="post" enctype="multipart/form-data">
	            {{ csrf_field() }}
	            {{ method_field('PATCH') }}
	              <div class="box-body">
						
			                <div class="form-group">
			                  <label for="nama">Nama</label>
			                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $profils->nama }}">
			                </div>

			                <div class="form-group">
			                  <label for="pekerjaan">Pekerjaan</label>
			                  <input type="pekerjaan" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="{{ $profils->pekerjaan }}">
			                </div>

			                <div class="form-group">
			                  <label for="notelp">No Handphone</label>
			                  <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No Handphone" value="{{ $profils->telp }}">
			                </div>

							{{-- <div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control select2" name="jenis_kelamin">
									<option disabled="disabled" selected="selected">--- Select Jenis Kelamin ---</option>
									<option value="P" {{ $profils->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
									<option value="L" {{ $profils->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
								</select>
							</div> --}}

			                <div class="form-group">
								<label>Agama</label>
								<select class="form-control select2" name="agama">
									<option disabled="disabled" selected="selected">--- Select Jenis Agama ---</option>
									<option value="Islam" {{ $profils->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
									<option value="Kristen" {{ $profils->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
									<option value="Katholik" {{ $profils->agama == 'Katholik' ? 'selected' : '' }}>Katholik</option>
									<option value="Hindu" {{ $profils->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
									<option value="Budha" {{ $profils->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
									<option value="Khong Hu Chu" {{ $profils->agama == 'Khong Hu Chu' ? 'selected' : '' }}>Khong Hu Chu</option>
								</select>
							</div>

							<div class="form-group">
			                  <label>Alamat</label>
			                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat ...">{{ $profils->alamat }}</textarea>
			                </div>
			        	
		            </div>

	        		<div class="box-footer">
					    <button type="submit" class="btn btn-success">Submit</button>
					    <a href="{{ route('profil_wali.index') }}" class="btn btn-info">Back</a>
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