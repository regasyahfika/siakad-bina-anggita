@extends('admin.layouts.app')

@section('title', 'Wali Murid')

@section('head')
  <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tampil Data Wali Murid
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ route('walimurid.index') }}">Wali Murid</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-body box-profile" style="float: left;">
              <img class="profile-user-img img-responsive img-thumbnail" src="{{ $walimurid->siswa->foto_url }}" alt="User profile picture">
            </div>
            <div class="box-body box-success">
              <table class="table table-bordered">
                <tr>
                  <td><b>Nama Siswa</b></td>
                  <td>{{ $walimurid->siswa->nama }}</td>
                </tr>
                <tr>
                  <td><b>NIS</b></td>
                  <td>{{ $walimurid->siswa->nis }}</td>
                </tr>
                <tr>
                  <td><b>Jenis Kelamin</b></td>
                  <td>{{ $walimurid->siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                  <td><b>Agama</b></td>
                  <td>{{ $walimurid->siswa->agama }}</td>
                </tr>
                <tr>
                  <td><b>Tempat Lahir</b></td>
                  <td>{{ $walimurid->siswa->tempat_lahir }}</td>
                </tr>
                <tr>
                  <td><b>Tanggal Lahir</b></td>
                  <td>{{ date('d F Y', strtotime($walimurid->siswa->tanggal_lahir))  }}</td>
                </tr>
                <tr>
                  <td><b>Alamat</b></td>
                  <td>{{ $walimurid->siswa->alamat }}</td>
                </tr>
                
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-body box-success">
              <table class="table table-bordered">
                <tr>
                  <td><b>Nama Wali Murid</b></td>
                  <td>{{ $walimurid->nama }}</td>
                </tr>
                <tr>
                  <td><b>Pekerjaan</b></td>
                  <td>{{ $walimurid->pekerjaan }}</td>
                </tr>
                <tr>
                  <td><b>Agama</b></td>
                  <td>{{ $walimurid->agama }}</td>
                </tr>
                <tr>
                  <td><b>No Handphone</b></td>
                  <td>{{ $walimurid->telp }}</td>
                </tr>
                <tr>
                  <td><b>Alamat</b></td>
                  <td>{{ $walimurid->siswa->alamat }}</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="{{ route('walimurid.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-undo"></i> Kembali</a>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
