@extends('admin.layouts.app')

@section('title', 'Posting')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Posting
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Posting</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

     <div class="box box-success">
            <div class="box-header">
              <a href="{{ route('post.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            @include('includes.messages')
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Slug</th>
                  <th>Dibuat Tanggal</th>
                  <th style="text-align: center; width: 20%;">Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $post->judul }}</td>
                    <td>{{ $post->kategori->nama }}</td>
                    <td>{{ $post->slug }}</td>
                    {{-- <td style="text-align: center; width: 15%"><img src="{{ asset('image/'. $post->image) }}" alt="" style="width: 25%;height: 15%"></td> --}}
                    {{-- <td style="text-align: center; width: 15%"><img src="{{ $post->image_url }}" alt="" style="width: 25%;height: 15%"></td> --}}
                    <td>{{ $post->created_at->format('d F Y') }}</td>
                    <td style="text-align: center;">
                      <a href="{{ route('post.show', $post->id_posting) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                      
                      <a href="{{ route('post.edit', $post->id_posting) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                      <form action="{{ route('post.destroy',$post->id_posting) }}" method="post" style="display: inline;" onsubmit="return confirm('Kamu yakin ingin menghapus?')">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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