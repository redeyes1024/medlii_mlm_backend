<?php  
include_once($CFG->dirroot."/lib/classes/"."application/PageSettings.Class.php5");

$pagesettingsObj = new PageSettings();

$GeneralObj->getRequestVars();
if ($mode=="Update") {
	$pagesettingsObj->select($iPageId);
}
$pagesettingsObj->setAllVar();
$redirect_file="index.php?file=t-page_settingadd&mode=$mode&iId=$iPageId";

$GeneralObj->checkDuplicate('iPageId', 'page_settings', Array('vPageCode'), $redirect_file, 'Page code is already exist', $iPageId);
$GeneralObj->checkDuplicate('iPageId', 'page_settings', Array('vFileName'), $redirect_file, 'File name is already exist', $iPageId);

if($mode=="Add")
{
	$pagesettingsObj->setvFilePath('templates/static/');
	$iPageId = $pagesettingsObj->insert();
	$pagesettingsObj->write_content($iPageId, $tContents);
	$msg=MSG_ADD;
	header("Location:index.php?file=Pagesetting&AX=Yes&var_msg=$msg");
	exit;
}
else if($mode=="Update")
{
	$pagesettingsObj->update($iPageId);
	$pagesettingsObj->write_content($iPageId, $tContents);
	$msg=MSG_UPDATE;
	header("Location:index.php?file=Pagesetting&AX=Yes&var_msg=$msg");
	exit;
}

?>
