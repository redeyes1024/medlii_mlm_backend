<?php
include_once($CFG->dirroot . "/lib/classes/" . "application/Company.Class.php5");


$companyObj = new Company();
$GeneralObj->getRequestVars();

$section = 'Organization';
$mode = $_REQUEST['mode'];
if ($mode == "Update") {
	$companyObj->select($iCompanyId);
	$companyObj->getAllVar();
} else {
	$mode = "Add";
}

if ($file != '')
	$link = "index.php?file=" . $file . "&mode=" . $mode . "&listfile=" . $listfile;

$TOP_HEADER = $mode . ' ' . $section;
if ($mode == 'Update')
	$TOP_HEADER .= ' [' . $vCompanyName . ']';
?>
<form name="frmadd" method="post" enctype="multipart/form-data" action="index.php?file=m-companyadd_a">
	<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>">
	<input type="hidden" id="SAMPM" name="SAMPM" value="<?php echo $SAMPM; ?>">
	<input type="hidden" id="EAMPM" name="EAMPM" value="<?php echo $EAMPM; ?>">
	<input type="hidden" name="iCompanyId" id="iCompanyId" value="<?php echo $iCompanyId; ?>">
	<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $vLogo; ?>">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId; ?>">
	<input type="hidden" name="qs" id="qs" value="<?php echo $url_concat; ?>">
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Organization Listing', 'index.php?file=Company&AX=Yes'); ?>
				</h1>
			</td>
		</tr>
		<?php
		if ($mode == "Update") {
            $class = "class='tab_border'";

            echo " <tr> <td valign='bottom'>" . $GeneralObj->DisplayTab('Company', 1) . "</td>  </tr> ";
        }
        ?>
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
																	<td width="15%" align="left">
																		Organization Name<span class="errormsg"> *</span>
																	</td>
																	<td width="3%">:</td>
																	<td width="82%" align="left">
																		<input type="text" lang="*" title="Organization Name" name="vCompanyName" size="40" value="<?php echo $vCompanyName; ?>">
																	</td>
																</tr>
																<tr>
																	<td align="left">
																		Organization ID<span class="errormsg"> *</span>
																	</td>
																	<td>:</td>
																	<td align="left">
																		<input type="text" lang="*{AN[ ]}" title="Organization ID" name="vCompanyCodeId" size="40" value="<?php echo $vCompanyCodeId; ?>">
																	</td>
																</tr>
																<tr>
																	<td width="15%" align="left">
																		Email<span class="errormsg"> *</span>
																	</td>
																	<td width="3%">:</td>
																	<td width="82%" align="left">
																		<input type="text" lang="" title="Email" name="vEmail" size="40" value="<?php echo $vEmail; ?>">
																	</td>
																</tr>
																<tr>
																	<td width="15%" valign="top" align="left">
																		Address<span class="errormsg">* </span>
																	</td>
																	<td width="3%" valign="top">:</td>
																	<td width="82%" align="left">
																		<textarea name="vAddress" lang="" id="vAddress" title="Address" rows='5' cols='26'>
																			<?php echo $vAddress; ?>
																		</textarea>
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">
																		Status<span class="errormsg"> </span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<select name="eStatus" id="eStatus">
																			<option <?php echo ($eStatus == "1") ? "selected" : "" ?> value="1">Active</option>
																			<option <?php echo ($eStatus == "0") ? "selected" : "" ?> value="0">Inactive</option>
																		</select>
																	</td>
																</tr>
																<tr>
																	<td width="15%" align="left">
																		Organization GoogleAPI<span class="errormsg"> *</span>
																	</td>
																	<td width="3%">:</td>
																	<td width="82%" align="left">
																		<input type="text" lang="*" title="Organization GoogleAPI" name="vGoogleAPI" size="40" value="<?php echo $vGoogleAPI; ?>">
																	</td>
																</tr>
																<tr>
																	<td width="15%" align="left">
																		Organization GoogleAPIvalue<span class="errormsg"> *</span>
																	</td>
																	<td width="3%">:</td>
																	<td width="82%" align="left">
																		<input type="text" lang="*" title="Organization GoogleAPIvalue" name="vGoogleAPIvalue" size="40" value="<?php echo $vGoogleAPIvalue; ?>">
																	</td>
																</tr>
																<tr>
																	<td height="40" style="text-align: left">&nbsp;</td>
																	<td>&nbsp;</td>
																	<td style="text-align: left">
																		<input type="Image" class="buttonstyle" lang="<?php echo $mode ?>"
																			src="<?php echo ($mode == "Update") ? $CFG->wwwroot . "/public/images/" . "btn-modify.gif" : $CFG->wwwroot . "/public/images/" . "btn-add.gif"; ?>" style="cursor: hand; border: 0"
																			onClick="return validate_new(document.frmadd);">
																		<input type="Image" class="buttonstyle" alt="Cancel" src="<?php echo $CFG->wwwroot . "/public/images/" ?>btn-cancel.gif" style="cursor: hand; border: 0"
																			onclick="window.location='index.php?file=Company&AX=Yes';return false;">
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
    echo "
            if($('#eStatus').val()=='Active'){
                alert('All Related Groups will be Active if You Active this company.');
            }else if($('#eStatus').val()=='Inactive'){
                alert('All Related Groups will be Inactive if You Inactive this company.');
            }";
}
?>
     });
</script>
