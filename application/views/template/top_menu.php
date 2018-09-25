<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title?></title>
  <link rel="shortcut icon" href="<?=base_url()?>asset/images/favicon.ico" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/AdminLTE/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/iCheck/flat/blue.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/datepicker/datepicker3.css">
    <!-- Time Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/zabuto_calendar/zabuto_calendar.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/plugins/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/plugins/select2/select2-bootstrap.min.css">
  <style type="text/css">
  .table-borderless > tbody > tr > td,
  .table-borderless > tbody > tr > th,
  .table-borderless > tfoot > tr > td,
  .table-borderless > tfoot > tr > th,
  .table-borderless > thead > tr > td,
  .table-borderless > thead > tr > th {
      border: none;
      padding: 2px;
  }
  .table-min-sideborder > tbody > tr > td,
  .table-min-sideborder > tbody > tr > th,
  .table-min-sideborder > tfoot > tr > td,
  .table-min-sideborder > tfoot > tr > th,
  .table-min-sideborder > thead > tr > td,
  .table-min-sideborder > thead > tr > th {
      border-right: none;
      border-left: none;
  }
  </style>
  <script>
    var base_url = "<?php echo base_url() ?>";
  </script>
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url() ?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url() ?>asset/js/jquery-ui.min.js"></script>

</head>

<body class="hold-transition skin-blue-light layout-top-nav">
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url() ?>" class="navbar-brand"><b>E</b>KJPP</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
    <!-- Logo -->
    <!-- Header Navbar: style can be found in header.less -->
          <?php 
          $user       = $this->auth->get_data_login();
          $info_login = " | ".$user["nama"]." | ".$user["nama_group"];
          ?>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-power-off"></i><span class="hidden-xs"><?php echo $info_login?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url().'profile'?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url().'logout'?>" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
      </div>
  </header>
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <?php echo isset($content) ? $content : NULL; ?>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
<footer class="main-footer">
  <div class="pull-right hidden-xs">
  <b>Versi</b> 1.0.0
  </div>
  <strong>Copyright © 2016-<?php echo date('Y') ?> <a href="<?php echo base_url() ?>">EJKPP - ASUS </a>.</strong> All rights
  reserved.
</footer>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>asset/js/global_function.js"></script>
<script src="<?php echo base_url() ?>asset/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>asset/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>asset/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>asset/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>asset/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- timepicker -->
<script src="<?php echo base_url() ?>asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>asset/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>asset/AdminLTE/dist/js/app.min.js"></script>

<script src="<?php echo base_url() ?>asset/js/script.js"></script>
<script src="<?php echo base_url() ?>asset/js/jquery.noty.packaged.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/zabuto_calendar/zabuto_calendar.min.js"></script>
<script src="<?=base_url()?>asset/js/jquery.number.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/select2/placeholders.jquery.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/select2/select2.min.js"></script>
</body>
</html>