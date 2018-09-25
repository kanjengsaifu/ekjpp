<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php echo $_template["_head"]?>
<style type="text/css">
tr.selected {
    background: orange;
}
tr td:first-child{
    font-weight: bold;
    width: 25%
}
</style>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?=$title?></h1>
		<ol class="breadcrumb">
			<li><?php echo $_breadcrumb ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="box">

			<div class="box-body table-responsive">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#laporan" class="panel-head panel-entry" aria-controls="entry" role="tab" data-toggle="tab" data-type="">Laporan</a>
                    </li>
                    <li role="presentation">
                        <a href="#objek" class="panel-head panel-tanah" aria-controls="tanah" role="tab" data-toggle="tab" data-type="">Objek</a>
                    </li>
                    <li role="presentation">
                        <a href="#pembanding" class="panel-head panel-tanah" aria-controls="tanah" role="tab" data-toggle="tab" data-type="">Pembanding</a>
                    </li>
                    <li role="presentation">
                        <a href="#tenagakerja" class="panel-head panel-tanah" aria-controls="tanah" role="tab" data-toggle="tab" data-type="">Tenaga Kerja</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" id="laporan" class="tab-pane active">
                    	<table class="table table-bordered">
                    		<tbody>
                    			<?php  foreach ($txn_laporan as $key => $value) {
                                    if (in_array($key, array("created_by"))) continue;
                                    ?>
                    			<tr>
                    				<td>
                    					<span><?php echo ucwords(str_replace("_", " ", $key)) ?></span>
                    				</td>
                    				<td>
                    					<span><?php echo preg_match('/harga|luas|fee/', strtolower($key)) ? number_format($value, 0, ',', '.') : $value ?></span>
                    				</td>
                    			</tr>
                    			<?php } ?>
                    		</tbody>
                    	</table>
                    </div>
                    <div role="tabpanel" id="objek" class="tab-pane">
                    	<table class="table table-bordered">
                    		<tbody>
                                <?php 
                                foreach ($txn_objek[0] as $key => $value) {
                                    if (in_array($key, array("created_by"))) continue;
                                    ?>
                                <tr>
                                    <td>
                                        <span><?php echo ucwords(str_replace("_", " ", $key)) ?></span>
                                    </td>
                                    <?php for ($i=0; $i < count($txn_objek); $i++){ ?>
                                    <td>
                                        <span><?php echo preg_match('/harga|luas|nilai/', $key) ? number_format($txn_objek[$i]->{$key},0,',','.') : $txn_objek[$i]->{$key} ?></span>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                    		</tbody>
                    	</table>
                    </div>
                    <div role="tabpanel" id="pembanding" class="tab-pane">
                    	<table class="table table-bordered">
                    		<tbody>
                                <?php 
                                foreach ($txn_pembanding[0] as $key => $value) {
                                    if (in_array($key, array("created_by"))) continue;
                                    ?>
                    			<tr>
                    				<td>
                    					<span><?php echo ucwords(str_replace("_", " ", $key)) ?></span>
                    				</td>
                                    <?php for ($i=0; $i < count($txn_pembanding); $i++){ ?>
                                    <td>
                                        <span><?php echo preg_match('/harga|luas/', $key) ? number_format($txn_pembanding[$i]->{$key},0,',','.') : $txn_pembanding[$i]->{$key} ?></span>
                                    </td>
                                    <?php } ?>
                    			</tr>
                                <?php } ?>
                    		</tbody>
                    	</table>
                    </div>
                    <div role="tabpanel" id="tenagakerja" class="tab-pane">
                    	<table class="table table-bordered">
                    		<tbody>
                                <?php 
                                foreach ($txn_tenagakerja[0] as $key => $value) {
                                    if (in_array($key, array("created_by"))) continue;
                                    ?>
                                <tr>
                                    <td>
                                        <span><?php echo ucwords(str_replace("_", " ", $key)) ?></span>
                                    </td>
                                    <?php for ($i=0; $i < count($txn_tenagakerja); $i++){ ?>
                                    <td>
                                        <span><?php echo $txn_tenagakerja[$i]->{$key} ?></span>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                    		</tbody>
                    	</table>
                    </div>
                </div>
			</div>

		</div>

	</section>
</div>
<?php echo $_template["_footer"]?>
<script type="text/javascript">
	// var active_id = '';
	// page		= 1;
	// field		= $(".input-field").val();
	// keyword		= $(".input-cari").val();
	// perpage		= $("#perpage").val();
	// type		= "history";
	// update_url	= base_url + "master/jenis_objek_edit/";

 //    function selectrowtable(obj) {
 //        var parentrow = obj.parent().parent();
 //        if (  active_id != obj.val() ) {
 //            $("table tbody tr").removeClass("selected");
 //            parentrow.addClass("selected");
 //            active_id = obj.val();
 //        } else {
 //            parentrow.removeClass("selected");
 //            active_id = "";
 //        }
 //    }
 //    function go_edit_data() {
 //        if ( active_id.length < 1 ) {
 //            alert('Pilih baris data pada tabel yang ingin diubah!');
 //        } else {
 //            document.location = "<?php echo base_url() ?>history/detail/" + active_id;
 //        }
 //    }

	// $(document).ready(function(){	
	// 	$('#btn_export_excel').click(function() {

	// 	});
	// 	get_data(type, page, perpage, field, keyword);


 //        $("table").on( "click", "tr", function () {
 //            var objcheck = $(this).children().find(".selectedrow");
 //            selectrowtable(objcheck);
 //        } );
	// });

</script>

<?php echo $_template["_foot"]?>
