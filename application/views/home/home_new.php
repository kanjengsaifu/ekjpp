<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="google-translate-customization" content="b90c12aad704fee5-22817121cd30f923-gc8aed59f90f4ecb7-12">
        <title>Beranda :: Sistem Pengendalian Mutu</title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>asset/images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="<?php echo base_url() ?>asset/beeanca/assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Plugins Stylesheets -->
        <link href="<?php echo base_url() ?>asset/beeanca/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>asset/beeanca/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>asset/beeanca/assets/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>asset/beeanca/assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>asset/beeanca/assets/plugins/image-lightbox/imagelightbox.css" rel="stylesheet">
        <!--<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">-->
        <!-- Theme Stylesheets -->
        <link href="<?php echo base_url() ?>asset/beeanca/assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>asset/beeanca/assets/css/responsive.css" rel="stylesheet">
        <!-- User Color Stylesheets -->
        <!--<link href="<?php echo base_url() ?>asset/beeanca/assets/css/colors/default.css" rel="stylesheet">-->
        <link href="<?php echo base_url() ?>asset/beeanca/assets/css/shortcodes.css" rel="stylesheet">
        <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/buttons.css"/>-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/animate.css"/>
        <link href="<?php echo base_url() ?>asset/css/datepicker3.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>asset/css/jquery.timepicker.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>asset/css/style.css" rel="stylesheet">
        <script src="<?php echo base_url() ?>asset/beeanca/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>asset/beeanca/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>asset/beeanca/assets/plugins/masonry.pkgd.min.js"></script>
        <script src="<?php echo base_url() ?>asset/beeanca/assets/plugins/image-lightbox/imagelightbox.min.js"></script>
        <script src="<?php echo base_url() ?>asset/beeanca/assets/plugins/image-lightbox/main.js"></script>
        <script src="<?php echo base_url() ?>asset/beeanca/assets/plugins/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo base_url() ?>asset/beeanca/assets/js/beeanca.js"></script>
        <script src="<?php echo base_url() ?>asset/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url() ?>asset/js/jquery.timepicker.js"></script>
        <!--<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
            <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>-->
        <!--<script src="<?php echo base_url() ?>asset/js/bootstrap-datetimepicker.min.js"></script>-->
        <script src="<?php echo base_url() ?>asset/js/script.js"></script>
        <script src="<?php echo base_url() ?>asset/js/jquery.noty.packaged.min.js"></script>
        <script src="<?php echo base_url() ?>asset/js/jquery.number.js"></script>
        <script src="<?php echo base_url() ?>asset/js/fusionchart/fusioncharts.js"></script>
        <script src="<?php echo base_url() ?>asset/js/fusionchart/fusioncharts.charts.js"></script>
        <script src="<?php echo base_url() ?>asset/js/fusionchart/fusioncharts.jqueryplugin.js"></script>
        <!--<script src="<?php echo base_url() ?>asset/js/jquery.autogrow.js"></script>-->
        <script type='text/javascript' src='<?php echo base_url() ?>asset/js/nicEdit.js'></script>
        <style type="text/css">
        body{
            background-image: url(<?php echo base_url() ?>resources/images/bghexagon.jpg);
            background-size: cover;
        }
        .container-fluid{
            background: rgb(49, 149, 181)
        }
        </style>
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
                        <a href="<?php echo base_url() ?>"><img class="img-retina" src="<?php echo base_url() ?>asset/images/header_logo_mappi.png" alt="Logo"></a>
                    </div>
                    <!-- /.logo -->
                    <div class="search-form">
                        <!-- Search form visibility controls -->
                        <div class="open-search"></div>
                        <div class="close-search"></div>
                        <form>
                            <button class="btn btn-default btn-search" type="submit"><i class="fa fa-search"></i></button>
                            <input type="text" class="form-control" placeholder="Search">
                        </form>
                    </div>
                    <!-- /.search-form -->
                </div>
                <!-- /.header-inner -->
                <div class="nav-menu">
                    <div class="close-nav"></div>
                    <ul class='main-nav'>
                        <li class='active'><a href='<?php echo base_url() ?>home/'>Beranda</a></li>
                        <!-- <li ><a href='<?php echo base_url() ?>berita/'>Berita</a></li> -->
                        <li ><a href='<?php echo base_url() ?>kontak/'>Kontak</a></li>
                    </ul>
                </div>
                <!-- /.nav-menu -->
            </div>
            <!-- /.container-fluid -->
        </header>

        <div class="container">
            <div class="row">
            	<div class="col-md-4 col-sm-3"></div>
            	<div class="col-md-4 col-sm-6">
                    <div class="panel">
                        <div class="panel-body">
                            <form id="form-login" method="post" action="#">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-block btn-login">LOGIN</button>
                                </div>
                                <div class="form-group text-right">
                                    <a href="<?php echo base_url() ?>home/lupa_password">Lupa Password</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            	<div class="col-md-4 col-sm-3"></div>
            </div>
        </div>

        <!--
        <footer>
            <div class="link-terkait">

            </div>
            <div class="footer-instagram">
                <div class="heading">
                </div>
            </div>
            <div class="footer-copy">
                <div class="container-fluid2">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="footer-copyright">
                                Copyright 2016.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="footer-menu">
                                <li><a href="<?php echo base_url() ?>">Home</a></li>
                                <li><a href="<?php echo base_url() ?>berita/">Berita</a></li>
                                <li><a href="<?php echo base_url() ?>kontak/">Countact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-back-top back-top"><i class="fa fa-chevron-up"></i>top</div>
            </div>
        </footer>
	    -->
	    
        <script>
            var base_url = "<?php echo base_url() ?>";
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
            	get_article(0, true);
            	get_project(".ongoing", 0);
            	get_project(".perspective", 1);
            });
            
            $(document).on("click", ".btn-paging", function() {
            	var page	= $(this).attr("data");
            	
            	get_article(page-1, false);
            });
            
            function get_article(page, first)
            {
            	$.ajax({
            		type		: "Get",
            		url 		: "<?php echo base_url() ?>home/get_berita_list/",
            		dataType	: "JSON",	
            		data		: {
            			page : page
            		},
            		success		: function (data) {
            			$(".list_berita").html(data.list);
            			$(".centered-numbering-pagination").html(data.paging);
            			!(first) ? $('html, body').animate({scrollTop: $(".list_berita").offset().top}, 2000) : "";
            			
            		},
            	});
            }
            
            function get_project(target, status)
            {
            	$.ajax({
            		type		: "Get",
            		url 		: "<?php echo base_url() ?>home/get_project/",
            		dataType	: "JSON",	
            		data		: {
            			status : status
            		},
            		beforeSend: function() {
            			$(target).find("tbody").html("<tr><td colspan='3' align='center'><img src='" + base_url + "asset/images/loading.gif' style='width: 100px;' /></td></tr>");
            		},
            		success		: function (data) {
            			$(target).find("tbody").html("");
            			var row = "";
            			$.each(data, function(i, item) 
            			{
            				row	= "<tr>";
            				$.each(item, function(j, item1) 
            				{
            					row	+= "<td>" + item1 + "</td>";
            				});
            				
            				row	+= "</tr>";
            				$(target).find("tbody").append(row);
            			});
            			
            			if (data.length == 0)
            			{
            				row = "<tr><td colspan='3'>Tidak ada Data Pekerjaan</td></tr>";
            				$(target).find("tbody").append(row);
            			}
            			
            			
            		},
            	});
            }
        </script>
    </body>
</html>