@extends('walimurid.layouts.app')

@section('title', 'Ulangan')

@section('head')
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Ulangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('walimurid.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Ulangan</li>
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
                      <td style="width: 20%">Tahun Akademik</td>
                      <td>{{ $tahunAkademik->tahun_ajaran }}</td>
                    </tr>
                    <tr>
                      <td style="width: 20%">Semester</td>
                      <td>{{ $tahunAkademik->semester }}</td>
                    </tr>
                  </table>
                </div>
              </div>
              <a href="{{ route('tampil_ulangan.index') }}" class="btn btn-sm btn-info"><i class="fa fa-undo"></i> Kembali</a>
              
              <div class="box-tools pull-right">
                <a href="{{ route('tampil_ulangan.export', ['tahun' => $tahun->id_tahun]) }}" class="btn btn-sm btn-warning"><i class="fa fa-download"></i> Export</a>
              </div>

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
                  <th>Nama Guru</th>
                  <th>Kelas</th>
                  <th>Mata Pelajaran</th>
                  <th>Tahun Ajaran</th>
                  <th>Materi</th>
                  <th>Tanggal</th>
                  <th>Nilai</th>
                  <th>Deskripsi</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($dataUlangan as $ulangan)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $ulangan->siswa->nama }}</td>
                    <td>{{ $ulangan->guru->nama }}</td>
                    <td>{{ $ulangan->kelas->nama_kelas }}</td>
                    <td>{{ $ulangan->mapel->nama_mapel }}</td>
                    <td>{{ $ulangan->tahunAkademik->tahun_ajaran }}- {{ $ulangan->tahunAkademik->semester == 1 ? 'Ganjil' : 'Genap' }}</td>
                    <td>{{ $ulangan->materi }}</td>
                    <td>{{ date('d F Y', strtotime($ulangan->tanggal))  }}</td>
                    <td>{{ $ulangan->nilai }}</td>
                    <td>{{ $ulangan->deskripsi }}</td>
                  </tr>
                    
                  @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Siswa</th>
                  <th>Nama Guru</th>
                  <th>Kelas</th>
                  <th>Mata Pelajaran</th>
                  <th>Tahun Ajaran</th>
                  <th>Materi</th>
                  <th>Tanggal</th>
                  <th>Nilai</th>
                  <th>Deskripsi</th>
                </tr>
                </tfoot>
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