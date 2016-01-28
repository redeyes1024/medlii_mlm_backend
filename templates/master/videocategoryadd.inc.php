<?php
include_once($CFG->dirroot . "/lib/classes/" . "application/VideoCategory.Class.php5");


$videocategoryObj = new VideoCategory();
$GeneralObj->getRequestVars();

$section = 'Video Category';
$mode = $_REQUEST['mode'];

if ($mode == "Update") {
	$videocategoryObj->select($iVideoCategoryId);
	$videocategoryObj->getAllVar();
} else {
	$mode = "Add";
}

if ($file != '')
	$link = "index.php?file=" . $file . "&mode=" . $mode . "&listfile=" . $listfile;

$TOP_HEADER = $mode . ' ' . $section;
if ($mode == 'Update')
	$TOP_HEADER .= ' [' . $vCategoryName . ']';
?>
<form name="frmadd" method="post" enctype="multipart/form-data" action="index.php?file=m-videocategoryadd_a">
	<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>">
	<input type="hidden" id="SAMPM" name="SAMPM" value="<?php echo $SAMPM; ?>">
	<input type="hidden" id="EAMPM" name="EAMPM" value="<?php echo $EAMPM; ?>">
	<input type="hidden" name="iSGroupId" id="iSGroupId" value="<?php echo $iSGroupId; ?>">
	<input type="hidden" name="iCompanyId" id="iCompanyId" value="<?php echo $_REQUEST['iCompanyId']; ?>">
	<input type="hidden" name="iVideoCategoryId" id="iVideoCategoryId" value="<?php echo $iVideoCategoryId; ?>">
	<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $vLogo; ?>">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId; ?>">
	<input type="hidden" name="qs" id="qs" value="<?php echo $url_concat; ?>">
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php
					if ($_SESSION["sess_eType"] == "4") {
    echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Video Category Listing', 'index.php?file=VideoCategory&AX=Yes&iCompanyId=' . $iCompanyId . '&iSGroupId=' . $iSGroupId);
} else if ($_SESSION['sess_eType'] == "3") {
    echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Video Category Listing', 'index.php?file=VideoCategory&AX=Yes&iSGroupId=' . $iSGroupId);
} else if ($_SESSION["sess_eType"] == "2") {
    echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Video Category Listing', 'index.php?file=VideoCategory&AX=Yes');
}
?>
				</h1>
			</td>
		</tr>
		<?
		if ($mode == "Update") {
            $class = "class='tab_border'";
            ?>
		<tr>
			<td valign="bottom">
				<?php echo $GeneralObj->DisplayTab('Video', 1); ?>
			</td>
		</tr>
		<? } ?>
		<tr>
			<td>
				<div class="listArea">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<span id="form1">
									<table width="100%" border="0" cellspacing="1" cellpadding="1" <?php echo $class; ?>>
										<tr>
											<td width="100%">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td class="inner-topcurve">
															<div>
																<img src="<?php echo $CFG->wwwroot . "/public/images/" ?>spacer.gif" />
															</div>
														</td>
													</tr>
													<tr>
														<td colspan="3" class="inner-bodycurve-listing">
															<table width="97%" border="0" cellpadding="3" cellspacing="5" align="center">
																<tr>
																	<td colspan="5">
																		<h4>
																			<table width="100%" border="0" cellspacing="2" cellpadding="2">
																				<tr>
																					<td align="left">
																						&raquo; &nbsp;
																						<?php echo $section ?>
																					</td>
																					<td align="right">
																						<div id="custom-location"></div>
																					</td>
																				</tr>
																			</table>
																		</h4>
																	</td>
																</tr>
																<tr>
																	<td width="9%" valign="top" align="left">
																		Category<span class="errormsg"> *</span>
																	</td>
																	<td width="1%" valign="top">:</td>
																	<td width="90%" align="left">
																		<input type="text" lang="*{ANw[ ]}" title="Category" name="vCategoryName" size="25" value="<?php echo $vCategoryName; ?>">
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">
																		Status<span class="errormsg"> </span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<select name="eStatus" id="eStatus">
																			<option <?php echo ($eStatus == "Active") ? "selected" : "" ?> value="Active">Active</option>
																			<option <?php echo ($eStatus == "Inactive") ? "selected" : "" ?> value="Inactive">Inactive</option>
																		</select>
																	</td>
																</tr>
																<tr>
																	<td height="40" style="text-align: left">&nbsp;</td>
																	<td>&nbsp;</td>
																	<td style="text-align: left">
																		<input type="Image" class="buttonstyle" lang="<?php echo $mode ?>"
																			src="<?php echo ($mode == "Update") ? $CFG->wwwroot . "/public/images/" . "btn-modify.gif" : $CFG->wwwroot . "/public/images/" . "btn-add.gif"; ?>" style="cursor: hand; border: 0"
																			onClick="return validate_new(document.frmadd);">
																		<?php
																		if ($_SESSION["sess_eType"] == "4") {
                                                                            echo " <input type='Image' class='buttonstyle' alt='Cancel' src='" . $CFG->wwwroot . "/public/images/btn-cancel.gif' style='cursor:hand;border:0' onclick=\"window.location='index.php?file=VideoCategory&AX=Yes&iCompanyId=" . $iCompanyId . "&iSGroupId=" . $iSGroupId . "';return false;\">";
                                                                        } else if ($_SESSION['sess_eType'] == "3") {
                                                                            echo " <input type='Image' class='buttonstyle' alt='Cancel' src='" . $CFG->wwwroot . "/public/images/btn-cancel.gif' style='cursor:hand;border:0' onclick=\"window.location='index.php?file=VideoCategory&AX=Yes&iSGroupId=" . $iSGroupId . "';return false;\">";
                                                                        } else if ($_SESSION["sess_eType"] == "2") {
                                                                            echo " <input type='Image' class='buttonstyle' alt='Cancel' src='" . $CFG->wwwroot . "/public/images/btn-cancel.gif' style='cursor:hand;border:0' onclick=\"window.location='index.php?file=VideoCategory&AX=Yes';return false;\">";
                                                                        }
                                                                        ?>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td class="inner-bottcurve">
															<div>
																<img src="<?php echo $CFG->wwwroot . "/public/images/" ?>spacer.gif" />
															</div>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</span>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
    $("#eStatus").change(function(){
<?php
if ($mode == 'Update') {
    echo "        if($('#eStatus').val()=='Active'){
                alert('All Related Videos will be Active if You Active this video category.');
            }else if($('#eStatus').val()=='Inactive'){
                alert('All Related Videos will be Inactive if You Inactive this video category.');
            }";
}
?>
    });
</script>
