<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

	<div class="container">
		<div class="slideshow-featured" id="featured-post-slideshow">
			<div class="item">
				<a href="#fakelink"><img src="<?=base_url()?>asset/images/slider/2.jpg" alt="Image"></a>
			</div>
			<!--<div class="item">
				<a href="#fakelink"><img src="<?=base_url()?>asset/images/slider/slider_IMG-20160423-WA0018.jpg" alt="Image"></a>
			</div>
			<div class="item format-post audio-post">
				<a href="#fakelink"><img src="<?=base_url()?>asset/images/slider/slider_MOU_RISM.jpg" alt="Image"></a>
			</div>
			<div class="item">
				<a href="#fakelink"><img src="<?=base_url()?>asset/images/slider/slider_Munas_3.jpg" alt="Image"></a>
			</div>-->
			<div class="item">
				<a href="#fakelink"><img src="<?=base_url()?>asset/images/slider/slider_Screen_Shot_2016-04-14_at_3.26.40_PM.jpg" alt="Image"></a>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-md-8">
				<div class="content">
					<div class="archive-list default-list list-left-img list_berita"></div>
					<nav class="centered-numbering-pagination"></nav>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget">
						<h5 class="widget-heading">LUPA PASSWORD</h5>
						<div class="related-post-grid">
							<div class="panel-body">
								<form id="form-lupa-password" method="post" action="#">
									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" name="email" id="email" placeholder="Email" />
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary btn-block btn-lupa-password">KIRIM</button>
									</div>
									<div class="form-group text-right">
										Kembali ke halaman <a href="<?=base_url()?>">Login</a>
									</div>
								</form>
							</div>
						</div><!-- /.related-post-grid -->
					</div>
				</div>
				<div class="sidebar">
					<div class="widget">
						<!--<h5 class="widget-heading">On Going Project</h5>
						<table class="table ongoing" style="width: 100%; font-size: 12px;">
							<thead>
								<th>Klien</th>
								<th>Project</th>
								<th>Step</th>
							</thead>
							<tbody></tbody>
						</table>-->
					</div>
					
					<div class="widget">
						<!--<h5 class="widget-heading">PERSPECTIVE PROJECT</h5>	
						<table class="table perspective" style="width: 100%; font-size: 12px;">
							<thead>
								<th>Klien</th>
								<th>Project</th>
								<th>Step</th>
							</thead>
							<tbody></tbody>
						</table>-->
					</div>
					
					<div class="widget">
						<h5 class="widget-heading">Kategori Berita</h5>
						<ul class="widget-text-list">
							<?php 
								foreach ($kategori as $a => $item_kategori)
								{
									echo '<li><a href="'.$item_kategori["link"].'">'.$item_kategori["label"].'</a><span>'.$item_kategori["count_berita"].'</span></li>';
								}
							?>
						</ul><!-- /.widget-text-list -->
					</div><!-- /.widget -->
					
				</div>
			</div>
		</div>
	</div>

<?php echo $_template["_footer"]?>

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
			url 		: "<?=base_url()?>home/get_berita_list/",
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
			url 		: "<?=base_url()?>home/get_project/",
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

<?php echo $_template["_foot"]?>