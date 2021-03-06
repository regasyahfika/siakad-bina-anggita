@extends('admin.layouts.app')

@section('title', 'Posting')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
		Posting
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
			<li><a href="{{ route('post.index') }}">Posting</a></li>
			<li class="active">Tambah</li>
		</ol>
    </section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Posting</h3>
					</div>
					<!-- /.box-header -->
					@include('includes.messages')
					<!-- form start -->
					<form role="form" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="box-body">

							<div class="col-lg-6">

								<div class="form-group">
									<label for="judul">Judul</label>
									<input type="text" class="form-control" id="judul" name="judul" placeholder="Title" value="{{ old('judul') }}">
								</div>

								<div class="form-group">
									<label for="slug">Slug</label>
									<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug') }}">
								</div>

								<div class="form-group">
									<label>Kategori</label>
									<select class="form-control select2" style="width: 100%;" name="kategori_id">
										<option disabled="disabled" selected="selected">Pilih Kategori</option>
									@foreach ($kategori as $kate)
										<option value="{{ $kate->id_kategori }}">{{ $kate->nama }}</option>
									@endforeach
									</select>
								</div>
							</div>

							<div class="col-lg-6">
								
								<div class="form-group" style="margin-top: 23px">
					                <div class="btn btn-default btn-file">
					                  	<i class="fa fa-paperclip"></i> Gambar
					                	<input type="file" name="image" id="image">
					                </div>
					                <p class="help-block">Jika tidak ada gambar dapat diabaikan.</p>
					            </div>

								<br>
								
								<div class="checkbox">
				                  <label>
				                    <input type="checkbox" name="status" value="1"> Publish
				                  </label>
				                </div>
								<br>
							</div>
						</div>
						<!-- /.box-body -->

				<!-- /.box -->
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Isi Konten</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							<button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
							title="Collapse">
							<i class="fa fa-minus"></i></button>
						</div>
						<!-- /. tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body pad">
						<textarea name="konten" id="editor1"
						style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('konten') }}</textarea>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-success">Submit</button>
						<a href="{{ route('post.index') }}" class="btn btn-info">Back</a>
					</div>
				</div>
			</form>
		</div>
		<!-- /.box -->

	</div>
	<!-- /.col-->
</div>
<!-- ./row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('footer')
<script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
{{-- <script src="{{ asset('adminlte/bower_components/ckeditor/ckeditor.js') }}"></script> --}}

<script>
	$(function () {
	// select data
	$('.select2').select2()

    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

</script>
{{-- <script>
	$(document).ready(function(){
		$('.select2').select2()
		
	});
</script> --}}
@endsection