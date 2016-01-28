<?php
include_once($CFG->dirroot."/lib/classes/"."application/Country.Class.php5");
$CountryObj = new Country();
$GeneralObj->getRequestVars();

$section='Country';
if($mode=="Update")
{
	$CountryObj->select($iCountryId);
	$CountryObj->getAllVar();
}
else
{
	$mode="Add";
}

if($file != '')
	$link = "index.php?file=".$file."&mode=".$mode."&listfile=".$listfile;
$TOP_HEADER = $mode.' '.$section;
if($mode=='Update')
	$TOP_HEADER = $mode.' '.$section;
if($mode=='Update')
	$TOP_HEADER .= ' ['.$vCountry.']';
if($eType!='')
	$ExtraVal = "&eType=".$eType;
?>
<form name="frmadd" method="post" action="index.php?file=t-country_masteradd_a" enctype="multipart/form-data" onSubmit="return validate_new(this);">
	<input type="hidden" name="mode" value="<?php echo $mode;?>">
	<input type="hidden" name="iCountryId" value="<?php echo $iCountryId;?>">
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="28">
				<h1>
					<?php echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER,"Back to Country Listing","index.php?file=Country&AX=Yes",$help);?>
				</h1>
			</td>
		</tr>
		<tr>
			<td>
				<div class="listArea">
					<table width="100%" border="0" id="topsapce" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<span id="form1">
									<table width="100%" border="0" cellspacing="1" cellpadding="1">
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
															<table width="97%" border="0" cellpadding="3" cellspacing="1" align=center>
																<tr>
																	<td colspan="5">
																		<h4>
																			<table width="100%" border="0" cellspacing="2" cellpadding="2">
																				<tr>
																					<td>
																						&raquo; &nbsp;
																						<?php echo $section?>
																					</td>
																					<td align="right">
																						<?php  //if($mode == 'Update') {
//					echo "Switch To : ";
										  			//		echo $GeneralObj->gendb_dynamicDropeDown("country_master","iCountryId","vCountry","","1=1 order by vCountry",'',$_REQUEST['iCountryId'],'iCountryId','200','','','return switchto("'.$link.'",this.value);'); } ?>
																					</td>
																				</tr>
																			</table>
																		</h4>
																	</td>
																</tr>
																<tr>
																	<td colspan="5" height="4"></td>
																</tr>
																<tr>
																	<td width="10%"></td>
																	<td width="15%">
																		Country<span class="errormsg"> *</span>
																	</td>
																	<td width="1%" style="text-align: center" valign="top">:</td>
																	<td>
																		<input type="text" name="vCountry" value="<?php echo $vCountry?>" id="vCountry" title="Country" lang="*">
																	</td>
																	<td width="10%"></td>
																</tr>
																<tr>
																	<td width="10%"></td>
																	<td width="15%">
																		Country Code<span class="errormsg"> *</span>
																	</td>
																	<td width="1%" style="text-align: center" valign="top">:</td>
																	<td>
																		<input class="INPUT" lang="*{A}" type="Text" title="Country Code" name="vCountryCode" value="<?php echo $vCountryCode?>" size="9" maxlength="5">
																	</td>
																	<td width="10%"></td>
																</tr>
																<tr>
																	<td width="10%"></td>
																	<td width="15%">
																		Country ISO Code<span class="errormsg"> *</span>
																	</td>
																	<td width="1%" style="text-align: center" valign="top">:</td>
																	<td>
																		<input class="INPUT" lang="*{A}" type="Text" title="Country ISO Code" name="vCountryCodeISO_3" value="<?php echo $vCountryCodeISO_3?>" size="9" maxlength="5">
																	</td>
																	<td width="10%"></td>
																</tr>
																<tr>
																	<td width="10%"></td>
																	<td>Status</td>
																	<td style="text-align: center" valign="top" lang="*">:</td>
																	<td>
																		<select name="eStatus">
																			<option <?php echo ($eStatus=="Active")? "selected":""?> value="Active">Active</option>
																			<option <?php echo ($eStatus=="Inactive")? "selected":""?> value="Inactive">Inactive</option>
																		</select>
																	</td>
																	<td width="10%"></td>
																</tr>
																<tr>
																	<td width="10%"></td>
																	<td width="15%"></td>
																	<td colspan="3">
																		<input type="Image" class="buttonstyle" src="<?php echo ($mode=="Update")?$CFG->wwwroot."/public/images/"."btn-modify.gif":$CFG->wwwroot."/public/images/"."btn-add.gif";?>"
																			style="cursor: hand; border: 0">
																		<input type="Image" class="buttonstyle" src="<?php echo $CFG->wwwroot."/public/images/"?>btn-cancel.gif" style="cursor: hand; border: 0"
																			onClick="window.location='index.php?file=Country&AX=Yes<?php echo $Ext_Fields?>';return false;">
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
								</span>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</form>
