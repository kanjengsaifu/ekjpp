<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>
<style>
	.table_custom{
		margin-bottom: 10px;
	}
</style>
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
		<form name="form-klien" method="post">
			<?=$input["id"]?>
			<div class="col-md-6">
				<div class="form-group">
					<label>Nama</label>
					<?=$input["nama"]?>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<?=$input["alamat"]?>
				</div>
				<div class="form-group">
					<label>Provinsi</label>
					<?=$input["id_provinsi"]?>
				</div>
				<div class="form-group">
					<label>Kota</label>
					<div id="box_kota"><?=$input["id_kota"]?></div>
				</div>
				<div class="form-group">
					<label>Kode Pos</label>
					<?=$input["kode_pos"]?>
				</div>
			</div>	
			<div class="col-md-6">
				<div class="form-group">
					<label>Status Kepemilikan</label>
					<?=$input["status_kepemilikan"]?>
				</div>
				<div class="form-group">
					<label>Bidang Usaha</label>
					<?=$input["bidang_usaha"]?>
				</div>
				<?php $id_bidang_usaha = empty($objek_edit->id_bidang_usaha) ? NULL : $objek_edit->id_bidang_usaha; ?>
				<div class="form-group form_bu_lainnya" <?php echo $id_bidang_usaha == 17 ? NULL : 'style="display:none;"' ?>>
					<label>Bidang Usaha Lainnya</label>
					<?=$input["bidang_usaha_lainnya"]?>
				</div>
				<div class="form-group">
					<label>Go Publik</label>
					<div>
						<?php $go_publik = (isset($objek_edit->go_publik) ? $objek_edit->go_publik : NULL); ?>
						<input type="radio" id="go_publik_1" name="go_publik" value="1" <?php echo $go_publik == 1 ? 'checked' : NULL; ?>> Ya
						<input type="radio" id="go_publik_2" name="go_publik" value="0" <?php echo $go_publik == 0 && is_numeric($go_publik) ? 'checked' : NULL; ?>> Tidak
					</div>
				</div>
                <div class="form-group">
					<label>NPWP</label>
					<?=$input["npwp"]?>
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<?=$input["keterangan"]?>
				</div>
				<div class="form-group text-right">
					<button type="button" class="btn btn-primary btn-sm btn-form-edit">SIMPAN</button>
					<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
				</div>
			</div>		
		</form>
	</section>
</div>
<?php echo $_template["_footer"]?>

<script>
	$(document).ready(function(){
		$("#id_kota").prop("disabled", true);
		
		var id_provinsi		= $("#id_provinsi").val();
		
		if(id_provinsi){
			get_location("kota", "box_kota", "id_kota", id_provinsi, $("#id_kota").val());
		}
		$('#bidang_usaha').change(function() {
			var bidang_usaha = $(this).val();
			if ( parseInt(bidang_usaha) === 17 ) {
				$('.form_bu_lainnya').show();
			} else {
				$('.form_bu_lainnya').hide();
			}
		});
	});

	$(".btn-form-edit").click(function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id 				= $("#id").val();
			var nama 			= $("#nama").val();
			var alamat 			= $("#alamat").val();
			var id_provinsi 	= $("#id_provinsi").val();
			var id_kota 		= $("#id_kota").val();
			var kode_pos 		= $("#kode_pos").val();
			var status_kepemilikan 		= $("#status_kepemilikan").val();
			var bidang_usaha 		= $("#bidang_usaha").val();
			var bidang_usaha_lainnya = $("#bidang_usaha_lainnya").val();
			var go_publik = $('input[name="go_publik"]:checked').val();
			var npwp                = $("#npwp").val();var telepon 		= $("#telepon").val();
			var keterangan		= $("#keterangan").val();
			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_debitur_edit/",
				data	: {
					type : "debitur",
					id : id,
					nama : nama,
					alamat : alamat,
					id_provinsi : id_provinsi,
					id_kota : id_kota,
					kode_pos : kode_pos,
					id_status_kepemilikan : status_kepemilikan,
					id_bidang_usaha : bidang_usaha,
					bidang_usaha_lainnya: bidang_usaha_lainnya,
					go_publik : go_publik,
					npwp : npwp,
					keterangan : keterangan
				},
				beforeSend: function(){
		            $(".btn-form-edit").html("Loading...");
		            $(".btn-form-edit").prop("disabled", true);
		        },
				dataType	: "JSON",
				success	: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					
		            $(".btn-form-edit").html("SIMPAN");
		            $(".btn-form-edit").prop("disabled", false);
		            
		            if (data.result.trim() == "success")
		            {
						location = "<?=base_url()?>master/debitur/";
					}
				}
	    	});

		}
	});

	$(".btn-batal").click(function()
	{
		location = "<?=base_url()?>master/debitur/";
	});

</script>

<?php echo $_template["_foot"]?>