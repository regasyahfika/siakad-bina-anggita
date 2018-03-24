@extends('admin.layouts.app')

@section('title', 'Tahun Akademik')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Tahun Akademik
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Tahun Akademik</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <a href="{{ route('tahunakademik.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
            </div>
              @include('includes.messages')
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tahun Ajaran</th>
                  <th>Tanggal Awal</th>
                  <th>Tanggal Akhir</th>
                  <th style="text-align: center;">Semester</th>
                  <th>Status</th>
                  <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($thn as $dataThn)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $dataThn->tahun_ajaran }}</td>
                    <td>{{ date('d F Y', strtotime($dataThn->tahun_awal)) }}</td>
                    <td>{{ date('d F Y', strtotime($dataThn->tahun_akhir)) }}</td>
                    <td style="text-align: center;">{{ $dataThn->semester }}</td>
                    <td>{{ $dataThn->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td style="text-align: center;">
                      @if ($dataThn->status==0)
                      <a href="{{ route('tahunakademik.updatestatus', $dataThn->id_tahun) }}" class="btn btn-xs btn-warning"><i class="fa fa-check-square-o"></i> Aktifkan</a>
                      {{-- <form action="{{ route('tahunakademik.updatestatus', $dataThn->id_tahun) }}" method="post" style="display: inline;">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button class="btn btn-xs btn-warning"><i class="fa fa-check-square-o"></i> Aktifkan</a></button>
                      </form> --}}
                      @else
                      <a href="{{-- {{ route('tahunakademik.updatetahun', $dataThn->id_tahun) }} --}} --}}" class="btn btn-xs btn-success disabled"><i class="fa fa-check-circle"></i> Aktif</a>
                        
                      @endif

                      <a href="{{ route('tahunakademik.edit', $dataThn->id_tahun) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                      <form action="{{ route('tahunakademik.destroy',$dataThn->id_tahun) }}" method="post" style="display: inline;" onsubmit="return confirm('Kamu yakin ingin menghapus?')">
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