<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

	<div class="container">
		
		<div class="row">
			
			
			<!-- BEGIN MAIN CONTENT -->
			<div class="col-md-8">
				<div class="content">
					
						<div class="content-inner inner-page">
						
							<div class="post-featured-img">
								<a href="images/21.jpg" data-imagelightbox="f"><img src="<?=$this->spmlib->generate_thumbnail_berita($content->thumbnail)?>" alt="Image"></a>
							</div><!-- /.page-featured-img -->
							
							<div class="post-heading">
								<p class="category">
									<span><a href="<?=$this->spmlib->generate_link_berita($content->slug_kategori)?>"><?=$content->nama_kategori?></a></span>
								</p><!-- /.category -->
								<h2 class="post-title"><?=$content->judul?></h2>
								<div class="heading-meta">
									<p class="post-meta">
										<span><a href="#fakelink"><strong><?=$content->nama_user?></strong></a></span>
										<span><?=date("d F Y", strtotime($content->created))?></span>
									</p>
									<!--<p class="share-icons">
										<a href="#fakelink"><i class="fa fa-facebook"></i></a>
										<a href="#fakelink"><i class="fa fa-twitter"></i></a>
										<a href="#fakelink"><i class="fa fa-pinterest-p"></i></a>
										<a href="#fakelink"><i class="fa fa-tumblr"></i></a>
										<a href="#fakelink"><i class="fa fa-google-plus"></i></a>
										<a href="#fakelink"><i class="fa fa-envelope"></i></a>
									</p>-->
								</div><!-- /.heading-meta -->
							</div><!-- /.post-heading -->
		
						
							<p><?=$content->content?></p>
							
						</div><!-- /.content-inner -->	
						
				</div><!-- /.content -->
			</div><!-- /.col-md-8 -->
			<!-- END MAIN CONTENT -->
			
			
			<!-- BEGIN SIDEBAR -->
			<div class="col-md-4">
				<div class="sidebar">
					
					
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
				
				</div><!-- /.sidebar -->
			</div><!-- /.col-md-4 -->
			<!-- END SIDEBAR -->
		
		
		</div><!-- /.row -->
		
	</div>
	
<?php echo $_template["_footer"]?>
<?php echo $_template["_foot"]?>