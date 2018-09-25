<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div bgcolor="#eeeeee" style="font-family:Arial,Helvetica,sans-serif">
	<table align="center" height="100%" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
		<tbody>
			<tr>
				<td>
					<table width="690" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
						<tbody>
							<tr>
								<td height="10">
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table width="690" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
						<tbody>
							<tr>
								<td colspan="3" height="110" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee" style="padding:0;margin:0;font-size:1;line-height:0">
									<table width="690" align="center" border="0" cellspacing="0" cellpadding="0">
										<tbody>
											<tr>
												<td colspan="3" align="left" valign="middle" style="padding:0;margin:0;font-size:1;line-height:0">
													<img src="<?=$config["mail_header"]->value?>" alt="freelancer" class="CToWUd" style="width: 100%">
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr bgcolor="#ffffff">
								<td width="30">
								</td>
								<td>
									<table width="630" align="center" border="0" cellspacing="0" cellpadding="0">
										<tbody>
											<tr>
												<td colspan="3" width="630" height="50" style="padding:0;margin:0;font-size:1;line-height:0">
												</td>
											</tr>
											<tr>
												<td colspan="3">
													<div style="font-size: 16px; margin-bottom: 20px;">
														<?=$ucapan?>, 
													</div>
													<?=$content?>
												</td>
											</tr>
											<tr>
												<td colspan="3" width="630" height="50" style="padding:0;margin:0;font-size:1;line-height:0">
												</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width="30">
									
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table width="690" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee" style="border-bottom: 1px solid #ccc;">
						<tbody>
							<tr bgcolor="#ffffff">
								<td width="30">
								</td>
								<td>
									<div style="width: 100%; height: 1px; border-bottom: 1px solid #eee; margin: 0px;"></div>
								</td>
								<td width="30">
								</td>
							</tr>
							<tr bgcolor="#ffffff">
								<td width="30">
								</td>
								<td>
									<table width="630" align="center" border="0" cellspacing="0" cellpadding="0">
										<tbody>
											<tr>
												<td colspan="3" width="630" height="20" style="padding:0;margin:0;font-size:1;line-height:0">
												</td>
											</tr>
											<tr>
												<td colspan="3">
													<div style="font-family:Calibri; color:#999;font-size:12px;margin:0; font-weight: normal;">
														<?php
															echo "
														<span style='font-size:18px;color:#013e68;font-weight:bold'>".$config["company_name"]->value."</span><br>
														".$config["company_address"]->value." <br>
														Telp. ".$config["company_phone"]->value." <br>
														Fax. ".$config["company_fax"]->value."<br>
															";
														?>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="3" width="630" height="20" style="padding:0;margin:0;font-size:1;line-height:0">
												</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width="30">
									
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table width="690" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
						<tbody>
							<tr>
								<td height="10">
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>