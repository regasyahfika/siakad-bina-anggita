<!DOCTYPE HTML>
<html>
<head>

    @include('user.layouts.head')
</head>
<body id="page-top">
    
    @include('user.layouts.navbar')
    
    @include('user.layouts.headers')

    @yield('main-content')

    @include('user.layouts.contact')

    @include('user.layouts.footer')
</body>
</html>