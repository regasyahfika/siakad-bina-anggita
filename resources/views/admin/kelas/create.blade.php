@extends('admin.layouts.app')

@section('title', 'Kelas')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Kelas
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
      <li><a href="{{ route('kelas.index') }}">Kelas</a></li>
      <li class="active">Tambah</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
    	<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Kelas</h3>
            </div>
            <!-- /.box-header -->
            @include('includes.messages')
            <!-- form start -->
            <form role="form" action="{{ route('kelas.store') }}" method="post">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="nama_kelas">Nama kelas</label>
                  <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas" value="{{ old('nama_kelas') }}">
                </div>
                <div class="form-group">
                  <label for="tipe">Tipe Kelas</label>
                  <select class="form-control" name="tipe" id="tipe">
                    <option selected="selected" disabled>Pilih Tipe</option>
                    <option value="TK">TK</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                  </select>
                </div>
        
			    <button type="submit" class="btn btn-success">Submit</button>
			    <a href="{{ route('kelas.index') }}" class="btn btn-info">Back</a>
                
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