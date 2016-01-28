<?php
include_once($CFG->dirroot . "/lib/classes/application/Admin.Class.php5");
$adminObj = new Admin();
$GeneralObj->getRequestVars();
if ($_SESSION["sess_eType"] == "4") {
	$section = 'Super Admin';
} else {
	$section = 'Admin';
}

$url_concat = preg_replace('/file=(.*?)&/', '', $_SERVER['QUERY_STRING']);
if (isset($mode) && $mode == "Update") {
	$adminObj->select(1);
	$adminObj->getAllVar();
	if ($vUserName == 'admin')
		$readonly = 'readonly';
}
else {
	$mode = "Add";
	$dAddedDate = date('Y-m-d H:i:s');
	$adminObj->select(1);
	$adminObj->getAllVar();
}

if (isset($file))
	$link = "index.php?file=" . $file . "&mode=" . $mode .( isset($listfile)? "&listfile=" .$listfile:"");

$TOP_HEADER = $section;
if ($mode == 'Update')
	$TOP_HEADER .= ' [' . $vFirstName . ' ' . $vLastName . ']';
?>
<form name="frmadd" method="post" action="index.php?file=a-adminadd_a">
	<input type="hidden" name="mode" value="<?php echo $mode; ?>">
	<input type="hidden" name="iAdminId" id="iAdminId" value="<?php echo  $iAdminId; ?>">
	<input type="hidden" name="eStatus" id="eStatus" value="Active">
	<input type="hidden" name="dLastLogin" id="dLastLogin" value="<?php echo  $dLastLogin; ?>">
	<!--<input type="hidden" name="TabId" id="TabId" value="<?php /*echo  $TabId;*/ ?>">-->
	<input type="hidden" name="qs" id="qs" value="<?php echo  $url_concat; ?>">
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, '', ''); ?>
				</h1>
			</td>
		</tr>
		<?php
		if ($mode == "Update") {
            $class = "class='tab_border'";
            echo "<tr> <td valign='bottom'>" . $GeneralObj->DisplayTab('Admin', 1) . "</td>	</tr>";
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
																						<?php echo $section; ?>
																					</td>
																					<td align="right">
																						<?php
																						if ($mode == 'Update') {
                                                                                            //	echo " Switch To : ";
                                                                                            // 	echo $GeneralObj->gendb_dynamicDropeDown("admin", "iAdminId", "concat(vFirstName,' ',vLastName)", "", " 1=1", '', $iId, 'iAdminId2', '200px;', '', '', 'return switchto("'.$link.'",this.value);');
                                                                                        }
                                                                                        ?>
																					</td>
																				</tr>
																			</table>
																		</h4>
																	</td>
																</tr>
																<tr>
																	<td width="15%" align="left" valign="top">
																		First Name<span class="errormsg"> *</span>
																	</td>
																	<td width="3%" valign="top">:</td>
																	<td width="82%" align="left">
																		<input type="text" lang="*{AN}" title="First Name" name="vFirstName" size="40" value="<?php echo $vFirstName; ?>" maxlength="50">
																	</td>
																</tr>
																<tr>
																	<td align="left" valign="top">
																		Last Name<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="text" lang="*{AN}" title="Last Name" name="vLastName" size="40" value="<?php echo $vLastName; ?>" maxlength="50">
																	</td>
																</tr>
																<tr>
																	<td align="left" valign="top">
																		Email<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="text" lang="*{E}" title="E-mail" name="vEmail" size="40" value="<?php echo $vEmail; ?>" maxlength="50">
																	</td>
																</tr>
																<tr>
																	<td align="left" valign="top">
																		Mobile No<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="text" lang="*{T}" title="Mobile Number" name="vMobileNo" size="40" value="<?php echo $vMobileNo; ?>" maxlength="50">
																	</td>
																</tr>
																<tr>
																	<td align="left" valign="top">User Name</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="text" size="40" value="<?php echo $vUserName; ?>" name="vUserName" id="vUserName" maxlength="50" readonly="readonly">
																	</td>
																</tr>
																<tr>
																	<td align="left" valign="top">
																		Password<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<?php
																		if ($vUserName == 'admin' && $_SESSION['sess_vUserName'] != 'admin') {
                                                                            echo " <input type='Password' lang='*{P}5:0' title='Password' name='vPassword' id='vPassword' size='40' value='" .
                                                                              $vPassword . "' maxlength='50' onKeyPress='return OnlyAlphnumericValue(event);'>";
                                                                            echo " <input type='text' title='Password'  id='Password' size='40' value='"
			. $vPassword . "' maxlength='50' onKeyPress='return OnlyAlphnumericValue(event);'><span id='show_pass'> <a onclick='show_password()'>Show password</a></span>";
                                                                        } else {


                                                                            echo "<input type='password' lang='*{P}5:0' title='Password' name='vPassword' id='vPassword' size='40' value='" .
                                                                              $vPassword . "' maxlength='50' onKeyPress='return alphanum(this.value,50);'>";
                                                                            echo "<input type='text' title='Password'  id='Password' size='40' value='"
			. $vPassword . "' maxlength='50' onKeyPress='return OnlyAlphnumericValue(event);'><span id='show_pass'> <a  style='cursor:pointer;' onclick='show_password()'>Show password</a></span>";
                                                                        }
                                                                        ?>
																	</td>
																</tr>
																<!--<tr>-->
																<input type="hidden" name="eUserType" id="eUserType" value="<?php/* echo $eUserType; */?>">
																<?php
																if ($iAdminId != $_SESSION['sess_iAdminId']) {
                                                                    echo "     <tr>
		<td align='left' valign='top'>Status  </td>
		<td valign='top'>:</td>
		<td align='left'>
		<select name='eStatus' id='eStatus'>
		<option " . ($eStatus == 'Active') ? 'selected' : '' . " value='Active'>Active</option>
		<option " . ($eStatus == 'Inactive') ? 'selected' : '' . " value='Inactive'>Inactive</option>
				</select>
				</td>
				</tr>";
                                                                } else {
                                                                    echo "  <input type='hidden' name='eStatus' id='eStatus' value='" . $eStatus . "'>";
                                                                }
                                                                ?>
																<tr>
																	<td height="40" style="text-align: left">&nbsp;</td>
																	<td>&nbsp;</td>
																	<td style="text-align: left">
																		<input type="Image" class="buttonstyle" lang="<?php echo $mode ?>" src="<?php echo $CFG->wwwroot . "/public/images/" . "btn-modify.gif"; ?>" style="cursor: hand; border: 0"
																			onClick="return validate_new(document.frmadd);">
																
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
    document.getElementById('Password').style.display="none";
    var myPassword=document.getElementById('vPassword').value;
    if(myPassword==""){
        document.getElementById('show_pass').style.display="none";
    }
    function show_password()
    {
        if(document.getElementById('vPassword').value!=""){
            document.getElementById('Password').style.display="";
            document.getElementById('vPassword').style.display="none";
            setTimeout(' hide_password()', 5000)
        }else{
            document.getElementByid('show_pass').style.display="none";
        }
    }
    function hide_password(){
        document.getElementById('Password').style.display="none";
        document.getElementById('vPassword').style.display="";
    }
</script>
