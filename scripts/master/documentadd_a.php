<?php
include_once($CFG->dirroot."/lib/classes/"."application/Document.Class.php5");
include_once($CFG->dirroot."/lib/classes/"."application/User.Class.php5");
include_once($CFG->dirroot."/lib/classes/"."application/Email.Class.php5");
$documentObj = new Document();
$userObj = new User();
$emailObj = new Email();

#print_r($_REQUEST); exit;
$dCreated=date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$documentObj->setAllVar();
global $CFG;
#echo '<pre>'; print_R($_FILES); exit;
$_FILES['vDocumentpath']['name'] = str_replace(' ','',$_FILES['vDocumentpath']['name']);
$_FILES['vDocumentpath']['name'] = str_replace("'","",$_FILES['vDocumentpath']['name']);

if($_SESSION['sess_eType']=='Company Admin') {
	$iCompanyId = $_SESSION['sess_iCompanyId'];
	$qs = '&iSGroupId='.$iSGroupId;
} else if($_SESSION['sess_eType']=='Group Admin') {
	$iCompanyId = $_SESSION['sess_iCompanyId'];
	$iSGroupId = $_SESSION['sess_iSGroupId'];
	$qs ='';
} else {
	$qs ='&iCompanyId='.$iCompanyId.'&iSGroupId='.$iSGroupId;
}

