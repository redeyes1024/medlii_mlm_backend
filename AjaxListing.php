<?php
require_once ('config.php');
include_once("includes/noentry.php");

include_once($CFG->dirroot . "/includes/func_generallist.inc.php");
global $CFG;
$ModuleName = $_REQUEST['file'];
$RelatedArr = getExtraArray_List($ModuleName);
$FieldArr = getFieldArray_List($ModuleName);
$table_array = getTableNameandPrimaryId_List($RelatedArr);


if ($_POST) {
	if ($_POST['mode'] != "Search") {
		$var_msg1 = ActiveInactiveRecord_List($_POST, $ModuleName, $table_array);
		echo $var_msg1;
		exit;
	}
}

#print_r($_REQUEST);
$ListFile = 'index.php?file=user_generallist&Module=' . $ModuleName . $RelatedArr['Extraquerystr'];

if (trim($RelatedArr['ListFile']) != "")
	$ListFile = $RelatedArr['ListFile'] . "&Module=" . $ModuleName;


$SQL_Query_TableName = getTableNameForSQLQuery_List($RelatedArr);
#echo $extrasql;
$SQL_Query = getSearchSQL_List($RelatedArr, $extrasql);

$sort_group_array = getSortandGroupVaribale_List($FieldArr, $RelatedArr);
$GroupBy = $sort_group_array['GroupBy'];
$sort = $sort_group_array['sort'];

$moduelsql = "";
//echo "<br>==>".$SQL_Query."<br>";exit;
//--------------
if ($_REQUEST['file'] == 'PlanMaster' && $_REQUEST['option'] == 'pla.iPackageId') {
	$option = $_REQUEST['option'];
	$keyword = $_REQUEST['keyword'];
	$SQL_Query_TableName .= ",package as pac WHERE pac.iPackageId=pla.iPackageId ";
	$SQL_Query = "AND pac.vPackage" . " like '%" . $keyword . "%'";
}

if (( $ModuleName == 'SubGroupAdmin' ) && $_REQUEST['option'] == 'vFirstName') {
	$option = $_REQUEST['option'];
	$keyword = $_REQUEST['keyword'];
	list($vFirstName, $vLastName) = explode(" ", $keyword);
	if ($vFirstName != '' && $vLastName != '') {
		$SQL_Query_TableName .= "WHERE 1=1";
		$SQL_Query = "AND a.vFirstName" . " like '%" . $vFirstName . "%' AND a.vLastName" . " like '%" . $vLastName . "%'";
	} else if ($vFirstName != '' && $vLastName == '') {
		$SQL_Query_TableName .= "WHERE 1=1";
		$SQL_Query = "AND a.vFirstName" . " like '%" . $vFirstName . "%' OR a.vLastName" . " like '%" . $vFirstName . "%'";
	}
}

if ($ModuleName == 'Directory' && $_REQUEST['option'] == 'vFirstname') {
	$option = $_REQUEST['option'];
	$keyword = $_REQUEST['keyword'];
	list($vFirstName, $vLastName) = explode(" ", $keyword);
	if ($vFirstName != '' && $vLastName != '') {
		$SQL_Query_TableName .= "WHERE 1=1";
		$SQL_Query = "AND d.vFirstName" . " like '%" . $vFirstName . "%' AND d.vLastName" . " like '%" . $vLastName . "%'";
	} else if ($vFirstName != '' && $vLastName == '') {
		$SQL_Query_TableName .= "WHERE 1=1";
		$SQL_Query = "AND d.vFirstName" . " like '%" . $vFirstName . "%' OR d.vLastName" . " like '%" . $vFirstName . "%'";
	}
}


if ($ModuleName == 'Member' && $_REQUEST['option'] == 'vFirstName') {
	$option = $_REQUEST['option'];
	$keyword = $_REQUEST['keyword'];
	list($vFirstName, $vLastName) = explode(" ", $keyword);
	if ($vFirstName != '' && $vLastName != '') {
		$SQL_Query_TableName .= "WHERE 1=1";
		$SQL_Query = "AND mem.vFirstName" . " like '%" . $vFirstName . "%' AND mem.vLastName" . " like '%" . $vLastName . "%'";
	} else if ($vFirstName != '' && $vLastName == '') {
		$SQL_Query_TableName .= "WHERE 1=1";
		$SQL_Query = "AND mem.vFirstName" . " like '%" . $vFirstName . "%' OR mem.vLastName" . " like '%" . $vFirstName . "%'";
	}
}
if ($ModuleName == 'Admin' && $_REQUEST['option'] == 'vFirstName') {
	$option = $_REQUEST['option'];
	$keyword = $_REQUEST['keyword'];
	list($vFirstName, $vLastName) = explode(" ", $keyword);
	if ($vFirstName != '' && $vLastName != '') {
		$SQL_Query_TableName .= "WHERE 1=1";
		$SQL_Query = "AND a.vFirstName" . " like '%" . $vFirstName . "%' AND a.vLastName" . " like '%" . $vLastName . "%'";
	} else if ($vFirstName != '' && $vLastName == '') {
		$SQL_Query_TableName .= "WHERE 1=1";
		$SQL_Query = "AND a.vFirstName" . " like '%" . $vFirstName . "%' OR a.vLastName" . " like '%" . $vFirstName . "%'";
	}
}

