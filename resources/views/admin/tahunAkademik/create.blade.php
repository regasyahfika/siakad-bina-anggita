@extends('admin.layouts.app')

@section('title', 'Tahun Akademik')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Tahun Akademik
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
      <li><a href="{{ route('tahunakademik.index') }}">Tahun Akademik</a></li>
      <li class="active">Tambah</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
    	<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Tahun Akademik</h3>
            </div>
            <!-- /.box-header -->
            @include('includes.messages')
            <!-- form start -->
            <form role="form" action="{{ route('tahunakademik.store') }}" method="post">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="tahun_ajaran">Tahun Ajaran</label>
                  <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Tahun Ajaran" value="{{ old('tahun_ajaran') }}">
                </div>

                <div class="form-group">
                  <label>Semester</label>
                  <select class="form-control select2" name="semester">
                    <option disabled="disabled" selected="selected">Pilih Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Tanggal Awal</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tahun_awal" class="form-control pull-right" id="datepicker_awal">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Tanggal Akhir</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tahun_akhir" class="form-control pull-right" id="datepicker_akhir">
                  </div>
                  <!-- /.input group -->
                </div>

                {{-- <div class="form-group">
                  <div class="checkbox" style="margin-top: 18px;">
                    <label>
                      <input type="checkbox" name="status" value="1"> Status
                    </label>
                    <p class="help-block">Centang jika aktif, jika tidak abaikan.</p>
                  </div>
                </div> --}}
        
      			    <button type="submit" class="btn btn-success">Submit</button>
      			    <a href="{{ route('tahunakademik.index') }}" class="btn btn-info">Back</a>
                
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
<script>
$('#datepicker_awal,#datepicker_akhir').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd'
})
  $( "#datepicker_awal, #datepicker_awal" ).datepicker( "input", "dateFormat", $( this ).val() );
</script>
@endsection