<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>
	
	<div class="container">
		
		<!-- BEGIN MAIN CONTENT -->
		
		<div class="row">
			<!-- BEGIN MAIN CONTENT -->
			<div class="col-md-4 col-md-offset-4">
				<div class="content">
					<div class="content-inner sm">
						<h5 class="widget-heading"><?=$title?></h5>
						<div class="related-post-grid">
							<div class="panel-body">
								<form id="form-ubah-password" method="post" action="#">
									<div class="form-group">
										<label>Password Lama</label>
										<input type="password" class="form-control" name="password1" id="password1" placeholder="Password Lama" />
									</div>
									<div class="form-group">
										<label>Password Baru</label>
										<input type="password" class="form-control" name="password2" id="password2" placeholder="Password Baru" />
									</div>
									<div class="form-group">
										<label>Ulangi Password Baru</label>
										<input type="password" class="form-control" name="password3" id="password3" placeholder="Ulangi Password Baru" />
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary btn-block btn-ubah-password">KIRIM</button>
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