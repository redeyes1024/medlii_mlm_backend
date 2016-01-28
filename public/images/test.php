<?php
include_once("../../includes/noentry.php");


#Included class
include_once($CFG->dirroot."/lib/classes/"."application/Job_Master.Class.php5");


#Object of each class
$JobMasterObj = new Job_Master();


$GeneralObj->getRequestVars();



if($mode=="Update")
{
	$JobMasterObj->select($iId);
	$JobMasterObj->getAllVar();

}
else{
	$mode = "Add";
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1250">
<meta name="generator" content="PSPad editor, www.pspad.com">
<title></title>
</head>
<body style="background: none;">
	<form name="frmcompanylogo" id="frmcompanylogo" method="post" action="<?php echo $CFG->dirroot?>index.php?file=t-job_masteradd_a" enctype="multipart/form-data">
		<fieldset>
			<legend>Company Logo</legend>
			<table width="100%" border="0" cellspacing="3" cellpadding="3">
				<tr>
					<input type="hidden" name="mode" value="<?php echo $mode;?>">
					<input id="field" type="hidden" maxlength="100" name="field" size="24" value="imageupload">
					<input type="hidden" name="iId" value="<?php echo $iId;?>">
					<input id="oldImage" type="hidden" maxlength="100" name="oldImage" size="24" value="<?php echo $vCompanyLogo?>">
					<td>
						<?php												$filename = $company_image_path.$vCompanyLogo;
						if(file_exists($filename) && $vCompanyLogo !='') {
											?>
						<img class="img-border" height="120px" width="120px" src="<?php echo $company_image_url.$vCompanyLogo?>">
						<?php											}else
						{?>
						<img class="img-border" height="120px" width="120px" src="<?php echo $company_image_url?>noimage_small.gif">
						<?}
						?>
					</td>
					<td>
						<input type="file" lang="*" alt="vCompanyLogo" title="Company Logo" id="vCompanyLogo" name="vCompanyLogo">
						<br />
						<input type="Image" class="buttonstyle" alt="<?php echo $mode;?>"
							src="<?php echo ($mode=="Update")?$CFG->wwwroot."/public/images/"."btn-modify.gif":$CFG->wwwroot."/public/images/"."btn-add.gif";?>" style="cursor: hand; border: 0"
							onClick="return checkextention(document.frmcompanylogo);">
						<!--	<input type="image" class="buttonstyle" style="cursor:hand;border:0" alt="<?php echo $mode;?>" src="<?php echo $CFG->wwwroot."/public/images/"?>btn-delete.gif"/>-->
					</td>
				</tr>
				<tr>
				</tr>
			</table>
			</legend>
		</fieldset>
	</form>
</body>
</html>
<link rel="stylesheet" type="text/css" href="<?php echo $admin_style_url?>style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $admin_style_url?>jquery-ui.css">
