<?php

include_once("include.php");
//echo $_SESSION["sess_logintype"];
if (!isset($_SESSION['sess_eType']) || $_SESSION['sess_eType'] == '') {
	include_once('includes/login.php');
	exit;
}
//By Danil
//else {
//    if ($_SESSION['sess_logintype'] == 'Super Admin') {
//
//        $_SESSION['sup'] = $_SESSION['sess_logintype'];
//        if (isset($_SESSION['com'])) {
//            unset($_SESSION['com']);
//        }
//        if (isset($_SESSION['gr'])) {
//            unset($_SESSION['gr']);
//        }
//    } elseif ($_SESSION['sess_logintype'] == 'Company Admin') {
//
//        $_SESSION['com'] = $_SESSION['sess_logintype'];
//        if (isset($_SESSION['sup'])) {
//            unset($_SESSION['sup']);
//        }
//        if (isset($_SESSION['gr'])) {
//            unset($_SESSION['gr']);
//        }
//    } elseif ($_SESSION['sess_logintype'] == 'Group Admin') {
//        $_SESSION['gr'] = $_SESSION['sess_logintype'];
//        if (isset($_SESSION['sup'])) {
//            unset($_SESSION['sup']);
//        }
//        if (isset($_SESSION['com'])) {
//            unset($_SESSION['com']);
//        }
//    }
//}
?>
