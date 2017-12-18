@extends('admin.layouts.app')

@section('title', 'Larablog | Guru')

@section('head')
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Guru
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

     <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Data Guru</h3>
            </div>
              @include('includes.messages')
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Foto</th>
                  <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($guru as $gr)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $gr->nip }}</td>
                    <td>{{ $gr->nama }}</td>
                    <td style="text-align: center; width: 15%"><img src="{{ $gr->image_url }}" alt="" style="width: 25%;height: 15%"></td>
                    <td style="text-align: center;">
                      <a href="{{ route('guru.edit', $gr->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>

                      <form action="{{ route('guru.destroy',$gr->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Kamu yakin ingin menghapus?')">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                      </form>
                    </td>
                  </tr>
                    
                  @endforeach
              </tbody>
              </table>
              <a href="{{ route('kategori.create') }}" class="btn btn-success"><i class="fa fa-pencil"></i> Tambah</a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

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