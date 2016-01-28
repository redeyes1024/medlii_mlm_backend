<?php

include_once("services_JSON.php");
include_once('DBConnection5.Calss.php5');
include_once("Classes/General.php");
/* include_once("Classes/class.image-resize.php"); */
/* include_once("xml2array.php"); */
include_once("Email.Class.php5");

if (!isset($obj)) {
	$obj = new myclass($CFG->dbhost, $CFG->dbname, $CFG->dbuser, $CFG->dbpass);
}

/* if (!isset($imgobj)) {
 $imgobj = new img_opt();
}
*/
if (!isset($General)) {
	$GeneralObj = new General();
}
$emailObj = new Email();
?>