if ($RelatedArr['DateSearch'] == '1') {
	$DateField = $RelatedArr['DateField'];
	$FromDate = $_REQUEST['FromDate'];
	$ToDate = $_REQUEST['ToDate'];
	if ($FromDate != "" && $ToDate == "")
		$SQL_Query .= " AND DATE_FORMAT(" . $DateField . ",'%Y-%m-%d %H:%i:%s')  > '" . $FromDate . " 00:00:00' ";
	else if ($ToDate != "" && $FromDate == "")
		$SQL_Query .= " AND DATE_FORMAT(" . $DateField . ",'%Y-%m-%d %H:%i:%s')  < '" . $ToDate . " 23:59:59' ";
	else if ($ToDate != "" && $FromDate != "") {
		if (strtotime($FromDate) <= strtotime($ToDate))
			$SQL_Query .= "AND DATE_FORMAT(" . $DateField . ",'%Y-%m-%d %H:%i:%s') BETWEEN '" . $FromDate . " 00:00:00' AND '" . $ToDate . " 23:59:59' ";
	}
}

## total record fetch query
$sql = "select count(distinct " . $FieldArr[0][0] . ") as tot from " . $SQL_Query_TableName . " " . $moduelsql . " " . $SQL_Query . " " . $GroupBy;
//echo "<br>".$sql."<br>";
$db_res = $obj->select($sql);
#echo "<br>".$sql."<br>";
$num_totrec = $db_res[0]["tot"];
if (count($db_res) > 1) {
	$num_totrec = count($db_res);
} else if (count($db_res) == 1 && $GroupBy != "" && substr_count($sql, $GroupBy) > 0) {
	$num_totrec = count($db_res);
} else if (count($db_res) == 1) {
	$num_totrec = $db_res[0]["tot"];
} else {
	$num_totrec = 0;
}

## for Alpha searching

if (trim($RelatedArr['AlphaSearch']) != "") {
	$sql_alpha = "select DISTINCT UPPER(substring( " . $RelatedArr['AlphaSearch'] . " , 1, 1 )) as letter from " . $SQL_Query_TableName . " " . $moduelsql . " " . $SQL_Query;
	$db_alpha = $obj->selectfetch($sql_alpha, "mysqli_fetch_assoc", "letter");
} else {
	$ALPHA_SEARCH_TOP = "N";
	$ALPHA_SEARCH_BOTTOM = "N";
}


#$db_alpha = @array_keys($db_alpha);
#mr($db_alpha);

if (intval($_REQUEST['TotalRecords']) > 0)
	$rec_limit = $_REQUEST['TotalRecords'];
include($CFG->dirroot . "/templates/general/gen_paging.php");
#if($var_msg1!="")$var_msg=$var_msg1;

$select_field_list = getSelectFieldList_List($FieldArr);

//.'-'.$moduelsql.'-'.$SQL_Query $GroupBy.'-'.$sort $var_limit;exit;
$db_query = "select " . $select_field_list . " from " . $SQL_Query_TableName . " " . $moduelsql . " " . $SQL_Query . " " . $GroupBy . " " . $sort . " " . $var_limit;

$db_res = $obj->select($db_query);

if (isset($_REQUEST['option']) && !empty($_REQUEST['option'])) {
	echo $var_msg = "Your search for '<b>" . $_REQUEST['keyword'] . "</b>' found <b>" . count($db_res) . "</b> record(s).";
}

$search_param = gen_getGETPOSTPARAM();
$maytab = $_REQUEST["maytab"];

$paging_var = $var_pgs . $var_filter;
$paging_var = str_replace("&undefined=", "", $paging_var);

#echo "<br> AJAX_listing >> $CFG->AJAX_listing >> $sort_img >> $paging_var";
?>

<textarea rows="3" cols="50" id="var_msg" style="display: none;">
	<?php echo $var_msg; ?>
</textarea>
<textarea rows="3" cols="50" id="var_pgs" style="display: none;">
	<?php echo $paging_var; ?>
