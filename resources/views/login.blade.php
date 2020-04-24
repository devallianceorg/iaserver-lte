<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bienvenido a IAServer</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('lte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/iCheck/square/blue.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./"><b>IA</b>Server</a>
  </div>
  <!-- /.login-logo -->

  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Credencial de acceso</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="{{ route('login.start') }}" method="post" class="form-horizontal">
      @csrf
      <div class="box-body">

        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" name="name" class="form-control" placeholder="Usuario">
        </div>
        <br>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Contraseña">
        </div>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Ingresar</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>

  @if(session('login.error'))
    <div class="callout callout-danger">
      <h4>Atencion</h4>
      {{ dd(session('login.error')) }}
    </div>
  @endif

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('lte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
