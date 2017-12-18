@extends('admin.layouts.app')

@section('title', 'Form Tag')

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Tag
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
	              <h3 class="box-title">Tag</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('user.update', $user->id) }}" method="post">
            	{{ csrf_field() }}
            	{{ method_field('PATCH') }}
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="nama">Nama</label>
	                  <input type="text" class="form-control" id="nama" name="name" placeholder="Title" value="{{ $user->name }}">
	                </div>
	                <div class="form-group">
	                  <label for="lastname">Nama Belakang</label>
	                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nama Belakang" value="{{ $user->lastname }}">
	                </div>
	        
				    <button type="submit" class="btn btn-success">Submit</button>
				    <a href="{{ route('user.index') }}" class="btn btn-info">Back</a>
	                
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