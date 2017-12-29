@extends('admin.layouts.app')

@section('title', 'Form Kategori')

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Kategori
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
        <div class="col-md-6">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Kategori</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('kategori.store') }}" method="post">
	            {{ csrf_field() }}
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="nama">Nama</label>
	                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Title" value="{{ old('nama') }}">
	                </div>
	                {{-- <div class="form-group">
	                  <label for="slug">Slug</label>
	                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug') }}">
	                </div> --}}
	        
				    <button type="submit" class="btn btn-success">Submit</button>
				    <a href="{{ route('kategori.index') }}" class="btn btn-info">Back</a>
	                
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