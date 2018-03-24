@extends('admin.layouts.app')

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
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
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
            </div>
            <!-- /.box-header -->
            <!-- /.box-body -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tahun Ajaran</th>
                  <th>Status</th>
                  <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($tahun as $dataTahun)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $dataTahun->tahun_ajaran }} - {{ $dataTahun->semester== 1 ? 'Ganjil' : 'Genap' }} </td>
                    <td>
                      @if ($dataTahun->status==0)
                      <a href="{{ route('absensi.status', $dataTahun->id_tahun) }}" class="btn btn-xs btn-warning"><i class="fa fa-check-square-o"></i> Aktifkan</a>
                      @else
                      <a href="" class="btn btn-xs btn-primary disabled"><i class="fa fa-check-circle"></i> Aktif</a>
                        
                      @endif
                    </td>
                    <td style="text-align: center;">
                      <a href="{{ route('absensi.tampil', $dataTahun->id_tahun) }}" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah Absensi</a>

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