<?php
ob_start();
//include('../config.php');
global $CFG;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $CPANEL_TITLE ?></title>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $CFG->wwwroot ?>/public/js/SpryMenuBar.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot ?>/public/style/autocomplete.css"></link>
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot ?>/public/style/style.css"></link>
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot ?>/public/style/jquery-ui.css"></link>
<!--        <link rel="stylesheet" href="<?php echo $CFG->wwwroot; ?>/public/js/thickbox.css" type="text/css" media="screen" ></link>-->
<?php
/*  if ($file == 'SysContest') {
 echo "<link rel='stylesheet' type='text/css' href='" . $CFG->wwwroot . "/public/style/thickbox.css.></link>";
        }*/
        ?>
<base href="<?php  echo $CFG->wwwroot ?>/" />
</head>