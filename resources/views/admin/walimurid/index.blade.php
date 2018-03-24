@extends('admin.layouts.app')

@section('title', 'Wali Murid')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Wali Murid
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Wali Murid</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <a href="{{ route('walimurid.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            @include('includes.messages')
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Anak</th>
                      <th>Nama Wali Murid</th>
                      <th>Telephone</th>
                      <th>Pekerjaan</th>
                      <th>Agama</th>
                      <th>Alamat</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($walimurid as $dataWalimurid)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $dataWalimurid->siswa->nama }}</td>
                      <td>{{ $dataWalimurid->nama }}</td>
                      <td>{{ $dataWalimurid->telp }}</td>
                      <td>{{ $dataWalimurid->pekerjaan }}</td>
                      <td>{{ $dataWalimurid->agama }}</td>
                      <td>{{ $dataWalimurid->alamat }}</td>
                      <td style="text-align: center;">
                        <a href="{{ route('walimurid.show', $dataWalimurid->id_walimurid) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>

                        <a href="{{ route('walimurid.edit', $dataWalimurid->id_walimurid) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                        <form action="{{ route('walimurid.destroy',$dataWalimurid->id_walimurid) }}" method="post" style="display: inline;" onsubmit="return confirm('Kamu yakin ingin menghapus?')">
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