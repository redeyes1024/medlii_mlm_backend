<?php

//CODE FOR PAGING
#echo "<br>REC_LIMIT >> $REC_LIMIT"."<br/>";
#echo "<br>Page_LIMIT >> $PAGELIMIT"."<br/>";
if (!isset($num_totrec))
	$num_totrec = $db_rec[0]["tot"];

//$num_totrec SHOULD BE PASSED
if (!isset($pg_limit) & empty($pg_limit))
	$pg_limit = $PAGELIMIT; //page limit
if (!isset($rec_limit) & empty($rec_limit))
	$rec_limit = $RECLIMIT;  //record limit

$var_self = '';//$obj->HOST;  //url
$num_tmp = 0;
$var_flg = "0";
$var_limit = "";
$num_limit = 0;
$var_filter = "";

$tempvar = $_REQUEST['tempvar'];
$stat = $_REQUEST['stat'];
$sorton = $_REQUEST['sorton'];
$start = $_REQUEST['start'];
$nstart = $_REQUEST['nstart'];

//if sorting is set
$var_sortpaging_link = "";
if (isset($sorton))
	$var_sortpaging_link = "&sorton=" . $sorton . "&tempvar=true&stat=" . $stat;

if (isset($tempvar) & !empty($tempvar)) {
	if ($stat == 1 & $tempvar == "true")
		$stat = 0;
	else if ($stat == 0 & $tempvar == "true")
		$stat = 1;
	else
		$stat = 1;
}
$admin_asc_order = $CFG->wwwroot."/public/images/down_arrow.gif";
$admin_desc_order = $CFG->wwwroot. "/public/images/up_arrow.gif";
$sort_order = ($stat == 1) ? $admin_asc_order : $admin_desc_order;
$sort_img = "<img src='" . $sort_order . "' border='0'>";

$var_filter = "";
$var_filter = "&stat=" . $stat;

//if sorting is set
$var_sort_link = "";
if (isset($sorton))
	$var_sort_link = "&sorton=" . $sorton . "&tempvar=true&stat=" . $stat;

//CODE FOR EXTRA VARIABLES
if ($keyword != "" & isset($keyword))
	$var_filter .= "&option=" . $option . "&keyword=" . $keyword;

//mr($_GET);
foreach ($_GET as $key => $val) {
	if ($key != "sorton" & $key != "stat" & $key != "start" & $key != "nstart" & $key != "tempvar" & $key != "x" & $key != "y" & $key != "PHPSESSID") {
		if (is_array($val)) {
			for ($k = 0; $k < count($val); $k++) {
				$var_filter.="&" . $key . "[]=" . $val[$k];
			}
		}
		else
			$var_filter.="&" . $key . "=" . stripslashes($val);
	}
}
foreach ($_POST as $key => $val) {
	if ($key != "sorton" & $key != "stat" & $key != "start" & $key != "nstart" & $key != "tempvar" & $key != "x" & $key != "y" & $key != "PHPSESSID") {
		if (is_array($val)) {
			for ($k = 0; $k < count($val); $k++) {
				$var_filter.="&" . $key . "[]=" . $val[$k];
			}
		}
		else
			$var_filter.="&" . $key . "=" . stripslashes($val);
	}
}
//echo $var_filter;
//END CODE
//SET Extra querystring variables to pass from here
//$var_extra can be attached with the links for this purpose

if (isset($start)) {
	$num_limit = ($start - 1) * $rec_limit;
	$var_limit = " LIMIT " . $num_limit . "," . $rec_limit;
}else
	$var_limit = " LIMIT 0," . $rec_limit;

