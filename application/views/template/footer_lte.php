<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
</div>
<footer class="main-footer">
	<div class="pull-right hidden-xs">
	<b>Versi</b> 1.0.0
	</div>
	<strong>Copyright © <?php echo date('Y') ?> <a href="<?php echo base_url() ?>"><?php echo $this->config->item('app_name'); ?> </a>.</strong> All rights
	reserved.
</footer>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);

</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>asset/js/global_function.js"></script>
<script src="<?php echo base_url() ?>asset/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>asset/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>asset/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>asset/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>asset/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- timepicker -->
<script src="<?php echo base_url() ?>asset/js/jquery.timepicker.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>asset/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>asset/AdminLTE/dist/js/app.min.js"></script>

<script src="<?php echo base_url() ?>asset/js/script.js"></script>
<script src="<?php echo base_url() ?>asset/js/jquery.noty.packaged.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/zabuto_calendar/zabuto_calendar.min.js"></script>
<script src="<?=base_url()?>asset/js/jquery.number.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/select2/placeholders.jquery.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/select2/select2.min.js"></script>
<script>
$.fn.datepicker.dates['id-ID'] = {
	days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
	daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
	daysMin: ["Mi", "Si", "Se", "Ra", "Ka", "Ju", "Sa"],
	months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
	monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
	today: "Hari ini",
	clear: "Reset",
	format: "dd/MM/yyyy",
	titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
	weekStart: 0
};
$.fn.datepicker.defaults.language = 'id-ID';
$.fn.datepicker.defaults.format = 'dd-MM-yyyy';

function initDate(){
	$('.date').datepicker().on('changeDate', function(e) {
		var dbAcceptedDate = e.format('yyyy-mm-dd');
		$(this).closest('.date-group').find('.date-value').val(dbAcceptedDate).trigger("change");
	});
}
$(function(){
	initDate();
});
</script>