<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		@include('guru.layouts.header')
		@include('guru.layouts.sidebar')
	      @yield('main-content')

		@include('admin.layouts.footer')
	</div>	
</body>
</html>