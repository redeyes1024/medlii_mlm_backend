<?php
include_once($CFG->dirroot . "/lib/classes/" . "application/SubGroup.Class.php5");
include_once($CFG->dirroot . "/lib/classes/" . "application/Company.Class.php5");


$subgroupObj = new SubGroup();
$GeneralObj->getRequestVars();
$iCompanyId = $_REQUEST['iCompanyId'];

$section = 'Group';

if (!is_null($_REQUEST['mode']) && $mode == "Update") {
	$mode = $_REQUEST['mode'];
	$subgroupObj->select($iSGroupId);
	$subgroupObj->getAllVar();
} else {

	$mode = "Add";
	$subgroupObj->getAllVar();
}


if ($file != '')
	$link = "index.php?file=" . $file . "&mode=" . $mode . "&listfile=" . $listfile;

$TOP_HEADER = $mode . ' ' . $section;
if ($mode == 'Update')
	$TOP_HEADER .= "";
?>
<form name="frmadd" method="post" enctype="multipart/form-data" action="index.php?file=m-subgroupadd_a">
	<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>">
	<input type="hidden" id="SAMPM" name="SAMPM" value="<?php echo $SAMPM; ?>">
	<input type="hidden" id="EAMPM" name="EAMPM" value="<?php echo $EAMPM; ?>">
	<input type="hidden" name="iCompanyId" id="iCompanyId" value="<?php echo $iCompanyId; ?>">
	<input type="hidden" name="iSGroupId" id="iSGroupId" value="<?php echo $iSGroupId; ?>">
	<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $vLogo; ?>">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId; ?>">
	<input type="hidden" name="qs" id="qs" value="<?php echo $url_concat; ?>">
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php
					if ($_SESSION["sess_eType"] == "4") {
    echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Group Listing', 'index.php?file=SubGroup&AX=Yes&iCompanyId=' . $_REQUEST['iCompanyId']);
} else if ($_SESSION["sess_eType"] == "3") {
    echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Group Listing', 'index.php?file=SubGroup&AX=Yes');
    $iCompanyId = $_SESSION['sess_iCompanyId'];
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
				<?php echo $GeneralObj->DisplayTab('Group', 1); ?>
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
																<img src='<?php echo $CFG->wwwroot . "/public/images/" ?>spacer.gif' alt="" />
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
																<?php
																if ($mode != "Update") {
                                                                    if (is_null($_REQUEST['iCompanyId']) || $_REQUEST['iCompanyId'] == 0) {
                                                                        echo "<tr><td width='15%' valign='top' align='left'>Organization</td><td width='3%' valign='top'>:</td><td width='82%' align='left'>" . $_SESSION["sess_vCompanyName"] . "</td></tr>";
                                                                    } else {
                                                                        $company = new Company($_REQUEST['iCompanyId']);
                                                                        echo "<tr><td width='15%' valign='top' align='left'>Organization</td><td width='3%' valign='top'>:</td><td width='82%' align='left'>" . $company->getvCompanyName() . "</td></tr>";
                                                                    }
                                                                } else {
                                                                    $company = new Company($_REQUEST['iCompanyId']);
                                                                    echo "<tr><td width='15%' valign='top' align='left'>Organization</td><td width='3%' valign='top'>:</td><td width='82%' align='left'>" . $company->getvCompanyName() . "</td></tr>";
                                                                }
                                                                ?>
																<tr>
																	<td width="15%" valign="top" align="left">
																		Group Name<span class="errormsg"> *</span>
																	</td>
																	<td width="3%" valign="top">:</td>
																	<td width="82%" align="left">
																		<input type="text" lang="*" title="Group Name" name="vGroupName" size="40" value="<?php echo $vGroupName; ?>">
																	</td>
																</tr>
																<!--<tr>
                                                                        <td valign="top" align="left">Group ID<span class="errormsg"> *</span></td>
                                                                        <td valign="top">:</td>
                                                                        <td align="left"><input type="text" lang="*{AN[ ]}" title="Group ID" name="vGroupCodeId" size="40" value="<?php echo $vGroupCodeId; ?>"></td>
                                                                </tr>-->
																<? if ($mode == 'Update') { ?>
																<tr>
																	<td valign="top" align="left">
																		Group ID<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="hidden" name="vGroupCodeId" value="<?php echo $vGroupCodeId; ?>">
																		<?php echo $vGroupCodeId; ?>
																	</td>
																</tr>
																<? } ?>
																<tr>
																	<td valign="top" align="left">External ID</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="text" name="vExternal_Id" id="vExternal_Id" value="<?php echo $vExternal_Id; ?>" lang="" title="External ID" size="40">
																	</td>
																</tr>
																<!-- <tr>
                                                                    <td width="15%" valign="top" align="left">Email<span class="errormsg"> *</span></td>
                                                                    <td width="3%" valign="top">:</td>
                                                                    <td width="82%" align="left"><input type="text" lang="*{E}" title="Email" name="vEmail" size="40" value="<?php echo $vEmail; ?>"></td>
                                                                </tr>                                                               </tr>

                                                                <tr>
                                                                    <td width="15%" valign="top" align="left">Address<span class="errormsg"> *</span></td>
                                                                    <td width="3%" valign="top">:</td>
                                                                    <td width="82%" align="left"><textarea name="vAddress" lang="*" id="vAddress" title="Address" rows='5' cols='26'><?php echo $vAddress; ?></textarea></td>
                                                                </tr> -->
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
																	<td height="40" style="text-align: left">&nbsp;</td>
																	<td>&nbsp;</td>
																	<td style="text-align: left">
																		<input type="Image" class="buttonstyle" lang="<?php echo $mode ?>"
																			src='<?php echo ($mode == "Update") ? $CFG->wwwroot . "/public/images/" . "btn-modify.gif" : $CFG->wwwroot . "/public/images/" . "btn-add.gif"; ?>' style="cursor: hand; border: 0"
																			onClick="return validate_new(document.frmadd);">
																		<input type="Image" class="buttonstyle" alt="Cancel" src='<?php echo $CFG->wwwroot . "/public/images/" ?>btn-cancel.gif' style="cursor: hand; border: 0"
																			onClick="window.location='index.php?file=SubGroup&amp;AX=Yes&amp;iCompanyId=<?php echo $_REQUEST['iCompanyId'] ?>';return false;">
																	</td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td class="inner-bottcurve">
															<div>
																<img src='<?php echo $CFG->wwwroot . "/public/images/" ?>spacer.gif' alt="" />
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
