<?php
set_time_limit(0);
ini_set ( "memory_limit", "20M");
$TOP_HEADER='Bulk Mails';

if($eFormat == '')
	$eFormat = 'html';

$sql = "SELECT iUserId,concat(vFirstName,' ', vLastName) as vName, vEmail FROM user WHERE eNewsLetter = 'Yes' ORDER BY vFirstName" ;
$db_newsletter_user = $obj->select($sql);

$newsletterArr_user = "";
for($j=0; $j<count($db_newsletter_user); $j++)
{
	if($j == count($db_newsletter_user) -1)
	{
		$newsletterArr_user .= "['". $db_newsletter_user[$j]['iUserId'] ."','". $db_newsletter_user[$j]['vName'] ."','".$db_newsletter_user[$j]['vEmail']."']";
	}
	else
	{
		$newsletterArr_user .= "['".$db_newsletter_user[$j]['iUserId'] ."', '". $db_newsletter_user[$j]['vName'] ."','".$db_newsletter_user[$j]['vEmail']."'],";
	}
}

$vFromEmail=$EMAIL_ADMIN;

?>
<script type="text/javascript">
	newsletterArr_user = new Array(<?php echo $newsletterArr_user?>);
</script>
<form name="frmadd" method="post" action="index.php?file=t-bulk_mails_a" enctype="multipart/form-data">
	<input type="hidden" name="mode" value="<?php echo $mode;?>">
	<input type="hidden" name="iEmailTemplateId" id="iEmailTemplateId" value=<?php echo $iId;?>>
	<table width="97%" border="0" id="topsapce" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="28" width="89%">
				<h1>Bulk Mail</h1>
			</td>
			<td width="8%" align="right">
				<?php echo $help?>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="midd-contentbg">
				<table width="100%" class="midd-tableborder" border="0" id="topsapce" cellpadding="0" cellspacing="0">
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>
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
										<table width="97%" border="0" align="center" cellspacing="1" cellpadding="3">
											<tr>
												<td width="15%">
													To Send<span class="errormsg"> *</span>
												</td>
												<td width="3%">:</td>
												<td colspan="2">
													<select name="eToSend" style="width: 250px" lang="*" title=" Group" onchange="checkSendGroup(document.getElementById('vEmail'),this.value);" class="input">
														<option value=""><< Select Send Group >></option>
														<option value="All Registered User">All Registered User</option>
														<option value="Other">Other</option>
													</select>
												</td>
											</tr>
											<tr id="notdisplay">
												<td valign="top">
													<span id="lable">User</span><span class="errormsg"> *</span>
												</td>
												<td valign="top">:</td>
												<td class="bmatter" id="selectid">
													<select id="vEmail" name="vEmailId[]" multiple="" size="6" style="width: 350px" title=" User"></select>
												</td>
												<td class="bmatter" id="textid" style="display: none">
													<textarea name="vtextEmail" id="vtextEmail" title="Email Address" style="width: 350px" rows="4" class="input"></textarea>
												</td>
											</tr>
											<tr>
												<td>
													Subject<span class="errormsg"> *</span>
												</td>
												<td>:</td>
												<td colspan="2">
													<input type="text" lang="*" title="Subject" name="vSubject" size="80" style="width: 345px;" value="<?php echo $vSubject;?>">
												</td>
											</tr>
											<tr>
												<td>
													From Email<span class="errormsg"> *</span>
												</td>
												<td>:</td>
												<td colspan="2">
													<input type="text" lang="*{E}" title="From Email" name="vFromEmail" size="50" value="<?php echo $vFromEmail;?>">
												</td>
											</tr>
											<tr>
												<td valign="top">
													Message<span class="errormsg"> *</span>
												</td>
												<td valign="top">:</td>
												<td colspan="5">
													<?php
													//echo $editor_url;exit;
													include_once($CFG->dirroot. "/components/ckeditor/ckeditor.php");
													$CKEditor = new CKEditor();
													$config = array();

													$CKEditor->editor('tEmailMessage',$tEmailMessager,$config);
													?></td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td height="40" colspan="5">
													<input type="Image" id="send" class="buttonstyle" alt="<?php echo $mode?>" src="<?php echo $CFG->wwwroot."/public/images/"."btn-send.gif";?>" style="cursor: hand; border: 0"
														onClick="return vaildate_faq(document.frmadd,'tEmailMessage');">
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
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
function emptyTheCombo(objCombo)
{
     var objCombo_length = objCombo.length;
	for(var i=0;i<objCombo_length;i++)
	{
		objCombo.options[0] = null;
	}
}
var html='';
function checkSendGroup(control,val)
{
	control=document.getElementById('vEmail');
	emptyTheCombo(control);

	if(val =="")
	{
	     document.getElementById("notdisplay").style.display = 'none';
	}
	else if(val == 'Other')
	{
	     document.getElementById("notdisplay").style.display = '';
		document.getElementById("textid").style.display = '';
		document.getElementById("selectid").style.display = 'none';
		document.getElementById("lable").innerHTML = 'Enter Email Address<br>(Seperate Emails by Comma)';
		document.getElementById("vEmail").lang = '';
		document.getElementById("vtextEmail").lang = '*{E}';
	}
	else
	{
		document.getElementById("notdisplay").style.display = '';
		document.getElementById("textid").style.display = 'none';
		document.getElementById("selectid").style.display = '';
		document.getElementById("lable").innerHTML = 'User';
		document.getElementById("vEmail").lang = '*{E}';
		document.getElementById("vtextEmail").lang = '';
		var length1 = val.length;
		var indexoftype = val.indexOf(' ');
		var status = '';
		status = val.substring(0,indexoftype);
		var usertype = val.substring(indexoftype+1,length1);
		if(val == 'All Registered User')
          	{
			for(i=0,j=0; i<newsletterArr_user.length; i++)
               		{
				control.options[j] = new Option(newsletterArr_user[i][2]);
				control.options[j].value = newsletterArr_user[i][2];
				j++;
			}
		}
	}
}
checkSendGroup(document.getElementById("vUser"),'');

