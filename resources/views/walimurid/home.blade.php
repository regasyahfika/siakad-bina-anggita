@extends('walimurid.layouts.app')

@section('title', 'Dashboard')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
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
              <i class="fa fa-bullhorn"></i>
              <h3 class="box-title">Pemberitahuan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="callout callout-info">
                <h4>Selamat Datang {{ Auth::user()->nama }}</h4>

                <p>Tersedia Beberapa Menu</p>
                <p>1. Edit Profil</p>
                <p>2. Melihat Ulangan Siswa</p>
                <p>3. Melihat Diagram Perkembangan Siswa</p>
                <p>4. Mencentak Laporan Ulangan Siswa</p>
                <p>5. Ubah Password</p>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->


      </div>
      <!-- /.row -->
    </section>
  </div>

  <!-- /.content-wrapper -->
@endsection