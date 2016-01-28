<?php  
include_once($CFG->dirroot."/lib/classes/"."application/Faq.Class.php5");
$faqObj = new Faq();
$GeneralObj->getRequestVars();
$section = 'Faq';
if($mode == "Update"){
	$faqObj->select($iFaqId);
	$faqObj->getAllVar();
	if($vUserName == 'admin')
		$readonly = 'readonly';
}
else{
	$mode = "Add";
}

if($file != '')
	$link = "index.php?file=".$file."&mode=".$mode."&listfile=".$listfile;

$TOP_HEADER = $mode.' '.$section;
if($mode=='Update')

	$TOP_HEADER .= ' ['.$vQuestion.']';
?>
<form name="frmadd" method="post" action="index.php?file=t-faqadd_a">
	<input type="hidden" name="mode" value="<?php echo $mode;?>">
	<input type="hidden" name="iFaqId" id="iFaqId" value="<?php echo $iFaqId;?>">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId;?>">
	<!--input type="hidden" name="qs" id="qs" value="<?php echo $url_concat;?>"-->
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php  echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Faq Listing', 'index.php?file=Faq&AX=Yes');?>
				</h1>
			</td>
		</tr>
		<?if($mode=="Update") {
			$class="class='tab_border'";
			?>
		<tr>
			<td valign="bottom">
				<?php  //echo $GeneralObj->DisplayTab('Admin',1); ?>
			</td>
		</tr>
		<?}
		?>
		<tr>
			<td>
				<div class="listArea">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<span id="form1">
									<table width="100%" border="0" cellspacing="1" cellpadding="1" <?php echo $class;?>>
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
																					<td align="right">
																						<?	if($mode == 'Update'){	
																							//	echo " Switch To : ";
																							// 	echo $GeneralObj->gendb_dynamicDropeDown("admin", "iAdminId", "concat(vFirstName,' ',vLastName)", "", " 1=1", '', $iId, 'iAdminId2', '200px;', '', '', 'return switchto("'.$link.'",this.value);');
																					} ?>
																					</td>
																				</tr>
																			</table>
																		</h4>
																	</td>
																</tr>
																<tr>
																	<td width="15%">
																		Question<span class="errormsg"> *</span>
																	</td>
																	<td width="3%">:</td>
																	<td width="82%">
																		<input type="text" lang="*" title="Question" name="vQuestion" size="40" value="<?php echo $vQuestion;?>">
																	</td>
																</tr>
																<tr>
																	<td valign="top">
																		Answer<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td>
																		<textarea title="Answer" cols="50" rows="8" name="vAnswer" lang="*" title="Answer">
																			<?php echo $vAnswer;?>
																		</textarea>
																	</td>
																</tr>
																<tr>
																	<td>
																		Order By<span class="errormsg"></span>
																	</td>
																	<td>:</td>
																	<td>
																		<input type="text" title="Order by" name="iOrderBy" size="5" value="<?php echo $iOrderBy;?>">
																	</td>
																</tr>
																<tr>
																	<td>Status</td>
																	<td>:</td>
																	<td>
																		<select name="eStatus" id="eStatus">
																			<option <?php echo ($eStatus=="Active")? "selected":""?> value="Active">Active</option>
																			<option <?php echo ($eStatus=="Inactive")? "selected":""?> value="Inactive">Inactive</option>
																		</select>
																	</td>
																</tr>
																<tr>
																	<td height="40" style="text-align: left">&nbsp;</td>
																	<td>&nbsp;</td>
																	<td style="text-align: left">
																		<input type="Image" class="buttonstyle" lang="<?php echo $mode?>"
																			src="<?php echo ($mode=="Update")?$CFG->wwwroot."/public/images/"."btn-modify.gif":$CFG->wwwroot."/public/images/"."btn-add.gif";?>" style="cursor: hand; border: 0"
																			onClick="return validate_new(document.frmadd);">
																		<input type="Image" class="buttonstyle" src="<?php echo $CFG->wwwroot."/public/images/"?>btn-reset.gif" onClick="reset();return false;" style="cursor: hand; border: 0">
																		<input type="Image" class="buttonstyle" alt="Cancel" src="<?php echo $CFG->wwwroot."/public/images/"?>btn-cancel.gif" style="cursor: hand; border: 0"
																			onclick="window.location='index.php?file=Faq&AX=Yes';return false;">
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
