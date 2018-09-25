<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>
	
	<div class="container">
		
		<!-- BEGIN MAIN CONTENT -->
		
		<div class="row">
			<!-- BEGIN MAIN CONTENT -->
			<div class="col-md-4 col-md-offset-4">
				<div class="content">
					<div class="content-inner sm">
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
										Kembali ke halaman <a href="<?=base_url()?>login/">Login</a>
									</div>
								</form>
							</div>
						</div><!-- /.related-post-grid -->
					</div>
				</div><!-- /.content -->
			</div><!-- /.col-md-8 -->
			<!-- END MAIN CONTENT -->
			
		</div>
		<!-- END MAIN CONTENT -->
		
	</div>
<?php echo $_template["_footer"]?>
<?php echo $_template["_foot"]?>