@extends('admin.layouts.app')

@section('title', 'Guru')

@section('head')
  <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Guru
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('guru.index') }}">Guru</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-body box-profile" style="float: left;">
              <img class="profile-user-img img-responsive img-thumbnail" src="{{ $guru->foto_url }}" alt="User profile picture">
            </div>
            <div class="box-body box-success">
              <table class="table table-bordered">
                <tr>
                  <td><b>Nama</b></td>
                  <td>{{ $guru->nama }}</td>
                </tr>
                <tr>
                  <td><b>NIP</b></td>
                  <td>{{ $guru->nip }}</td>
                </tr>
                <tr>
                  <td><b>Jenis Kelamin</b></td>
                  <td>{{ $guru->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                  <td><b>Agama</b></td>
                  <td>{{ $guru->agama }}</td>
                </tr>
                <tr>
                  <td><b>Nomer Handphone</b></td>
                  <td>{{ $guru->notelp }}</td>
                </tr>
                <tr>
                  <td><b>Tempat Lahir</b></td>
                  <td>{{ $guru->tempat_lahir }}</td>
                </tr>
                <tr>
                  <td><b>Tanggal Lahir</b></td>
                  <td>{{ date('d F Y', strtotime($guru->tanggal_lahir))  }}</td>
                </tr>
                <tr>
                  <td><b>Pendidikan</b></td>
                  <td>{{ $guru->pendidikan }}</td>
                </tr>
                <tr>
                  <td><b>jabatan</b></td>
                  <td>{{ $guru->jabatan }}</td>
                </tr>
                <tr>
                  <td><b>Alamat</b></td>
                  <td>{{ $guru->alamat }}</td>
                </tr>
                
                
              </table>
            </div>
            <div class="box-footer">
              <a href="{{ route('guru.index') }}" class="btn btn-sm btn-primary"> Kembali</a>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
