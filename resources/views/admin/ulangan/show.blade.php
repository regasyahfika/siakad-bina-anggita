@extends('admin.layouts.app')

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
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
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
              
              <a href="{{ route('ulangansiswa.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
              <a href="{{ route('ulangansiswa.index') }}" class="btn btn-sm btn-info"><i class="fa fa-undo"></i> Kembali</a>

              {{-- <div class="box-tools pull-right">
                <a href="{{ route('ulangansiswa.export', ['tahun' => $tahun->id_tahun]) }}" class="btn btn-sm btn-warning"><i class="fa fa-download"></i> Export</a>
              </div> --}}

              <form class="form-horizontal">
                <div class="box-body">            
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="kelas_id">
                        <option selected="selected" disabled>Pilih kelas</option>
                        @foreach ($kelas as $dataKelas)
                        <option value="{{ $dataKelas->id_kelas }}">{{ $dataKelas->nama_kelas }}</option>
                          
                        @endforeach
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-success">Filter</button>
                    </div>
                  </div>
                </div>
              </form>
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
                  <th>Tipe Ulangan</th>
                  <th>Mata Pelajaran</th>
                  <th>Materi</th>
                  <th>Nilai</th>
                  <th>Tanggal</th>
                  <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($dataUlangan as $ulangan)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $ulangan->siswa->nama }}</td>
                    <td>{{ $ulangan->guru->nama }}</td>
                    <td>{{ $ulangan->kelas->nama_kelas }}</td>
                    <td>{{ $ulangan->tipe }}</td>
                    <td>{{ $ulangan->mapel->nama_mapel }}</td>
                    <td>{{ $ulangan->materi }}</td>
                    <td>{{ $ulangan->nilai }}</td>
                    <td>{{ date('d-m-Y', strtotime($ulangan->tanggal)) }}</td>
                    <td style="text-align: center;">
                      <a href="{{ route('ulangansiswa.edit', $ulangan->id_harian) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                      <form action="{{ route('ulangansiswa.destroy',$ulangan->id_harian) }}" method="post" style="display: inline;" onsubmit="return confirm('Kamu yakin ingin menghapus?')">
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