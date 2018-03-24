@extends('guru.layouts.app')

@section('title', 'Guru')

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Guru
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('guru.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('profil_guru.index') }}">Guru</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Edit Guru</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('profil_guru.update', $profils->id_guru) }}" method="post" enctype="multipart/form-data">
	            {{ csrf_field() }}
	            {{ method_field('PATCH') }}
	              <div class="box-body">
						<div class="col-md-6">
			                <div class="form-group">
			                  <label for="nip">NIP / NUPTK</label>
			                  <input type="text" class="form-control" id="nip" name="nip" placeholder="Nip" value="{{ $profils->nip }}" disabled>
			                </div>

			                <div class="form-group">
			                  <label for="nama">Nama</label>
			                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $profils->nama }}">
			                </div>

			                <div class="form-group">
			                  <label for="email">Email</label>
			                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $profils->email }}">
			                </div>

			                <div class="form-group">
			                  <label for="notelp">No Telp</label>
			                  <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No Telphone" value="{{ $profils->notelp }}">
			                </div>

			                <div class="form-group">
			                  <label for="tempat_lahir">Tempat Lahir</label>
			                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ $profils->tempat_lahir }}">
			                </div>

							<div class="form-group">
								<label>Tanggal Lahir</label>

								<div class="input-group date">
								  <div class="input-group-addon">
								    <i class="fa fa-calendar"></i>
								  </div>
								  <input type="text" name="tanggal_lahir" class="form-control pull-right" id="datepicker" value="{{ $profils->tanggal_lahir }}">
								</div>
								<!-- /.input group -->
							</div>

							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control select2" name="jenis_kelamin">
									<option disabled="disabled" selected="selected">--- Select Jenis Kelamin ---</option>
									<option value="P" {{ $profils->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
									<option value="L" {{ $profils->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
								</select>
							</div>

			            </div>

			            <div class="col-md-6">

			            	<div class="form-group">
			                  	<img class="profile-user-img img-responsive img-thumbnail" src="{{ $profils->foto_url }}" alt="User profile picture" style="margin-bottom: 10px;"><br>
				                <div class="btn btn-default btn-file">
				                  	<i class="fa fa-paperclip"></i> Foto
				                	<input type="file" name="foto" id="foto">
				                </div>
				                <p class="help-block">Jika tidak ada foto dapat diabaikan.</p>
				            </div>

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
			                  <label for="pendidikan">Pendidikan</label>
			                  <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan" value="{{ $profils->pendidikan }}">
			                </div>

			                <div class="form-group">
			                  <label for="jabatan">Jabatan</label>
			                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ $profils->jabatan }}">
			                </div>
							
			                {{-- <div class="form-group">
								<label for="foto">Foto</label>
								<input type="file" name="foto" id="foto">
							</div> --}}

							<div class="form-group">
			                  <label>Alamat</label>
			                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat ...">{{ $profils->alamat }}</textarea>
			                </div>
			        		
			        	
					    
			        	</div>
		            </div>

	        		<div class="box-footer">
					    <button type="submit" class="btn btn-success">Submit</button>
					    <a href="{{ route('profil_guru.index') }}" class="btn btn-info">Back</a>
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