<?php
//require_once ('..\config.php');
//require_once('config.php');
//include('../config.php');

/**
 * @desc 	Include files for database connection object, general paths,
 *           general class files and general variables which will be used in current project.
 * @author	Danil Skripnikov
 */
ob_start();
session_start();
$smarty_array = array();
global $CFG;
//include_once($CFG->wwwroot."/lib/generalsettings.php");
#echo $site_path;exit;
//include_once($CFG->wwwroot."/lib/db_config.php");
//
$r=$CFG->dirroot . '/lib/messages.php';
include_once($CFG->dirroot . '/lib/messages.php');

include_once($CFG->dirroot . '/lib/classes/database/DBConnection5.Calss.php5');

if (!isset($obj)) {
	$obj = new myclass($CFG->dbhost, $CFG->dbname, $CFG->dbuser, $CFG->dbpass);
}

include_once($CFG->dirroot . '/lib/classes/general/Table.Class.php5');
$TableObj = new Table($CFG->prefix);


include_once($CFG->dirroot . '/lib/classes/general/General.Class.php5');
$GeneralObj = new General();
$GeneralObj->getGeneralVar();


include($CFG->dirroot . '/lib/classes/application/encryptDcrypt.Class.php5');
$cryptObj = new encryptDcrypt($CFG->GAUserEncKey);

####    Include Class Files
#include_once($site_path.'function/tooltip.inc.php');

include_once($CFG->dirroot . '/lib/classes/general/Request.Class.php5');
include_once($CFG->dirroot . '/lib/classes/general/Gen_function.Class.php');
$GenFunctionObj = new GeneralFunction();

$lbl_required = "<FONT class=redmatter> *</FONT>";

function pr($var, $ex = 0) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
	if ($ex == 0)
		exit;
}

?>
