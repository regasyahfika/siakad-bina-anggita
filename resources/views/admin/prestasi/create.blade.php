@extends('admin.layouts.app')

@section('title', 'Prestasi')

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Prestasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('prestasi.index') }}">Prestasi</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Prestasi</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('prestasi.store') }}" method="post">
	            {{ csrf_field() }}
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="namalomba">Nama Lomba</label>
	                  <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" placeholder="Nama Lomba" value="{{ old('nama_lomba') }}">
	                </div>

	                <div class="form-group">
	                  <label for="namaperaih">Nama Peraih</label>
	                  <input type="text" class="form-control" id="namaperaih" name="nama_peraih" placeholder="Nama Peraih" value="{{ old('nama_peraih') }}">
	                </div>

	                <div class="form-group">
	                  <label for="peringkat">Peringkat</label>
	                  <input type="text" class="form-control" id="peringkat" name="peringkat" placeholder="Peringkat" value="{{ old('peringkat') }}">
	                </div>

	                <div class="form-group">
	                  <label for="tahun">Tahun</label>
	                  <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="{{ old('tahun') }}">
	                </div>

	                <div class="form-group">
	                  <label for="tingkat">Tingkat</label>
	                  <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="Tingkat" value="{{ old('tingkat') }}">
	                </div>
	        
				    <button type="submit" class="btn btn-success">Submit</button>
				    <a href="{{ route('prestasi.index') }}" class="btn btn-info">Back</a>
	                
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