<?php

#print_r("#"); exit;
require_once('../config.php');

include_once("include.php");

#	print_r($site_path); exit;

$CLASS_NAME = $_REQUEST['class'];



if (!file_exists($CFG->servicedirroot . "/Classes/" . $CLASS_NAME . ".php")) {

	echo "Class not found on the server ";

	exit;
}



require_once($CFG->servicedirroot . "/Classes/" . $CLASS_NAME . ".php");

$tmp_arr = @explode(".asmx/", $_SERVER['REDIRECT_URL']);

$FUNCTION_NAME = $tmp_arr[1];

if ($FUNCTION_NAME == '') {

	$FUNCTION_NAME = "index";
}



$JObj = new services_JSON();

$cobj = new $CLASS_NAME();

$response = $cobj->$FUNCTION_NAME();

#print_r($FUNCTION_NAME); exit;


echo $JObj->encode($response);

//$obj->close();

exit;
?>

