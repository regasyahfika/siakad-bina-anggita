<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		@include('walimurid.layouts.header')
		@include('walimurid.layouts.sidebar')
	      @yield('main-content')

		@include('admin.layouts.footer')
	</div>	
</body>
</html>