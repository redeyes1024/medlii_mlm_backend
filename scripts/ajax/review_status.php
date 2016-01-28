<?php

include_once("../../includes/include.php");
include_once($CFG->dirroot."/lib/classes/" . 'application/cinema_review.Class.php5');
include_once($CFG->dirroot."/lib/classes/" . 'xml/XML.Class.php5');
$cinema_review_obj = new cinema_review();
$xmlObj = new XML();

if($_REQUEST['mode'] != "Delete")
{
	$mode = "";
	$id = "";
	if(isset($_REQUEST['mode']) && !empty($_REQUEST['mode']))
	{
		$mode = $_REQUEST['mode'];
	}
	if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
	{
		$id = stripslashes($_REQUEST['id']);
	}
	$status = $cinema_review_obj->update_status($mode,$id);
	if($status)
		$msg = "Record updated successfully!";
	else
		$msg = "Record updation unsuccessfully!";
}
else
{
	$status = $cinema_review_obj->delete(stripslashes($id));
	if($status)
		$msg = "Record deleted successfully!";
	else
		$msg = "Record deletion unsuccessfully!";
}

echo $msg;exit;
?>