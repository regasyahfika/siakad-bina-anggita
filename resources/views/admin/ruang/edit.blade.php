@extends('admin.layouts.app')

@section('title', 'Ruang')

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Ruang
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('ruang.index') }}">Ruang</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Ruang</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('ruang.update', $ruang->id_ruang) }}" method="post">
	            {{ csrf_field() }}
	            {{ method_field('PATCH') }}
					<div class="box-body">
						<div class="form-group">
							<label for="nama_ruang">Nama Ruang</label>
							<input type="text" class="form-control" id="nama_ruang" name="nama_ruang" placeholder="Nama Ruang" value="{{ $ruang->nama_ruang }}">
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-success">Submit</button>
							<a href="{{ route('ruang.index') }}" class="btn btn-info">Back</a>
						</div>
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