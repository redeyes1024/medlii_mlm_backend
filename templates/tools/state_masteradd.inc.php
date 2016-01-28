<?php
include_once($CFG->dirroot."/lib/classes/"."application/State.Class.php5");
$StateObj = new State();
$GeneralObj->getRequestVars();

if($mode=="Update")
{
	$mystate=$StateObj->select($iStateId);
	$StateObj->getAllVar();

}
else
{
	$mode="Add";
}
if($file != '')
	$link = "index.php?file=".$file."&mode=".$mode."&listfile=".$listfile;
$section='State';
$TOP_HEADER = $mode.' '.$section;
?>
<form name="frmadd" method="post" action="index.php?file=t-state_masteradd_a" enctype="multipart/form-data" onSubmit="return validate_new(this);">
	<input type="hidden" name="mode" value="<?php echo $mode;?>">
	<input type="hidden" name="iStateId" value="<?php echo $iStateId;?>">
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="28">
				<h1>
					<?php echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER,"Back to State Listing","index.php?file=State&AX=Yes",$help);?>
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
															<table width="97%" border="0" cellpadding="3" cellspacing="1" align="center">
																<tr>
																	<td colspan="5">
																		<h4>
																			<table width="100%" border="0" cellspacing="2" cellpadding="2">
																				<tr>
																					<td>
																						&raquo; &nbsp;
																						<?php echo $section?>
																					</td>
																					<td align="right"></td>
																				</tr>
																			</table>
																		</h4>
																	</td>
																</tr>
																<tr>
																	<td width="15%">
																		Select Country<span class="errormsg"> *</span>
																	</td>
																	<td width="1%">:</td>
																	<td>
																		<?php  echo $GeneralObj->gendb_dynamicDropeDown('country_master','vCountryCode','vCountry','','eStatus="Active" order by vCountry','',$vCountryCode,'vCountryCode','230px','','Select Country','',' lang="*" title=" Country" ',''); ?>
																	</td>
																</tr>
																<tr>
																	<td width="15%">
																		State<span class="errormsg"> *</span>
																	</td>
																	<td width="3%">:</td>
																	<td width="82%">
																		<input class="INPUT" lang="*" type="Text" title="State " alt="*" name="vState" value="<?php echo $vState?>" size="40">
																	</td>
																</tr>
																<tr>
																	<td width="15%">
																		State Code<span class="errormsg"> *</span>
																	</td>
																	<td width="1%">:</td>
																	<td>
																		<input class="INPUT" type="Text" title="State Code" name="vStateCode" value="<?php echo $vStateCode?>" size="40" lang="*{A}" maxlength="5">
																	</td>
																</tr>
																<tr>
																	<td>Status</td>
																	<td>:</td>
																	<td>
																		<select name="eStatus" id="eStatus" title="Status">
																			<option <?php echo ($eStatus=="Active")? "selected":""?> value="Active">Active</option>
																			<option <?php echo ($eStatus=="Inactive")? "selected":""?> value="Inactive">Inactive</option>
																		</select>
																	</td>
																</tr>
																<tr>
																	<td height="40"></td>
																	<td></td>
																	<td>
																		<input type="Image" class="buttonstyle" src="<?php echo ($mode=="Update")?$CFG->wwwroot."/public/images/"."btn-modify.gif":$CFG->wwwroot."/public/images/"."btn-add.gif";?>"
																			style="cursor: hand; border: 0">
																		<input type="Image" class="buttonstyle" src="<?php echo $CFG->wwwroot."/public/images/"?>btn-cancel.gif" style="cursor: hand; border: 0"
																			onClick="window.location='index.php?file=State&AX=Yes<?php echo $Ext_Fields?>';return false;">
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
