@extends('guru.layouts.app')

@section('title', 'Profil')

@section('head')
  <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('guru.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            @include('includes.messages')
            <div class="box-body box-profile" style="float: left;">
              <img class="profile-user-img img-responsive img-thumbnail" src="{{ Auth::user()->foto_url }}" alt="User profile picture">
            </div>
            <div class="box-body box-success">
              <table class="table table-bordered">
                
                <tr>
                  <td><b>NIP</b></td>
                  <td>{{ Auth::user()->nip }}</td>
                </tr>
                <tr>
                  <td><b>Nama</b></td>
                  <td>{{ Auth::user()->nama }}</td>
                </tr>
                <tr>
                  <td><b>Email</b></td>
                  <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                  <td><b>Jenis Kelamin</b></td>
                  <td>{{ Auth::user()->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                  <td><b>Agama</b></td>
                  <td>{{ Auth::user()->agama }}</td>
                </tr>
                <tr>
                  <td><b>Nomer Handphone</b></td>
                  <td>{{ Auth::user()->notelp }}</td>
                </tr>
                <tr>
                  <td><b>Tempat Lahir</b></td>
                  <td>{{ Auth::user()->tempat_lahir }}</td>
                </tr>
                <tr>
                  <td><b>Tanggal Lahir</b></td>
                  <td>{{ date('d F Y', strtotime(Auth::user()->tanggal_lahir))  }}</td>
                </tr>
                <tr>
                  <td><b>Pendidikan</b></td>
                  <td>{{ Auth::user()->pendidikan }}</td>
                </tr>
                <tr>
                  <td><b>jabatan</b></td>
                  <td>{{ Auth::user()->jabatan }}</td>
                </tr>
                <tr>
                  <td><b>Alamat</b></td>
                  <td>{{ Auth::user()->alamat }}</td>
                </tr>

              </table>
            </div>
            <div class="box-footer">
              <a href="{{ route('profil_guru.edit', Auth::user()->id_guru) }}" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
