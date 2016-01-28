<?php
include_once($CFG->dirroot."/lib/classes/" . "application/Admin.Class.php5");
$adminObj = new Admin();
$GeneralObj->getRequestVars();
$section = 'Admin';
$url_concat = preg_replace('/file=(.*?)&/', '', $_SERVER['QUERY_STRING']);
if ($mode == "Update") {
	$adminObj->select($iAdminId);
	$adminObj->getAllVar();
	if ($vUserName == 'admin')
		$readonly = 'readonly';
}
else {
	$mode = "Add";
	$dAddedDate = date('Y-m-d H:i:s');
}

if ($file != '')
	$link = "index.php?file=" . $file . "&mode=" . $mode . "&listfile=" . $listfile;

$TOP_HEADER = $mode . ' Group ' . $section;
if ($mode == 'Update')
	$TOP_HEADER .= ' [' . $vFirstName . ' ' . $vLastName . ']';
?>
<form name="frmadd" method="post" action="index.php?file=m-subgroupadminadd_a">
	<input type="hidden" name="mode" value="<?php echo $mode;?>">
	<input type="hidden" name="iCompanyId" id="iCompanyId" value="<?php echo $_REQUEST['iCompanyId'];?>">
	<input type="hidden" name="iSGroupId" id="iSGroupId" value="<?php echo $_REQUEST['iSGroupId'];?>">
	<input type="hidden" name="iAdminId" id="iAdminId" value="<?php echo $iAdminId;?>">
	<input type="hidden" name="eType" id="eType" value="Group Admin">
	<input type="hidden" name="dLastLogin" id="dLastLogin" value="<?php echo $dLastLogin;?>">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId;?>">
	<input type="hidden" name="qs" id="qs" value="<?php echo $url_concat;?>">
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php  
				 if($_SESSION['sess_eType']=='Super Admin') {
						echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Group Admin Listing', 'index.php?file=SubGroupAdmin&AX=Yes&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId']);
				 } else if($_SESSION['sess_eType']=='Company Admin') {
						echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Group Admin Listing', 'index.php?file=SubGroupAdmin&AX=Yes&iSGroupId=' . $_REQUEST['iSGroupId']);
				 } else {
						echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Group Admin Listing', 'index.php?file=SubGroupAdmin&AX=Yes');
				 }

					?>
				</h1>
			</td>
		</tr>
		<tr>
			<td align="right">
				<?php				if($_SESSION['sess_eType']=='Super Admin') {
					echo '<b>Company : </b>'.$GeneralObj->gendb_dynamicDropeDown("Company", "iCompanyId", "vCompanyName", "", " 1=1 AND eStatus='Active' AND iCompanyId='$iCompanyId'", 'vCompanyName', $iCompanyId, '', '', '', '', '');
				}
				?>
			</td>
		</tr>
		<?php        if ($mode == "Update" || $mode=='Add' ) {
			$class = "class='tab_border'";
			?>
		<tr>
			<td valign="bottom">
				<?php  echo $GeneralObj->DisplayTab('Group', 2); ?>
			</td>
		</tr>
		<?php  } ?>
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
																<img src="<?php echo $CFG->wwwroot."/public/images/" ?>spacer.gif" />
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
																						<?php																							if ($mode == 'Update') {
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
																	<td width="15%" valign="top" align="left">
																		First Name<span class="errormsg"> *</span>
																	</td>
																	<td width="3%" valign="top">:</td>
																	<td width="82%" align="left">
																		<input type="text" lang="*{AN}" title="First Name" name="vFirstName" size="40" value="<?php echo $vFirstName;?>" maxlength="50">
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">
																		Last Name<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="text" lang="*{AN}" title="Last Name" name="vLastName" size="40" value="<?php echo $vLastName;?>" maxlength="50">
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">
																		Email<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="text" lang="*{E}" title="E-mail" name="vEmail" size="40" value="<?php echo $vEmail;?>" maxlength="50">
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">
																		Mobile No<span class="errormsg"> </span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="text" lang="*{T}" title="Mobile Number" name="vMobileNo" size="40" value="<?php echo $vMobileNo;?>" maxlength="50">
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">
																		User Name<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input type="text" title="User Name" size="40" name="vUserName" id="vUserName" <?php echo $readonly ?> value="<?php echo $vUserName; ?>" lang="*{AN[-,_]}5:0">
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">
																		Password<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<?php  if ($vUserName == 'admin' && $_SESSION['sess_vUserName'] != 'admin') { ?>
																		<input type="Password" lang="*{P}5:0" title="Password" name="vPassword" id="vPassword" size="40" value="<?php echo $vPassword; ?>" maxlength="50"
																			onKeyPress="return OnlyAlphnumericValue(event);">
																		<input type="text" title="Password" id="Password" size="40" value="<?php echo $vPassword; ?>" maxlength="50" onKeyPress="return OnlyAlphnumericValue(event);">
																		<span id="show_pass"> <a onclick="show_password()">Show password</a>
																		</span>
																		<?php  } else { ?>
																		<input type="password" lang="*{P}5:0" title="Password" name="vPassword" id="vPassword" size="40" value="<?php echo $vPassword; ?>" maxlength="50"
																			onKeyPress="return alphanum(this.value,50);">
																		<input type="text" title="Password" id="Password" size="40" value="<?php echo $vPassword; ?>" maxlength="50" onKeyPress="return OnlyAlphnumericValue(event);">
																		<span id="show_pass"> <a style="cursor: pointer;" onclick="show_password()">Show password</a>
																		</span>
																		<?php  } ?>
																	</td>
																</tr>
																<tr>
																	<input type="hidden" name="eUserType" id="eUserType" value="<?php echo $eUserType; ?>">
																	<?php  if ($iAdminId != $_SESSION['sess_iAdminId']) { ?>
																
																
																<tr>
																	<td valign="top" align="left">Status</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<select name="eStatus" id="eStatus">
																			<option <?php echo ($eStatus == "Active") ? "selected" : "" ?> value="Active">Active</option>
																			<option <?php echo ($eStatus == "Inactive") ? "selected" : "" ?> value="Inactive">Inactive</option>
																		</select>
																	</td>
																</tr>
																<?php  } else { ?>
																<input type="hidden" name="eStatus" id="eStatus" value="Active">
																<?php  } ?>
																<tr>
																	<td height="40" style="text-align: left">&nbsp;</td>
																	<td>&nbsp;</td>
																	<td style="text-align: left">
																		<input type="Image" class="buttonstyle" lang="<?php echo $mode ?>"
																			src="<?php echo ($mode == "Update") ? $CFG->wwwroot."/public/images/" . "btn-modify.gif" : $CFG->wwwroot."/public/images/" . "btn-add.gif"; ?>" style="cursor: hand; border: 0"
																			onClick="return validate_new(document.frmadd);">
																		<input type="Image" class="buttonstyle" alt="Cancel" src="<?php echo $CFG->wwwroot."/public/images/" ?>btn-cancel.gif" style="cursor: hand; border: 0"
																			onclick="window.location='index.php?file=SubGroupAdmin&AX=Yes&iCompanyId=<?php echo $_REQUEST['iCompanyId'] ?>&iSGroupId=<?php echo $iSGroupId ?>';return false;">
																	</td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td class="inner-bottcurve">
															<div>
																<img src="<?php echo $CFG->wwwroot."/public/images/" ?>spacer.gif" />
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
    /*if(myPassword==""){
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
  document.getElementById('show_pass').style.display="none";
  }
}
function hide_password(){
    document.getElementById('Password').style.display="none";
    document.getElementById('vPassword').style.display=""; 
	document.getElementById('vPassword').value = document.getElementById('Password').value;
}
</script>
