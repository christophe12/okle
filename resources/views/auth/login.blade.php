<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Okle | Admin | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/css/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
        <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Ok乐</b> Welcomes You</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        {{ Form::open(array('url' => '/login')) }}
           <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
             {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Your Email']) }}
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
             @if ($errors->has('email'))
             <span class="help-block">
                 {{ $errors->first('email') }}
             </span>
             @endif
           </div>
           <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
               {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Your Password']) }}
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
               @if($errors->has('password'))
               <span class="help-block">
                   <strong>{{ $errors->first('password') }}</strong>
               </span>
               @endif
           </div>
           <div class="row">
            <div class="col-xs-8">
              <div class="checkbox">
                <label>
                  {{ Form::checkbox('remember') }} Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              {{ Form::submit('Sign In',['class' => 'btn btn-primary btn-block btn-flat']) }}
            </div><!-- /.col -->
          </div>
        {{ Form::close() }}
      </div>
    </div>
    <script src="/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
