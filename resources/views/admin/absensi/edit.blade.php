@extends('admin.layouts.app')

@section('title', 'Absensi')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">

@endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Absensi
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('absensi.index') }}">Absensi</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Absensi</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('absensi.update', $absensi->id_absen) }}" method="post">
	            {{ csrf_field() }}
	            {{ method_field('PATCH') }}
	              <div class="box-body">
	            <div class="col-md-6">
	              	<div class="form-group">
						<label>Program Kelas</label>
						<select class="form-control select2" style="width: 100%;" name="program_id">
						@foreach($program as $dataProgram)
							<option value="{{ $dataProgram->id_program }}"
								@if ($dataProgram->id_program == $absensi->program_id)
								selected
								@endif
							>{{ $dataProgram->nama_program }}</option>
						@endforeach
						</select>
					</div>

	              	<div class="form-group">
						<label>Siswa</label>
						<select class="form-control select2" style="width: 100%;" name="siswa_id">
						@foreach($siswa as $dataSiswa)
							<option value="{{ $dataSiswa->id_siswa }}"
								@if ($dataSiswa->id_siswa == $absensi->siswa_id)
								selected
								@endif
							>{{ $dataSiswa->nama }}</option>
						@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Kelas</label>
						<select class="form-control select2" style="width: 100%;" name="kelas_id">
						@foreach($kelas as $dataKelas)
							<option value="{{ $dataKelas->id_kelas }}"
								@if ($dataKelas->id_kelas == $absensi->kelas_id)
								selected
								@endif
							>{{ $dataKelas->nama_kelas }}</option>
						@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Ruang</label>
						<select class="form-control select2" style="width: 100%;" name="ruang_id">
						@foreach($ruang as $dataRuang)
							<option value="{{ $dataRuang->id_ruang }}"
								@if ($dataRuang->id_ruang == $absensi->ruang_id)
								selected
								@endif
							>{{ $dataRuang->nama_ruang }}</option>
						@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Guru</label>
						<select class="form-control select2" style="width: 100%;" name="guru_id">
						@foreach($guru as $dataGuru)
							<option value="{{ $dataGuru->id_guru }}"
								@if ($dataGuru->id_guru == $absensi->guru_id)
								selected
								@endif
							>{{ $dataGuru->nama }}</option>
						@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Tahun Ajaran</label>
						<select class="form-control select2" style="width: 100%;" name="tahun_id">
						@foreach($tahun as $dataTahun)
							<option value="{{ $dataTahun->id_tahun }}"
								@if ($dataTahun->id_tahun == $absensi->tahun_id)
								selected
								@endif
							>{{ $dataTahun->tahun_ajaran }} - {{ $dataTahun->semester == 1 ? 'Ganjil' : 'Genap' }}</option>
						@endforeach
						</select>
					</div>
				</div>

				<div class="col-md-6">

					<div class="form-group">
						<label>Tanggal</label>

						<div class="input-group date">
						  <div class="input-group-addon">
						    <i class="fa fa-calendar"></i>
						  </div>
						  <input type="text" name="tanggal" class="form-control pull-right" id="datepicker" value="{{ $absensi->tanggal }}">
						</div>
						<!-- /.input group -->
					</div>

					<div class="form-group">
						<label>Absensi</label>
						<select class="form-control select2" name="data_absensi">
							<option disabled="disabled" selected="selected">Pilih Absensi</option>
							<option value="Hadir" {{ $absensi->data_absensi == 'Hadir' ? 'selected' : '' }}>Hadir</option>
							<option value="Alpa" {{ $absensi->data_absensi == 'Alpa' ? 'selected' : '' }}>Alpa</option>
							<option value="Izin" {{ $absensi->data_absensi == 'Izin' ? 'selected' : '' }}>Izin</option>
							<option value="Sakit" {{ $absensi->data_absensi == 'Sakit' ? 'selected' : '' }}>Sakit</option>
						</select>
					</div>

	                <div class="form-group">
	                  <label for="keterangan">Keterangan</label>
	                  <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ $absensi->keterangan }}">
	                </div>
	            </div>
	                
	              </div>

	              <div class="box-footer">
				    <button type="submit" class="btn btn-success">Submit</button>
				    <a href="{{ route('absensi.index') }}" class="btn btn-info">Back</a>
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
<script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script>
  $(document).ready(function(){
    $('.select2').select2({
        placeholder: "Select a state",
        allowClear: true
    });
  });

  $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
    $( "#datepicker" ).datepicker( "input", "dateFormat", $( this ).val() );
</script>
@endsection