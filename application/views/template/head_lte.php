<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title?></title>
<link rel="shortcut icon" href="<?=base_url()?>asset/images/favicon.ico" type="image/x-icon">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/AdminLTE/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/AdminLTE/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/iCheck/flat/blue.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/datepicker/datepicker3.css">
<link href="<?php echo base_url() ?>asset/css/jquery.timepicker.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/plugins/zabuto_calendar/zabuto_calendar.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/plugins/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/plugins/select2/select2-bootstrap.min.css">
<script>
var base_url = "<?php echo base_url() ?>";
</script>

<script src="<?php echo base_url() ?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/jQueryUI/jquery-ui.min.js"></script>
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
<header class="main-header">
<a href="<?php echo base_url() ?>" class="logo">
<span class="logo-mini"><?php echo $this->config->item('app_name'); ?></span>
<span class="logo-lg"><?php echo $this->config->item('app_name'); ?></span>
</a>
<nav class="navbar navbar-static-top">
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Navigasi</span>
</a>

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
</nav>
</header>
<aside class="main-sidebar">
<section class="sidebar">
<div class="user-panel">
<div class="image">
<img style="background-color:#1c1c8e" src="<?=base_url()?>asset/images/header_logo.png" alt="EKJPP">
</div>
</div>
<?php echo $_menu ?>
</section>
</aside>