if($mode == "Add")
{
	# echo "<pre>";  print_r($_FILES) ; exit;
	$redirect_file="index.php?file=m-documentadd".$qs."&iLibCategoryId=".$iLibCategoryId;
	$GeneralObj->checkDuplicate('iDocumentId', 'Document', Array('vDocumentName','iLibCategoryId'),$redirect_file, "Document Name Already Exists ", $vVideoName,' AND ');

	// $documentObj->setdCreated($dCreated);
	if(isset($_FILES['vDocumentpath']['name']) && $_FILES['vDocumentpath']['name'] != "") {
		$pdf_name = date('Ymdhis').$_FILES['vDocumentpath']['name'] ;

		if(copy($_FILES['vDocumentpath']['tmp_name'],$CFG->datadirroot . "/pdf/".$pdf_name)){
			if($pdf_name!='') {
				$documentObj->setvDocumentpath($pdf_name);
			}
		}
	}
	#echo $pdf_name.'##'; exit;
	//$documentObj->setiSGroupId($iSGroupId);
	$id1 = $documentObj->insert();
	$msg=MSG_ADD;

	if($eStatus=='Active')
	{
		// for Notification of users
		$sql_Category_select ="select vCategoryName FROM LibraryCategory WHERE  iLibCategoryId = ".$iLibCategoryId;
		$catagery_Array =  $obj->select($sql_Category_select);
		$user_emails =  $userObj->getNotificationUsers($iSGroupId);
		if(is_Array($user_emails) && count($user_emails)>0) {

			for($i=0;$i<count($user_emails);$i++) {

				//	$emailObj->send_add_documentmail($user_emails[$i]['vUsername'],$vDocumentName,$user_emails['admin_email'],$user_emails[$i]['vEmail'],$catagery_Array[0]['vCategoryName']);
				$sql_insert="INSERT INTO `cron_email` (`vEmail` ,`vUsername` ,`vName` ,`vAdmin_email` ,`vCategoryName` ,`eType` ,`iID`)
						VALUES ('".$user_emails[$i]['vEmail']."', '".$user_emails[$i]['vUsername']."', '".$vDocumentName."', '".$user_emails['admin_email']."', '".$catagery_Array[0]['vCategoryName']."', 'Document', '".$id1."')";
				//echo  $sql_insert;exit;
				$id=$obj->insert($sql_insert);
				/*
				 $to = ''.$user_emails[$i]['vEmail'].'';
				$subject = 'New Document added - Check it out';
				$message="<html>
				<head><title></title></head>
				<body>
				<table>
				<tr><td align='left'><img src=\"".$logo_url."\" border=\"0\" height='90' width='300'></td></tr>
				<tr><td height='10'>&nbsp;</td></tr>
				<tr><td height='10'>Dear <b>\"".$user_emails[$i]['vUsername']."\".</b></td></tr>
				<tr><td> New Document <b><U>$vDocumentName in ".$catagery_Array[0]['vCategoryName']."</U></b>  has just been added on the Sentara App. Please check it out.</td></tr>
				<tr><td height='10'>&nbsp;</td></tr>
				<tr><td height='10'><b>From:</b>  Sentara Mobile Content Administrator</td></tr>
				</table>
				</body>
				</html>";
				$headers = 'From: '.$user_emails['admin_email']. "\r\n";
				$headers.='Content-type: text/html; charset=iso-8859-1';
				@ mail($to, $subject, $message, $headers);
				*/
			}
		}
	}
	$url='index.php?file=Documents&AX=Yes'.$qs.'&iLibCategoryId='.$iLibCategoryId.'&var_msg='.$msg;
	header("Location:".$url);
	exit;
}
else if($mode == "Update")
{
	$sql_check="SELECT eStatus FROM Document WHERE iDocumentId='".$iDocumentId."' ";
	$check_status =$obj->select($sql_check);
	$check=$check_status[0]['eStatus'];

	if($check == 'Inactive' && $eStatus  == "Active"):
	$sql_Category_select ="select vCategoryName FROM LibraryCategory WHERE  iLibCategoryId = ".$iLibCategoryId;
	$catagery_Array =  $obj->select($sql_Category_select);
	$user_emails =  $userObj->getNotificationUsers($iSGroupId);
	if(is_Array($user_emails) && count($user_emails)>0) {

		for($i=0;$i<count($user_emails);$i++) {

			//$emailObj->send_add_documentmail($user_emails[$i]['vUsername'],$vDocumentName,$user_emails['admin_email'],$user_emails[$i]['vEmail'],$catagery_Array[0]['vCategoryName']);
			$sql_insert="INSERT INTO `cron_email` (`vEmail` ,`vUsername` ,`vName` ,`vAdmin_email` ,`vCategoryName` ,`eType` ,`iID`)
					VALUES ('".$user_emails[$i]['vEmail']."', '".$user_emails[$i]['vUsername']."', '".$vDocumentName."', '".$user_emails['admin_email']."', '".$catagery_Array[0]['vCategoryName']."', 'Document', '".$iDocumentId."')";
			//echo  $sql_insert;exit;
			$id=$obj->insert($sql_insert);

		}
	}
	endif;
	if(isset($_FILES['vDocumentpath']['name']) && $_FILES['vDocumentpath']['name'] != "") {
		$audio_name = date('Ymdhis').$_FILES['vDocumentpath']['name'] ;
		if(copy($_FILES['vDocumentpath']['tmp_name'],$CFG->datadirroot . "/pdf/".$audio_name))	{
			if($audio_name!='') {
				$documentObj->setvDocumentpath($audio_name);
				@unlink($CFG->datadirroot . "/pdf/".$_POST['vOldImage']);

			}

		}

	} else if($_POST['vOldImage'] != ""){
		$documentObj->setvDocumentpath($_POST['vOldImage']);
	}
	//$documentObj->setiSGroupId($iSGroupId);
	$documentObj->update($iDocumentId);
	$msg=MSG_UPDATE;
	$url='index.php?file=Documents&AX=Yes'.$qs.'&iLibCategoryId='.$iLibCategoryId.'&var_msg='.$msg;
	header("Location:".$url);
	exit;
}
else if($mode == "Delete")
{
	if(file_exists($CFG->datadirroot . "/pdf/".$_POST['vOldImage']))
	{
		@unlink($CFG->datadirroot . "/pdf/".$_POST['vOldImage']);

	}

	$sql_update = "UPDATE Document SET vDocumentpath = '' WHERE iDocumentId = '".$iDocumentId."'";
	$obj->sql_query($sql_update);
	$msg = "Image successfuly deleted.";
	header("Location:index.php?file=m-documentadd".$qs."&iLibCategoryId=".$iLibCategoryId."&mode=Update&iId=1&iDocumentId=".$iDocumentId);
	exit;
}



?>