function vaildate_faq(frm,fckId)
{
	ans=validate(frm);
	if(ans)
	{
    		var result = stripspace(CKEDITOR.instances["tEmailMessage"].getData());
		if(result=="")
		{
               		alert("Please Enter Message");
               		return false;
          	}
          		return true;
     	}
     	else
        	return false;
}

function valid(frm)
{
	if(document.getElementById('textid').style.display == '')
     	{
		if(checkvalidation()==false)
		{
			return false;
          	}
	}
     	if(!validate(frm))
     	{
        	return false;
	}
     	var fck = FCKeditorAPI.GetInstance('tEmailMessage');
     	var fckvalue = fck.GetXHTML();
     	var fckTagStrippedstring = fckvalue.replace(/<\/?[^>]+(>|$)/g, "");
     	var fckTagStrippedvalue = fckTagStrippedstring.replace(/^(&nbsp;)+/i, "");
	if(fck.GetXHTML() == "" || fck.GetXHTML() == null || fckTagStrippedvalue=='')
     	{
		alert('Please enter Message in editor.');
          	fck.Focus();
	     	return false;
     	}
	return true;
}
function checkvalidation()
{
	var emailadd = document.getElementById('vtextEmail').value.split(',');
     	if(document.getElementById('vtextEmail').value!='')
     	{
		for (var i=0; i<emailadd.length; i++)
          	{
			if(email_validate(emailadd[i]) == 0)
               		{
				return false;
			}
	     	}
     	}
     	else
     	{
		alert('Please Enter Email Address');
  	     	return false;
     	}
}
function email_validate(email)
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([org|com]{2,4})$/;
	if(reg.test(email) == false)
     	{
		flg = 0;
		alert('Entered Email Addresses Contains An Invalid Email Address(s), Please Try .com or .org Only.');
		return flg;
     	}
     	else
     	{
        	flg = 1;
		return flg;
	}
}
</script>
