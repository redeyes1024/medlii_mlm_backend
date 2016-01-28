<?php
include_once($CFG->dirroot . "/lib/classes/" . "application/Audio.Class.php5");
$audioObj = new Audio();
$GeneralObj->getRequestVars();

$section = 'Audio';
$mode = $_REQUEST['mode'];
$iAudioCategoryId = $_REQUEST['iAudioCategoryId'];

if ($mode == "Update") {
	$audioObj->select($iAudioId);
	$audioObj->getAllVar();
} else {
	$mode = "Add";
}

if ($file != '')
	$link = "index.php?file=" . $file . "&mode=" . $mode . "&listfile=" . $listfile;

$TOP_HEADER = $mode . ' ' . $section;
if ($mode == 'Update')
	$TOP_HEADER .= ' [' . $vAudioName . ']';
?>
<form name="frmadd" method="post" enctype="multipart/form-data" action="index.php?file=m-audioadd_a" onsubmit="return CheckExtension('vAudiopath')">
	<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>">
	<input type="hidden" id="SAMPM" name="SAMPM" value="<?php echo $SAMPM; ?>">
	<input type="hidden" id="EAMPM" name="EAMPM" value="<?php echo $EAMPM; ?>">
	<input type="hidden" name="iAudioCategoryId" id="iAudioCategoryId" value="<?php echo $iAudioCategoryId; ?>">
	<input type="hidden" name="iAudioId" id="iAudioId" value="<?php echo $iAudioId; ?>">
	<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $vAudiopath; ?>">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId; ?>">
	<input type="hidden" name="qs" id="qs" value="<?php echo $url_concat; ?>">
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php
					if ($_SESSION["sess_eType"] == "4") {
    echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Audio Listing', 'index.php?file=Audio&AX=Yes&iAudioCategoryId=' . $iAudioCategoryId . '&iCompanyId=' . $iCompanyId . '&iSGroupId=' . $iSGroupId);
} else if ($_SESSION['sess_eType'] == "3") {
    echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Audio Listing', 'index.php?file=Audio&AX=Yes&iAudioCategoryId=' . $iAudioCategoryId . '&iSGroupId=' . $iSGroupId);
} else if ($_SESSION["sess_eType"] == "2") {
    echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Audio Listing', 'index.php?file=Audio&AX=Yes&iAudioCategoryId=' . $iAudioCategoryId);
}
?>
				</h1>
			</td>
		</tr>
		<?php
		if ($mode == "Update" || $mode == "Add") {
            $class = "class='tab_border'";
            ?>
		<tr>
			<td valign="bottom">
				<?php echo $GeneralObj->DisplayTab('Audio', 2); ?>
			</td>
		</tr>
		<?php } ?>
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
																						<div id="custom-location">
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
																	<td width="9%" valign="top" align="left">
																		Audio Title<span class="errormsg"> *</span>
																	</td>
																	<td width="1%" valign="top">:</td>
																	<td width="90%" align="left">
																		<input type="text" lang="*" title="Audio Title" name="vAudioName" size="25" value="<?php echo $vAudioName; ?>">
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">
																		Upload Audio<span class="errormsg"> *</span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<input class="INPUT" type="file" title="Upload Audio" name="vAudiopath" size="25" id="vAudiopath" onchange="">
																		&nbsp;
																		<?php
																		if ($mode == "Update") {
                                                                            global $CFG;
                                                                            if (is_file($CFG->datadirroot . "/audio/" . $vAudiopath)) {
                                                                                $simg = $CFG->datawwwroot . "/audio/" . $vAudiopath;
                                                                                //  list($width, $height, $type, $attr) = getimagesize($simg);
                                                                                ?>
																		<span style="width: 100px;"> <!--a href="JavaScript:void(0);" \="facebox"  onClick='return openPopupImageWindow("<?php echo $vPhotoPath ?>","<?php echo $simg ?>");'>
                                                                                   <img align="top" src="<?php echo $CFG->wwwroot . "/public/images/" ?>view.gif" border="0" title="View Banner"/></a-->
																			<a class="thickbox" href="<?php echo $CFG->wwwroot ?>/popup_video.php?vImage=<?php echo $vAudioName ?>&eType=audio&width=550&height=100&vImagepath=<?php echo $simg ?>"> <img
																				align="top" src="<?php echo $CFG->wwwroot . "/public/images/" ?>btn-play.gif" border="0" title="View Banner" />
																		</a>
																		</span>
																		<!--span style="width:100px; padding-left: 7px;">
                                                                                <img style="cursor:pointer" src="<?php echo $CFG->wwwroot . "/public/images/" ?>btn-delete.gif" title="Delete Banner"   onclick="return imagedelete(document.frmadd);" class="input1" align="top" /></span-->
																		<?php
                                                                            }
                                                                        }
                                                                        ?>
																		<br />
																		<small style="color: #FF0000">Valid Extension : .mp3</small>
																	</td>
																</tr>
																<tr>
																	<td valign="top" align="left">
																		Status<span class="errormsg"> </span>
																	</td>
																	<td valign="top">:</td>
																	<td align="left">
																		<select name="eStatus" id="eStatus">
																			<option <?php echo ($eStatus == "Active") ? "selected" : "" ?> value="Active">Active</option>
																			<option <?php echo ($eStatus == "Inactive") ? "selected" : "" ?> value="Inactive">Inactive</option>
																		</select>
																	</td>
																</tr>
																<tr>
																	<td height="40" style="text-align: left">&nbsp;</td>
																	<td>&nbsp;</td>
																	<td style="text-align: left">
																		<input type="Image" class="buttonstyle" lang="<?php echo $mode ?>"
																			src="<?php echo ($mode == "Update") ? $CFG->wwwroot . "/public/images/" . "btn-modify.gif" : $CFG->wwwroot . "/public/images/" . "btn-add.gif"; ?>"
																			style="cursor: pointer; border: 0" onClick="return validate_new(document.frmadd);">
																		<?php if ($_SESSION["sess_eType"] == "4") { ?>
																		<input type="Image" class="buttonstyle" alt="Cancel" src="<?php echo $CFG->wwwroot . "/public/images/" ?>btn-cancel.gif" style="cursor: pointer; border: 0"
																			onclick="window.location='index.php?file=Audio&AX=Yes&iAudioCategoryId=<?php echo $iAudioCategoryId ?>&iCompanyId=<?php echo $iCompanyId; ?>&iSGroupId=<?php echo $iSGroupId; ?>';return false;">
																		<?php } else if ($_SESSION['sess_eType'] == "3") { ?>
																		<input type="Image" class="buttonstyle" alt="Cancel" src="<?php echo $CFG->wwwroot . "/public/images/" ?>btn-cancel.gif" style="cursor: pointer; border: 0"
																			onclick="window.location='index.php?file=Audio&AX=Yes&iAudioCategoryId=<?php echo $iAudioCategoryId ?>&iSGroupId=<?php echo $iSGroupId; ?>';return false;">
																		<?php } else if ($_SESSION["sess_eType"] == "2") { ?>
																		<input type="Image" class="buttonstyle" alt="Cancel" src="<?php echo $CFG->wwwroot . "/public/images/" ?>btn-cancel.gif" style="cursor: pointer; border: 0"
																			onclick="window.location='index.php?file=Audio&AX=Yes&iAudioCategoryId=<?php echo $iAudioCategoryId ?>';return false;">
																		<?php } ?>
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
            $("#dEventDate").datepicker({ dateFormat: 'yy-mm-dd',
                inline: true,
                changeYear: true,
                buttonText:'Click to Select Date',
                showOn: "both",
                buttonImage: img,
                buttonImageOnly: true});
        });
    }
);   
       
    function CheckExtension(id)
    {        var valid_extensions = /(.mp3)$/i;
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
                            alert("Please upload valid .mp3 extension");
                            document.getElementById(id).focus();
                            return false;
                        }
            
                    }
                } else {
                    if(Image=="" || Image=="NULL"){
                        alert("Please upload valid .mp3 extension");
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
            if(mode!='Update') {
                alert("Please upload  Audio first!");
                document.getElementById(id).focus();
                return false;
            } else {
                return true;
            }
	    
            //return true;
        }
    }

 
     
     
                                          
    function imagedelete(frm){

        ans = confirm("Confirm Deletion of Audio?");
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
