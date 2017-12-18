@if (count($errors) > 0)
	@foreach ($errors->all() as $error)
		<div class="alert alert-warning alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> {{ $error }}</h4>
		</div>

	@endforeach
@endif

@if (session()->has('message'))
	<div class="alert alert-success alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <h4><i class="icon fa fa-check"></i>{{ session('message') }} </h4>
	</div>

@endif