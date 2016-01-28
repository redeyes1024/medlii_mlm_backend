<?php
$keyword = $_REQUEST[keyword];
$ssql = " where 1=1 AND sm.eStatus='Active' ";
$type = (isset($_GET['Type'])) ? $_GET['Type'] : '';
if ($type != 'Email') {
	header('Location: ' . $CFG->wwwroot . "/index.php?file=t-settinglist&AX=No&Type=Email");
	exit;
}
if (!isset($_REQUEST[Type]) || $_REQUEST[Type] == '')
	$_REQUEST[Type] = 'Appearance';
$ssql .= " AND sm.eConfigType = '" . $_REQUEST[Type] . "'";
if (isset($_REQUEST[keyword]))
	$ssql.=" AND " . $_REQUEST[option] . " like '%" . $_REQUEST[keyword] . "%'";
$ssql .= "";
#if(!$PAYMENT_MODULE_DISPLAY)
#	$ssql .= " and sm.eConfigType!='Payment'";
$sql = "select count(sm.vName) as tot from setting as sm $ssql";
$db_res = $obj->select($sql);
$num_totrec = $db_res[0]["tot"];
$rec_limit = "50";
include("templates/general/paging.inc.php");
$sort = " order by iOrderBy";
$db_query = "select * from setting as sm " . $ssql . $sort;
//echo $db_query;
$db_res = $obj->select($db_query);
//print_R($db_res);exit;
if (!count($db_res) > 0 && isset($keyword)) {
	$var_msg = "Your search for <font color=#000000>$keyword</font> has found <font color=#000000>0</font> matches:";
} else if (isset($keyword)) {
	$var_msg = "Search Successfully";
	$var_msg = "Your search for <font color=#000000>$keyword</font> has found <font color=#000000>$num_totrec</font> matches:";
}
if (!isset($start))
	$start = 1;
$num_limit = ($start - 1) * $REC_LIMIT;
$startrec = $num_limit;
$lastrec = $startrec + $REC_LIMIT;
$startrec = $startrec + 1;
if ($lastrec > $num_totrec)
	$lastrec = $num_totrec;
