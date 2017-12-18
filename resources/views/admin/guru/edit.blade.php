@extends('admin.layouts.app')

@section('title', 'Form Guru')

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Guru
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Kategori</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('guru.update', $guru->id) }}" method="post">
	            {{ csrf_field() }}
	            {{ method_field('PATCH') }}
	              <div class="box-body">
	                <div class="form-group">
						<label for="nip">nip</label>
						<input type="text" class="form-control" id="nip" name="nip" placeholder="Title" value="{{ $guru->nip }}">
	                </div>
	                <div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Title" value="{{ $guru->nama }}">
	                </div>
					<div class="form-group" style="margin-top: 18px;">
						<label for="guru">guru</label><br>
						<img src="{{ $guru->guru_url }}" alt="" style="width: 25%;height: 15%; margin-bottom: 10px;">
						<input type="file" name="guru" id="guru">

					</div>
	        
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