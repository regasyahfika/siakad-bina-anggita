@extends('walimurid.layouts.app')

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
        <li><a href="{{ route('walimurid.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-body box-profile" style="float: left;">
            </div>
            <div class="box-body box-success">
              <table class="table table-bordered">
                <tr>
                  <td><b>Username</b></td>
                  <td>{{ Auth::user()->username }}</td>
                </tr>
                <tr>
                  <td><b>Nama</b></td>
                  <td>{{ Auth::user()->nama }}</td>
                </tr>
                <tr>
                  <td><b>Pekerjaan</b></td>
                  <td>{{ Auth::user()->pekerjaan }}</td>
                </tr>
                <tr>
                  <td><b>Agama</b></td>
                  <td>{{ Auth::user()->agama }}</td>
                </tr>
                <tr>
                  <td><b>Nomer Handphone</b></td>
                  <td>{{ Auth::user()->telp }}</td>
                </tr>
                <tr>
                  <td><b>Alamat</b></td>
                  <td>{{ Auth::user()->alamat }}</td>
                </tr>

              </table>
            </div>
            <div class="box-footer">
              <a href="{{ route('profil_wali.edit', Auth::user()->id_walimurid) }}" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
