@extends('guru.layouts.app')

@section('title', 'Laporan Ulangan')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Laporan Ulangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('guru.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Laporan Ulangan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <div class="row">
                <div class="col-md-6">
                  <table class="table table-bordered">
                    <tr>
                      <td style="width: 20%">Tahun Ajaran</td>
                      <td>{{ $tahunAkademik->tahun_ajaran }}</td>
                    </tr>
                    <tr>
                      <td style="width: 20%">Semester</td>
                      <td>{{ $tahunAkademik->semester }}</td>
                    </tr>
                  </table>
                </div>
              </div>
              
              <a href="{{ route('laporanGuru_ulangan.index') }}" class="btn btn-sm btn-info"><i class="fa fa-undo"></i> Kembali</a>

            </div>
              @include('includes.messages')
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Ruang</th>
                  <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($kelasSiswa as $dataKelasSiswa)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $dataKelasSiswa->siswa->nama }}</td>
                    <td>{{ $dataKelasSiswa->kelas->nama_kelas }}</td>
                    <td>{{ $dataKelasSiswa->ruang->nama_ruang }}</td>

                    <td style="text-align: center;">
                      <a href="{{ route('laporanGuru_ulangan.export', ['tahun' => $tahun->id_tahun, 'siswa' => $dataKelasSiswa->siswa->id_siswa]) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Download</a>
                    </td>
                  </tr>
                    
                  @endforeach
              </tbody>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footer')
<script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>


<script>
$(function () {
  $('#example1').DataTable()
  $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
  })
})
</script>
<script>
  $(document).ready(function(){
    $('.select2').select2({
        placeholder: "Pilih",
        allowClear: true
    });
  });
</script>

@endsection

