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
        Tambah Absensi
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('absensi.index') }}">Absensi</a></li>
        <li class="active">Tambah</li>
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
	            <form role="form" action="{{ route('absensi.store') }}" method="post">
	            {{ csrf_field() }}
	              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <select class="form-control select2" style="width: 100%;" name="tahun_id" readonly>
                      <option value="{{ $tahun->id_tahun }}" selected>{{ $tahun->tahun_ajaran }} - {{ $tahun->semester == 1 ? 'Ganjil' : 'Genap' }}</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Nama Siswa</label>
                    <select id="idsiswa" class="form-control select2 pili_tipe" style="width: 100%;" name="siswa_id">
                      <option disabled="disabled" selected="selected">Pilih Siswa</option>
                    @foreach ($siswa as $dataSiswa)
                      <option value="{{ $dataSiswa->siswa->id_siswa }}">{{ $dataSiswa->siswa->nama }}</option>
                    @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Kelas</label>
                    <select id="idkelas" class="form-control select2" style="width: 100%;" name="kelas_id">
                      <option disabled="disabled" selected="selected">Pilih Kelas</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Ruang</label>
                    <select id="idruang" class="form-control select2" style="width: 100%;" name="ruang_id">
                      <option disabled="disabled" selected="selected">Pilih Ruang</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Program Kelas</label>
                    <select id="idprogram" class="form-control select2" style="width: 100%;" name="program_id">
                      <option disabled="disabled" selected="selected">Pilih Program Kelas</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Guru</label>
                    <select id="idguru" class="form-control select2" style="width: 100%;" name="guru_id" readonly>
                      <option disabled="disabled" selected="selected">Pilih Guru</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Tanggal</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal" class="form-control pull-right" id="datepicker">
                    </div>
                    <!-- /.input group -->
                  </div>

                  <div class="form-group">
                    <label>Absensi</label>
                    <select class="form-control select2" name="data_absensi">
                      <option disabled="disabled" selected="selected">Pilih Absensi</option>
                      <option value="Hadir">Hadir</option>
                      <option value="Alpa">Alpa</option>
                      <option value="Izin">Izin</option>
                      <option value="Sakit">Sakit</option>
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
        placeholder: "Pilih",
        allowClear: true
    });

    $('#idsiswa').on('change', function(){
      var siswa = $('#idsiswa').val()
      $.get('{{ route('absensi.kelasjson') }}',{siswa_id: siswa})
      .done(function(data){
        console.log(data)
        $('#idkelas option').remove();
        $('#idkelas').append(new Option(data.nama_kelas, data.id_kelas));
      });
      $.get('{{ route('absensi.ruangjson') }}',{siswa_id: siswa})
      .done(function(data){
        console.log(data)
        $('#idruang option').remove();
        $('#idruang').append(new Option(data.nama_ruang, data.id_ruang));
      });
      $.get('{{ route('absensi.programjson') }}',{siswa_id: siswa})
      .done(function(data){
        console.log(data)
        $('#idprogram option').remove();
        $('#idprogram').append(new Option(data.nama_program, data.id_program));
      });
      $.get('{{ route('ulangansiswa.gurujson') }}',{siswa_id: siswa})
      .done(function(data){
        console.log(data)
        $('#idguru option').remove();
        data.guru_kelas.forEach(function(data){
          $('#idguru').append(new Option(data.nama, data.id_guru));
        })
      });

    });
  });

  $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    endDate: new Date(),
    todayHighlight: 1,
    daysOfWeekDisabled: [0]
  })
    $( "#datepicker" ).datepicker( "input", "dateFormat", $( this ).val() );
</script>
@endsection