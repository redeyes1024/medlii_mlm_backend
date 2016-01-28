<?php

include_once($CFG->dirroot . "/lib/classes/" . "application/PageSettings.Class.php5");
$pagesettingsObj = new PageSettings();
$GeneralObj->getRequestVars();
$mode == "Update";
$about_pg = $pagesettingsObj->get_page_by_code('aboutus');
$iPageId = $about_pg[0]['iPageId'];
$pagesettingsObj->setAllVar();
$redirect_file = "index.php?file=t-aboutusadd";

$GeneralObj->checkDuplicate('iPageId', 'page_settings', Array('vPageCode'), $redirect_file, 'Page code is already exist', $iPageId);
$GeneralObj->checkDuplicate('iPageId', 'page_settings', Array('vFileName'), $redirect_file, 'File name is already exist', $iPageId);

$pagesettingsObj->select($iPageId);
$pagesettingsObj->setAllVar();
$pagesettingsObj->update($iPageId);
$pagesettingsObj->write_content($iPageId, $tContents);
$msg = MSG_UPDATE;
header("Location:index.php?file=t-aboutusadd&var_msg=" . $msg . "");
exit;
?>