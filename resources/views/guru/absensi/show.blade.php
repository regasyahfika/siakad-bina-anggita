@extends('guru.layouts.app')

@section('title', 'Absensi')

@section('head')
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Absensi
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('guru.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Absensi</li>
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
              
              <a href="{{ route('absensi_siswa.index') }}" class="btn btn-sm btn-info"><i class="fa fa-undo"></i> Kembali</a>
            </div>
              @include('includes.messages')
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Program Kelas</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Ruang</th>
                  <th>Tanggal</th>
                  <th>Absensi</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($dataAbsensi as $absensi)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $absensi->program->nama_program }}</td>
                    <td>{{ $absensi->siswa->nama }}</td>
                    <td>{{ $absensi->kelas->nama_kelas }}</td>
                    <td>{{ $absensi->ruang->nama_ruang }}</td>
                    <td>{{ date('d F Y', strtotime($absensi->tanggal))  }}</td>
                    <td><button class="btn btn-xs btn-primary">{{ $absensi->data_absensi }}</button></td>
                    <td>{{ $absensi->keterangan }}</td>
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

@endsection