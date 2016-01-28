<?php
include_once($CFG->dirroot . "/lib/classes/" . "application/Course.Class.php5");


$courseObj = new Course();
$GeneralObj->getRequestVars();


$mode = $_REQUEST['mode'];
if ($mode == "Update") {

	$courseObj->select($iCourseId);
	$courseObj->getAllVar();
	if ($dCourseDateTime != "0000-00-00 00:00:00") {
		$iStarttime = date("H", strtotime($dCourseDateTime));
		$iStartTimeMM = date("i", strtotime($dCourseDateTime));
		$dCourseDateTime = substr($dCourseDateTime, 0, 10);
	}
	if ($iStarttime > 12) {
		$iStarttime = $iStarttime - 12;
		$SAMPM = "PM";
	} else {
		$SAMPM = "AM";
	}
} else {
	$mode = "Add";
}

if ($file != '')
	$link = "index.php?file=" . $file . "&mode=" . $mode . "&listfile=" . $listfile;

$section="Courses";
$TOP_HEADER = $mode . ' ' . $section;
if ($mode == 'Update')
	$TOP_HEADER .= ' [' . $vCoursename . ']';

?>
<form name="frmadd" method="post" enctype="multipart/form-data" action="index.php?file=m-courseadd_a">
	<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>">
	<input type="hidden" id="SAMPM" name="SAMPM" value="<?php echo $SAMPM; ?>">
	<input type="hidden" id="EAMPM" name="EAMPM" value="<?php echo $EAMPM; ?>">
	<input type="hidden" name="iSGroupId" id="iSGroupId" value="<?php echo $iSGroupId; ?>">
	<input type="hidden" name="iCompanyId" id="iCompanyId" value="<?php echo $_REQUEST['iCompanyId']; ?>">
	<input type="hidden" name="iCourseId" id="iCourseId" value="<?php echo $iCourseId; ?>">
	<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $vLogo; ?>">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId; ?>">
	<input type="hidden" name="qs" id="qs" value="<?php echo $url_concat; ?>">
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php
					if ($_SESSION["sess_eType"] == "4") {
    echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Course Listing', 'index.php?file=Courses&AX=Yes&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId']);
} else if ($_SESSION['sess_eType'] == "3") {
    echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Course Listing', 'index.php?file=Courses&AX=Yes&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId']);
} else if ($_SESSION["sess_eType"] == "2") {
    echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Course Listing', 'index.php?file=Courses&AX=Yes');
}
?>
				</h1>
			</td>
		</tr>
		<?php
		if ($mode == "Update") {
            $class = "class='tab_border'";

            echo " <tr> <td valign='bottom'>" . $GeneralObj->DisplayTab('Course', 1) . "</td>  </tr>";
        }
        ?>
		<tr>
			<td>
				<div class="listArea">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<span id="form1">
									<table width="100%" border="0" cellspacing="1" cellpadding="0" <?php echo $class; ?>>
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
																		Name<span class="errormsg"> *</span>
																	</td>
																	<td width="1%" valign="top">:</td>
																	<td width="90%" align="left">
																		<input type="text" lang="*" title="Name" name="vCoursename" size="25" value="<?php echo $vCoursename; ?>">
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">Date</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="text" lang="_" title="Date" name="dCourseDateTime" id="dCourseDateTime" size="25"
																		<?php
																		if ($dCourseDateTime != "0000-00-00 00:00:00") {
            echo " value='" . $dCourseDateTime . "' ";
        } else {
            echo "value = ''";
        }
        ?>>
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">Time</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<select name="iStarttime" id="iStarttime">
																			<?php
																			for ($i = 1; $i < 13; $i++) {
                                                                                echo "<option  " . (($iStarttime == $i) ? "selected" : "") . " value='" . $i . "'>" . $i . "</option>";
                                                                            }
                                                                            ?>
																		</select>
																		Hrs
																		<select name="iStartTimeMM" id="iStartTimeMM">
																			<?php
																			for ($i = 0; $i < 60; $i++) {
                                                                                echo "<option  " . (($iStartTimeMM == $i) ? "selected" : "" ) . " value='" . $i . "'>" . $i . "</option>";
                                                                            }
                                                                            ?>
																		</select>
																		Min
																		<select name="SAMPM" id="SAMPM">
																			<option <?php echo (($SAMPM == "AM") ? "selected" : "") ?> value="AM">AM</option>
																			<option <?php echo (($SAMPM == "PM") ? "selected" : "") ?> value="PM">PM</option>
																		</select>
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">Description</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<?php
																		include_once($CFG->dirroot . "/components/tiny_mce/tiny_mce.php");
																		$tinyEditor = new tinyEditor();
																		$tinyEditor->editor('vDescription', $vDescription);
																		?>
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">
																		Status<span class="errormsg"> </span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<select name="eStatus" id="eStatus">
																			<option <?php echo (($eStatus == "Active") ? "selected" : "") ?> value="Active">Active</option>
																			<option <?php echo (($eStatus == "Inactive") ? "selected" : "") ?> value="Inactive">Inactive</option>
																		</select>
																	</td>
																</tr>
																<tr>
																	<td height="40" style="text-align: left">&nbsp;</td>
																	<td valign="top">&nbsp;</td>
																	<td style="text-align: left">
																		<input type="Image" class="buttonstyle" lang="<?php echo $mode ?>"
																			src="<?php echo ($mode == "Update") ? $CFG->wwwroot . "/public/images/" . "btn-modify.gif" : $CFG->wwwroot . "/public/images/" . "btn-add.gif"; ?>" style="cursor: hand; border: 0"
																			onClick="return validate_new(document.frmadd);">
																		<?php
																		if ($_SESSION["sess_eType"] == "4") {
                                                                            echo "<input type='Image' class='buttonstyle' alt='Cancel' src='" . $CFG->wwwroot . "/public/images/btn-cancel.gif' style='cursor:hand;border:0' onclick='window.location=\"index.php?file=Courses&AX=Yes&iCompanyId=" . $iCompanyId . "&iSGroupId=" . $iSGroupId . "\";return false;''>";
                                                                        } else if ($_SESSION['sess_eType'] == "3") {

                                                                            echo "  <input type='Image' class='buttonstyle' alt='Cancel' src='" . $CFG->wwwroot . "/public/images/btn-cancel.gif' style='cursor:hand;border:0' onclick=\"window.location='index.php?file=Courses&AX=Yes&iSGroupId=" . $iSGroupId . "';return false;\">";
                                                                        } else if ($_SESSION["sess_eType"] == "2") {
                                                                            echo " <input type='Image' class='buttonstyle' alt='Cancel' src='" . $CFG->wwwroot . "/public/images/btn-cancel.gif' style='cursor:hand;border:0' onclick=\"window.location='index.php?file=Courses&AX=Yes';return false;\">";
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

    $('document').ready(
    function(){
        //alert("##");
        var img = "<?php echo $CFG->wwwroot . "/public/images/" ?>cal.gif";
        //alert(img);
        $(function(){
            $("#dCourseDateTime").datepicker({ dateFormat: 'yy-mm-dd',
                inline: true,
                changeYear: true,
                buttonText:'Click to Select Date',
                showOn: "both",
                buttonImage: img,
                buttonImageOnly: true});
        });
    }
);
    $("#eStatus").change(function(){
<?php
if ($mode == 'Update') {
    echo "      if($('#eStatus').val()=='Active'){
                alert('All Related Classes will be Active if You Active this course.');
            }else if($('#eStatus').val()=='Inactive'){
                alert('All Related Classes will be Inactive if You Inactive this course.');
            }	";
}
?>
    });

</script>