</textarea>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
	<tr>
		<td><?php
		if ($ModuleName != 'SystemMails') {
                echo gen_DisplayPaging_Top_List($RelatedArr['AlphaSearch'], $ALPHA_SEARCH_TOP, $ADMIN_PAGING_TOP);
            }
            ?>
		</td>
	</tr>
	<tr>
		<td><?php
		if ($ModuleName == "Resorts") {
                include($CFG->dirroot . "/templates/resort/ResortListing.php");
            } else if ($ModuleName == "Reservation") {
                include($CFG->dirroot . "/templates/resort/Reservation.php");
            } else {
                ?>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" align="center" cellspacing="1" cellpadding="2"
				class="listing-border" border="0">
				<tr style="height: 25px">
					<?php
					if ($ModuleName != 'SystemMails') {
                            echo "<th width='3%' style='text-align:center'>";
                            if ($ModuleName != 'SystemMails') {

                                echo "<input style='border:0px;'  type='Checkbox' name='abc' value='1'  onclick='checkAll()'>";
                            }
                            echo "</th>";
                        }

                        $ntot_field = count($FieldArr);
                        #mr($FieldArr);
                        $AddFile = $RelatedArr['AddFile'];
                        $start = 1;
                        for ($i = $start; $i < $ntot_field; $i++) {
                            $list_table = "";
                            $heading = $FieldArr[$i][2];
                            $alignment = $FieldArr[$i][5];
                            $width = $FieldArr[$i][6];
                            $sorton = $FieldArr[$i][3];
                            $link = $ListFile . "&sorton=" . $sorton . "&tempvar=true" . $var_pgs . $var_filter;
                            $list_table.='<th width="' . $width . '" style="text-align:' . $alignment . '">&nbsp;';
                            if ($sorton == '0') {
                                //$list_table.='<a class="matterlink" href="#">'.$heading.'</a>';
                                $list_table.=$heading;
                            } else {
                                if ($CFG->AJAX_listing) {
                                    $list_table.='<a class="matterlink" href="#" onclick="AjaxListing(\'&sorton=' . $sorton . '&tempvar=true\');return false;">';
                                } else {
                                    $list_table.='<a class="matterlink" href="' . $link . '">';
                                }
                                $list_table.=$heading . '';
                                $list_table.='</a>';
                                if ($_REQUEST['sorton'] == $sorton)
                                	$list_table.="&nbsp;" . $sort_img;
                            }
                            $list_table.='&nbsp;</th>';
                            if ($FieldArr[$i][9] != -1) {
                                echo $list_table;
                            }
                        }
                        ?>
				</tr>
				<?php
				if ($num_totrec > 0) {

                        $class_methods = get_class_methods('General');
                        for ($i = 0; $i < count($db_res); $i++) {
                            $bgcolor = ($i % 2) ? "td-dark" : "td-light";
                            $pri_field = $FieldArr[0][1];
                            //$pri_field=$table_array[Primary_Field];

                            echo "<tr style='height:25px;' onmouseover='Highlight(this);'  onmouseout='UnHighlight(this,\"" . $bgcolor . "\");' class='" . $bgcolor . "'>";
                            if ($ModuleName != 'SystemMails') {
                                echo "  <td class='td-listing' style='height:25px;text-align:center'>";

                                if (($table_array['TableName'] == 'site' && $db_res[$i]['iSiteId'] == '1')
                                        || ($ModuleName == 'SystemMails')
                                        || ($ModuleName == 'User' && $db_res[$i]['eRights'] >= $_SESSION["sess_eType"])
                                ) {

                                } else {
                                    echo "<input type='checkbox' style='border:0px;' id='iId' name='ch" . $i . "' value='" . $db_res[$i][$pri_field] . "'>";
                                }

                                echo" </td>";
                            }

                            if ($RelatedArr['SubAdminLogin'] == 1) {
                                echo "<td  class='td-listing' style='text-align:center'><img src='" . $CFG->wwwroot . '/public/images/' . "login.gif' border='0' width='20' height='20' title='Click to login' onclick='logintosite('" . $db_res[$i][$pri_field] . "')' style='cursor:pointer;' ></td>";
                            }
                            for ($j = $start; $j < $ntot_field; $j++) {
                                $list_table = "";
                                $field = $FieldArr[$j][1];
                                $alignment = $FieldArr[$j][5];
                                $width = $FieldArr[$j][6];
                                $editlink = $FieldArr[$j][8];
                                $functions = $FieldArr[$j][7];
                                $functions_param = $FieldArr[$j][9];
                                $functions_param_value = "";
                                $functions_param_value = $db_res[$i][$functions_param];
                                $value = $db_res[$i][$field];

                                if ($value == "")
                                	$value = "---";
                                if ($functions != '' && $functions != '0') {

                                    if (in_array($functions, $class_methods)) {
                                        //$value = call_user_func($GeneralObj->$functions($value);
                                        if (intval($functions_param) > 1 || $functions_param != "")
                                        	$value = $GeneralObj->$functions($value, $functions_param_value);
                                        else
                                        	$value = $GeneralObj->$functions($value);
                                    }else {
                                        if ($functions == "makeChannelUrl") {
                                            $link = makeChannelUrl($value, $db_res[$i]["clip_name"]);
                                            $value = "<a target='_blank' href='" . $link . "'>" . str_replace($site_url, "/", $link) . "</a>";
                                        } else if ($functions == "makeOwnerUrl") {
                                            $link = makeOwnerUrl($value);
                                            //echo $link;
                                            $value = "<a target='_blank' href='" . $link . "'>" . str_replace($site_url, "/", $link) . "</a>";
                                        } else if ($functions == "makeOwnerUrl1") {
                                            $link = makeOwnerUrl($value, true);
                                            // echo $link;
                                            $value = "<a target='_blank' href='" . $link . "'>" . str_replace($site_url, "/", $link) . "</a>";
                                        } else if ($functions == "sepnameid") {
                                            $value = sepnameid($value, "|||", 0);
                                        } else if ($functions == "PhoneRSSImage") {
                                            $value = call_user_func_array("DisplayImage", array("PhoneRSSImage", $value));
                                        } else if ($functions == "PhoneRssUrl") {
                                            $link = call_user_func_array("makePhoneRssUrl", array($value));
                                            $value = "<a target='_blank' href='" . $link . "'>" . str_replace($site_url, "/", $link) . "</a>";
                                        } else {
                                            $value = call_user_func($functions, $value);
                                        }
                                    }
                                }

                                if ($FieldArr[$j][9] == '1') {
                                    $path = $RelatedArr['Image_Path'];
                                    $value = OpenPopupImageWindow_List($value, $path);
                                }

                                if ($FieldArr[$j][2] == 'Status') {
                                    //$img= strtolower("icon-".$value.".gif");
                                    //if($value=='Active' || $value=='Inactive')
                                    //$value="<img src='".$CFG->wwwroot."/public/images/"."icon/".$img."' alt='".$CFG->wwwroot."/public/images/".$img."'>";
                                    $value = $value == '1' ? 'Active' : 'Inactive';
                                }
                                if ($FieldArr[$j][2] == 'System Rights') {
                                    //$img= strtolower("icon-".$value.".gif");
                                    //if($value=='Active' || $value=='Inactive')
                                    //$value="<img src='".$CFG->wwwroot."/public/images/"."icon/".$img."' alt='".$CFG->wwwroot."/public/images/".$img."'>";
                                    switch ($value) {
                                    	case '1':
                                    		$value = 'User';
                                    		break;
                                    	case '2':
                                    		$value = 'Group Admin';
                                    		break;
                                    	case '3':
                                    		$value = 'Organization Admin';
                                    		break;
                                    	case '4':
                                    		$value = 'Super Admin';
                                    		break;
                                    	default:
                                    		break;
                                    }
                                }
                                if ($editlink == 1) {
                                    if (trim($value) == "")
                                    	$value = "---";
                                    if ($ModuleName == 'User' && $db_res[$i]['eRights'] >= $_SESSION["sess_eType"] && $db_res[$i]['iUserId']!=$_SESSION["sess_iAdminId"])  {

                                    } else {
                                        if ($ModuleName == 'User' || $ModuleName == 'UsersGroups' || $ModuleName == 'SubGroup') {



                                            $hreflink = $AddFile . "&mode=Update&iId=1&" . $pri_field . "=" . $db_res[$i][$pri_field] . "&iCompanyId=" . $db_res[$i]['iCompanyId'] . $search_param;
                                        } else {
                                            $hreflink = $AddFile . "&mode=Update&iId=1&" . $pri_field . "=" . $db_res[$i][$pri_field] . $search_param;
                                        }
                                        $value = "<a title='Click here for update' href='" . $hreflink . "'>$value</a>";
                                    }
                                }
                                $list_table.='<td width="' . $width . '" style="text-align:' . $alignment . '">&nbsp;';
                                $list_table.=$value;
                                $list_table.='&nbsp;</td>';
                                if ($FieldArr[$j][9] != -1) {
                                    echo $list_table;
                                }
                            }
                            ?>
				</tr>
				<?php
            }
        } else {
            ?>
				<tr>
					<td align="center" class="td-light"
						colspan="<?php echo $ntot_field + 2; ?>">No Records Found</td>
				</tr>
				<?php } ?>
			</table>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="3" class="listing-bottgradient"><?php
		if ($ModuleName != 'SystemMails') {
            echo gen_DisplayPaging_Bottom_List($RelatedArr['AlphaSearch'], $ALPHA_SEARCH_BOTTOM, $ADMIN_PAGING_BOTTOM);
        }
        ?>
		</td>
	</tr>
</table>
<input
	type="hidden" id="no" name="no" value="<?php echo $num_totrec; ?>">
