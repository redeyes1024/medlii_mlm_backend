<?php

include_once($CFG->dirroot."/lib/classes/"."application/emergency_service.Class.php5");

$emergency_serviceObj = new emergency_service();

$GeneralObj->getRequestVars();



$section = 'Emergency Service';

if($mode == "Update"){
	$emergency_serviceObj->select($iServiceId);
	$emergency_serviceObj->getAllVar();

}
else{
	$mode = "Add";
	$vPhone="====";
	$vEmail="====";
	//	$dAddedDate = date('Y-m-d H:i:s');
}
$vPhone_array=explode("!!!!",$vPhone);
for($k=0;$k<count($vPhone_array);$k++)
{
	$temp=explode("====",$vPhone_array[$k]);
	$vPhoneArray[]=$temp[0];
	$vPhoneDescArray[]=$temp[1];
}
$vEmail_array=explode("!!!!",$vEmail);
for($k=0;$k<count($vEmail_array);$k++)
{
	$temp1=explode("====",$vEmail_array[$k]);
	$vEmailArray[]=$temp1[0];
	$vEmailDescArray[]=$temp1[1];
}
$emailcount=count($vEmail_array);
$phonecount=count($vPhone_array);

if($file != '')
	$link = "index.php?file=".$file."&mode=".$mode."&listfile=".$listfile;

$TOP_HEADER = $mode.' '.$section;
if($mode=='Update')

	$TOP_HEADER .= ' ['.$vCompany.']';

