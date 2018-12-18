<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?=$title?></h1>
		<ol class="breadcrumb">
			<li><?php echo $_breadcrumb ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="table-responsive">
				<?=$table_menu?>
			</div>
		</div>
	</section>
</div>
<style>
	table{
		border-bottom: 1px solid #ddd;
	}
	table tr{
		border-bottom: 1px solid #ddd;
	}
	table thead tr th{
		padding: 3px;
		padding-left: 10px;
		padding-right: 10px;
	}
	table tbody tr td{
		padding: 3px;
		padding-left: 10px;
		padding-right: 10px;
		font-size: 13px;
	}
</style>
<?php echo $_template["_footer"]?>

<script type="text/javascript">
	$(".menu_checked").change(function(){
		var data 	= $(this).attr("data");
		var value	= $(this).is(":checked");
		
		$.ajax({
			type		: "POST",
			url 		: "<?=base_url()?>ajax/do_change_menu_access/",	
			data		: {
				data 	: data,
				value 	: value
			},
			success		: function (data) {
				
			},
		});
	});
</script>
<?php echo $_template["_foot"]?>