<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

	<div class="container">
		<div class="row">
			<!-- BEGIN MAIN CONTENT -->
			<div class="col-md-8">
				<div class="content">
					
					<!-- BEGIN POST GRID -->
					<!--<div class="archive-list post-grid">-->
						<div class="content-inner sm">
							<h5 class="widget-heading"><?=strtoupper($title)?></h5>
							<div class="related-post-grid">
								
							</div><!-- /.related-post-grid -->
						</div>
					<!--</div><!-- /.archive-list post-grid -->
					<!-- END POST GRID -->
					
					
				</div><!-- /.content -->
			</div><!-- /.col-md-8 -->
			<!-- END MAIN CONTENT -->
			
			
			<!-- BEGIN SIDEBAR -->
			<div class="col-md-4">
				<div class="sidebar">
					
					<!-- BEGIN CATEGORY LIST WIDGET -->
					<div class="widget">
						<h5 class="widget-heading">Categories</h5>
						<ul class="widget-text-list">
							<?php 
								foreach ($kategori as $a => $item_kategori)
								{
									echo '<li><a href="'.$item_kategori["link"].'">'.$item_kategori["label"].'</a><span>'.$item_kategori["count_berita"].'</span></li>';
								}
							?>
						</ul><!-- /.widget-text-list -->
					</div><!-- /.widget -->
					<!-- END CATEGORY LIST WIDGET -->
					
					
				</div><!-- /.sidebar -->
			</div><!-- /.col-md-4 -->
			<!-- END SIDEBAR -->
		</div>
	</div>
	
<?php echo $_template["_footer"]?>

<script type="text/javascript">
	$(document).ready(function(){
		get_article(0);
	});
	
	function get_article(page)
	{
		$.ajax({
			type	: "Get",
			url 	: "<?=base_url()?>home/get_berita_grid/",
			data	: {
				kategori : "<?=$content->slug?>",
				page : page,
				perpage : 9
			},
			success	: function (data) {
				$(".related-post-grid").html(data);
			},
		});
	}
</script>

<?php echo $_template["_foot"]?>