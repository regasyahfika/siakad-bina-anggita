@extends('admin.layouts.app')

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
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-body box-success">
              <table class="table table-bordered">
                @foreach ($profils as $profil)
                  <tr>
                    <td><b>Username</b></td>
                    <td>{{ $profil->username }}</td>
                  </tr>
                  <tr>
                    <td><b>Email</b></td>
                    <td>{{ $profil->email }}</td>
                  </tr>

              </table>
            </div>
            <div class="box-footer">
              <a href="{{ route('profil.edit', $profil->id) }}" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
            </div>
                @endforeach
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
