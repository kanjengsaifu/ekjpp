<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

<div class="content-wrapper">
	<section class="content-header">
	    <h1><?php echo $title; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo base_url(); ?>">Home</a></li>
	        <li><a href="<?php echo base_url().$this->router->fetch_class(); ?>">Pekerjaan</a></li>
	        <li class="active"><?php echo $title; ?></li>
	    </ol>
	</section>
	<section class="content">
		<div class="box">
			<div class="box-body">
				<p><?=$message?></p>
				<div class="content-img">
					<img src="<?=base_url()?>asset/beeanca/assets/img/404.png" alt="404 Image">
				</div><!-- /.content-img -->
				<a href="<?=base_url()?>" class="btn btn-main btn-main-primary inner-dashed">HOMEPAGE</a>
			</div>
		</div>
	</section>		
</div>
	
<?php echo $_template["_footer"]?>
<?php echo $_template["_foot"]?>