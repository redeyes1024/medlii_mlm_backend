<?php

/**
 * CLASS FILE:   General.Class.php5
 * @desc 	General Function files
 * @author	(www.hiddenbrains.com)
 */
Class General {
	## Generate Ranomly Number

	function getRandomNumber($len = "15") {
		$better_token = strtoupper(md5(uniqid(rand(), true)));
		$better_token = substr($better_token, 1, $len);
		return $better_token;
	}

	function getPostForm($POST_Arr, $msg = "", $action = "") {

		$str = '
				<html>
				<form name="frm1" id="frm1" action="' . $action . '" method=post>';
		foreach ($POST_Arr as $key => $value) {
			if (is_array($value)) {
				for ($i = 0; $i < count($value); $i++)
					$str .='<br><input type="Hidden" name="' . $key . '[]" value="' . stripslashes($value[$i]) . '">';
			} else {
				$str .='<br><input type="Hidden" name="' . $key . '" value="' . stripslashes($value) . '">';
			}
		}
		$str .='<input type="Hidden" name=var_msg value="' . $msg . '">

				</form>
	   <script type="text/javascript">
				document.frm1.submit();
				</script>
				</html>';
		echo $str;
		exit;
	}

	function xxxx($str) {
		$sRes = $str;
		$iLen = strlen($str);
		if ($iLen > 4)
			$sRes = str_repeat('x', $iLen - 4) . substr($str, -4);
		return $sRes;
	}

	function Make_Currency($text, $parameter = 2, $defCurrency = '$') {
		if ($text == 0)
			return '00.00'; else
			return (($defCurrency) ? $defCurrency . ' ' : '') . number_format($text, $parameter, '.', ',');
	}

	#--- date format for calendar

	function TimetoDate($text) {
		return date("M j, Y", $text);
	}

	function maildate_format($text) {
		return date("h:i A", strtotime($text));
	}

	function Date_Format($text) {
		return @date('M j, Y', strtotime($text));
	}

	function Date_US_Format($text) {
		if ($text == "" || $text == "0000-00-00" || $text == "0000-00-00 00:00:00")
			return "---";
		else
			return date('F j, Y', strtotime($text));
	}

	function My_Date_Format($text) {
		if ($text == "" || $text == "0000-00-00")
			return "---";
		else
			return date('M j, Y', strtotime($text));
	}

	function My_DateTime_Format($text) {

		if ($text == "" || $text == "0000-00-00 00:00:00")
			return "---";
		else
			return date('M j, y [H:i A]', strtotime($text));
	}

	function DateTime_US_Format($text) {
		if ($text == "" || $text == "0000-00-00 00:00:00")
			return "---";
		else
			return date('F j, Y (H:i)', strtotime($text));
	}

	function DateTime_Format($text) {
		if ($text == "" || $text == "0000-00-00 00:00:00")
			return "---";
		else
			return date('F d, Y h:i A', strtotime($text));
	}

	function DateTime_Format_TBD($text) {
		if ($text == "" || $text == "0000-00-00 00:00:00" || strtotime($text) < 0)
			return "TBD";
		else
			return date('F d, Y h:i A', strtotime($text));
	}

	function dateadd($datestr, $num, $unit) {
		if (strtolower($unit) == 'y' || strtolower($unit) == 'h')
			$unit = strtoupper($unit);
		else
			$unit = strtolower($unit);
		$units = array("Y", "m", "d", "H", "i", "s");
		$unix = strtotime($datestr);
		while (list(, $u) = each($units))
			$$u = date($u, $unix);
		$$unit += $num;
		return mktime($H, $i, $s, $m, $d, $Y);
	}

	function dateconvert($ddate, $format) {
		$temp = explode(" ", $ddate);
		$date1 = $temp[0];
		$time1 = $temp[1];

		$temp = explode("-", $date1);
		$year = $temp[0];
		$month = $temp[1];
		$day = $temp[2];

		$temp = explode(":", $time1);
		$hour = $temp[0];
		$min = $temp[1];
		$sec = $temp[2];

		return @date($format, mktime($hour, $min, $sec, $month, $day, $year));
	}

	function randpass($numchars) {
		$charrow = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
				"l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y",
				"z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M",
				"N", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1",
				"2", "3", "4", "5", "6", "7", "8", "9");

		$s = "";
		mt_srand((float) microtime() * 1000000);
		for ($i = 0; $i < $numchars; $i++) {
			$s .= $charrow[mt_rand(0, count($charrow))];
		}
		return $s;
	}

	#-----------------------------------------------------------------
	# Function about General Settings ::
	#-----------------------------------------------------------------

	function getGeneralVar() {
		global $obj, $smarty;
		$wri_usql = "SELECT * FROM setting where eStatus='Active'";
		$wri_ures = $obj->select($wri_usql);
		for ($i = 0; $i < count($wri_ures); $i++) {
			$vName = $wri_ures[$i]["vName"];
			$vValue = $wri_ures[$i]["vValue"];
			global $$vName;
			$$vName = $vValue;
			if ($smarty)
				$smarty->assign($vName, $vValue);
		}
	}

	function getIP() {
		if (getenv('HTTP_CLIENT_IP')) {
			$ip = getenv('HTTP_CLIENT_IP');
		} elseif (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		} elseif (getenv('HTTP_X_FORWARDED')) {
			$ip = getenv('HTTP_X_FORWARDED');
		} elseif (getenv('HTTP_FORWARDED_FOR')) {
			$ip = getenv('HTTP_FORWARDED_FOR');
		} elseif (getenv('HTTP_FORWARDED')) {
			$ip = getenv('HTTP_FORWARDED');
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	function from_ip($ip) {
		if ($ip == "")
			return "---";
		else
			return $ip;
	}

	#---------------------------------------------------------------
	//for all common image upload
	#---------------------------------------------------------------

	function imageupload($photopath, $vphoto, $vphoto_name, $prefix = '', $vaildExt) {
		$msg = "";

		if (!empty($vphoto_name) and is_file($vphoto)) {
			// Remove Dots from File name
			$tmp = explode(".", $vphoto_name);
			for ($i = 0; $i < count($tmp) - 1; $i++) {
				$tmp1[] = $tmp[$i];
			}
			$file = implode("_", $tmp1);

			$ext = $tmp[count($tmp) - 1];

			$vaildExt_arr = explode(",", strtoupper($vaildExt));
			if (in_array(strtoupper($ext), $vaildExt_arr)) {
				//$vphotofile=$file.".".$ext;
				$vphotofile = $file . "_" . date("YmdHis") . "." . $ext;
				$ftppath1 = $photopath . $vphotofile;
				if (!copy($vphoto, $ftppath1)) {
					$vphotofile = '';
					$msg = "File Not Uploaded Successfully !!";
				}
				else
					$msg = "File Uploaded Successfully !!";
			}
			else {
				$vphotofile = '';
				$msg = "File Extension Is Not Valid, Vaild Ext are  $vaildExt !!!";
			}
		}
		$ret[0] = $vphotofile;
		$ret[1] = $msg;
		return $ret;
	}

	#-----------------------------
	#-----------------------------------------------------------------------------------------
	# Create Dynamic Combobox
	#(Usage :
	# echo dynamicDropeDown(country_master,iCountryId,vCountry,vCountryCode,$iCountryId);
	# If u don't want vCountryCode then only write ''.
	#-----------------------------------------------------------------------------------------
	//gendb_dynamicDropeDown('gso_country_master','vCountryCode','vCountry','','','',$vCountry,'$vCountry','','','Select Country','','','');

	function gendb_dynamicDropeDown($tableName, $fieldId, $fieldName, $extVal = '', $where_clause = '', $order_by = '', $selectedVal = '', $select_name = '', $width = 150, $size = '', $title = '', $fun = '', $extraval = '', $mul = '') {

		#return "hi";
		#echo $mul;exit;
		Global $obj;
		$groupdropdown = "";
		if ($select_name == '')
			$select_name = $fieldId;

		if ($where_clause != "")
			$where_clause = " WHERE " . $where_clause . " ";
		if ($extVal != '')
			$ssql = $fieldId . "," . $fieldName . "," . $extVal . " as extravalue ";
		else
			$ssql = "$fieldId,$fieldName";
		if ($order_by != "")
			$order_by = " ORDER BY " . $order_by . " ";

		$sql_query = "SELECT " . $ssql . " FROM " . $tableName . " " . $where_clause . " " . $order_by . " ";
		//echo $sql_query;

		$db_select_rs = $obj->select($sql_query);

		if ($mul != '') {
			$arr = "[]";
		} else {
			$arr = "";
		}
		if ($size != '')
			$size = "size=" . $size;

		if ($fun != '')
			$function = "onChange='" . $fun . "'";

		$groupdropdown .= "<select name='" . $select_name . $arr . "' id='" . $select_name . "'  " . $size . " " . $extraval . " style='width:" . $width . "' " . $function . " " . $mul . ">";

		if ($title != "")
			$groupdropdown .= "<option value='' >" . $title . "</option>";

		for ($i = 0; $i < count($db_select_rs); $i++) {
			if (strpos($fieldId, '.') != '') {//Added on 30 Mar 2008
				$tempField = explode(".", $fieldId);
				$fieldId = $tempField[1];
			}
			if (strpos($fieldName, '.') != '') {//Added on 30 Mar 2008
				$tempField = explode(".", $fieldName);
				$fieldName = $tempField[1];
			}
			//if($_SERVER[REMOTE_ADDR] == '192.168.33.52')
			//pr($db_select_rs);
			$cid = $db_select_rs[$i][$fieldId];

			//CONCAT(attribute_language.vAttributeName,'--',product_category_language.vCategory)

			$cname = $db_select_rs[$i][$fieldName];

			#return $cname;
			if ($extVal != '') {
				$extname = $db_select_rs[$i][extravalue];
			}

			if ($extVal != "") {
				$vData = "$cname  $extname ";
			} else {
				$vData = "$cname";
			}
			$selected = "";
			if ($mul == 'multiple') {

				if (is_array($selectedVal) && in_array($cid, $selectedVal)) {
					$selected = "selected";
				}
			} else {
				if ($cid == $selectedVal) {
					$selected = "selected";
				}
			}
			$groupdropdown .= "<option value='" . $cid . "' " . $selected . ">" . $vData . "</option>";
		}
		$groupdropdown .= "</select>";
		return $groupdropdown;
	}

	function get_user_browser() {
		$u_agent = $_SERVER['HTTP_USER_AGENT'];
		$ub = '';
		if (preg_match('/MSIE/i', $u_agent)) {
			$ub = "ie";
		} elseif (preg_match('/Firefox/i', $u_agent)) {
			$ub = "firefox";
		} elseif (preg_match('/Safari/i', $u_agent)) {
			$ub = "safari";
		} elseif (preg_match('/Chrome/i', $u_agent)) {
			$ub = "chrome";
		} elseif (preg_match('/Flock/i', $u_agent)) {
			$ub = "flock";
		} elseif (preg_match('/Opera/i', $u_agent)) {
			$ub = "opera";
		}

		return $ub;
	}

	function tab_header($section, $extra_para = '', $extra_para_array = '') {
		global $PAYMENT_MODULE_DISPLAY;
		$arr = array();
		if ($section == "Admin") {
			$arr[] = array('TabId' => '1', 'Val' => "Edit Admin", "Href" => "index.php?file=a-adminadd&mode=Update&iAdminId=" . $_REQUEST['iAdminId'] . "&iId=" . $_REQUEST['iAdminId']);
			$arr[] = array('TabId' => '2', 'Val' => "Login History", 'Href' => "index.php?file=LoginHistory&AX=Yes&modual=Admin&iAdminId=" . $_REQUEST['iAdminId'] . "&iId=" . $_REQUEST['iAdminId']);
		}
		if ($section == "User") {
			$arr[] = array('TabId' => '1', 'Val' => "User", 'Href' => "index.php?file=m-useradd&mode=Update&iUserId=" . $_REQUEST['iUserId']. "&iCompanyId=" . $_REQUEST['iCompanyId']);
			$arr[] = array('TabId' => '2', 'Val' => "Groups", 'Href' => "index.php?file=UsersGroups&AX=Yes&iUserId=" . $_REQUEST['iUserId'] . "&iCompanyId=" . $_REQUEST['iCompanyId']);
		}
		if ($section == "Company") {
			$arr[] = array('TabId' => '1', 'Val' => "Company", 'Href' => "index.php?file=m-companyadd&mode=Update&iCompanyId=" . $_REQUEST['iCompanyId']);
			$arr[] = array('TabId' => '2', 'Val' => "Administrator", 'Href' => "index.php?file=CompanyAdmin&AX=Yes&iCompanyId=" . $_REQUEST['iCompanyId']);
		}
		if ($section == "Group") {
			$arr[] = array('TabId' => '1', 'Val' => "Group", 'Href' => "index.php?file=m-subgroupadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&mode=Update&iSGroupId=" . $_REQUEST['iSGroupId']);
			$arr[] = array('TabId' => '2', 'Val' => "Administrator", "Href" => "index.php?file=SubGroupAdmin&AX=Yes&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId']);
		} else if ($section == "Audio") {
			if ($_SESSION['sess_eType'] == "4") {
				$arr[] = array('TabId' => '1', 'Val' => "Category", "Href" => "index.php?file=m-audiocategoryadd&mode=Update&iAudioCategoryId=" . $_REQUEST['iAudioCategoryId'] . '&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId']);
				$arr[] = array('TabId' => '2', 'Val' => "Audios", 'Href' => "index.php?file=Audio&AX=Yes&iAudioCategoryId=" . $_REQUEST['iAudioCategoryId'] . '&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId']);
			} else if ($_SESSION['sess_eType'] == "3") {
				$arr[] = array('TabId' => '1', 'Val' => "Category", "Href" => "index.php?file=m-audiocategoryadd&mode=Update&iAudioCategoryId=" . $_REQUEST['iAudioCategoryId'] . '&iSGroupId=' . $_REQUEST['iSGroupId']);
				$arr[] = array('TabId' => '2', 'Val' => "Audios", 'Href' => "index.php?file=Audio&AX=Yes&iAudioCategoryId=" . $_REQUEST['iAudioCategoryId'] . '&iSGroupId=' . $_REQUEST['iSGroupId']);
			} else if ($_SESSION['sess_eType'] == "2") {
				$arr[] = array('TabId' => '1', 'Val' => "Category", "Href" => "index.php?file=m-audiocategoryadd&mode=Update&iAudioCategoryId=" . $_REQUEST['iAudioCategoryId']);
				$arr[] = array('TabId' => '2', 'Val' => "Audios", 'Href' => "index.php?file=Audio&AX=Yes&iAudioCategoryId=" . $_REQUEST['iAudioCategoryId']);
			}
		} else if ($section == "Video") {
			if ($_SESSION['sess_eType'] == "4") {
				$arr[] = array('TabId' => '1', 'Val' => "Category", "Href" => "index.php?file=m-videocategoryadd&mode=Update&iVideoCategoryId=" . $_REQUEST['iVideoCategoryId'] . '&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId']);
				$arr[] = array('TabId' => '2', 'Val' => "Videos", 'Href' => "index.php?file=Video&AX=Yes&iVideoCategoryId=" . $_REQUEST['iVideoCategoryId'] . '&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId']);
			} else if ($_SESSION['sess_eType'] == "3") {
				$arr[] = array('TabId' => '1', 'Val' => "Category", "Href" => "index.php?file=m-videocategoryadd&mode=Update&iVideoCategoryId=" . $_REQUEST['iVideoCategoryId'] . "&iSGroupId=" . $_REQUEST['iSGroupId']);
				$arr[] = array('TabId' => '2', 'Val' => "Videos", 'Href' => "index.php?file=Video&AX=Yes&iVideoCategoryId=" . $_REQUEST['iVideoCategoryId'] . '&iSGroupId=' . $_REQUEST['iSGroupId']);
			} else if ($_SESSION['sess_eType'] == "2") {
				$arr[] = array('TabId' => '1', 'Val' => "Category", "Href" => "index.php?file=m-videocategoryadd&mode=Update&iVideoCategoryId=" . $_REQUEST['iVideoCategoryId']);
				$arr[] = array('TabId' => '2', 'Val' => "Videos", 'Href' => "index.php?file=Video&AX=Yes&iVideoCategoryId=" . $_REQUEST['iVideoCategoryId']);
			}
		} else if ($section == "Library") {
			if ($_SESSION['sess_eType'] == "4") {
				$arr[] = array('TabId' => '1', 'Val' => "Library", "Href" => "index.php?file=m-libraryadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'] . "&mode=Update&iLibCategoryId=" . $_REQUEST['iLibCategoryId']);
				$arr[] = array('TabId' => '2', 'Val' => "Documents", 'Href' => "index.php?file=Documents&AX=Yes&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'] . "&iLibCategoryId=" . $_REQUEST['iLibCategoryId']);
			} else if ($_SESSION['sess_eType'] == "3") {
				$arr[] = array('TabId' => '1', 'Val' => "Library", "Href" => "index.php?file=m-libraryadd&iSGroupId=" . $_REQUEST['iSGroupId'] . "&mode=Update&iLibCategoryId=" . $_REQUEST['iLibCategoryId']);
				$arr[] = array('TabId' => '2', 'Val' => "Documents", 'Href' => "index.php?file=Documents&AX=Yes&iSGroupId=" . $_REQUEST['iSGroupId'] . "&iLibCategoryId=" . $_REQUEST['iLibCategoryId']);
			} else if ($_SESSION['sess_eType'] == "3") {
				$arr[] = array('TabId' => '1', 'Val' => "Library", "Href" => "index.php?file=m-libraryadd&mode=Update&iLibCategoryId=" . $_REQUEST['iLibCategoryId']);
				$arr[] = array('TabId' => '2', 'Val' => "Documents", 'Href' => "index.php?file=Documents&AX=Yes&iLibCategoryId=" . $_REQUEST['iLibCategoryId']);
			}
		} else if ($section == "Course") {
			if ($_SESSION['sess_eType'] == "4") {
				$arr[] = array('TabId' => '1', 'Val' => "Course", "Href" => "index.php?file=m-courseadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'] . "&mode=Update&iCourseId=" . $_REQUEST['iCourseId']);
				$arr[] = array('TabId' => '2', 'Val' => "Classes", 'Href' => "index.php?file=CoursesClasses&AX=Yes&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'] . "&iCourseId=" . $_REQUEST['iCourseId']);
			} else if ($_SESSION['sess_eType'] == "3") {
				$arr[] = array('TabId' => '1', 'Val' => "Course", "Href" => "index.php?file=m-courseadd&iSGroupId=" . $_REQUEST['iSGroupId'] . "&mode=Update&iCourseId=" . $_REQUEST['iCourseId']);
				$arr[] = array('TabId' => '2', 'Val' => "Classes", 'Href' => "index.php?file=CoursesClasses&AX=Yes&iSGroupId=" . $_REQUEST['iSGroupId'] . "&iCourseId=" . $_REQUEST['iCourseId']);
			} else if ($_SESSION['sess_eType'] == "2") {
				$arr[] = array('TabId' => '1', 'Val' => "Course", "Href" => "index.php?file=m-courseadd&iSGroupId=" . $_REQUEST['iSGroupId'] . "&mode=Update&iCourseId=" . $_REQUEST['iCourseId']);
				$arr[] = array('TabId' => '2', 'Val' => "Classes", 'Href' => "index.php?file=CoursesClasses&AX=Yes&iCourseId=" . $_REQUEST['iCourseId']);
			}
		} else if ($section == "MallCategoriestab") {
			$arr[] = array('TabId' => '1', 'Val' => "Edit Categories", "Href" => "index.php?file=m-mallcategoryadd&mode=Update&scategory_id=" . $_REQUEST['scategory_id'] . "&iId=" . $_REQUEST['scategory_id']);
			$arr[] = array('TabId' => '2', 'Val' => "Categories to shop", 'Href' => "index.php?file=m-category_to_shop&AX=No&scategory_id=" . $_REQUEST['scategory_id'] . "&iId=" . $_REQUEST['scategory_id']);
		} else if ($section == "MallImages") {
			$arr[] = array('TabId' => '1', 'Val' => "Edit Mall", "Href" => "index.php?file=m-malladd&mode=Update&mall_id=" . $_REQUEST['mall_id'] . "&iId=" . $_REQUEST['mall_id']);
			$arr[] = array('TabId' => '2', 'Val' => "Mall Images", 'Href' => "index.php?file=m-mall_imagesadd&mall_id=" . $_REQUEST['mall_id'] . "&iId=" . $_REQUEST['mall_id']);
			$arr[] = array('TabId' => '3', 'Val' => "Shops", 'Href' => "index.php?file=m-shop_to_mall&AX=No&mall_id=" . $_REQUEST['mall_id'] . "&iId=" . $_REQUEST['mall_id']);
		} else if ($section == "Backup") {
			$arr[] = array('TabId' => '1', 'Val' => "Table BackUp");
			$arr[] = array('TabId' => '2', 'Val' => "Full BackUp");
		}
		return $arr;
	}

	function tab_displayTab($tab_arr, $height = '27') {
		global $CFG;

		$num_totrec1 = count($tab_arr);
		$twidth = $num_totrec1 * 105;
		$display = '<table height="' . $height . '" border="0" cellpadding="1" cellspacing="0">';
		$display.='<tr>';
		for ($i = 0; $i < $num_totrec1; $i++) {
			$width = $width + 20;
			$display.='<td align="center" class="bmatter" style="cursor:hand;text-align:center" id="form' . $tab_arr[$i][TabId] . 'td" height="' . $height . '" onClick="return submenu(\'' . $tab_arr[$i][TabId] . '\',\'' . $num_totrec1 . '\',\'' . $tab_arr[$i][Href] . '\')" nowrap valign="middle" background="' . $CFG->wwwroot . "/public/images/" . 'tab_enable.gif" style="background-repeat:no-repeat;text-align:center">';
			$display.='<font id="form' . $tab_arr[$i][TabId] . 'font" ><strong>&nbsp;&nbsp;' . $tab_arr[$i][Val] . '</strong></font>';
			$display.='</td>';
			$display.='<td width="20px" id="form' . $tab_arr[$i][TabId] . 'tdright" height="' . $height . '" onClick="return submenu(\'' . $tab_arr[$i][TabId] . '\',\'' . $num_totrec1 . '\',\'' . $tab_arr[$i][Href] . '\');" align="left" valign="middle" background="' . $CFG->wwwroot . "/public/images/" . 'tab_enable-right.gif" style="width:20px;background-repeat:no-repeat">&nbsp;</td>';
			$display.='<td width="10" height="' . $height . '" background="' . $CFG->wwwroot . "/public/images/" . 'bg-spacer.gif"></td>';
		}
		$display.='<td width="100%" height="' . $height . '" background="' . $CFG->wwwroot . "/public/images/" . 'bg-spacer.gif">&nbsp;</td>';
		$display.='</tr>';
		$display.="</table>";
		return $display;
	}

	function DisplayTab($type, $Id, $height = '27') {
		global $GeneralObj;
		$arr1 = $GeneralObj->tab_header($type);
		$tab_table = "";
		$tot_tab = count($arr1);
		$width = 10 * $tot_tab;
		$tab_table.="<table width='" . $width . "%' border='0' cellpadding='0'>";
		$tab_table.="<tr>";
		for ($j = 0; $j < $tot_tab; $j++) {
			if (($arr1[$j]['TabId']) == $Id) {
				$tab_table.='<TD valign=top align="left">';
				$tab_table.=$GeneralObj->createTopTapActive($arr1[$j]['Val'], $height);
				$tab_table.='</TD>';
			} else {
				$tab_table.='<TD valign=top align="left">';
				$tab_table.=$GeneralObj->createTopTapInActive($arr1[$j]['Val'], $arr1[$j]['Href'], '', $height);
				$tab_table.='</TD>';
			}
		}
		$tab_table.='</tr>';
		$tab_table.='</table>';
		return $tab_table;
	}

	function createTopTapActive($lbl, $height) {
		global $CFG;

		$ret_val = '';
		$ret_val = '
				<TABLE cellSpacing=0 cellPadding=0 border=0 width="100%">
				<TR>
				<td align="center" class="bmatter" style="cursor:hand;text-align:center"  height="' . $height . '"  nowrap valign="middle" background="' . $CFG->wwwroot . "/public/images/" . 'tab_enable.gif" style="background-repeat:no-repeat;text-align:center">
						<font color="#ffffff"><strong>' . $lbl . '</strong></a>
								</td>
								<td width="5px"  height="' . $height . '" align="left" valign="middle" background="' . $CFG->wwwroot . "/public/images/" . 'tab_enable-right.gif" style="width:5px;background-repeat:no-repeat">&nbsp;</td>
										</TR>
										</TABLE>';
		return $ret_val;
	}

	function createTopTapInActive($lbl, $href = '', $target = '', $height) {
		global $CFG;

		if ($href == '')
			$href = '#';
		if ($target == '')
			$target = '';
		$ret_val = '';
		$width = $width + 20;
		$ret_val = '
				<TABLE cellSpacing=0 cellPadding=0 border=0 width="100%">
				<TR>
				<td align="center" class="bmatter" style="cursor:hand;text-align:center"  height="' . $height . '"  nowrap valign="middle" background="' . $CFG->wwwroot . "/public/images/" . 'tab_disable.gif" style="background-repeat:no-repeat;text-align:center">
						<a href="' . $href . '" target="' . $target . '" class="disable-tab">' . $lbl . '</a>
								</td>
								<td width="5px"  height="' . $height . '" align="left" valign="middle" background="' . $CFG->wwwroot . "/public/images/" . 'tab_disable-right.gif" style="width:5px;background-repeat:no-repeat">&nbsp;</td>
										</TR>
										</TABLE>';
		return $ret_val;
	}

	function relplace_content($vTitle) {
		$rs_catname = trim($vTitle);
		$rs_catname = str_replace("/", "", $rs_catname);
		$rs_catname = str_replace("n++", "", $rs_catname);
		$rs_catname = str_replace("(", "", $rs_catname);
		$rs_catname = str_replace(")", "", $rs_catname);
		$rs_catname = str_replace("?", "", $rs_catname);
		$rs_catname = str_replace("-", "_", $rs_catname);
		$rs_catname = str_replace("#", "", $rs_catname);
		$rs_catname = str_replace(",", "", $rs_catname);
		$rs_catname = str_replace(";", "", $rs_catname);
		$rs_catname = str_replace(":", "", $rs_catname);
		$rs_catname = str_replace("'", "", $rs_catname);
		$rs_catname = str_replace("\"", "", $rs_catname);
		$rs_catname = str_replace("n++", "_", $rs_catname);
		$rs_catname = str_replace("+", "_", $rs_catname);
		$rs_catname = str_replace("+", "_", $rs_catname);
		$rs_catname = str_replace("n++", "_", $rs_catname);
		$rs_catname = str_replace("s", "_", $rs_catname);

		$rs_catname = str_replace(" ", "_", str_replace("&", "and", $rs_catname));
		return $rs_catname;
	}

	function import($PARAM_ARRAY, $vFile) {
		// TODO: Check if it in use Danil !!!!
		Global $useimagemagick, $imagemagickinstalldir;
		#echo $useimagemagick.'<br>'.$imagemagickinstalldir;
		#exit;
		include_once($GLOBALS['site_class_path'] . "imagemagick.class.php");
		$target_dir = $PARAM_ARRAY['TARGET_DIR'];
		$temp_gallery = "";
		if ($temp_gallery == '')
			$temp_gallery = $target_dir;
		# print_r($temp_gallery); exit;
		/* from vimal chauhan --- (chets)
		 $temp=strlen($temp_gallery);
		 $temp_gallery=substr($temp_gallery,0,$temp-1);
		 */
		$useimagemagick = "Yes";
		if ($useimagemagick == "Yes") {
			$imObj = new ImageMagick($imagemagickinstalldir, $temp_gallery);
			$imObj->setTargetdir($target_dir);
		}

		$count = 0;
		$idx = 0;
		foreach ($vFile as $file) {
			if ($useimagemagick == "Yes") {
				$imObj->loadByFileData($file);
				$imObj->setVerbose(FALSE);
				$size = $imObj->GetSize();
			} else {
				$size = GetImageSize($file['tmp_name']);
			}
			$HEIGHT = array();
			$WIDTH = array();
			$PERFIX = array();
			for ($i = 1; $i < count($PARAM_ARRAY); $i++) {
				$height_width = $PARAM_ARRAY[$i - 1]['WIDTH_HEIGHT'];
				$height_width = explode("X", $height_width);
				$WIDTH[$i] = $height_width[0];
				$HEIGHT[$i] = $height_width[1];
				$PERFIX[$i] = $PARAM_ARRAY[$i - 1]['PREFIX'];
			}
			$time = time();

			if ($useimagemagick == "Yes") {
				for ($i = 1; $i < count($PARAM_ARRAY); $i++) {
					if ($PERFIX[$i] != '')
						$temp = $PERFIX[$i] . "_" . $time;
					else
						$temp = $time;
					if ($WIDTH[$i] > 0 && $HEIGHT[$i] > 0) {
						$imObj->loadByFileData($file);
						$imObj->Resize($WIDTH[$i], $HEIGHT[$i], 1);
						list($WIDTH[$i], $HEIGHT[$i]) = $imObj->GetSize();
						$filename[$i] = $imObj->Save($temp);
					} else {
						$filename1 = $target_dir . "/" . $temp . basename($file['name']);
						copy($file['tmp_name'], $filename1);
						$filename[$i] = $temp . basename($file['name']);
					}
				}
				$imObj->CleanUp();
				$fname = substr($filename[1], strlen($PERFIX[$i]));
				$ReturnFile[$idx] = $fname;
			} else {
				for ($i = 1; $i < count($PARAM_ARRAY); $i++) {
					if ($PERFIX[$i] != '')
						$temp = $PERFIX[$i] . "_" . $time;
					else
						$temp = $time;
					$filename1 = $target_dir . "/" . $temp . basename($file['name']);
					#echo $filename1;
					#exit;
					copy($file['tmp_name'], $filename1);
				}

				$ReturnFile[$idx] = $time . basename($file['name']);
			}
			$idx++;
		}
		return $ReturnFile;
	}

	function showimage2($imgSrc) {
		global $cinema_gallery_url;
		$myimg = $cinema_gallery_url . $imgSrc;
		return $str = '<img src="' . $myimg . '" width="35" height="35"/>';
	}

	function display_image($imgSrc) {
		global $CFG;

		$file = $_REQUEST['file'];
		if ($file == "MallCategories") {
			global $mall_categores_url, $mall_categores_path;
			$path = $mall_categores_url;
			$myimgpath = $mall_categores_path . $imgSrc;
		}
		if ($file == "Shops") {
			global $mall_shop_url, $mall_shop_path;
			$path = $mall_shop_url;
			$myimgpath = $mall_shop_path . $imgSrc;
		}
		$myimg = $path . $imgSrc;

		if (is_file($myimgpath)) {
			$myimagepath = $CFG->wwwroot . "/public/images/" . "view.gif";
			$str = "<img src='" . $myimg . "'  height='35px' width='35px' onClick='return openPopupImageWindow(\"" . $imgSrc . "\",\"" . $myimg . "\");' />";
			return $str;
		} else {
			return "---";
		}
	}

	function make_short_dis($str) {
		$str_length = strlen($str);
		if ($str_length > 0) {
			$link = "<a href='javascript:' style='text-decoration:none;' onClick='return openPopupTextWindow(\"" . $str . "\");'><small ><b>Read</b></small></a> ";
			if ($str_length > 80) {
				$str2 = substr($str, 0, 80) . "...." . $link;
			} else {
				$str2 = $str;
			}
			return $str2;
		}
	}

	function mr($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	//    function logInOut_entry($iId = '', $eUserType) {
	//        global $obj;
	//        if (isset($_SESSION["sess_iLogId"])) {
	//            $sql = "update log_history set dLogoutDate = sysdate() where iLogId='" . $_SESSION["sess_iLogId"] . "'";
	//            $db_log_id = $obj->sql_query($sql);
	//        } else {
	//            $sql = "insert into log_history (iUserId,vIP,dLoginDate,eUserType ) values ('" . $iId . "','" . $_SERVER['REMOTE_ADDR'] . "',sysdate(),'" . $eUserType . "')";
	//            $sql1 = "update admin set dLastLogin = sysdate() where iAdminId='" . $iId . "'";
	//            $db_log_id1 = $obj->sql_query($sql1);
	//            $db_log_id = $obj->insert($sql);
	//            $_SESSION["sess_iLogId"] = $db_log_id;
	//        }
	//    }

	function getTablesForBackup() {
		global $obj, $DBASE;
		//$Array = $obj->GetAllTheTables();
		$sql_t = "SHOW TABLES FROM " . $DBASE;
		$Array = $obj->select($sql_t);
		#echo "<pre>"; print_r($Array); exit;
		for ($i = 0, $n = count($Array); $i < $n; $i++) {
			$Tables_Arr[] = $Array[$i]["Tables_in_" . $DBASE];
		}
		/* foreach($Array as $key => $val)
		 {
		$Tables_Arr[] = $val;
		} */
		return $Tables_Arr;
	}

	function return_value($val) {
		$val = trim($val);
		if ($val == null || $val == '')
			return 0;
		else
			return $val;
	}

	function DirectoryListing($file) {
		global $GeneralObj;
		if (is_dir($file)) {
			$handle = opendir($file);
			while (false !== ($file1 = readdir($handle)))
				$files[] = $file1;
			natcasesort($files);
			reset($files);

			foreach ($files as $filename) {
				if ($filename != "." && $filename != "..") {
					if (is_dir($file1 = $file . "/" . $filename))
						$GeneralObj->DirectoryListing($file1, $findFile);
					$listFileNames[] = $filename;
				}
			}
			@closedir($handle);
		}
		#print_r($listFileNames);exit;
		return $listFileNames;
	}

	function nicesize($size) {
		$a = array("B", "KB", "MB", "GB", "TB", "PB");
		$pos = 0;
		while ($size >= 1024) {
			$size /= 1024;
			$pos++;
		}
		if ($size == 0) {
			return "-";
		} else {
			return round($size, 2) . " " . $a[$pos];
		}
	}

	// Use : Get title name at Update page
	function getFullName($iId, $fieldName, $fieldid, $tableName) {
		Global $obj;
		if ($iId != '') {
			$sql = "SELECT " . $fieldName . " as vName FROM " . $tableName . " WHERE " . $fieldid . "='" . $iId . "'";
			$res_db = $obj->select($sql);
			$name = $res_db[0]['vName'];
		}else
			$name = "";
		return $name;
	}

	function checkNull($val) {
		if ($val != '')
			return $val;
		else
			return '---';
	}

	// Date : 08/09/2008
	// Used to get all the Request Variables
	function getRequestVars() {
		$evalStr = '';
		$req = array_merge($_GET, $_POST);
		// foreach ($_REQUEST AS $KEY => $VAL) {
		foreach ($req AS $KEY => $VAL) {
			if ($KEY != "list-boxes") {
				$evalStr.= 'global $' . $KEY . '; $' . $KEY . ' = $_REQUEST[\'' . $KEY . '\'];';
			}
		}
		if (isset($evalStr) && $evalStr != '') {
			eval($evalStr);
		}
		/// !!!! @eval($evalStr);
	}

	# Date : 08/09/2008
	# Used to check Duplicate value

	function checkDuplicate($iDbKeyName, $TableName, $db_duplicateFieldArr, $vRedirectFile, $msg, $iDbKeyValue = '', $con = ' or ') {
		//echo "<pre>"; print_r($iDbKeyValue); exit;
		#echo "<pre>"; print_r($iDbKeyName); exit;
		global $obj;
		if ($iDbKeyValue != '') {
			$ssql = '';
			if (is_array($iDbKeyValue)) {
				foreach ($iDbKeyValue as $key => $value) {
					$ssql .= " and " . $iDbKeyName[$key] . " <> '" . $iDbKeyValue[$key] . "'";
					echo $ssql;
				}
			} else {
				$ssql .= " and " . $iDbKeyName . " <> '" . $iDbKeyValue . "'";
			}
		}

		for ($i = 0; $i < count($db_duplicateFieldArr); $i++) {
			$ssql_field[] = " $db_duplicateFieldArr[$i] = '" . $_REQUEST[$db_duplicateFieldArr[$i]] . "' ";
		}
		$ssql.= " AND ( " . @implode($con, $ssql_field) . ")";
		$sql = "select count(" . $iDbKeyName . ") as tot from " . $TableName . " where 1 " . $ssql;

		$db_cnt = $obj->select($sql);
		#echo $sql; exit;
		#pr($db_cnt);
		if ($db_cnt[0]['tot'] > 0) {
			$_POST['duplicate'] = 1;
			$this->getPostForm($_POST, $msg, $vRedirectFile);
			exit;
		}
	}

	function getValidExtention($filename, $extention, $sep = ',') {
		$extention_arr = explode($sep, $extention);
		$file_ext_arr = explode('.', $filename);
		$tot_file_ext = count($file_ext_arr);

		$file_ext = $file_ext_arr[$tot_file_ext - 1];
		if (in_array(strtolower($file_ext), $extention_arr)) {
			return true;
		} else {
			return false;
		}
	}

	///////////////////////////// added by vimal chauhan (20-jan-2010) ////////////////////////////////
	function generatedId() {
		$time = strtotime("now");
		$genId = "CBN" . substr($time, -7);
		return $genId;
	}

	/////////////////////////////////////////////////////////////////////////////////////

	function getFormulaFixCombo($array, $firstmsg) {
		$html = '';
		$html .= '<option value="">' . $firstmsg . '</option>';
		foreach ($array as $key => $value) {
			$html .= '<option value="' . $value . '">' . $key . '</option>';
		}
		return $html;
	}

	function display($err_div) {
		//echo 'style="color:'.$_SESSION['Message']['color'].';"';exit;
		//echo "<pre>";print_r($_SESSION);
		if ($_SESSION['Message']['error_msg'] != '') {
			$message_div = '<DIV id="flash_message" class="flasherrnorec"> ' . addslashes($_SESSION['Message']['error_msg']) . '</DIV>';
		}
		if ($_SESSION['Message']['err_div'] != '' && $_SESSION['Message']['err_div'] == $err_div) {
			echo "
					<script type='text/javascript'>

					$('#" . $_SESSION["Message"]["err_div"] . "').css('display','block');
							$('#" . $_SESSION["Message"]["err_div"] . "').html('" . $message_div . "');
									setTimeout( '$('#" . $_SESSION["Message"]["err_div"] . "').slideToggle('slow');', 7000);
											</script>
											";
			unset($_SESSION['Message']);
		}
	}

	function displaytop($err_div) {
		if ($_SESSION['Message']['error_msg'] != '') {
			$message_div = '<DIV id="flash_message" class="' . $_SESSION['Message']['class'] . '">' . $_SESSION['Message']['error_msg'] . '</DIV>';
		}
		if ($_SESSION['Message']['err_div'] != '' && $_SESSION['Message']['err_div'] == $err_div) {
			echo "
					<script type='text/javascript'>
					$('#" . $_SESSION["Message"]["err_div"] . "').css('display','block');
							$('#" . $_SESSION["Message"]["err_div"] . "').html('" . $message_div . "');
									</script>
									";
		}
	}

	function setError_Message($msg, $msgType = 'succ', $err_div = '') {
		if ($msg != '') {
			if ($msgType == 'err') {

				$_SESSION['Message']['error_msg'] = $msg;
				$_SESSION['Message']['msgType'] = $msgType;
				$_SESSION['Message']['class'] = "errormsg";
				$_SESSION['Message']['err_div'] = $err_div;
			} else if ($msgType == 'logout-msg') {

				$_SESSION['Message']['error_msg'] = $msg;
				$_SESSION['Message']['msgType'] = $msgType;
				$_SESSION['Message']['class'] = "logout-msg";
				$_SESSION['Message']['err_div'] = $err_div;
			} elseif ($msgType == 'succ') {
				$_SESSION['Message']['error_msg'] = $msg;
				$_SESSION['Message']['msgType'] = $msgType;
				$_SESSION['Message']['class'] = "successmsg";
				$_SESSION['Message']['err_div'] = $err_div;
			}
		}
	}

	function checkDup($iDbKeyName, $TableName, $db_duplicateFieldArr, $iDbKeyValue, $iMemberId) {
		global $obj;
		if ($iDbKeyValue != '') {
			$ssql = " and " . $iDbKeyName . " <> '" . $iDbKeyValue . "'";
		}
		if ($iMemberId != '') {
			$ssql.=" and iMemberId = '" . $iMemberId . "'";
		}
		for ($i = 0; $i < count($db_duplicateFieldArr); $i++) {
			$ssql_field[] = " $db_duplicateFieldArr[$i] = '" . $_REQUEST[$db_duplicateFieldArr[$i]] . "' ";
		}
		$ssql.= " AND ( " . @implode($con, $ssql_field) . ")";
		$sql = "select count(" . $iDbKeyName . ") as tot from " . $TableName . " where 1 " . $ssql;
		$db_cnt = $obj->select($sql);
		return $db_cnt[0]['tot'];
	}

	function download_file($file_url, $file) {
		if (!headers_sent()) {
			header('Content-type: application/download');
			header('Content-Disposition: attachment; filename=' . urlencode($file));
			@readfile($file_url . $file);
			exit;
		}
	}

	// nirav 25-5-2010  note: //
	function callJs($str_js) {

		global $CFG;
		$files = $str_js;
		echo "
				<script type='text/javascript' src='" . $CFG->wwwroot . "/public/js/site_";
		include($CFG->dirroot . "/public/js/combine.php");
		echo ".js/fi=" . $str_js . "'></script>";
	}

	function displayJsConstants() {
		echo "
				<script type='text/javascript'>
				jQuery.extend(jQuery.validator.messages, {
				required: '" . LBL_REQUIRED . "',
						remote: '" . LBL_FIX_THIS_FIELD . "',
								email: '" . LBL_VALID_EMAIL_ADDRESS . "',
										url: '" . LBL_ENTER_VALID_URL . "',
												date: '" . LBL_ENTER_VALID_DATE . "',
														number: '" . LBL_ENTER_VALID_NUMBER . "',
																digits: '" . LBL_ENTER_DIGIT_ONLY . "',
																		creditcard: '" . LBL_ENTER_VALID_CREDIT_CARD_NUMBER . "',
																				equalTo: '" . LBL_ENTER_SAME_VALUE . "',
																						accept: '" . LBL_ENTER_VALID_EXTENSION . "',
																								maxlength: jQuery.validator.format('" . LBL_MAX_LENGTH . "'),
																										minlength: jQuery.validator.format('" . LBL_MIN_LENGTH . "'),
																												rangelength: jQuery.validator.format('" . LBL_RANGE_LENGTH . "'),
																														range: jQuery.validator.format('" . LBL_RANGE . "'),
																																max: jQuery.validator.format('" . LBL_MAX . "'),
																																		min: jQuery.validator.format('" . LBL_MIN . "'),
																																				validFile: jQuery.validator.format('" . LBL_VALIDFILE . "')
	});
																																						</script>
																																						";
	}

	## insert in yyyy-mm-dd format

	function getFileSize($filename) {
		if (@file_exists($filename)) {
			return round((filesize($filename) / 1024), 2);
		} else {
			return "error";
		}
	}

	function getTableFieldArrayForSelectBox($tablename, $fieldId, $displayval, $orderby = '', $extracondition = '') {
		global $obj;
		$ssql = "";
		if ($orderby != '') {
			$ssql .= " order by " . $orderby;
		}
		$sql = "select " . $fieldId . " as Id, " . $displayval . " as Val from " . $tablename . " where 1 " . $extracondition . $ssql;
		$db_sql = $obj->select($sql);
		return $db_sql;
	}

	// pass display array >> display_arr[]=array("Id"=>'',"Val"=>'')
	// select field id,
	// selected value
	// title if required
	// extraparam >> "alt='*' style='width:130px;' multiple onchanhe=''"
	function dynamicdropdown($display_arr, $fieldid, $selectedval = '', $title = '', $extraparam = '') {
		$ntot = count($display_arr);
		$fieldid_new = str_replace("[]", "", $fieldid);
		$select_combo = "<select name='" . $fieldid . "' id='" . $fieldid_new . "' $extraparam>";
		if ($title != '') {
			$select_combo.="<option value=''>$title</option>";
		}

		for ($i = 0; $i < $ntot; $i++) {
			$sel = "";
			if ($display_arr[$i][Id] == $selectedval) {
				$sel = "selected";
			}
			if (is_array($selectedval) && in_array($display_arr[$i][Id], $selectedval)) {
				$sel = "selected";
			}
			$select_combo.="<option " . $sel . " value='" . $display_arr[$i]['Id'] . "'>" . $display_arr[$i]['Val'] . "</option>";
		}
		$select_combo.="</select>";
		return $select_combo;
	}

	public function escape($val) {
		return $val;
		/*
		 if (get_magic_quotes_gpc() == 1 ) {
		$val = stripslashes($val);
		}
		return mysql_real_escape_string($val);
		*/
	}

	public function get_rating_star($val, $style = '') {
		global $CFG;

		list($int, $dec) = split('[.]', $val);
		$v = number_format($val);
		$img = '';
		if ($dec[0] > 5) {
			$int = $int + 1;
		}
		$iteration = 0;
		$title = number_format($val, 2);
		$img .= '<div title="' . $title . '" style="' . $style . '">';
		for ($i = 1; $i <= $int; $i++) {
			$img .= "<img src='" . $CFG->wwwroot . "/public/images/rating-star-ac.gif' />";
			$iteration++;
		}

		if ($dec[0] <= 5 && $dec != 0) {
			$img .= "<img src='" . $CFG->wwwroot . "/public/images/rating-star-acin.gif' />";
			$iteration++;
		}
		for ($i = $iteration; $i < 10; $i++) {
			$img .= "<img src='" . $CFG->wwwroot . "/public/images/rating-star-in.gif' />";
		}
		$img .= '</div>';
		return $img;
	}

	function MultiRecordInsert($tableName, $fieldStr, $insertArr, $primaryField, $id = '') {
		if (intval($id) > 0) {
			$del_sql = "DELETE FROM " . $tableName . " WHERE " . $primaryField . " = '$id'";
			$result = $GLOBALS[obj]->sql_query($del_sql);
		}
		if (count($insertArr) > 0 && is_array($insertArr)) {
			$insert_str = implode(" , ", $insertArr);
			$sql = "insert into " . $tableName . " (" . $fieldStr . ") values " . $insert_str;
			$result = $GLOBALS[obj]->insert($sql);
		}
	}

	function Chk_Time($text) {
		# print_r($text); exit;
		$str_time = "";

		$time = explode(",", $text);
		if ($time[0] > 12) {
			$str_time.= ($time[0] - 12) . ":" . $time[1] . " pm";
		} else {
			$str_time.= $time[0] . ":" . $time[1] . " am";
		}
		if ($time[2] > 12) {
			$str_time.= " - " . ($time[2] - 12) . ":" . $time[3] . " pm";
		} else {
			$str_time.= " - " . $time[2] . ":" . $time[3] . " am";
		}
		return $str_time;
	}

	function ShowEmail($id) {
		global $obj;
		$id = str_replace('##email', '', $id);
		if (!empty($id)) {
			$sql = "SELECT vEmail FROM emergency_service WHERE iServiceId='$id'";
			#echo $sql;
			$db_data = $obj->select($sql);


			if (!empty($db_data[0]['vEmail'])) {
				$email_desc = explode("!!!!", $db_data[0]['vEmail']);
				for ($k = 0; $k < count($email_desc); $k++) {
					$email_array = explode("====", $email_desc[$k]);
					if (!empty($email_array[0])) {
						$email.=$email_array[0] . ", ";
					}
				}
				$email = substr($email, 0, -2);
			}
			if (!empty($email)) {
				return $email;
			} else {
				return "---";
			}
		}
	}

	function ShowPhone($id) {
		global $obj;
		$id = str_replace('##phone', '', $id);
		if (!empty($id)) {
			$sql = "SELECT 	vPhone FROM emergency_service WHERE iServiceId='$id'";
			$db_data = $obj->select($sql);


			if (!empty($db_data[0]['vPhone'])) {
				$phone_desc = explode("!!!!", $db_data[0]['vPhone']);
				for ($k = 0; $k < count($phone_desc); $k++) {
					$phone_array = explode("====", $phone_desc[$k]);
					$phone.=$phone_array[0] . ", ";
				}
				$phone = substr($phone, 0, -2);
			}
			if (!empty($phone)) {
				return $phone;
			} else {
				return "---";
			}
		}
	}

	function view_button_course($id) {
		global$obj;
		global $CFG;

		$sql = "select cl.iClassId from Class cl,CourseClasses cs  where cl.iClassId =cs.iClassId AND cs.iCourseId='$id' ";
		//echo $sql;exit;
		$db_data = $obj->select($sql);
		if (count($db_data) > 0) {
			if ($_SESSION["sess_eType"] == "4") {
				$str = '<a href="index.php?file=CoursesClasses&AX=Yes&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId'] . '&iCourseId=' . $id . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			} else if ($_SESSION["sess_eType"] == "3") {
				$str = '<a href="index.php?file=CoursesClasses&AX=Yes&iSGroupId=' . $_REQUEST['iSGroupId'] . '&iCourseId=' . $id . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			} else if ($_SESSION['sess_eType'] == 'Group Admin') {
				$str = '<a href="index.php?file=CoursesClasses&AX=Yes&iCourseId=' . $id . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			}
		} else {
			$str = '<font size="2"><b>No Class</b></font>';
		}

		// echo admin_image_url;exit;
		return $str;
	}

	function view_button_class($id) {
		global $CFG;

		global $obj;

		if ($_SESSION['sess_eType'] == 'Group Admin') {
			$sql = "select cc.iCourseId from CourseClasses cc join Course co on co.iCourseId=cc.iCourseId where iClassId='" . $id . "' AND co.iSGroupId=" . $_SESSION['sess_iSGroupId'];
		} else {
			$sql = "select cc.iCourseId from CourseClasses cc join Course co on co.iCourseId=cc.iCourseId where iClassId='" . $id . "' AND co.iSGroupId=" . $_REQUEST['iSGroupId'];
		}

		$db_data = $obj->select($sql);
		$ids = '';

		for ($i = 0; $i < count($db_data); $i++) {
			//  $db_data[$i]["iCourseId"]=$db_data[$i]["iCourseId"].","	;
			$ids.=$db_data[$i]["iCourseId"] . ",";
		}
		$ids = substr($ids, 0, -1);
		if (!empty($ids)) {
			if ($_SESSION["sess_eType"] == "4") {
				$str = '<a href="index.php?file=Courses&AX=Yes&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId'] . '&iClassId=' . $id . '&iCourseIds=' . $ids . ' "><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			} else if ($_SESSION["sess_eType"] == "3") {
				$str = '<a href="index.php?file=Courses&AX=Yes&iSGroupId=' . $_REQUEST['iSGroupId'] . '&iClassId=' . $id . '&iCourseIds=' . $ids . ' "><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			} else if ($_SESSION['sess_eType'] == 'Group Admin') {
				$str = '<a href="index.php?file=Courses&AX=Yes&iClassId=' . $id . '&iCourseIds=' . $ids . ' "><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			}
		} else {
			$str = '<font size="2"><b>No Course</b></font>';
		}
		// echo admin_image_url;exit;
		return $str;
	}

	function view_button_video($id) {
		global $CFG;

		global $obj;
		$sql = "select iVideoId from Video where iVideoCategoryId='$id' ";
		//echo $sql;exit;
		$db_data = $obj->select($sql);
		if (count($db_data) > 0) {
			if ($_SESSION["sess_eType"] == "4") {
				$str = '<a href="index.php?file=Video&AX=Yes&iVideoCategoryId=' . $id . '&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId'] . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			} else if ($_SESSION["sess_eType"] == "3") {
				$str = '<a href="index.php?file=Video&AX=Yes&iVideoCategoryId=' . $id . '&iSGroupId=' . $_REQUEST['iSGroupId'] . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			} else if ($_SESSION['sess_eType'] == 'Group Admin') {
				$str = '<a href="index.php?file=Video&AX=Yes&iVideoCategoryId=' . $id . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			}
		} else {
			$str = '<font size="2"><b>No Video</b></font>';
		}
		// echo admin_image_url;exit;
		return $str;
	}

	function view_button_audio($id) {
		global $CFG;

		global $obj;
		$sql = "select iAudioId from Audio where iAudioCategoryId='$id' ";
		//echo $sql;exit;
		$db_data = $obj->select($sql);
		if (count($db_data) > 0) {
			if ($_SESSION["sess_eType"] == "4") {
				$str = '<a href="index.php?file=Audio&AX=Yes&iAudioCategoryId=' . $id . '&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId'] . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			} else if ($_SESSION["sess_eType"] == "3") {
				$str = '<a href="index.php?file=Audio&AX=Yes&iAudioCategoryId=' . $id . '&iSGroupId=' . $_REQUEST['iSGroupId'] . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			} else if ($_SESSION['sess_eType'] == 'Group Admin') {
				$str = '<a href="index.php?file=Audio&AX=Yes&iAudioCategoryId=' . $id . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			}
		} else {
			$str = '<font size="2"><b>No Audio</b></font>';
		}
		// echo admin_image_url;exit;
		return $str;
	}

	function view_button_document($id) {
		global $CFG;

		global $obj;
		$sql = "select iDocumentId from Document where iLibCategoryId='$id' ";
		//echo $sql;exit;
		$db_data = $obj->select($sql);
		if (count($db_data) > 0) {
			if ($_SESSION["sess_eType"] == "4") {
				$str = '<a href="index.php?file=Documents&AX=Yes&iLibCategoryId=' . $id . '&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId'] . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			} else if ($_SESSION["sess_eType"] == "3") {
				$str = '<a href="index.php?file=Documents&AX=Yes&iLibCategoryId=' . $id . '&iSGroupId=' . $_REQUEST['iSGroupId'] . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			} else if ($_SESSION["sess_eType"] == "2") {
				$str = '<a href="index.php?file=Documents&AX=Yes&iLibCategoryId=' . $id . '"><img align="top" src="' . $CFG->wwwroot . "/public/images/" . 'btn-view.gif" border="0" title="View"/></a>';
			}
		} else {
			$str = '<font size="2"><b>No Document</b></font>';
		}

		// echo admin_image_url;exit;
		return $str;
	}

	function giveCompanyId() {
		global $obj;

		if (isset($_REQUEST['file']) && ($_REQUEST['file'] == 'User' || $_REQUEST['file'] == 'a-adminadd')) {

			$sql = "SELECT c.iCompanyId, (SELECT COUNT(s.iSGroupId) FROM SubGroup s WHERE s.eStatus = 'Active'  AND s.vGroupName != 'Default Group'  AND 	s.iCompanyId=c.iCompanyId ) as cnt FROM Company c WHERE c.eStatus = 'Active'  HAVING cnt > 0  ORDER BY c.vCompanyName LIMIT 0,1";
		} else {
			$sql = "SELECT c.iCompanyId, (SELECT COUNT(s.iSGroupId) FROM SubGroup s WHERE s.eStatus = 'Active' AND 	s.iCompanyId=c.iCompanyId ) as cnt FROM Company c WHERE c.eStatus = 'Active'  HAVING cnt > 0  ORDER BY c.vCompanyName LIMIT 0,1";
		}

		//$sql="SELECT iCompanyId, (SELECT COUNT(s.iSGroupId) FROM SubGroup s WHERE s.eStatus = 'Active' AND 	s.iCompanyId=iCompanyId ) as cnt FROM Company WHERE eStatus = 'Active'  HAVING cnt > 0  ORDER BY vCompanyName LIMIT 0,1";
		//   $sql = "SELECT c.iCompanyId, (SELECT COUNT(s.iSGroupId) FROM SubGroup s WHERE s.eStatus = 'Active' " . $ssql_group . " AND 	s.iCompanyId=c.iCompanyId ) as cnt FROM Company c WHERE c.eStatus = 'Active'  HAVING cnt > 0  ORDER BY c.vCompanyName LIMIT 0,1";
		$db_res = $obj->select($sql);

		if (count($db_res) > 0) {
			$id = $db_res[0]['iCompanyId'];
		}
		return $id;
	}

	function giveGroupId($iCompanyId) {
		global $obj;
		//$ModuleName = $_REQUEST['file'];
		/* if($ModuleName=='User' || $ModuleName=='a-adminadd')	{
		 $ssql =" AND vGroupName != 'Default Group' ";
		} */
		$ssql = " AND vGroupName != 'Default Group' ";
		$sql = "SELECT iSGroupId FROM SubGroup WHERE eStatus = 'Active'  AND 	iCompanyId= '" . $iCompanyId . "' ORDER BY vGroupName LIMIT 0,1";
		$db_res = $obj->select($sql);

		if (count($db_res) > 0) {
			$id = $db_res[0]['iSGroupId'];
		}

		return $id;
	}

	function giveCompanyName($iCompanyId) {
		global $obj;
		if (!empty($iCompanyId)) {
			$sql = "SELECT vCompanyName FROM Company WHERE iCompanyId = '$iCompanyId'";
			$db_com = $obj->select($sql);
			if (count($db_com) > 0) {
				$company_name = $db_comp[0]['vCompanyName'];
			}
		}
		return $company_name;
	}

}

?>