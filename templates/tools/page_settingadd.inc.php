<?php  include_once($CFG->dirroot. "/lib/classes/application/PageSettings.Class.php5");
$pageObj = new PageSettings();
$GeneralObj->getRequestVars();

$section = 'Page Setting';

if($mode == "Update"){
	$pageObj->select($iPageId);
	$pageObj->getAllVar();
	$fp = @fopen($site_path.$vFilePath.$vFileName, 'r');
	if($fp) {
		$tContents = @fread($fp, filesize($site_path.$vFilePath.$vFileName) );
	} else {
		//echo 'Not opened';
	}
	@fclose($fp);
}
else{
	$mode = "Add";
	$dAddedDate = date('Y-m-d H:i:s');
}

if($file != '') {
	$link = "index.php?file=".$file."&mode=".$mode."&listfile=".$listfile;
}
$TOP_HEADER = $mode.' '.$section;
if($mode=='Update') {
	$TOP_HEADER .= ' ['.$vPageTitle.' ]';
}
?>
<form name="frmadd" method="post" action="index.php?file=t-page_settingadd_a" onsubmit="return validate_new(this);">
	<input type="hidden" name="mode" id="mode" value="<?php echo $mode;?>">
	<input type="hidden" name="iPageId" id="iPageId" value="<?php echo $iPageId; ?>" />
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php  echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Page Setting List', 'index.php?file=Pagesetting&AX=Yes');?>
				</h1>
			</td>
		</tr>
		<tr>
			<td>
				<div class="listArea">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table width="100%" border="0" cellspacing="1" cellpadding="1" <?php echo $class;?>>
									<tr>
										<td width="100%">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td class="inner-topcurve">
														<div>
															<img src="<?php echo $CFG->wwwroot."/public/images/"?>spacer.gif" />
														</div>
													</td>
												</tr>
												<tr>
													<td colspan="3" class="inner-bodycurve-listing">
														<table width="97%" border="0" cellpadding="3" cellspacing="1" align="center">
															<tr>
																<td colspan="5">
																	<h4>
																		<table width="100%" border="0" cellspacing="2" cellpadding="2">
																			<tr>
																				<td>
																					&raquo; &nbsp;
																					<?php echo $section?>
																				</td>
																				<td align="right"></td>
																			</tr>
																		</table>
																	</h4>
																</td>
															</tr>
															<tr>
																<td width="8%">&nbsp;</td>
																<td width="12%">
																	Page Title<span class="errormsg"> *</span>
																</td>
																<td width="3%">:</td>
																<td width="77%">
																	<input type="text" lang="*" title="Page Title" name="vPageTitle" size="40" value="<?php echo $vPageTitle;?>">
																</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td>
																	Page Code<span class="errormsg"> *</span>
																</td>
																<td>:</td>
																<td>
																	<input type="text" lang="*" title="Page Code" name="vPageCode" size="40" value="<?php echo $vPageCode;?>">
																</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td>Meta Title</td>
																<td>:</td>
																<td>
																	<input type="text" name="tMetaTitle" size="40" value="<?php echo $tMetaTitle;?>">
																</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td>Meta Keyword</td>
																<td>:</td>
																<td>
																	<input type="text" name="tMetaKeyword" size="40" value="<?php echo $tMetaKeyword;?>">
																</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td>Meta Description</td>
																<td>:</td>
																<td>
																	<textarea name="tMetaDesc" id="tMetaDesc" cols="36">
																		<?php echo $tMetaDesc?>
																	</textarea>
																</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td>
																	File name<span class="errormsg"> *</span>
																</td>
																<td>:</td>
																<td>
																	<input type="text" lang="*" title="File name" name="vFileName" size="40" value="<?php echo $vFileName?>">
																	eg. test.tpl
																</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td>Order By</td>
																<td>:</td>
																<td>
																	<input type="text" name="iOrderBy" size="40" value="<?php echo $iOrderBy?>">
																</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td valign="top">Message</td>
																<td valign="top">:</td>
																<td height="300">
																	<span id="html"> <?php
																	include_once($CFG->dirroot. "/lib/components/ckeditor/ckeditor.php");
																	$CKEditor = new CKEditor();
																	$CKEditor->editor('tContents',$tContents,$config);
																	?>
																	</span>
																</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td>Status</td>
																<td>:</td>
																<td>
																	<select name="eStatus" id="eStatus">
																		<option value="Active" <?if($eStatus == 'Active') echo 'selected'; ?>>Active</option>
																		<option value="Inactive" <?if($eStatus == 'Inactive') echo 'selected'; ?>>Inactive</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td>&nbsp;</td>
																<td height="40" style="text-align: left">&nbsp;</td>
																<td>&nbsp;</td>
																<td style="text-align: left">
																	<input type="Image" class="buttonstyle" lang="<?php echo $mode?>"
																		src="<?php echo ($mode=="Update")?$CFG->wwwroot."/public/images/"."btn-modify.gif":$CFG->wwwroot."/public/images/"."btn-add.gif";?>" style="cursor: hand; border: 0"
																		onClick="return validate_new(document.frmadd);">
																	<input type="Image" class="buttonstyle" src="<?php echo $CFG->wwwroot."/public/images/"?>btn-reset.gif" onClick="reset();return false;" style="cursor: hand; border: 0">
																	<input type="Image" class="buttonstyle" alt="Cancel" src="<?php echo $CFG->wwwroot."/public/images/"?>btn-cancel.gif" style="cursor: hand; border: 0"
																		onclick="window.location='index.php?file=Pagesetting&AX=Yes';return false;">
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
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</form>
