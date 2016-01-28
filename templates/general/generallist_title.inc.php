<?php

$BACK_LINK = "";
$tabHTML = "";
$switchToHTML = "";
if ($file == 'Help_Page_Detail') {
	$TOP_HEADER .= "[" . $GeneralObj->getFullName($_REQUEST['vPageCode'], ' vPageName ', 'vPageCode', 'help_page') . "]";
	$BACK_LINK = $CFG->dirroot . "/index.php?file=Help_Page&AX=Yes";
	$BACK_LABEL = "Back to Help Page Listing";
}
if ($file == 'LoginHistory') {
	$TOP_HEADER .= "[" . $GeneralObj->getFullName($_REQUEST['iId'], ' if(vFirstName!="",concat(vFirstName," ",vLastName) , concat(" " , vUserName , " "))', 'iAdminId', 'admin') . "]";
	$BACK_LABEL = "Back to Admin Details";
	$BACK_LINK = $CFG->dirroot . "/index.php?file=a-adminadd&mode=Update&iId=" . $_REQUEST['iId'];
	$tabHTML = $GeneralObj->DisplayTab('Admin', 2);
} else if ($file == 'job_view') {
	$TOP_HEADER .= "[" . $GeneralObj->getFullName($_REQUEST['iId'], 'vJobTitle', 'iJobId', 'job_master') . "]";
	$BACK_LABEL = "Back to Job Master Details";
	$BACK_LINK = $CFG->dirroot . "/index.php?file=job_master&AX=Yes";
	$tabHTML = $GeneralObj->DisplayTab('JobMaster', 2);
} else if ($file == 'job_application') {
	$TOP_HEADER .= "[" . $GeneralObj->getFullName($_REQUEST['iId'], 'vJobTitle', 'iJobId', 'job_master') . "]";
	$BACK_LABEL = "Back to Job Master Details";
	$BACK_LINK = $CFG->dirroot . "/index.php?file=job_master&AX=Yes";
	$tabHTML = $GeneralObj->DisplayTab('JobMaster', 3);
} else if ($file == "MemLoginHistory") {
	$BACK_LABEL = "Back to Edit Member";
	$BACK_LINK = $CFG->dirroot . "/index.php?file=u-memberadd&mode=Update&iId=" . $iId;
} else if ($file == "PollResult" && $_REQUEST['iPollId'] != '') {
	$vQuestion = $GeneralObj->getPollQuestion($_REQUEST['iPollId']);
	$TOP_HEADER .= " [ $vQuestion ]";
	$BACK_LABEL = "Back to Poll Question Listing";
	$BACK_LINK = $CFG->dirroot . "/index.php?file=Poll&AX=Yes";
}
/* else if($_GET['file']=='Category' && $_REQUEST['iCategoryId'] != ''){
 $BACK_LABEL = "Back to Parent Category";
$BACK_LINK  = "index.php?file=Category&AX=Yes&iCategoryId=".$_REQUEST['iCategoryId']."&vLangCode=".$_REQUEST['vLangCode'];
} */
?>