?>
</script>
<script src="<?php echo $fck_editor_url?>fckeditor.js"></script>
<form name="frmadd" method="post" action="index.php?file=m-emergency_serviceadd_a">
	<input type="hidden" name="mode" id="mode" value="<?php echo $mode;?>">
	<input type="hidden" name="iServiceId" id="iServiceId" value="<?php echo $iServiceId;?>">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId;?>">
	<input type="hidden" name="qs" id="qs" value="<?php echo $url_concat;?>">
	<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td height="40">
				<h1>
					<?php  echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, 'Back to Emergency Service Listing', 'index.php?file=emergency_service&AX=Yes');?>
				</h1>
			</td>
		</tr>
		<?if($mode=="Update") {
			$class="class='tab_border'";
			?>
		<tr>
			<td valign="bottom">
				<?php  //echo $GeneralObj->DisplayTab('ClubImages',1); ?>
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
															<table width="97%" id="Table" border="0" cellpadding="3" cellspacing="1" align="center">
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
																						<div id="custom-location">
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
																	<td valign="top">
																		<table width="100%" border="0" cellpadding="3" cellspacing="1" align="left">
																			<tr>
																				<td width="15%">
																					Company<span class="errormsg"> *</span>
																				</td>
																				<td width="3%">:</td>
																				<td width="82%">
																					<input type="text" title="Company" lang="*" title="Company" name="vCompany" size="30" value="<?php echo $vCompany;?>">
																				</td>
																			</tr>
																			<tr>
																				<td valign="top">
																					Status<span class="errormsg"> </span>
																				</td>
																				<td valign="top">:</td>
																				<td>
																					<select name="eStatus" id="eStatus">
																						<option <?php echo ($eStatus=="Active")? "selected":""?> value="Active">Active</option>
																						<option <?php echo ($eStatus=="Inactive")? "selected":""?> value="Inactive">Inactive</option>
																					</select>
																				</td>
																			</tr>
																		</table>
																		<table width="100%" border="0">
																			<?php for($n=0;$n<count($vEmail_array);$n++){?>
																			<tr id="email<?php echo ($n+1)?>">
																				<td width="100%" colspan="3" valign="top">
																					<div width="50px" class="NewDivClass">
																						<table width="100%">
																							<tr>
																								<td colspan="8" align="right">
																									<?php if($n==0){?>
																									<span id="emailbutton"> <a id="add" style="cursor: pointer; border: 0" onclick="addemailhtml()">Add More</a> <input type="hidden" title="Phone Discription" name="emailrow"
																											id="emailrow" size="40" value="<?php echo $emailcount?>">
																									</span>
																									<?}
																									?>
																								</td>
																							</tr>
																							<tr>
																								<td width="15%">Email</td>
																								<td width="3%" valign="top">:</td>
																								<td width="30%" valign="top">
																									<input type="text" lang="_{E}" title="Email" name="vEmailArray[]" size="40" value="<?php echo $vEmailArray[$n];?>">
																								</td>
																							</tr>
																							<tr>
																								<td width="8%">Discription</td>
																								<td width="3%">:</td>
																								<td width="82%">
																									<input type="text" lang="" title="Email Discription" name="vEmailDescArray[]" size="40" value="<?php echo $vEmailDescArray[$n];?>">
																									<?php
																									if($emailcount==($n+1) )
																									{
																										$style="";
																									}
																									else
																									{
																										$style="display:none";

																									}
																									?>
																									<span id="emaildeletebutton<?php echo ($n+1)?>" style="<?php echo $style;?>" > <a id="add" style="cursor: pointer; border: 0;" onclick="deleteemailhtml(<?php echo ($n+1)?>)">Delete</a>
																									</span>
																								</td>
																							</tr>
																							<tr>
																								<td colspan="8" align="right"></td>
																							</tr>
																						</table>
																					</div>
																				</td>
																			</tr>
																			<?}
																			?>
																		</table>
																	</td>
																	<td colspan="2" valign="top">
																		<table width="100%" border="0">
																			<?php for($m=0;$m<count($vPhone_array);$m++){?>
																			<tr id="phone<?php echo ($m+1)?>">
																				<td width="100%" colspan="3" valign="top">
																					<div width="50px" class="NewDivClass">
																						<table width="100%">
																							<tr>
																								<td colspan="8" align="right">
																									<?php if($m==0){?>
																									<span id="button"> <a id="add" style="cursor: pointer; border: 0" onclick="addhtml()">Add More</a> <input type="hidden" title="Phone Discription" name="row" id="row" size="40"
																											value="<?php echo $phonecount;?>">
																									</span>
																									<?}
																									?>
																								</td>
																							</tr>
																							<tr>
																								<td width="15%">
																									Phone<span class="errormsg"> *</span>
																								</td>
																								<td width="3%" valign="top">:</td>
																								<td width="30%" valign="top">
																									<input type="text" title="Phone Number" lang="*{T[-][()][+]}" maxlength="20" title="Phone Number" name="vPhoneArray[]" size="40" value="<?php echo $vPhoneArray[$m];?>">
																								</td>
																							</tr>
																							<tr>
																								<td width="8%">Discription</td>
																								<td width="3%">:</td>
																								<td width="82%">
																									<input type="text" title="Phone" lang="" title="Phone Discription" name="vPhoneDescArray[]" size="40" value="<?php echo $vPhoneDescArray[$m];?>">
																									<?php
																									if($phonecount==($m+1) && ($m+1)!='1' )
																									{
																										$style="";
																									}
																									else
																									{
																										$style="display:none";
																									}
																									?>
																									<span id="deletebutton<?php echo ($m+1)?>" style="<?php echo $style;?>" > <a id="add" style="cursor: pointer; border: 0;" onclick="deletehtml(<?php echo ($m+1)?>)">Delete</a>
																									</span>
																								</td>
																							</tr>
																							<tr>
																								<td colspan="8" align="right"></td>
																							</tr>
																						</table>
																					</div>
																				</td>
																			</tr>
																			<?}
																			?>
																		</table>
																	</td>
																</tr>
																<tr>
																	<td style="text-align: right">
																		<input type="Image" class="buttonstyle" lang="<?php echo $mode?>"
																			src="<?php echo ($mode=="Update")?$CFG->wwwroot."/public/images/"."btn-modify.gif":$CFG->wwwroot."/public/images/"."btn-add.gif";?>" style="cursor: hand; border: 0"
																			onClick="return validate_new(document.frmadd);">
																		<input type="Image" class="buttonstyle" src="<?php echo $CFG->wwwroot."/public/images/"?>btn-reset.gif" onClick="reset();return false;" style="cursor: hand; border: 0">
																		<input type="Image" class="buttonstyle" alt="Cancel" src="<?php echo $CFG->wwwroot."/public/images/"?>btn-cancel.gif" style="cursor: hand; border: 0"
																			onclick="window.location='index.php?file=emergency_service&AX=Yes';return false;">
																	</td>
																	<td height="40" style="text-align: left">&nbsp;</td>
																	<td>&nbsp;</td>
																</tr>
															</table>
														</td>
														<td></td>
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
<script type="text/javascript">
//getStateName('mall_country','mall_state','<?php echo $mall_state?>');
/* function chackvalid()
 {
  var val=  checkvalue();

    if(val==false)
    {
    return false;
    }else
    {
    return validate_new(document.frmadd);
    }

 }

function checkvalue()
{
var from=document.getElementById('mall_from_time').value;
var to=document.getElementById('mall_to_time').value ;

    if(parseInt(from) > parseInt(to))
    {
        alert("Plese select To time Biger than From time");
        document.getElementById('mall_to_time').focus();
         return false;
    }
    else
    {
       return true;
    }

}
 /*
var img = "<?php echo $CFG->wwwroot."/public/images/"?>cal.gif";
alert(img);
$(function(){
	$("#mall_from_time").datepicker({ dateFormat: 'yy-mm-dd',
	inline: true,
	changeYear: true,
	buttonText:'Click to Select Date',
	showOn: "both",
	buttonImage: img,
	buttonImageOnly: true});
});  */
$('document').ready(
 function(){
//alert("##");
var img = "<?php echo $CFG->wwwroot."/public/images/"?>cal.gif";
//alert(img); 
$(function(){
	$("#dDateOfBirth").datepicker({ dateFormat: 'yy-mm-dd',
	inline: true,
	changeYear: true,
	buttonText:'Click to Select Date',
	showOn: "both",
	buttonImage: img,
	buttonImageOnly: true});
}); 

  /*
$("#add").click(
  function()
  {
    //$(this).val();
    var html=''; 
    var i=parseInt($("#row").val())+1;
    var j=parseInt($("#row").val());
    $('#button').remove();
    html='<tr id="phone'+i+'">'
							+'<td width="15%" valign="top">Phone<span class="errormsg"> *</span></td>'
							+'<td width="3%" valign="top">:</td>'
							+'<td width="82%" valign="top">'
						  +'<input type="text" title="Phone" lang="*" title="Phone" name="vPhone" size="40" value="<?php echo $vPhone;?>">'
              +'</td>'
					    +'</tr>'
						  +'<tr id="phonedes'+i+'">'
		          +'<td width="15%">Discription</td>'
						  +'<td width="3%">:</td>'
						  +'<td width="82%">'
						  +'<input type="text" title="Phone" lang="" title="Phone Discription" name="vPhoneDesc" size="40" value="<?php echo $vPhoneDesc;?>">'
						  +'<span id="button" valign="bottom">'
						  +'<a id="add" style="cursor:pointer;border:0">Add</a>'
						  +'<input type="hidden"  title="Phone Discription" name="row" id="row" size="40" value="'+i+'">'
						  +'</span>' 
						  +'</td>'
					    +'</tr>';
   $(html).insertAfter('#phonedes'+j);
//	alert($("#row").val());			    
    
  }
);

 */   
}
);

function addhtml()
{
     var html=''; 
    var i=parseInt($("#row").val())+1;
    var j=parseInt($("#row").val());
    buttonhtml='<span id="button" valign="bottom">'
        						      +'<a id="add"  style="cursor:pointer;border:0" onclick="deletehtml('+j+')" >Delete</a>'
        						      +'<input type="hidden"  title="Phone Discription" name="row" id="row" size="40" value="1">'
        						    +'</span>';
    
    $('#row').val(i);
    $('#deletebutton'+j).hide();
    html='<tr id="phone'+i+'"  >'
        							+'<td width="100%" colspan="3" valign="top" >'
        							+'<div width="50px"  class="NewDivClass">'
        							    + '<table width="100%" >'
        							     +'<tr>'
        							       +'<td colspan="8" align="right">'
          							     +'</td>'
        							     +'</tr>'
        							     +'<tr>'
        							     +'<td width="15%"> Phone<span class="errormsg"> *</span></td>'
            							+'<td width="3%" valign="top">:</td>'
            							+'<td width="30%" valign="top">'
            								  +'<input type="text" title="Phone" lang="*{T[-][()][+]}" maxlength="20"  title="Phone" name="vPhoneArray[]" size="40" value="">'
            							+'</td>'
            						 +'</tr>'
            						 +'<tr>'
            						   	+'<td width="8%">Discription</td>'
              						  +'<td width="3%">:</td>'
              						  +'<td width="82%">'
              						    +'<input type="text" title="Phone" lang="" title="Phone Discription" name="vPhoneDescArray[]" size="40" value="">'
              						     +'<span id="deletebutton'+i+'"  >'
                						      +'<a id="add"  style="cursor:pointer;border:0" onclick="deletehtml('+i+')" >Delete</a>'
                						    +'</span>'
              						  +'</td>'
            						 +'</tr>'
                          +'<tr>'
        							       +'<td colspan="8" align="right">'
          							     +'</td>'
        							     +'</tr>'
                        +'</table>'	   
        								 +'</div>'  
                       +'</td>'
        						+'</tr>';
   $(html).insertAfter('#phone'+j);
}

function deletehtml(id_no)
{
   if($("#row").val()==id_no)
   {    var t=parseInt($("#row").val())-1;
         if(t!=1)
         {
           $('#deletebutton'+t).show();
         }
   
      $("#row").val(t);
   }
   //alert($("#row").val());
   $('#phone'+id_no).remove();
  //alert(id_no);
}

// for email
function addemailhtml()
{
     var html=''; 
    var i=parseInt($("#emailrow").val())+1;
    var j=parseInt($("#emailrow").val());
    buttonhtml='<span id="emailbutton" valign="bottom">'
        						      +'<a id="add"  style="cursor:pointer;border:0" onclick="deletehtml('+j+')" >Delete</a>'
        						      +'<input type="hidden"  title="Phone Discription" name="row" id="row" size="40" value="1">'
        						    +'</span>';
    
    $('#emailrow').val(i);
    $('#emaildeletebutton'+j).hide();
    html='<tr id="email'+i+'"  >'
        							+'<td width="100%" colspan="3" valign="top" >'
        							+'<div width="50px"  class="NewDivClass">'
        							    + '<table width="100%" >'
        							     +'<tr>'
        							       +'<td colspan="8" align="right">'
          							     +'</td>'
        							     +'</tr>'
        							     +'<tr>'
        							     +'<td width="15%"> Email</td>'
            							+'<td width="3%" valign="top">:</td>'
            							+'<td width="30%" valign="top">'
            								  +'<input type="text" title="Email" lang="_{E}"  name="vEmailArray[]" size="40" value="">'
            							+'</td>'
            						 +'</tr>'
            						 +'<tr>'
            						   	+'<td width="8%">Discription</td>'
              						  +'<td width="3%">:</td>'
              						  +'<td width="82%">'
              						    +'<input type="text" lang="" title="Email Discription" name="vEmailDescArray[]" size="40" value="">'
              						     +'<span id="emaildeletebutton'+i+'"  >'
                						      +'<a id="add"  style="cursor:pointer;border:0" onclick="deleteemailhtml('+i+')" >Delete</a>'
                						    +'</span>'
              						  +'</td>'
            						 +'</tr>'
                          +'<tr>'
        							       +'<td colspan="8" align="right">'
          							     +'</td>'
        							     +'</tr>'
                        +'</table>'	   
        								 +'</div>'  
                       +'</td>'
        						+'</tr>';
   $(html).insertAfter('#email'+j);
}
function deleteemailhtml(id_no)
{
   if($("#emailrow").val()==id_no)
   {    var t=parseInt($("#emailrow").val())-1;
       // if(t!=1)
        {
         $('#emaildeletebutton'+t).show();
        }
    
      $("#emailrow").val(t);
   }
   //alert($("#row").val());
   $('#email'+id_no).remove();
  //alert(id_no);
}

</script>
