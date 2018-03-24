@extends('guru.layouts.app')

@section('title', 'Siswa')

@section('head')
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('guru.home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

     <div class="box box-success">
        <div class="box-header">
          <div class="row">
            <div class="col-md-6">
              <table class="table table-bordered">
                @foreach ($tahunAkademik as $dataTahun)
                <tr>
                  <td style="width: 20%">Tahun Ajaran</td>
                  <td>{{ $dataTahun->tahun_ajaran }}</td>
                </tr>
                <tr>
                  <td style="width: 20%">Semester</td>
                  <td>{{ $dataTahun->semester }}</td>
                </tr>
                @endforeach
              </table>
            </div>
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
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Jenis Kelamin</th>
                  <th>Tahun Ajaran</th>
                  <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($user as $dataSiswa)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $dataSiswa->siswa->nis }}</td>
                    <td>{{ $dataSiswa->siswa->nama }}</td>
                    <td>{{ $dataSiswa->kelas->nama_kelas }}</td>
                    <td>{{ $dataSiswa->siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $dataSiswa->tahunAkademik->tahun_ajaran }} - {{ $dataSiswa->tahunAkademik->semester == 1 ? 'Ganjil' : 'Genap' }}</td>
                    <td style="text-align: center;">
                      <a href="{{ route('tampil_siswa.show', $dataSiswa->siswa->id_siswa) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Detail Siswa</a>
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