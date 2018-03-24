@extends('admin.layouts.app')

@section('title', 'Prestasi')

@section('head')
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Prestasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Prestasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <a href="{{ route('prestasi.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
            </div>
              @include('includes.messages')
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lomba</th>
                  <th>Nama Peraih</th>
                  <th>Peringkat</th>
                  <th>Tingkat</th>
                  <th>Tahun</th>
                  <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($prestasi as $dataPrestasi)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $dataPrestasi->nama_lomba }}</td>
                    <td>{{ $dataPrestasi->nama_peraih }}</td>
                    <td>{{ $dataPrestasi->peringkat }}</td>
                    <td>{{ $dataPrestasi->tingkat }}</td>
                    <td>{{ $dataPrestasi->tahun }}</td>
                    <td style="text-align: center;">
                      <a href="{{ route('prestasi.edit', $dataPrestasi->id_prestasi) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                      <form action="{{ route('prestasi.destroy',$dataPrestasi->id_prestasi) }}" method="post" style="display: inline;" onsubmit="return confirm('Kamu yakin ingin menghapus?')">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></button>
                      </form>
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