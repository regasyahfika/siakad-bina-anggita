@extends('admin.layouts.app')

@section('title', 'Pembagian Kelas')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Pembagian Kelas
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('pembagiankelas.index') }}">Pembagian Kelas</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Pembagian Kelas</h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('pembagiankelas.store') }}" method="post">
	            {{ csrf_field() }}
	            	<div class="box-body">
					<div class="col-md-6">

						<div class="form-group" style="margin-top: 18px;">
							<label>Tahun Ajaran</label>
							<select id="idtahun" class="form-control select2" style="width: 100%;" name="tahun_id">
								<option disabled="disabled" selected="selected">Pilih Tahun Ajaran</option>
							@foreach ($tahun as $dataTahun)
								<option value="{{ $dataTahun->id_tahun }}">{{ $dataTahun->tahun_ajaran }} - {{ $dataTahun->semester == 1 ? 'Ganjil' : 'Genap' }}</option>
							@endforeach
							</select>
						</div>

						<div class="form-group" style="margin-top: 18px;">
							<label>Nama Siswa</label>
							<select id="idsiswa" class="form-control select2" style="width: 100%;" name="siswa_id">
							</select>
						</div>

						<div class="form-group" style="margin-top: 18px;">
							<label>Kelas</label>
							<select id="idkelas" class="form-control select2" style="width: 100%;" name="kelas_id">
								<option disabled="disabled" selected="selected">Pilih Kelas</option>
							@foreach ($kelas as $dataKelas)
								<option value="{{ $dataKelas->id_kelas }}">{{ $dataKelas->nama_kelas }}</option>
							@endforeach
							</select>
						</div>

						<div class="form-group" style="margin-top: 18px;">
							<label>Ruang</label>
							<select id="idruang" class="form-control select2" style="width: 100%;" name="ruang_id">
								<option disabled="disabled" selected="selected">Pilih Ruang</option>
							@foreach ($ruang as $dataRuang)
								<option value="{{ $dataRuang->id_ruang }}">{{ $dataRuang->nama_ruang }}</option>
							@endforeach
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" style="margin-top: 18px;">
							<label>Program Kelas</label>
							<select class="form-control select2" style="width: 100%;" name="program_id">
								<option disabled="disabled" selected="selected">Pilih Program Kelas</option>
							@foreach ($program as $dataProgram)
								<option value="{{ $dataProgram->id_program }}">{{ $dataProgram->nama_program }}</option>
							@endforeach
							</select>
						</div>

						<div class="form-group">
							<label>Nama Guru</label>
							<select class="form-control select2" multiple="multiple" data-placeholder="Pilih Guru"
							style="width: 100%;" name="guru[]">
							@foreach ($guru as $dataGuru)
								<option value="{{ $dataGuru->id_guru }}">{{ $dataGuru->nama }}</option>
							@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="keterangan">Keterangan</label>
							<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ old('keterangan') }}">
						</div>
					</div>
	            	</div>
	        		<div class="box-footer">
					    <button type="submit" class="btn btn-success">Submit</button>
					    <a href="{{ route('pembagiankelas.index') }}" class="btn btn-info">Back</a>
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
		    placeholder: "Pilih",
		    allowClear: true
		});
		$('#idtahun').on('change', function(){
			var tahun = $('#idtahun').val()
			// var ruang = $('#idruang').val()
			// var kelas = $('#idkelas').val()
			$.get('{{ route('pembagiankelas.siswajson') }}',{tahun_id: tahun})
			.done(function(data){
				console.log(data)
				$('#idsiswa option').remove();
				var list = $('#idsiswa');
				$.each(data, function(index, item){
					list.append(new Option(item.nama, item.id_siswa));
				});
			})
		});
	});
</script>

@endsection