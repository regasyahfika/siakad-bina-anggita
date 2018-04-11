@extends('guru.layouts.app')

@section('title', 'Ubah Password')

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('guru.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('ubah_password.index') }}"> Ubah Password</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Ubah Password</h3>
	            </div>
	            <!-- /.box-header -->
	            @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
	            <!-- form start -->
	            <form class="form-horizontal" method="POST" action="{{ route('change_Password') }}">
                        {{ csrf_field() }}
 
                        <div class="form-group{{ $errors->has('password_lama') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Password Lama</label>
 
                            <div class="col-md-6">
                                <input id="password_lama" type="password" class="form-control" name="password_lama" required>
 
                                @if ($errors->has('password_lama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_lama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('password_baru') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Password Baru</label>
 
                            <div class="col-md-6">
                                <input id="password_baru" type="password" class="form-control" name="password_baru" required>
 
                                @if ($errors->has('password_baru'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_baru') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group">
                            <label for="password_baru_confirm" class="col-md-4 control-label">Konfirmasi Password</label>
 
                            <div class="col-md-6">
                                <input id="password_baru_confirm" type="password" class="form-control" name="password_baru_confirmation" required>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
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