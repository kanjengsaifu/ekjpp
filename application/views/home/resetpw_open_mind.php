<!DOCTYPE html>
<!-- saved from url=(0058)http://razonartificial.com/themes/openmind/html/index.html -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKJPP</title>
    <!-- CSS -->
    <link href="<?php echo base_url().'asset/openmind/css/bootstrap.min.css'?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url() ?>asset/beeanca/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'asset/openmind/css/animate.min.css'?>" rel="stylesheet" media="screen">

    <link href="<?php echo base_url().'asset/openmind/css/style.css'?>" rel="stylesheet" media="screen" title="default">
    <link href="<?php echo base_url().'asset/openmind/css/color-blue.css'?>" rel="stylesheet" media="screen" title="default">
    <link href="<?php echo base_url().'asset/openmind/css/width-full.css'?>" rel="stylesheet" media="screen" title="default">

    <!-- JS ONLOAD -->
    <script src="<?php echo base_url().'asset/openmind/js/jquery-1.10.2.min.js'?>"></script>
    <script src="<?php echo base_url().'asset/openmind/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url() ?>asset/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url() ?>asset/js/jquery.timepicker.js"></script>
    <script src="<?php echo base_url() ?>asset/js/script.js"></script>
    <script src="<?php echo base_url() ?>asset/js/jquery.noty.packaged.min.js"></script>
</head>
<style>
.carousel-mind {
    background-image: url("<?php echo base_url().'asset/images/back.jpg'?>");
    background-size: cover;
}
</style>
<body style="">
    <div class="boxed animated fadeIn animation-delay-5">

        <header id="header" class="hidden-xs">
            <div class="container">
                <div id="header-title">
                    <img src="<?php echo base_url().'asset/images/header_logo_mappi.png'?>"> 
                </div>
            </div> <!-- container -->
        </header> <!-- header -->

        <nav class="navbar navbar-static-top navbar-mind" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand visible-xs" href="<?php echo base_url()?>">EKJPP <span></span></a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-mind-collapse">
                        <span class="sr-only">Navigasi</span>
                        <i class="fa fa-bars fa-inverse"></i>
                    </button>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-mind-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="<?php echo base_url().'home'?>">Beranda</a>
                            <!-- <ul class="dropdown-menu">
                                <li class="active"><a href="#">Home Option 1</a></li>
                            </ul> -->
                        </li>
                         <li class="dropdown">
                            <a href="<?php echo base_url().'kontak'?>">Kontak</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
                            <div class="dropdown-menu dropdown-login animated fadeInUp">
                                <form id="form-login" method="post" action="#" role="form">
                                    <h4 class="section-title">Login Form</h4>
         
                                    <div class="form-group">
                                        <div class="input-group login-input">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                        </div>
                                        <br>
                                        <div class="input-group login-input">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                        </div>
                                        <br>
                                        <a class="btn btn-info" href="<?php echo base_url() ?>home/lupa_password">Lupa Password</a>
                                        <button type="button" class="btn btn-primary btn-login pull-right">Login</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>      
                            </div>
                        </li>
                    </ul> <!-- nav nabvar-nav -->
                </div><!-- navbar-collapse -->
            </div> <!-- container -->
        </nav> <!-- navbar navbar-default -->

        <section>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel">
                        
                        <div class="panel-body">
                            
                            <h5 class="widget-heading">LUPA PASSWORD</h5>
                            <div class="related-post-grid">
                                <form id="form-lupa-password" method="post" action="#">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" id="email_lupa" placeholder="Email" />
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-block btn-lupa-password">KIRIM</button>
                                    </div>
                                    <div class="form-group text-right">
                                        Kembali ke halaman <a href="<?=base_url()?>">Login</a>
                                    </div>
                                </form>
                            </div><!-- /.related-post-grid -->
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </section>   
        <footer id="footer">
            <p>©  <?php echo date('Y')?> <a href="#">EKJPP</a></p>
        </footer>

    </div> <!-- boxed -->

    <div id="back-top" style="display: block;">
        <a href="#header"><i class="fa fa-chevron-up"></i></a>
    </div>


    <!-- Scripts -->
    <script> var base_url = "<?php echo base_url() ?>"; </script>
    <script src="<?php echo base_url().'asset/openmind/js/app.js'?>"></script>
    <script src="<?php echo base_url().'asset/openmind/js/jquery.mixitup.min.js'?>"></script>

</body>
</html>