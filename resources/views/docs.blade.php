<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('lte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/skins/_all-skins.min.css') }}">

  <!-- Morris -->
  <link rel="stylesheet" href="{{ asset('lte/bower_components/morris.js/morris.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('lte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/iCheck/all.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('lte/bower_components/select2/dist/css/select2.min.css') }}">

  {{-- Custom Styles --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
  <![endif]-->

  {{--
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  --}}
  @yield('endcss')
  <style>
    html, body {
      height: 100%;
    }
  </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition layout-top-nav skin-red">
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">Documentacion <b>IAServer</b>LTE </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>


    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">

        @foreach($namespaces as $namespace => $files)
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              @foreach($files as $file)
                <li @if ($loop->first) class="active" @endif><a href="#tab_{{ Str::slug($file->namespace.$file->className, '-')  }}" data-toggle="tab">{{ $file->className }}</a></li>
              @endforeach
              <li class="pull-left header"><i class="fa fa-file-code-o"></i> {{ $namespace }}</li>
            </ul>
            <div class="tab-content">
              @foreach($files as $file)
                <div class="tab-pane @if ($loop->first) active @endif" id="tab_{{ Str::slug($file->namespace.$file->className, '-')  }}">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">
                        <b>{{ $file->className }}</b> {{ $file->description }}
                      </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <table class="table table-striped">
                        <tbody><tr>
                          <th style="width: 100px">Metodo</th>
                          <th>Parametros</th>
                          <th>Descripcion</th>
                        </tr>
                        @foreach($file->methods as $item)
                          <tr>
                            <td><code>{{  $item->name }}</code></td>
                            <td>
                              <?php $beauty = []; ?>
                              @foreach($item->arguments as $arg)
                                <?php
                                  $beauty[] = "{$arg->type} <b>{$arg->name}</b>";
                                ?>
                              @endforeach
                              {!! collect($beauty)->join(', ')  !!}
                            </td>
                            <td>
                              @if($item->description)
                                  {{ $item->description }}
                                @endif
                            </td>
                          </tr>
                        @endforeach
                        </tbody></table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div>
                <!-- /.tab-pane -->
              @endforeach
            </div>
            <!-- /.tab-content -->
          </div>
        @endforeach
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="{{ asset('lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('lte/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('lte/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('lte/bower_components/morris.js/morris.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('lte/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('lte/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('lte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('lte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('lte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('lte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<!-- iCheck 1.0.1 -->
<script src="{{ asset('lte/plugins/iCheck/icheck.min.js') }}"></script>

<script src="{{ mix('/js/app.js') }}"></script>

<script>
  // Permite seleccionar el ID del TAB con un #ANCHORLINK
  $(function(){
    if ( document.location.hash) {
      $('.nav-tabs a[href="' + document.location.hash + '"]').tab ('show');
    }
  });
</script>

@yield('endjs')
</body>
</html>

