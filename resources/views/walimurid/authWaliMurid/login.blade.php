@extends('admin.layouts.laylogin')

@section('title', 'Login')

@section('head')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/square/blue.css') }}">
@endsection

@section('login-content')

<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('image/bina.png') }}" alt=""><br>
    <a href="{{ url('/') }}"><b> Sekolah Khusus Autis Bina Anggita</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login</p>

    <form method="POST" action="{{ route('walimurid.login.submit') }}">
        {{ csrf_field() }}
      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><span class="fa fa-sign-in"></span> Login</button>
        </div>
        <!-- /.col -->
        {{-- <div class="col-xs-4">
          <a href="{{ route('walimurid.password.request') }}" class="btn btn-danger"><span class="fa fa-eye-slash"></span> Lupa Password</a>
        </div> --}}
        <!-- /.col -->
      </div>
{{--       <div class="row">
        <div class="col-xs-4">
          <div class="checkbox icheck">
            <a href="{{ route('admin.password.request') }}" class="btn btn-danger">Lupa Password</a>
          </div>
        </div>
        <div class="col-xs-4" style="margin-top: 10px;">
            <a href="{{ route('register') }}" class="btn btn-primary btn-block btn-flat">Register</a>
        </div>
      </div> --}}
    </form>

    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<div class="login-box">
  <div class="login-logo" style="font-size: 15px; color: #fff;">
    <p><strong>Copyright &copy; 2018<br> SKABA - Sekolah Khusus Autis Bina Anggita.</strong></p>
  </div>
</div>
@endsection

@section('footer')
<script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
@endsection


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login Admin</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}