//	$recmsg = "Showing ".$startrec." - ".$lastrec." Records Of ".$num_totrec;
if ($num_totrec > 0) {
	$recmsg = "Showing " . $startrec . " - " . $lastrec . " Records Of " . $num_totrec;
} else {
	$recmsg = "No Records Found.";
}
$TOP_HEADER = 'System Settings';
?>
<script language="JavaScript1.2" src="<?php echo $CFG->wwwroot . "/public/js/" ?>jlist.js"></script>
<form name="frm" method="post">
	<input type="hidden" name="mode">
	<table width="97%" border="0" align="center" cellpadding="1" cellspacing="2">
		<tr>
			<td height="28" width="89%">
				<h1>
					<?php echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, '', ''); ?>
				</h1>
			</td>
			<td width="8%" align="right">
				<?php echo $help ?>
			</td>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<table width="100%" border="0" cellpadding="2" cellspacing="2">
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="1" cellpadding="1">
								</form>
								<form name="frmlist" method="post" action="index.php?file=t-settingadd_a">
									<input type="hidden" name="mode" value="Update" />
									<input type="hidden" name="eConfigType" value="<?php echo $_REQUEST['Type']; ?>" />
									<?php
									if (count($db_res) > 0) {
										echo "     <tr> " .
												"<td colspan='5'> " .
												" <table width='100%' border='0' cellspacing='0' cellpadding='0'> " .
												"<tr> " .
												" <td class='inner-topcurve'><div><img src='" .
												$CFG->wwwroot . "/public/images/spacer.gif' /></div></td> " .
												"</tr>" .
												"<tr>
		<td colspan='3' class='inner-bodycurve-listing'>
		<table width='100%' align='center' cellspacing='1' class='listing-border' cellpadding='3' border='0'>
		<tr>
		<th width='2%'>
		<div align='center'></div>
		</th>
		<th width='48%' align='left'>Description&nbsp;</th>
		<th width='40%' align='left'>Values</th>
		</tr>";

										for ($i = 0; $i < $num_totrec; $i++) {
											$class = ($i % 2) ? "td-dark" : "td-light";
											if ($db_res[$i]["eDisplayType"] == 'hidden') {
												echo "  <input type='hidden' name='" . $db_res[$i]['vName'] . "' size='50'  value='" . $db_res[$i]['vValue'] . "'>";
											} else {
												echo "  <tr class='" . $class . "'>" .
														"<td><img src='" . $CFG->wwwroot . "/public/images/icon/edit-icon1.gif'></td>" .
														" <td align='left'> " .
														$db_res[$i]['vDesc'] .
														"&nbsp;&nbsp;&nbsp;";

												if ($db_res[$i]['vName'] == 'DIRECTORY') {
													echo '(' . $site_path . ')';
												}

												echo "</td> <td class='td-listing' align='left'> ";

												if ($db_res[$i]['eDisplayType'] == 'readonly') {
													echo $db_res[$i]['vValue'];
												} if ($db_res[$i]['eDisplayType'] == 'text') {

													echo "<input type='Text'  name='" . $db_res[$i]['vName'] . "' title='Administrator Email ID' lang='*{E}' size='50' value='" . $db_res[$i]['vValue'] . "' />";
												}if ($db_res[$i]['eDisplayType'] == 'textarea') {
													echo " <textarea rows='3' cols='36' name='" . $db_res[$i]['vName'] . "'>" . $db_res[$i]['vValue'] . "</textarea>";
												}if ($db_res[$i]['eDisplayType'] == 'checkbox') {
													echo "  <input " . (($db_res[$i]['vValue'] == 'Y') ? 'checked' : '') . " class='noinput' type='checkbox' name='" . $db_res[$i]['vName'] . "' size='50'> ";
												}if ($db_res[$i]['eDisplayType'] == 'selectbox') {

													if ($db_res[$i]['eSource'] == 'List') {
														$Source_Arr = explode(',', $db_res[$i]['vSourceValue']);
														$nSource_List = count($Source_Arr);

														if ($db_res[$i]["eSelectType"] == 'Single') {
															echo " <select style='width:275px' name='" . $db_res[$i]['vName'] . "'> ";
														} else {
															echo " <select style=''width:275px' multiple name='" . $db_res[$i]['vName'] . "[]'> ";
														}
														echo " <option value='-9'>< Select" .
																$db_res[$i]['vDesc'] .
																" ></option>";

														for ($j = 0; $j < $nSource_List; $j++) {
															$list_arr = explode("::", $Source_Arr[$j]);
															if ($list_arr[1] == "")
																$list_arr[1] = $list_arr[0];
															$selected = "";
															if ($db_res[$i]["eSelectType"] == 'Single') {
																if ($list_arr[0] == $db_res[$i]["vValue"])
																	$selected = "selected";
															}
															else {
                                                                $vValue_arr = explode("|", $db_res[$i]["vValue"]);
                                                                if (in_array($list_arr[0], $vValue_arr))
                                                                	$selected = "selected";
                                                            }

                                                            echo " <option " . $selected . " value='" . $list_arr[0] . "'> " .
                                                              $list_arr[1] .
                                                              " </option>";
														}
														echo " </select> ";
													}




													if ($db_res[$i]["eSource"] == 'Query') {
                                                        $db_selectSource_rs = $obj->select($db_res[$i]["vSourceValue"], mysqli_fetch_array);
                                                        $nSource_Query = count($db_selectSource_rs);

                                                        echo "<select style='width:275px' name='" . $db_res[$i]['vName'] . "'> " .
                                                          "<option value='-9'><Select " .
                                                          $db_res[$i]['vDesc'] .
                                                          "></option> ";
                                                        for ($j = 0; $j < $nSource_Query; $j++) {
                                                            echo " <option " . (($db_selectSource_rs[$j][0] == $db_res[$i]['vValue']) ? 'selected' : '') . " value='" . $db_selectSource_rs[$j][0] . "'> "
														. $db_selectSource_rs[$j][1] .
														"  </option> ";
                                                        }
                                                        echo " </select> ";
                                                    }
												}

												echo "  </td>   </tr>";
											}
										}
									}
									?>
							
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
		<?php if ($num_totrec > 0) { ?>
		<tr>
			<td align="center" height="37" colspan="5">
				<input type="Image" class="buttonstyle" src="<?php echo $CFG->wwwroot . "/public/images/" ?>btn-modify.gif" style="cursor: hand; border: 0" alt="Modify"
					onClick="return validate_new(document.frmlist);">
			</td>
		</tr>
		<?php } ?>
	</table>
	<input type="hidden" name="no" value="<?php echo count($db_res); ?>">
	<div align="right">
		<font size="1" FACE="Verdana, Arial, Helvetica, sans-serif" color="black"> </font>
	</div>
	</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
</form>
<script type="text/javascript">
    function checkConfigType(val)
    {
        window.location = 'index.php?file=t-settinglist&AX=No&Type='+val;
    }
    function checkValid(frm)
    {
        var v = $('[name=MEMBERSHIP]').val();



        if(v!='')
        {
            var valid_dig = '0123456789.';
            for(var i=0;i<v.length;i++)
            {
                ch=v.charAt(i);
                rtn=valid_dig.indexOf(ch);
                if(rtn==-1)
                {
                    alert("Please Enter Valid Membership Fee");
                    $('[name=MEMBERSHIP]').focus();
                    return false;
                }

            }
        }
        else
        {
            alert("Please Enter Membership Fee");
            $('[name=MEMBERSHIP]').focus();
            return false;

        }
        frm.mode.value = 'Update';
    }


</script>
