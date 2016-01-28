<?php
$filename = "../templates/static/".$_REQUEST['template'];
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
$heading = $_REQUEST['template'];
$heading = explode("." ,$heading);
$TOP_HEADER='Update '. $heading[0];

?>
<form name="frmadd" method="post" action="index.php?file=t-static_page_add_a">
	<input type="hidden" name="filename" id="filename" value="<?php echo $_REQUEST['template']?>">
	<input type="hidden" name="tStaticPage_temp" id="tStaticPage_temp" value="<?php echo base64_encode($tStaticPage);?>">
	<table width="97%" border="0" class="table-dottedborder" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="37">
				<h1>
					<?php echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER,'Back to Static Page Listing','index.php?file=t-static_page_list'.$tempval);?>
				</h1>
			</td>
		</tr>
		<tr>
			<td>
				<div class="listArea">
					<table width="100%" border="0" id="topsapce" cellpadding="0" cellspacing="0">
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td class="inner-topcurve">
											<div>
												<img src="<?php echo $CFG->wwwroot."/public/images/"?>spacer.gif" />
											</div>
										</td>
									</tr>
									<tr>
										<td class="inner-bodycurve-listing">
											<table width="97%" align="center" border="0" cellspacing="1" cellpadding="3">
												<tr>
													<td>
														<h4 style="padding-bottom: 7px;">
															<table width="100%" border="0" cellspacing="2" cellpadding="2">
																<tr>
																	<td>&raquo; &nbsp;Static Page</td>
																	<td align="right"></td>
																</tr>
															</table>
														</h4>
													</td>
												</tr>
												<tr>
													<td width="100%">
														<table width="100%" border="0" cellpadding="3" cellspacing="1" align=center>
															<tr>
																<td colspan="3" height="500">
																	<span id="html"> <?php
																	include_once($CFG->dirroot. "/lib/components/ckeditor/ckeditor.php");
																	$CKEditor = new CKEditor();
																	$config = array();
																	$config['height']=500;
																	$config['toolbar'] = array(
																	array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike', 'Link', 'Unlink', 'Anchor','rteleft'  ),
																);
																$CKEditor->editor('tStaticPage',$contents,$config);
																?>
																	</span>
																</td>
															</tr>
															<tr>
																<td height="40" colspan="4" align="center">
																	<input type="Image" class="buttonstyle" src="<?php echo ($mode=="Update")?$CFG->wwwroot."/public/images/"."btn-modify.gif":$CFG->wwwroot."/public/images/"."btn-add.gif";?>"
																		style="cursor: hand; border: 0" onClick="return validate(document.frmadd);">
																	<input type="Image" class="buttonstyle" src="<?php echo $CFG->wwwroot."/public/images/"?>btn-cancel.gif" style="cursor: hand; border: 0"
																		onclick="window.location='index.php?file=t-email_template_list';return false;">
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td class="inner-bottcurve">
											<div>
												<img src="<?php echo $CFG->wwwroot."/public/images/"?>spacer.gif" />
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</form>
