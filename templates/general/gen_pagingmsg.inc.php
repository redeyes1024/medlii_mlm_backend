<?php

# =========================================================================
# Paging Paging comes from this File. Don't Remove this below line.
# =========================================================================
if ($ADMIN_SHOWPAGING_TOP == "N" && $ADMIN_SHOWPAGING_BOTTOM == "N")
	$rec_limit = $num_totrec;

include("templates/general/paging.inc.php");
# =========================================================================
//$keyword = stripcslashes($keyword);
$SearchMsg = "Your search for #keyword# has found #num_totrec# matches:";
if (!$num_totrec > 0 && isset($keyword)) {
	$var_msg = $SearchMsg;
	$var_msg = str_replace("#keyword#", "<font color=#000000>" . $keyword . "</font>", $var_msg);
	$var_msg = str_replace("#num_totrec#", "<font color=#000000>0</font>", $var_msg);
	//$var_msg = "Your search for <font color=#000000>$keyword</font> has found <font color=#000000>0</font> matches:";
} else if (isset($keyword) && $keyword != "") {
	$var_msg = $SearchMsg;
	$var_msg = str_replace("#keyword#", "<font color=#000000>" . $keyword . "</font>", $var_msg);
	//$var_msg = "Search Successfully";
	//$var_msg = "Your search for <font color=#000000>$keyword</font> has found <font color=#000000>$num_totrec</font> matches:";
	$var_msg = str_replace("#num_totrec#", "<font color=#000000>" . $num_totrec . "</font>", $var_msg);
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
	$recmsg = "Page Not Found";
}
?>
