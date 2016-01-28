<?php

# =========================================================================
# Paging Paging comes from this File. Don't Remove this below line.
# =========================================================================
if ($ADMIN_SHOWPAGING_TOP == "N" && $ADMIN_SHOWPAGING_BOTTOM == "N")
	$rec_limit = $num_totrec;

if ($rec_limit == '')
	$rec_limit = $REC_LIMIT;

include($CFG->dirroot . "/templates/general/paging.inc.php");
# =========================================================================
$start = $_REQUEST[start];

if (!$num_totrec > 0 && isset($keyword)) {
	$var_msg = "Your search for <font color=#000000>" . $keyword . "</font> has found <font color=#000000>0</font> matches:";
} else if (isset($keyword) && $keyword != "") {
	$var_msg = "Your search for <font color=#000000>" . $keyword . "</font> has found <font color=#000000>" . $num_totrec . "</font> matches:";
}
if (!isset($start))
	$start = 1;

$num_limit = ($start - 1) * $rec_limit;
$startrec = $num_limit;
$lastrec = $startrec + $rec_limit;
$startrec = $startrec + 1;
if ($lastrec > $num_totrec)
	$lastrec = $num_totrec;

if ($num_totrec > 0) {
	$recmsg = "Showing " . $startrec . " - " . $lastrec . " Records Of " . $num_totrec;
} else {
	$recmsg = "No Records Found.";
}

if ($_GET['var_msg'] != '')
	$var_msg = $_GET['var_msg'];
?>