if (!isset($nstart) || $nstart == 1) {
	if ($num_totrec) { //if recs exists!!
		if ($rec_limit > $num_totrec) {
			$num_pgs = 1;
			$var_flg = "2";
		} else {
			$num_loopctr = 0;
			$num_loopctr = ceil($num_totrec / $rec_limit);
			if ($pg_limit > $num_loopctr) {
				$num_pgs = $num_loopctr;
				$var_flg = "2";
			} else {
				$num_pgs = $pg_limit;
				if ($num_totrec <= ($rec_limit * $pg_limit))
					$var_flg = "2";
				else
					$var_flg = "1";
			}
		}
		$var_link = "";
		$var_prevlink = "";

		$var_prevlink = "<font face=arial size=1 color=black>&nbsp;&nbsp;";
		for ($i = 1; $i <= $num_pgs; $i++) {
			//$start = 1;
			if ($start == $i) {
				$class = " class='byletter-active'";
				#$color	=	'#ff9900';
			} else {
				$class = " class='byletter'";
				$color = '';
			}
			if ($CFG->AJAX_listing) {

				$var_link.= "<a " . $class . " onclick='AjaxPagingListing(\"&nstart=1&start=" . $i . $var_filter . $var_sortpaging_link . $var_extra . "\");return false;' href='#'><font  color=" . $color . ">" . $i . "</font></a>";
			} else {

				$var_link.= "<a " . $class . " href=\"" . $var_self . $_SERVER['PHP_SELF'] . "?nstart=1&start=" . $i . $var_filter . $var_sortpaging_link . $var_extra . "\"><font  color=" . $color . ">" . $i . "</font></a>";
			}
		}
		if ($var_flag != "0" and $var_flg != "2") {
			if ($CFG->AJAX_listing) {
				$var_link .= "<a class='byletter' onclick='AjaxPagingListing(\"&nstart=2&start=" . $i . $var_filter . $var_sortpaging_link . $var_extra . "\");return false;' href='#'>Next</a>";
			} else {

				$var_link .= "<a class='byletter' href=\"" . $var_self . $_SERVER['PHP_SELF'] . "?nstart=2&start=" . $i . $var_filter . $var_sortpaging_link . $var_extra . "\">Next</a>";
			}
		} else {
			$var_link .= " </font>";
		}
		$page_link = "";
		$page_link = $var_prevlink . " " . $var_link;
	} else {
		//IF NO RECORDS EXISTS!!
		$var_link = "";
	}
} else { //if nstart is set
	if ($num_totrec) { //if recs exists!!
		$num_loopctr = 0;
		$num_rem_rec = 0;
		$num_rem_rec = ($num_totrec - (($nstart - 1) * $rec_limit * $pg_limit));
		$num_loopctr = ceil($num_rem_rec / $rec_limit);
		$num_tmp = $rec_limit * $nstart * $pg_limit;
		if ($num_tmp > $num_totrec) {
			$num_pgs = $num_loopctr;
			$var_flg = "2";
		} else {
			$num_pgs = $pg_limit;
			if ($num_totrec == ($nstart * $rec_limit * $pg_limit))
				$var_flg = "2";
			else
				$var_flg = "1";
		}
		$var_link = "";
		$var_prevlink = "";

		$num_prevnstart = 0;
		$num_prevstart = 0;
		$num_prevnstart = $nstart - 1;
		$num_prevstart = ($nstart * $pg_limit) - $pg_limit;
		$num_tmp = ($num_totrec / $rec_limit);

		#echo "<br> nstart >> $nstart";
		if (intval($nstart) <= 1) {
			#echo "<br> nstart >> $nstart";
			$var_prevlink = "<font face='arial' size='1' color='black'>&nbsp;</font>";
		} else {
			if ($CFG->AJAX_listing) {
				$var_prevlink = "<a class='byletter' onclick='AjaxPagingListing(\"&nstart=" . $num_prevnstart . "&start=" . $num_prevstart . $var_filter . $var_sortpaging_link . $var_extra . "\");return false;' href='#'>Prev</a>&nbsp;<font face=arial size=2 color=black>&nbsp;</font>";
			} else {
				$var_prevlink = "<a class='byletter' href=\"" . $var_self . $_SERVER['PHP_SELF'] . "?nstart=" . $num_prevnstart . "&start=" . $num_prevstart . $var_filter . $var_sortpaging_link . $var_extra . "\">Prev</a>&nbsp;<font face=arial size=2 color=black>&nbsp;</font>";
			}
		}
		for ($i = 1; $i <= $num_pgs; $i++) {
			$num_start = $num_prevstart + $i;
			$num_nstart = $nstart + 1;
			if ($start == $num_start) {
				$class = " class='byletter-active'";
				#$color	=	'#ff9900';
			} else {
				$class = " class='byletter'";
				$color = '';
			}
			if ($CFG->AJAX_listing) {
				$var_link .= "<a class='byletter' onclick='AjaxPagingListing(\"&nstart=" . $nstart . "&start=" . $num_start . $var_filter . $var_sortpaging_link . $var_extra . "\");return false;' href='#'><font class=" . $class . " color='" . $color . "'>$num_start</font></a>";
			} else {
				$var_link .= "<a " . $class . " href=\"" . $var_self . $_SERVER['PHP_SELF'] . "?nstart=" . $nstart . "&start=" . $num_start . $var_filter . $var_sortpaging_link . $var_extra . "\"><font class=" . $class . " color='" . $color . "'>" . $num_start . "</font></a>";
			}
		}
		$num_start++;
		if ($var_flag != "0" and $var_flg != "2") {
			if ($CFG->AJAX_listing) {
				$var_link .= "&nbsp;<a class='byletter' onclick='AjaxPagingListing(\"&nstart=" . $num_nstart . "&start=" . $num_start . $var_filter . $var_sortpaging_link . $var_extra . "\");return false;' href='#'>Next</a></font>";
			} else {
				$var_link .= "&nbsp;<a class='byletter' href=\"" . $var_self . $_SERVER['PHP_SELF'] . "?nstart=" . $num_nstart . "&start=" . $num_start . $var_filter . $var_sortpaging_link . $var_extra . "\">Next</a></font>";
			}
		} else {
			$var_link .= "<font face=arial size=1 color=black>&nbsp;</font>";
		}
		$page_link = "";
		$page_link = $var_prevlink . " " . $var_link;
	} else {
		//IF NO RECORDS EXISTS!!
		$var_link = "";
	}
}


$var_pgs = "";
//if set the paging variables
if (isset($nstart))
	$var_pgs = "&nstart=" . $nstart . "&start=" . $start; //attach this with the sorting links
//CODE FOR PAGING ENDS OVER HERE
?>
