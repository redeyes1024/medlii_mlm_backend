<?php
include_once($CFG->dirroot . "/lib/classes/" . "application/User.Class.php5");
include_once($CFG->dirroot . "/lib/classes/" . "application/Company.Class.php5");
include_once($CFG->dirroot . "/lib/classes/" . "application/SubGroup.Class.php5");
include_once $CFG->dirroot . '/scripts/tools/CompanyGroupFilter.php';


$GeneralObj->getRequestVars();

$section = 'User';
$mode = $_REQUEST['mode'];
if ($mode == "Update") {
	$userappObj = new User($iUserId);
	//  $userappObj->select($iUserId);
	$userappObj->getAllVar();
} else {
	$mode = "Add";
	$userappObj = new User();
}


if (isset($file))
	$link = "index.php?file=" . $file . "&mode=" . $mode . "&listfile=" . $listfile;

$TOP_HEADER = $mode . ' ' . $section;
if ($mode == 'Update')
	$TOP_HEADER .= ' [' . $vUsername . ']';

$ddlist = new CompanyGroupFilter($_SESSION["sess_iAdminId"], $_SESSION['sess_eType']);
if ($_SESSION['sess_eType'] == 4 && !$_REQUEST[$ddlist::companyValueFilterName] > 0) {

	$selectedCompany = $_SESSION['sess_iCompanyId'];
}
?>
<form name="frmadd" method="post" enctype="multipart/form-data" action="index.php?file=m-useradd_a">
	<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>">
	<input type="hidden" id="SAMPM" name="SAMPM" value="<?php echo $SAMPM; ?>">
	<input type="hidden" id="EAMPM" name="EAMPM" value="<?php echo $EAMPM; ?>">
	<?php
	//
	// if ($_SESSION['sess_eType'] < 3) {
    ///     echo '<input type="hidden" name="iSGroupId" id="iSGroupId" value=' . $_SESSION['sess_iSGroupId'] . '">';
    // }
    ?>
	<input type='hidden' name='<?php echo $ddlist::companyValueFilterName ?>' id='<?php echo $ddlist::companyValueFilterName ?>'
		value='<?php
    if ($_REQUEST[$ddlist::companyValueFilterName] > 0) {
        echo $_REQUEST[$ddlist::companyValueFilterName];
    } else {
        echo $_SESSION['sess_iCompanyId'];
    }
    ?>'>
	<input type="hidden" name="iUserId" id="iUserId" value="<?php echo $iUserId; ?>">
	<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $vLogo; ?>">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId; ?>">
	<input type="hidden" name="qs" id="qs" value="<?php echo $url_concat; ?>">
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php
					if ($_SESSION['sess_eType'] == '4') {
        echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to User Listing', 'index.php?file=User&AX=Yes&' . $ddlist::companyValueFilterName . '=' . $_REQUEST[$ddlist::companyValueFilterName] . '&' . $ddlist::groupValueFilterName . '=' . $_REQUEST[$ddlist::groupValueFilterName]);
    } else if ($_SESSION['sess_eType'] == '3') {
        echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to User Listing', 'index.php?file=User&AX=Yes&' . $ddlist::groupValueFilterName . '=' . $_REQUEST[$ddlist::groupValueFilterName]);
        $iCompanyId = $_SESSION['sess_iCompanyId'];
    } else if ($_SESSION['sess_eType'] == '2') {
        $iCompanyId = $_SESSION['sess_iCompanyId'];
        $iSGroupId = $_SESSION['sess_iSGroupId'];
        echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to User Listing', 'index.php?file=User&AX=Yes');
    }
    ?>
				</h1>
			</td>
		</tr>
		<?php
		if ($mode == "Update") {
            $class = "class='tab_border'";
            echo " <tr> <td valign='bottom'>" . $GeneralObj->DisplayTab('User', 1) . "</td>  </tr> ";
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
																<?php
																if ($mode != "Update") {
                                                                    if (is_null($_REQUEST['iCompanyId']) || $_REQUEST['iCompanyId'] == 0) {
                                                                        echo "<tr><td width='15%' valign='top' align='left'>Organization</td><td width='3%' valign='top'>:</td><td width='82%' align='left'>" . $_SESSION["sess_vCompanyName"] . "</td></tr>";
                                                                    } else {
                                                                        $company = new Company($_REQUEST[$ddlist::companyValueFilterName]);
                                                                        echo "<tr><td width='15%' valign='top' align='left'>Organization</td><td width='3%' valign='top'>:</td><td width='82%' align='left'>" . $company->getvCompanyName() . "</td></tr>";
                                                                    }

                                                                    if ((!($_REQUEST[$ddlist::groupValueFilterName] > 0))) {
                                                                        echo "<tr><td width='15%' valign='top' align='left'>Group</td><td width='3%' valign='top'>:</td><td width='82%' align='left'>";
                                                                        if (!$_REQUEST[$ddlist::companyValueFilterName] > 0) {
                                                                            echo $ddlist->getGroupsList($_SESSION["sess_iCompanyId"], $_REQUEST[$ddlist::groupValueFilterName], 'NO');
                                                                        } else {
                                                                            echo $ddlist->getGroupsList($_REQUEST[$ddlist::companyValueFilterName], $_REQUEST[$ddlist::groupValueFilterName], 'NO');
                                                                        }
                                                                        echo "</td></tr>";
                                                                    } else {


                                                                        echo "<tr><td width='15%' valign='top' align='left'>Group</td><td width='3%' valign='top'>:</td><td width='82%' align='left'>";
                                                                        $group = new SubGroup($_REQUEST[$ddlist::groupValueFilterName]);
                                                                        echo $group->getvGroupName();
                                                                        echo "<input type='hidden' id='" . $ddlist::groupValueFilterName . "' name='" . $ddlist::groupValueFilterName . "'  value='" . $_REQUEST[$ddlist::groupValueFilterName] . "'>";
                                                                        echo "</td></tr>";
                                                                    }
                                                                } else {
                                                                    $company = new Company($_REQUEST['iCompanyId']);
                                                                    echo "<tr><td width='15%' valign='top' align='left'>Organization</td><td width='3%' valign='top'>:</td><td width='82%' align='left'>" . $company->getvCompanyName() . "</td></tr>";
                                                                }
                                                                ?>
																<tr>
																	<td width="15%" valign="top" align="left">
																		Username<span class="errormsg"> *</span>
																	</td>
																	<td width="3%" valign="top">:</td>
																	<td width="82%" align="left">
																		<input type="text" lang="*{E}" title="Email" name="vUsername" size="40" value="<?php echo $vUsername; ?>">
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">
																		Password<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="password" lang="*{P}5:0" title="Password" id="vPassword" name="vPassword" size="40" value="<?php echo $vPassword; ?>">
																		<input type="text" title="Password" id="Password" size="40" value="<?php echo $vPassword; ?>" maxlength="50" onKeyPress="return OnlyAlphnumericValue(event);">
																		<span id="show_pass" style="cursor: pointer"> <a onclick="show_password()">Show password</a>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="15%" valign="top" align="left">Employee ID</td>
																	<td width="3%" valign="top">:</td>
																	<td width="82%" align="left">
																		<input type="text" title="Employee ID" name="iEmployeeId" size="40" value="<?php echo $iEmployeeId; ?>">
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">Alerts in Email</td>
																	<td valign="top" valign="top">:</td>
																	<td align="left">
																		<select name="eAlerts" id="eAlerts" title="Alerts in Email">
																			<option <?php echo ($eAlerts == "1") ? "selected" : "" ?> value="1">On</option>
																			<option <?php echo ($eAlerts == "0") ? "selected" : "" ?> value="0">Off</option>
																		</select>
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
																	<td valign="top" align="left">
																		System Rights<span class="errormsg"> </span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<select name="eRights" id="eStatus">
																			<?php
																			if ($_SESSION['sess_eType'] >= 1) {
                                                                                echo "<option " . (($eRights == "1") ? "selected" : "" ) . " value='1'>User</option>";
                                                                            }
                                                                            if ($_SESSION['sess_eType'] >= 2) {
                                                                                echo "<option " . (($eRights == "2") ? "selected" : "" ) . " value='2'>Group Admin</option>";
                                                                            }
                                                                            if ($_SESSION['sess_eType'] >= 3) {
                                                                                echo "<option " . (($eRights == "3") ? "selected" : "" ) . " value='3'>Organization Admin</option>";
                                                                            }
                                                                            if ($_SESSION['sess_eType'] >= 4) {
                                                                                echo "<option " . (($eRights == "4") ? "selected" : "" ) . " value='4'>Super Admin</option>";
                                                                            }
                                                                            ?>
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
																		if ($_SESSION['sess_eType'] == '4') {
    echo "      <input type='Image' class='buttonstyle' alt='Cancel' src='" . $CFG->wwwroot . "/public/images/btn-cancel.gif' style='cursor:hand;border:0' onclick=" . '"' . "window.location='index.php?file=User&AX=Yes&" . $ddlist::companyValueFilterName . "=" . $_REQUEST[$ddlist::companyValueFilterName] . "&" . $ddlist::groupValueFilterName . "=" . $_REQUEST[$ddlist::groupValueFilterName] . "';return false;" . '"' . ">				";
} else if ($_SESSION['sess_eType'] == '3') {
    echo "       <input type='Image' class='buttonstyle' alt='Cancel' src='" . $CFG->wwwroot . "/public/images/btn-cancel.gif' style='cursor:hand;border:0' onclick=" . '"' . "window.location='index.php?file=User&AX=Yes&" . $ddlist::groupValueFilterName . "=" . $_REQUEST[$ddlist::groupValueFilterName] . "';return false;" . '"' . ">";
} else if ($_SESSION['sess_eType'] == '2') {
    echo "        <input type='Image' class='buttonstyle' alt='Cancel' src='" . $CFG->wwwroot . "/public/images/btn-cancel.gif' style='cursor:hand;border:0' onclick=" . '"' . "window.location='index.php?file=User&AX=Yes';return false;" . '"' . ">			";
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

    document.getElementById('Password').style.display="none";
    var myPassword=document.getElementById('vPassword').value;
    /* if(myPassword==""){
        document.getElementById('show_pass').style.display="none";
    }*/
    function show_password()
    { 
        if(document.getElementById('vPassword').value!=""){
	     
            document.getElementById('Password').style.display="";
            document.getElementById('vPassword').style.display="none";
            document.getElementById('Password').value = document.getElementById('vPassword').value;
            setTimeout(' hide_password()', 5000)
        }else{
            //document.getElementById('show_pass').style.display="none";
        }
    }
    function hide_password(){
        document.getElementById('Password').style.display="none";
        document.getElementById('vPassword').style.display=""; 
        document.getElementById('vPassword').value = document.getElementById('Password').value;
    }

       
    function CheckExtension(id)  
    {        
        var valid_extensions = /(.pdf)$/i;  
        var res=validate_new(document.frmadd); 
        var Image="<?php echo $vVideo ?>";
        var mode="<?php echo $mode ?>";
        var fld=document.getElementById(id).value;
        if(fld!="")
        {
            if(res){
                if(fld){
                    if(valid_extensions.test(fld)){
                        return true;  
                    } else { 
                        if(mode=="Update" && Image!="" && fld=="")
                        {
                            return true;
                        }else{
                            alert("Plese upload valid pdf.Alowed extension are .pdf etc.");
                            document.getElementById(id).focus();
                            return false;
                        }  
            
                    }  
                } else { 
                    if(Image=="" || Image=="NULL"){ 
                        alert("Plese upload valid pdf.Alowed extension are .pdf etc.");
                        document.getElementById(id).focus();
                        return false;  
                    }else{
                        return true;
                    }         
                }
   
            }else{
                if(Image!="")
                    return true;
                else
                    return false;
            }  
        }
        else
        {
            return true;
        } 
    } 

 
     
     
                                          
    function imagedelete(frm){

        ans = confirm("Confirm Deletion of jpg?");
        if(ans == true){
            document.getElementById('mode').value = "Delete";
            if(frm){
                frm.submit();
            }
        }else{
            return false;
        }
    } 
                                         
</script>
