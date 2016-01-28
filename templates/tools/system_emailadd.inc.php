<?php
include_once($CFG->dirroot . "/lib/classes/application/System_Email.Class.php5");
$roomsObj = new System_Email();
$GeneralObj->getRequestVars();

$section = 'System Email';

if ($mode == "Update") {
	$roomsObj->select($iEmailTemplateId);
	$roomsObj->getAllVar();
} else {
	$mode = "Add";
	$dAddedDate = date('Y-m-d H:i:s');
}

if ($file != '') {
	$link = "index.php?file=" . $file . "&mode=" . $mode . "&listfile=" . $listfile;
}
$TOP_HEADER = $mode . ' ' . $section;
if ($mode == 'Update') {
	$TOP_HEADER .= ' [' . $vEmailTitle . ' ]';
}
if ($eEmailFormat == '') {
	$eEmailFormat = 'HTML';
}
?>
<form name="frmadd" method="post" action="index.php?file=t-system_emailadd_a" onsubmit="return validate_new(this);">
	<input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId; ?>">
	<input type="hidden" name="iEmailTemplateId" id="iEmailTemplateId" value="<?php echo $iEmailTemplateId; ?>" />
	<input type="hidden" id="vEmailCode" name="vEmailCode" value="<?php echo $vEmailCode; ?>" />
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to System Email Listing', 'index.php?file=SystemMails&AX=Yes'); ?>
				</h1>
			</td>
		</tr>
		<?php
		if ($mode == "Update") {
            $class = "class='tab_border'";
            echo " <tr> <td valign='bottom'></td>
		</tr>";
        }
        ?>
		<tr>
			<td>
				<div class="listArea">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>
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
																				<td align="right"></td>
																			</tr>
																		</table>
																	</h4>
																</td>
															</tr>
															<tr>
																<td align="left">&nbsp;</td>
																<td align="left">
																	Email Title<span class="errormsg"> *</span>
																</td>
																<td valign="top">:</td>
																<td align="left">
																	<input type="text" lang="*" title="Email Title" name="vEmailTitle" size="40" value="<?php echo $vEmailTitle; ?>">
																</td>
															</tr>
															<tr>
																<td align="left">&nbsp;</td>
																<td align="left">
																	From Name<span class="errormsg"> *</span>
																</td>
																<td valign="top">:</td>
																<td align="left">
																	<input type="text" lang="*" title="From Name" name="vFromName" size="40" value="<?php echo $vFromName; ?>">
																</td>
															</tr>
															<tr>
																<td align="left">&nbsp;</td>
																<td align="left">
																	Email Subject<span class="errormsg"> *</span>
																</td>
																<td valign="top">:</td>
																<td align="left">
																	<input type="text" lang="*" title="Email Subject" name="vEmailSubject" size="40" value="<?php echo $vEmailSubject; ?>">
																</td>
															</tr>
															<tr>
																<td></td>
																<td valign="top" align="left">Message</td>
																<td valign="top">:</td>
																<td height="300" align="left">
																	<span id="html"> <?php
																	include_once($CFG->dirroot . "/components/tiny_mce/tiny_mce.php");
																	$tinyEditor = new tinyEditor();
																	$tinyEditor->editor('tEmailMessage', $tEmailMessage);

																	?>
																	</span>
																	<face class="errormsg" size="5">Don't change variables' name like '#xxxxxx#'</face>
																</td>
															</tr>
															<!--
                <tr>
                    <td>&nbsp;</td>
                    <td>Email Footer</td>
                    <td>:</td>
                    <td><input type="text" title="Footer" name="vEmailFooter" size="40" value="<?php echo $vEmailFooter; ?>" ></td>
                </tr>
                                                -->
															<tr>
																<td>&nbsp;</td>
																<td height="40" style="text-align: left">&nbsp;</td>
																<td>&nbsp;</td>
																<td style="text-align: left">
																	<input type="Image" class="buttonstyle" lang="<?php echo $mode ?>"
																		src="<?php echo ($mode == "Update") ? $CFG->wwwroot . "/public/images/" . "btn-modify.gif" : $CFG->wwwroot . "/public/images/" . "btn-add.gif"; ?>" style="cursor: hand; border: 0"
																		onClick="return validate_new(document.frmadd);">
																	<input type="Image" class="buttonstyle" alt="Cancel" src="<?php echo $CFG->wwwroot . "/public/images/" ?>btn-cancel.gif" style="cursor: hand; border: 0"
																		onclick="window.location='index.php?file=SystemMails&AX=Yes';return false;">
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
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</form>
