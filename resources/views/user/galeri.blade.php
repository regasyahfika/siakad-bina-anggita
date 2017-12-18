@extends('user.apps')

@section('title', 'SKABA - Sekolah Khusus Autis Bina Anggita Yogyakarta')

@section('head')
<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

<link href="{{ asset('fancybox/dist/jquery.fancybox.min.css') }}" rel="stylesheet">
<script src="{{ asset('fancybox/dist/jquery.fancybox.min.js') }}"></script>
@endsection

@section('tema', 'Galeri')

@section('main-content')
<!-- blog content -->
<section class="bg-light" id="galeri">
  <div class="container">
  	<div class="row">
          <div class="col-lg-12">
            <h5 class="section-heading">Imunisasi MR</h5><br>
          </div>
    </div>
    <div class="row">
    	<div class="col-md-4 col-sm-6 galeri-item">
            <a class="galeri-link" data-toggle="modal" href="{{ asset('image/skaba.jpg') }}" data-fancybox="group1" data-caption="My caption">
              <div class="galeri-hover">
                <div class="galeri-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('image/skaba.jpg') }}" alt="">
            </a>
        </div>
		
        <div class="col-md-4 col-sm-6 galeri-item">
            <a class="galeri-link" data-toggle="modal" href="{{ asset('image/skaba.jpg') }}" data-fancybox="group1" data-caption="My caption">
              <div class="galeri-hover">
                <div class="galeri-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('image/skaba.jpg') }}" alt="">
            </a>
        </div>

        <div class="col-md-4 col-sm-6 galeri-item">
            <a class="galeri-link" data-toggle="modal" href="{{ asset('image/skaba.jpg') }}" data-fancybox="group1" data-caption="My caption">
              <div class="galeri-hover">
                <div class="galeri-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('image/skaba.jpg') }}" alt="">
            </a>
        </div>
    </div><br>
    <!-- /.row -->

    <div class="row">
          <div class="col-lg-12">
            <h5 class="section-heading">Kegiatan Budidaya Jamur</h5><br>
          </div>
    </div>
        <div class="row">
    	<div class="col-md-4 col-sm-6 galeri-item">
            <a class="galeri-link" data-toggle="modal" href="{{ asset('image/skaba.jpg') }}" data-fancybox="group2" data-caption="My caption">
              <div class="galeri-hover">
                <div class="galeri-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('image/skaba.jpg') }}" alt="">
            </a>
        </div>

        <div class="col-md-4 col-sm-6 galeri-item">
            <a class="galeri-link" data-toggle="modal" href="{{ asset('image/skaba.jpg') }}" data-fancybox="group2" data-caption="My caption">
              <div class="galeri-hover">
                <div class="galeri-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('image/skaba.jpg') }}" alt="">
            </a>
        </div>

        <div class="col-md-4 col-sm-6 galeri-item">
            <a class="galeri-link" data-toggle="modal" href="{{ asset('image/skaba.jpg') }}" data-fancybox="group2" data-caption="My caption">
              <div class="galeri-hover">
                <div class="galeri-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('image/skaba.jpg') }}" alt="">
            </a>
        </div>
    </div><br>
	<!-- /.row -->
	
	<div class="row">
          <div class="col-lg-12">
            <h5 class="section-heading">Kunjungan Museum Jogja</h5><br>
          </div>
    </div>
        <div class="row">
    	<div class="col-md-4 col-sm-6 galeri-item">
            <a class="galeri-link" data-toggle="modal" href="{{ asset('image/skaba.jpg') }}" data-fancybox="group3" data-caption="My caption">
              <div class="galeri-hover">
                <div class="galeri-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('image/skaba.jpg') }}" alt="">
            </a>
        </div>

        <div class="col-md-4 col-sm-6 galeri-item">
            <a class="galeri-link" data-toggle="modal" href="{{ asset('image/skaba.jpg') }}" data-fancybox="group3" data-caption="My caption">
              <div class="galeri-hover">
                <div class="galeri-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('image/skaba.jpg') }}" alt="">
            </a>
        </div>

        <div class="col-md-4 col-sm-6 galeri-item">
            <a class="galeri-link" data-toggle="modal" href="{{ asset('image/skaba.jpg') }}" data-fancybox="group3" data-caption="My caption">
              <div class="galeri-hover">
                <div class="galeri-hover-content">
                  <i class="fa fa-eye fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('image/skaba.jpg') }}" alt="">
            </a>
        </div>
    </div><br>
	<!-- /.row -->
  </div>
</section>

@endsection

@section('footer')
		<script type="text/javascript">
		$('[data-fancybox="group1"], [data-fancybox="group2"], [data-fancybox="group3"]').fancybox({
			thumbs : {
				autoStart : true
			},
			protect: true,
			buttons : [
				'zoom',
				'thumbs',
				'close'
			]
		});
	</script>
@endsection