<?

//CODE FOR PAGING
if (!isset($num_totrec))
	$num_totrec = $db_recs[0]["tot"];
//$num_totrec SHOULD BE PASSED

$rec_limit = 20;
$pg_limit = 3;
$start = $_REQUEST['start'];
if (!isset($pg_limit) && empty($pg_limit))
	$pg_limit = $PAGELIMIT; //page limit
if (!isset($rec_limit) && empty($rec_limit))
	$rec_limit = $RECLIMIT;  //record limit
//echo $RECLIMIT;
//echo $rec_limit;
//exit;
//$var_self 	= $obj->HOST;  //url
$num_tmp = 0;
$var_flg = "0";
$var_limit = "";
$num_limit = 0;
$var_filter = "";

if (isset($tempvar) && !empty($tempvar)) {
	if ($stat == 1 && $tempvar == "true")
		$stat = 0;
	else if ($stat == 0 && $tempvar == "true")
		$stat = 1;
	else
		$stat = 1;
}

$sort_order = ($stat == 1) ? ($CFG->wwwroot."/public/images/down_arrow.gif") : ($CFG->wwwroot. "/public/images/up_arrow.gif");
$sort_img = "<img src='" . $sort_order . "' border='0'>";

$var_filter = "";
$var_filter = "&stat=" . $stat;
//CODE FOR COLUMN SHOULD SORT ASCENDING/DESCENDING - END
//CHANGE THIS CODE WITH SUITABLE VARIABLES
if (isset($keyword))
	$var_filter.= "&keyword=" . rawurlencode($keyword) . "&option=" . $option;
if (isset($iCustomerId) && $iCustomerId != "")
	$var_filter.= "&iCustomerId=" . $iCustomerId;
if (isset($iMemberId) && $iMemberId != "")
	$var_filter.= "&iMemberId=" . $iMemberId;
if (isset($iGalleryId) && $iGalleryId != "")
	$var_filter.= "&iGalleryId=" . $iGalleryId;
if (isset($ptype) && isset($iCategoryId))
	$var_filter.= "&ptype=" . $ptype . "&iCategoryId=" . $iCategoryId . "&vSec=" . $vSec . "&action=Category";
if (isset($ptype) && isset($vSection))
	$var_filter.= "&ptype=" . $ptype . "&vSection=" . $vSection . "&action=Section";
if (isset($ptype))
	$var_filter.= "&ptype=" . $ptype . "&action=Section";
//ENDS HERE
if (isset($month_val) && $month_val != "")
	$var_filter.= "&month_val=" . $month_val;
if (isset($year_val) && $year_val != "")
	$var_filter.= "&year_val=" . $year_val;
if (isset($action) && $action != "")
	$var_filter.= "&action=" . $action;

//SET Extra querystring variables to pass from here
//$var_extra can be attached with the links for this purpose

if (isset($start)) {
	$num_limit = ($start - 1) * $rec_limit;
	$var_limit = " LIMIT " . $num_limit . "," . $rec_limit;
}else
	$var_limit = " LIMIT 0," . $rec_limit;

if (!isset($nstart)) {
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
		//if sorting is set
		$var_sort_link = "";
		if (isset($sorton))
			$var_sort_link = "&sorton=" . $sorton;

		$var_prevlink = "<font face=arial size=1 color=black>&nbsp;";
		for ($i = 1; $i <= $num_pgs; $i++) {
			$var_link.= "<a href=\"" . $var_self . $_SERVER['PHP_SELF'] . "?file=t-StateTest&nstart=1&start=" . $i . $var_filter . $var_sort_link . $var_extra . "\"><font face=arial size=1 color=black>" . $i . "</font></a>&nbsp;";
		}
		if ($var_flag != "0" and $var_flg != "2") {
			$var_link .= ">&nbsp;<a href=\"" . $var_self . $_SERVER['PHP_SELF'] . "?file=t-StateTest&nstart=2&start=" . $i . $var_filter . $var_filter . $var_sort_link . $var_extra . "\"><font face=arial size=1 color=black>next</font></a>";
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
		//if sorting is set
		$var_sort_link = "";
		if (isset($sorton))
			$var_sort_link = "&sorton=" . $sorton;
		$num_prevnstart = 0;
		$num_prevstart = 0;
		$num_prevnstart = $nstart - 1;
		$num_prevstart = ($nstart * $pg_limit) - $pg_limit;
		$num_tmp = ($num_totrec / $rec_limit);
		if ($nstart <= 1)
			$var_prevlink = "<font face=arial size=1 color=black>&nbsp;";
		else
			$var_prevlink = "<a href=\"" . $var_self . $_SERVER['PHP_SELF'] . "?file=t-StateTest&nstart=" . $num_prevnstart . "&start=" . $num_prevstart . $var_filter . $var_sort_link . $var_extra . "\"><font face=arial size=1 color=black>prev</font></a>&nbsp;<font face=arial size=2 color=black><&nbsp;</font>";
		for ($i = 1; $i <= $num_pgs; $i++) {
			$num_start = $num_prevstart + $i;
			$num_nstart = $nstart + 1;
			$var_link.= "<a href=\"" . $var_self . $_SERVER['PHP_SELF'] . "?file=t-StateTest&nstart=" . $nstart . "&start=" . $num_start . $var_filter . $var_sort_link . $var_extra . "\" ><font face=arial size=1 color=black>" . $num_start . "</font></a>&nbsp;";
		}
		$num_start++;
		if ($var_flag != "0" and $var_flg != "2") {
			$var_link .= "><a href=\"" . $var_self . $_SERVER['PHP_SELF'] . "?file=t-StateTest&nstart=" . $num_nstart . "&start=" . $num_start . $var_filter . $var_sort_link . $var_extra . "\" ><font face=arial size=1 color=black>next</font></a></font>";
		} else {
			$var_link .= "<font face=arial size=1 color=black></font>";
		}
		$page_link = "";
		$page_link = $var_prevlink . " " . $var_link;
	} else {
		//IF NO RECORDS EXISTS!!
		$var_link = "";
	}
}

//if set the paging variables
if (isset($nstart))
	$var_pgs = "&nstart=" . $nstart . "&start=" . $start; //attach this with the sorting links
//CODE FOR PAGING ENDS OVER HERE
?>
