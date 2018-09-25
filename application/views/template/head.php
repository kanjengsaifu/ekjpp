<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="google-translate-customization" content="b90c12aad704fee5-22817121cd30f923-gc8aed59f90f4ecb7-12">
	<title><?=$title?></title>
	<link rel="shortcut icon" href="<?=base_url()?>asset/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	 <!-- Bootstrap -->
    <link href="<?=base_url()?>asset/beeanca/assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- Plugins Stylesheets -->
    <link href="<?=base_url()?>asset/beeanca/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/beeanca/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/beeanca/assets/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/beeanca/assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/beeanca/assets/plugins/image-lightbox/imagelightbox.css" rel="stylesheet">
	<!--<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">-->

	<!-- Theme Stylesheets -->
    <link href="<?=base_url()?>asset/beeanca/assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/beeanca/assets/css/responsive.css" rel="stylesheet">

	<!-- User Color Stylesheets -->
    <!--<link href="<?=base_url()?>asset/beeanca/assets/css/colors/default.css" rel="stylesheet">-->
    <link href="<?=base_url()?>asset/beeanca/assets/css/shortcodes.css" rel="stylesheet">
	<!--<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/buttons.css"/>-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/animate.css"/>
	<link href="<?=base_url()?>asset/css/datepicker3.css" rel="stylesheet">
	<link href="<?=base_url()?>asset/css/jquery.timepicker.css" rel="stylesheet">
	<link href="<?=base_url()?>asset/css/style.css" rel="stylesheet">

	<script src="<?=base_url()?>asset/beeanca/assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>asset/beeanca/assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>asset/beeanca/assets/plugins/masonry.pkgd.min.js"></script>
    <script src="<?=base_url()?>asset/beeanca/assets/plugins/image-lightbox/imagelightbox.min.js"></script>
    <script src="<?=base_url()?>asset/beeanca/assets/plugins/image-lightbox/main.js"></script>
    <script src="<?=base_url()?>asset/beeanca/assets/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>asset/beeanca/assets/js/beeanca.js"></script>
    <script src="<?=base_url()?>asset/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url()?>asset/js/jquery.timepicker.js"></script>
        <!--<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>-->
    <!--<script src="<?=base_url()?>asset/js/bootstrap-datetimepicker.min.js"></script>-->
    <script src="<?=base_url()?>asset/js/script.js"></script>
    <script src="<?=base_url()?>asset/js/jquery.noty.packaged.min.js"></script>
    <script src="<?=base_url()?>asset/js/jquery.number.js"></script>

    <script src="<?=base_url()?>asset/js/fusionchart/fusioncharts.js"></script>
		<script src="<?=base_url()?>asset/js/fusionchart/fusioncharts.charts.js"></script>
    <script src="<?=base_url()?>asset/js/fusionchart/fusioncharts.jqueryplugin.js"></script>

    <!--<script src="<?=base_url()?>asset/js/jquery.autogrow.js"></script>-->

    <script type='text/javascript' src='<?=base_url()?>asset/js/nicEdit.js'></script>
</head>
<body>
	<div id="loading">
		<div class="cssload-thecube">
			<div class="cssload-cube cssload-c1"></div>
			<div class="cssload-cube cssload-c2"></div>
			<div class="cssload-cube cssload-c4"></div>
			<div class="cssload-cube cssload-c3"></div>
		</div>
	</div>

	<header class="header-01 fixed">
		<div class="container-fluid">

			<div class="header-inner">

				<!-- Navbar visibility controls (<800px) -->
				<div class="burger-menu"></div>
				<div class="body-overlay"></div>

				<div class="logo">
					<?php
						if ($this->auth->is_login())
						{
					?>
					<a href="<?=base_url()?>"><img class="img-retina" src="<?=base_url()?>asset/images/header_logo.png" alt="Logo"></a>
					<?php
						}
						else
						{
					?>
					<a href="<?=base_url()?>"><img class="img-retina" src="<?=base_url()?>asset/images/header_logo_mappi.png" alt="Logo"></a>
					<?php
						}
					?>
				</div><!-- /.logo -->
				<?php
					if (!$this->auth->is_login())
					{
				?>
				<div class="search-form">

					<!-- Search form visibility controls -->
					<div class="open-search"></div>
					<div class="close-search"></div>

					<form>
						<button class="btn btn-default btn-search" type="submit"><i class="fa fa-search"></i></button>
						<input type="text" class="form-control" placeholder="Search">
					</form>
				</div><!-- /.search-form -->
				<?php
					}
				?>
			</div><!-- /.header-inner -->

			<div class="nav-menu">

				<div class="close-nav"></div>

				<?=$_menu?>
			</div><!-- /.nav-menu -->
		</div><!-- /.container-fluid -->
	</header>

	<?php
		if ($_controller != "login")
		{
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<div class="content-inner" style="padding-top: 10px; padding-bottom: 10px; margin-bottom: -20px;">
						<div class="post-content">
							<div class="row">
								<div class="col-md-8"><?=$_breadcrumb?></div>
								<div class="col-md-4 text-right">
									<?php echo date("d F Y"); ?>
									<?php echo $info_login;?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		}
	?>
