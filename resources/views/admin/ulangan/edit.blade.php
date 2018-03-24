@extends('admin.layouts.app')

@section('title', 'Ulangan')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">

@endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Ulangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('ulangansiswa.index') }}">Ulangan</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
	    	<div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Ulangan </h3>
	            </div>
	            <!-- /.box-header -->
	            @include('includes.messages')
	            <!-- form start -->
	            <form role="form" action="{{ route('ulangansiswa.update', $ulangan->id_harian) }}" method="post">
	            {{ csrf_field() }}
	            {{ method_field('PATCH') }}
	              	<div class="box-body">
	              	<div class="col-md-6">

	              		<div class="form-group">
		                    <label>Tahun Ajaran</label>
		                    <select class="form-control select2" style="width: 100%;" name="tahun_id" disabled>
		                      <option value="{{ $tahun->id_tahun }}" selected>{{ $tahun->tahun_ajaran }} - {{ $tahun->semester == 1 ? 'Ganjil' : 'Genap' }}</option>
		                    </select>
		                 </div>


						<div class="form-group">
							<label>Nama Siswa</label>
							<select id="idsiswa" class="form-control select2" style="width: 100%;" name="siswa_id" disabled>
							@foreach($siswa as $dataSiswa)
								<option value="{{ $dataSiswa->id_siswa }}"
									@if ($dataSiswa->id_siswa == $ulangan->siswa_id)
									selected
									@endif
								>{{ $dataSiswa->nama }}</option>
							@endforeach
							</select>
						</div>

						<div class="form-group">
							<label>Nama Kelas</label>
							<select class="form-control select2" style="width: 100%;" name="kelas_id" disabled>
								<option value="{{ $kelas->id_kelas }}"
									@if ($kelas->id_kelas == $ulangan->kelas_id)
									selected
									@endif
								>{{ $kelas->nama_kelas }}</option>
							</select>
						</div>

						{{-- <div class="form-group">
							<label>Nama Kelas</label>
							<select class="form-control select2" style="width: 100%;" name="kelas_id" disabled>
								<option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }}</option>
							</select>
						</div> --}}

						<div class="form-group">
							<label>Mata Pelajaran</label>
							<select id="idmapel" class="form-control select2" style="width: 100%;" name="mapel_id">
							@foreach($mapel as $dataMapel)
								<option value="{{ $dataMapel->id_mapel }}"
									@if ($dataMapel->id_mapel == $ulangan->mapel_id)
									selected
									@endif
								>{{ $dataMapel->nama_mapel }}</option>
							@endforeach
							</select>
						</div>

						{{-- <div class="form-group">
		                  <label for="nilai">Nilai</label>
		                  <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Nilai" value="{{ $ulangan->nilai }}">
		                </div>
 --}}
		                <div class="form-group">
		                  <label for="nilai">Nilai</label>
		                  <input type="number" max="80" min="0" class="form-control" id="nilai" name="nilai" placeholder="Nilai" value="{{ $ulangan->nilai }}">
		                </div>
		                <p class="help-block">Max Nilai 80.</p>
					</div>

					<div class="col-md-6">

						<div class="form-group">
							<label>Nama Guru</label>
							<select class="form-control select2" style="width: 100%;" name="guru_id" disabled>
							@foreach($guru as $dataGuru)
								<option value="{{ $dataGuru->id_guru }}"
									@if ($dataGuru->id_guru == $ulangan->guru_id)
									selected
									@endif
								>{{ $dataGuru->nama }}</option>
							@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="tipe">Tipe Ulangan</label>
							<select class="form-control select2" name="tipe" id="tipe">
								<option disabled selected>Pilih Tipe Ulangan</option>
								@foreach ($listtipe as $data)
								<option value="{{ $data }}" {{ $ulangan->tipe == $data ? 'Selected' : ''  }}>{{ $data }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label>Tanggal</label>

							<div class="input-group date">
							  <div class="input-group-addon">
							    <i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" name="tanggal" class="form-control pull-right" id="datepicker" value="{{ $ulangan->tanggal }}">
							</div>
							<!-- /.input group -->
						</div>

						<div class="form-group">
		                  <label for="materi">Materi</label>
		                  <input type="text" class="form-control" id="materi" name="materi" placeholder="Materi" value="{{ $ulangan->materi }}">
		                </div>

		                <div class="form-group">
		                  <label for="deskripsi">Deskripsi</label>
		                  <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" value="{{ $ulangan->deskripsi }}">
		                </div>
		            </div>
	            	</div>
	              <!-- /.box-body -->
	            <div class="box-footer">
	            	<button type="submit" class="btn btn-success">Submit</button>
				    <a href="{{ route('ulangansiswa.index') }}" class="btn btn-info">Back</a>
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

@section('footer')
<script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script>
  $(document).ready(function(){
    $('.select2').select2({
        placeholder: "Pilih",
        allowClear: true
    })
      $('#idkelas').on('change', function(){
        var kelasid = $(this).val()
        $.get('{{ route('ulangansiswa.pelajaranjson') }}',{id_kelas: kelasid})
        .done(function(data){
          $('#idmapel option').remove()
          data.forEach(function(item){
            $('#idmapel').append(new Option(item.nama_mapel, item.id_mapel))
          })
          // agar mapel id mapel berubah untuk menjalan event onchange pada mapel
          $('#idmapel').trigger('change')
        })
      })
      
    $('#idmapel').change(function(){
      var siswa = $('#idsiswa').val()
      var mapel = $('#idmapel').val()
      var tahun_id = $('select[name="tahun_id"]').val()
      if (siswa==null || mapel==null) {
        return
      }
      $.get('{{ route('ulangansiswa.tipejson') }}',{siswa_id: siswa, tahun_id: tahun_id, mapel_id: mapel})
      .done(function(data){
        $('#tipe option').remove()
        $('#tipe').append(new Option('UH', 'UH'))
        if (!data.includes('UTS')) {
          $('#tipe').append(new Option('UTS', 'UTS'))
        }
        else if (!data.includes('UAS')) {
          $('#tipe').append(new Option('UAS', 'UAS'))
        }
        else{
	        $('#tipe').append(new Option('{{ $ulangan->tipe }}', '{{ $ulangan->tipe }}', true, true))
        }
      })
    })

    })

  $.fn.datepicker.dates['id'] = {
    days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
    daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    daysMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
    months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
    monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
	};

  $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    endDate: new Date(),
    todayHighlight: 1,
    daysOfWeekDisabled: [0],
    language: 'id'
  })
    $( "#datepicker" ).datepicker( "input", "dateFormat", $( this ).val() )
</script>
@endsection