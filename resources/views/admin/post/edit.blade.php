@extends('admin.layouts.app')

@section('title', 'Form Posting')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Posting
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
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
				<form role="form" action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
	            {{ csrf_field() }}
	            {{ method_field('PATCH') }}
	            
					<div class="box-body">
						<div class="col-lg-6">
							
						    <div class="form-group">
						      <label for="judul">Judul</label>
						      <input type="text" class="form-control" id="judul" name="judul" placeholder="Title" value="{{ $post->judul }}">
						    </div>

						    <div class="form-group">
						      <label for="slug">Slug</label>
						      <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $post->slug }}">
						    </div>

				            <div class="form-group" style="margin-top: 18px;">
								<label>Kategori</label>
								<select class="form-control select2" style="width: 100%;" name="kategori">
								@foreach($kategori as $kate)
									{{-- <option selected="selected">Alabama</option> --}}
									<option value="{{ $kate->id }}"
									@foreach($post->kategori as $postKate)
										@if ($postKate->id == $kate->id)
										selected
										@endif 
									@endforeach
									>{{ $kate->nama }}</option>
								@endforeach
								</select>
							</div>

							<div class="form-group" style="margin-top: 18px;">
				                <label>Select Tag</label>
				                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
				                        style="width: 100%;" name="tag[]">
				                @foreach ($tags as $tag)
									<option value="{{ $tag->id }}"
									@foreach ($post->tags as $postTag)
										@if ($postTag->id == $tag->id)
										selected
										@endif
									@endforeach
									>{{ $tag->nama }}</option>
								@endforeach
				                </select>
				            </div>
						</div>

						<div class="col-lg-6">
							<br>
						    <div class="form-group">
						    	{{-- <div class="pull-right">
							      <label for="image">Image</label>
							      <input type="file" name="image" id="image">
						    	</div> --}}

							    <div class="checkbox pull-left">
							      <label>
							        <input type="checkbox" name="status" value="1" @if ($post->status == 1) {{'checked'}}
							        @endif> Publish
							      </label>
							    </div>
						    </div>
						    <br>

							<div class="form-group" style="margin-top: 18px;">
								<label for="image">Image</label><br>
								<img src="{{ $post->image_url }}" alt="" style="width: 25%;height: 15%; margin-bottom: 10px;">
								<input type="file" name="image" id="image">

							</div>

				            {{-- <div class="form-group" style="margin-top: 18px;">
				                <label>Kategori</label>
				                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
				                        style="width: 100%;" name="kategori[]">
				                @foreach ($kategori as $kate)
										<option value="{{ $kate->id }}" 
									@foreach ($post->kategori as $postKate)
										@if ($postKate->id == $kate->id)
										selected
										@endif
									@endforeach
									>{{ $kate->nama }}</option>
								@endforeach
				                </select>
				            </div> --}}

							

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
						              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $post->konten }}</textarea>
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

<script>
	$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

</script>
<script>
	$(document).ready(function(){
		$('.select2').select2()
		
	});
</script>
@endsection