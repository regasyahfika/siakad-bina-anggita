@extends('admin.layouts.app')

@section('title', 'Siswa')

@section('head')
  <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('siswa.index') }}">Siswa</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-body box-profile" style="float: left;">
              <img class="profile-user-img img-responsive img-thumbnail" src="{{ $siswa->foto_url }}" alt="User profile picture">
            </div>
            <div class="box-body box-success">
              <table class="table table-bordered">
                <tr>
                  <td><b>Nama</b></td>
                  <td>{{ $siswa->nama }}</td>
                </tr>
                <tr>
                  <td><b>NIS</b></td>
                  <td>{{ $siswa->nis }}</td>
                </tr>
                <tr>
                  <td><b>Jenis Kelamin</b></td>
                  <td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                  <td><b>Agama</b></td>
                  <td>{{ $siswa->agama }}</td>
                </tr>
                <tr>
                  <td><b>Tempat Lahir</b></td>
                  <td>{{ $siswa->tempat_lahir }}</td>
                </tr>
                <tr>
                  <td><b>Tanggal Lahir</b></td>
                  <td>{{ date('d F Y', strtotime($siswa->tanggal_lahir))  }}</td>
                </tr>
                <tr>
                  <td><b>Alamat</b></td>
                  <td>{{ $siswa->alamat }}</td>
                </tr>
                
                
              </table>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
