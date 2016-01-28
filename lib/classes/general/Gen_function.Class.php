<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        GeneralFunction
* CLASS FILE:       GenFunction.Class.php5
* -------------------------------------------------------
* DESC:     contains Menu Array fetched from DB for the admin panel,
*           And other functions will be used for admin listing/add/Edit.
*           Function Used In File : top_header.php";

* from: >> www.hiddenbrains.com
* -------------------------------------------------------
*
*/

Class GeneralFunction {

	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */
	function __construct() {
		global $obj;
		$this->_obj = $obj;
	}

	/**
	 *   @desc   DECONSTRUCTOR METHOD
	 */
	function __destruct() {
		unset($this->_obj);
	}

	function getMenuList($iParentMenuId = 0, $old_menu = "", $iMenuIdNot = "0", $loop = 1) {
		global $par_menu_arr;
		/* $sql_query = "select iMenuId, vMenuDisplay, vModuleName from ajaxlist_menu where iParentMenuId='".$iParentMenuId."'";
		 if($iMenuIdNot!="" && $iMenuIdNot != "0"){
		$sql_query .= " and iMenuId<>'$iMenuIdNot'";
		}
		$sql_query .= " order by iOrderBy";
		$db_cat_rs = $this->_obj->select($sql_query);
		$n=count($db_cat_rs);
		if($n>0){
		for($i=0 ; $i<$n ; $i++){
		$par_menu_arr[]=array('iMenuId'=> $db_cat_rs[$i]['iMenuId'], 'vModuleName'=> $db_cat_rs[$i]['vModuleName'], 'vMenuDisplay' =>  $old_menu."--|".$loop."|&nbsp;&nbsp;".$db_cat_rs[$i]['vMenuDisplay'], 'loop'=>$loop);
		$this->getMenuList($db_cat_rs[$i]['iMenuId'], $old_menu."&nbsp;&nbsp;&nbsp;&nbsp;",$iMenuIdNot,$loop+1);
		}
		$old_menu = "";
		} */
	}
	// by Danil
	//    function top_getTopMenuArray() {
	//        global $site_features, $obj, $RATE_IT, $eVehicleTypeArray, $PAYMENT_MODULE_DISPLAY, $GeneralObj;
	//        $db_menu_rs = array();
	//        $EXTRA = "&AX=Yes";
	//        //home
	//
	//            $i = 1;
	//        $j = 100;
	//        if (!empty($_SESSION["sess_iAdminId"])) {
	//            $db_menu_rs[] = array("iMenuId" => $i, "iParentId" => 0, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Home", "vImage" => "icon/home-icon.gif", "vURL" => "index.php?file=a-sitemap", "main_menu_code" => "Home");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Site Map", "vImage" => "icon/sitemap-icon.gif", "vURL" => "index.php?file=a-sitemap", "main_menu_code" => "Home", "sub_menu_code" => "SiteMap");
	//            $i++;
	//
	//            //	User Mgmt
	//            if ($_SESSION["sess_eType"] == 'Super Admin') {
	//                if (isset($_SESSION['iCompanyId'])) {
	//
	//                    if (isset($_REQUEST['iCompanyId'])) {
	//                        $_SESSION['iCompanyId'] = $_REQUEST['iCompanyId'];
	//                    }
	//                    $iCompanyId = $_SESSION['iCompanyId'];
	//                } else {
	//                    if (isset($_REQUEST['iCompanyId'])) {
	//                        $_SESSION['iCompanyId'] = $_REQUEST['iCompanyId'];
	//                        $iCompanyId = $_SESSION['iCompanyId'];
	//                    } else {
	//                        $_SESSION['iCompanyId'] = $GeneralObj->giveCompanyId();
	//                        $iCompanyId = $_SESSION['iCompanyId'];
	//                    }
	//                }
	//
	//
	//                if (isset($_SESSION['iSGroupId'])) {
	//                    if (isset($_REQUEST['iSGroupId'])) {
	//                        $_SESSION['iSGroupId'] = $_REQUEST['iSGroupId'];
	//                    }
	//
	//
	//
	//                    $iSGroupId = $_SESSION['iSGroupId'];
	//                } else {
	//                    if (isset($_REQUEST['iSGroupId'])) {
	//                        $_SESSION['iSGroupId'] = $_REQUEST['iSGroupId'];
	//                        $iSGroupId = $_SESSION['iSGroupId'];
	//                    } else {
	//                        $_SESSION['iSGroupId'] = $GeneralObj->giveGroupId($iCompanyId);
	//                        $iSGroupId = $_SESSION['iSGroupId'];
	//                    }
	//                }
	//            } else if ($_SESSION["sess_eType"] == 'Company Admin') {
	//                $iCompanyId = $_SESSION["sess_iCompanyId"];
	//
	//                      if (isset($_SESSION['iSGroupId'])) {
	//                    if (isset($_REQUEST['iSGroupId'])) {
	//                        $_SESSION['iSGroupId'] = $_REQUEST['iSGroupId'];
	//                    }
	//
	//
	//
	//                    $iSGroupId = $_SESSION['iSGroupId'];
	//                } else {
	//                    if (isset($_REQUEST['iSGroupId'])) {
	//                        $_SESSION['iSGroupId'] = $_REQUEST['iSGroupId'];
	//                        $iSGroupId = $_SESSION['iSGroupId'];
	//                    } else {
	//                        $_SESSION['iSGroupId'] = $GeneralObj->giveGroupId($iCompanyId);
	//                        $iSGroupId = $_SESSION['iSGroupId'];
	//                    }
	//                }
	//            }
	//
	//            if ($_SESSION["sess_eType"] == "4") {
	//                $db_menu_rs[] = array("iMenuId" => $i, "iParentId" => 0, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "User Mgmt", "vImage" => "icon/user-icon.gif", "vURL" => "index.php?file=a-adminadd", "main_menu_code" => "User");
	//                $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "Admin", "vImage" => "icon/admin-icon.gif", "vURL" => "index.php?file=a-adminadd", "main_menu_code" => "User", "sub_menu_code" => "Admin");
	//                $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "User", "vImage" => "icon/admin-icon.gif", "vURL" => "index.php?file=User&AX=Yes&iCompanyId=" . $iCompanyId . "&iSGroupId=" . $iSGroupId, "main_menu_code" => "User", "sub_menu_code" => "User");
	//            } else if ($_SESSION["sess_eType"] == "3") {
	//                $db_menu_rs[] = array("iMenuId" => $i, "iParentId" => 0, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "User Mgmt", "vImage" => "icon/user-icon.gif", "vURL" => "index.php?file=CompanyAdmin&AX=Yes", "main_menu_code" => "User");
	//                $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "Admin", "vImage" => "icon/admin-icon.gif", "vURL" => "index.php?file=CompanyAdmin&AX=Yes", "main_menu_code" => "User", "sub_menu_code" => "Admin");
	//                $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "User", "vImage" => "icon/admin-icon.gif", "vURL" => "index.php?file=User&AX=Yes&iSGroupId=" . $iSGroupId, "main_menu_code" => "User", "sub_menu_code" => "User");
	//            } else if ($_SESSION["sess_eType"] == "2") {
	//                $db_menu_rs[] = array("iMenuId" => $i, "iParentId" => 0, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "User Mgmt", "vImage" => "icon/user-icon.gif", "vURL" => "index.php?file=SubGroupAdmin&AX=Yes", "main_menu_code" => "User");
	//                $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "Admin", "vImage" => "icon/admin-icon.gif", "vURL" => "index.php?file=SubGroupAdmin&AX=Yes", "main_menu_code" => "User", "sub_menu_code" => "Admin");
	//                $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "User", "vImage" => "icon/admin-icon.gif", "vURL" => "index.php?file=User&AX=Yes", "main_menu_code" => "User", "sub_menu_code" => "User");
	//            }
	//            $i++;
	//        }
	//
	//        //Company Management
	//        if ($_SESSION["sess_eType"] == "4") {
	//            $db_menu_rs[] = array("iMenuId" => $i, "iParentId" => 0, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "Organization Mgmt", "vImage" => "icon/user-icon.gif", "vURL" => "index.php?file=Company&AX=Yes", "main_menu_code" => "Company Mgmt");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "Organization Management", "vImage" => "icon/user-icon.gif", "vURL" => "index.php?file=Company&AX=Yes", "main_menu_code" => "Company Mgmt");
	//            $i++;
	//        }
	//        //	SubGroup
	//        if ($_SESSION["sess_eType"] == "4" || $_SESSION["sess_eType"] == "3") {
	//            //	$iCompanyId =	$GeneralObj->giveCompanyId();
	//                $db_menu_rs[] = array("iMenuId" => $i, "iParentId" => 0, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "Group Mgmt", "vImage" => "icon/sitesetting-icon.gif", "vURL" => "index.php?file=SubGroup&AX=Yes&iCompanyId=" . $iCompanyId, "main_menu_code" => "SubGroup", "sub_menu_code" => "");
	//                $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Group", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=SubGroup&AX=Yes&iCompanyId=" . $iCompanyId, "main_menu_code" => "SubGroup", "sub_menu_code" => "SubGroup");
	//                $i++;
	//        }
	//
	//        //	Master
	//
	//        if ($_SESSION["sess_eType"] == "4") {
	//            //	$iCompanyId =	$GeneralObj->giveCompanyId();
	//            //	$iSGroupId   =	$GeneralObj->giveGroupId($iCompanyId);
	//            $db_menu_rs[] = array("iMenuId" => $i, "iParentId" => 0, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "Content Mgmt", "vImage" => "icon/sitesetting-icon.gif", "vURL" => "index.php?file=Directory&AX=Yes&iCompanyId=" . $iCompanyId . "&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Directory", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Directory&AX=Yes&iCompanyId=" . $iCompanyId . "&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "Directory");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Events", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Events&AX=Yes&iCompanyId=" . $iCompanyId . "&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "Events");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Courses", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Courses&AX=Yes&iCompanyId=" . $iCompanyId . "&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "Courses");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Classes", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Classes&AX=Yes&iCompanyId=" . $iCompanyId . "&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "Classes");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Library", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Library&AX=Yes&iCompanyId=" . $iCompanyId . "&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "Library");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Videos", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=VideoCategory&AX=Yes&iCompanyId=" . $iCompanyId . "&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "VideoCategory");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Audios", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=AudioCategory&AX=Yes&iCompanyId=" . $iCompanyId . "&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "AudioCategory");
	//        } else if ($_SESSION["sess_eType"] == "3") {
	//            //$iCompanyId =	$_SESSION['sess_iCompanyId'];
	//            //$iSGroupId   =	$GeneralObj->giveGroupId($iCompanyId);
	//            $db_menu_rs[] = array("iMenuId" => $i, "iParentId" => 0, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "Content Mgmt", "vImage" => "icon/sitesetting-icon.gif", "vURL" => "index.php?file=Directory&AX=Yes&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Directory", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Directory&AX=Yes&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "Directory");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Events", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Events&AX=Yes&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "Events");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Courses", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Courses&AX=Yes&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "Courses");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Classes", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Classes&AX=Yes&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "Classes");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Library", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Library&AX=Yes&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "Library");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Videos", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=VideoCategory&AX=Yes&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "VideoCategory");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Audios", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=AudioCategory&AX=Yes&iSGroupId=" . $iSGroupId, "main_menu_code" => "Master", "sub_menu_code" => "AudioCategory");
	//        } else if ($_SESSION["sess_eType"] == "2") {
	//            $db_menu_rs[] = array("iMenuId" => $i, "iParentId" => 0, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "Content Mgmt", "vImage" => "icon/sitesetting-icon.gif", "vURL" => "index.php?file=Directory&AX=Yes", "main_menu_code" => "Master", "sub_menu_code" => "");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Directory", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Directory&AX=Yes", "main_menu_code" => "Master", "sub_menu_code" => "Directory");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Events", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Events&AX=Yes", "main_menu_code" => "Master", "sub_menu_code" => "Events");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Courses", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Courses&AX=Yes", "main_menu_code" => "Master", "sub_menu_code" => "Courses");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Classes", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Classes&AX=Yes", "main_menu_code" => "Master", "sub_menu_code" => "Classes");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Library", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=Library&AX=Yes", "main_menu_code" => "Master", "sub_menu_code" => "Library");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Videos", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=VideoCategory&AX=Yes", "main_menu_code" => "Master", "sub_menu_code" => "VideoCategory");
	//            $db_menu_rs[] = array("iMenuId" => -1000, "iParentId" => $i, "iSequenceOrder" => 0, "eStatus" => "Active", "vMenuDisplay" => "Audios", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=AudioCategory&AX=Yes", "main_menu_code" => "Master", "sub_menu_code" => "AudioCategory");
	//        }
	//        $i++;
	//
	//
	//
	//        //	Settings
	//        if (!empty($_SESSION["sess_iAdminId"]) && $_SESSION["sess_eType"] == 'Super Admin') {
	//            $db_menu_rs[] = array("iMenuId" => $i, "iParentId" => 0, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "Settings", "vImage" => "icon/sitesetting-icon.gif", "vURL" => "index.php?file=t-settinglist&AX=No&Type=Email", "main_menu_code" => "Settings", "sub_menu_code" => "");
	//            $db_menu_rs[] = array("iMenuId" => -1, "iParentId" => $i, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "System Settings", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=t-settinglist&AX=No&Type=Email", "main_menu_code" => "Settings", "sub_menu_code" => "SystemSettings");
	//            $db_menu_rs[] = array("iMenuId" => -1, "iParentId" => $i, "iSequenceOrder" => 1, "eStatus" => "Active", "vMenuDisplay" => "System Mails", "vImage" => "icon/generalsetting-icon.gif", "vURL" => "index.php?file=SystemMails&AX=Yes", "main_menu_code" => "Settings", "sub_menu_code" => "SystemMails");
	//            $i++;
	//        }
	//        return $db_menu_rs;
	//    }

	function displayTopMenu($parent_id, $menu) {
		global $CFG;

		//$DISPLAY_IMAGE=($_COOKIE['coo_Kent_Menu']=="On"?"Y":"N");
		$DISPLAY_IMAGE = 'Y';
		$submenu_arr = $this->getSubMenus($parent_id);
		$totRec = count($submenu_arr);
		if ($totRec > 0) {
			for ($i = 0; $i < $totRec; $i++) {
				$flag = 0;
				if ($parent_id == 0) {
					//if($submenu_arr[$i][iMenuId]!=2)
					//$menu .=",_cmSplit";
					$flag = 1;
				}
				if ($flag != 1) {
					if ($DISPLAY_IMAGE == "Y") {
						$menu_img_scr = "<img src=images/menu/" . $submenu_arr[$i]['vImage'] . " alt=menu>";
						if ($submenu_arr[$i]['vImage'] == '')
							$menu_img_scr = '';
					}
					else
						$menu_img_scr = "<img src=" . $CFG->wwwroot . "/public/images/" . "spacer.gif height=17 width=5 alt=''>";
					$menu .=",['$menu_img_scr','" . $submenu_arr[$i]['vMenuDisplay'] . "','" . $submenu_arr[$i]['vURL'] . "',null,'" . $submenu_arr[$i]['vMenuDisplay'] . "' " . $this->displayTopMenu($submenu_arr[$i][iMenuId], '') . "]";
				}
				else if (count($this->getSubMenus($submenu_arr[$i][iMenuId])) >= 0) {
					$menu .=",[null,'" . $submenu_arr[$i]['vMenuDisplay'] . "','" . $submenu_arr[$i]['vURL'] . "',null,'" . $submenu_arr[$i]['vMenuDisplay'] . "'" . $this->displayTopMenu($submenu_arr[$i][iMenuId], '') . "]";
				}
			}
		} else {
			return $menu;
		}
		return $menu;
	}

	function getSubMenus($id) {
		global $db_menu_rs;
		$totRec = count($db_menu_rs);
		$j = 0;
		for ($i = 0; $i < $totRec; $i++) {
			if ($db_menu_rs[$i][iParentId] == $id) {
				$submenu[$j][vURL] = $db_menu_rs[$i][vURL];
				$submenu[$j][vMenuDisplay] = $db_menu_rs[$i][vMenuDisplay];
				$submenu[$j][iMenuId] = $db_menu_rs[$i][iMenuId];
				$submenu[$j][iParentId] = $db_menu_rs[$i][iParentId];
				$submenu[$j][vImage] = $db_menu_rs[$i][vImage];
				$submenu[$j][eStatus] = $db_menu_rs[$i][eStatus];
				$j++;
			}
		}
		return $submenu;
	}

	### END ##########
	# Added by bhavin	on 16-Jan-2006

	function gen_DisplayPaging_Top($code, $showLetter = "Y", $showPaging = "Y", $width = "100%") {
		global $recmsg, $page_link, $script;
		if ($showPaging == "N")
			$style = "style=display:none";
		else
			$style = "style=display:''";
		if ($showLetter == "N")
			$style_alpha = "style=display:none";
		else
			$style_alpha = "style=display:''";
		echo '<table width="' . $width . '" cellpadding="2" cellspacing="2" border="0">
				<tr style="height:20px">
				<td width="25%" class="paging" align="left" style="white-space: nowrap;text-align:left;">
				<span ' . $style . ' class="disprecordmsg"  id="RECMSG_TOP">' . (($showPaging == "Y") ? $recmsg : "") . '&nbsp;</span></td>';
		echo '<td style="text-align:Center" nowrap><span ' . $style_alpha . ' class="sortby"  id="ALPHA_PAGING_TOP">' . (($showLetter == "Y") ? $this->getSearchByLetter($code) : "") . '</span></td>';
		echo '<td width="25%" style="text-align:right; white-space: nowrap;"><span ' . $style . ' class="paging"   id="PAGING-TOP">' . (($showPaging == "Y") ? $page_link : "") . '&nbsp;</span></td>
				</tr>
				</table>';
	}

	function gen_DisplayPaging_Bottom($code, $showLetter = "Y", $showPaging = "Y", $width = "100%") {
		global $recmsg, $page_link, $script;
		if ($showPaging == "N")
			$style = "style=display:none";
		else
			$style = "style=display:''";
		if ($showLetter == "N")
			$style_alpha = "style=display:none";
		else
			$style_alpha = "style=display:''";
		echo '<table width="' . $width . '" cellpadding="2" cellspacing="2" border="0">
				<tr style="height:25px">
				<td width="25%" class="" align="left" style="white-space: nowrap;"><span ' . $style . ' class="disprecordmsg"  id="RECMSG_BOTTOM">' . (($showPaging == "Y") ? $recmsg : "") . '&nbsp;</span></td>';
		echo '<td style="text-align:Center" nowrap><span ' . $style_alpha . ' class="paging-active"  id="ALPHA_PAGING_BOTTOM">' . (($showLetter == "Y") ? $this->getSearchByLetter($code) : "") . '</span></td>';
		echo '<td width="25%" style="text-align:right; white-space: nowrap;"><span ' . $style . ' class="paging-bottom"   id="PAGING-BOTTOM">' . (($showPaging == "Y") ? $page_link : "") . '&nbsp;</span></td>
				</tr>
				</table>';
	}

	function getSearchByLetter($fieldname) {
		//	global $QUERY_STRING;
		foreach ($_GET as $key => $value) {
			if ($key != "option" && $key != "keyword")
				$qs .= "&$key=$value";
		}

		$filename = basename($_SERVER['PHP_SELF']);
		$link = "";
		for ($i = 65; $i <= 90; $i++) {

			IF ($_GET[keyword] == chr($i))
			$link .= '<font class="" size="+1">' . chr($i) . '</font> ';
			else
				$link .= '<a href="' . $filename . '?' . $qs . '&option=' . rawurldecode($fieldname) . '&keyword=' . chr($i) . '&search=true&start=1" title="Search with ' . chr($i) . '">' . chr($i) . '</a>';
		}
		//$link .= '<a class="bluetext" href="'.$filename.'?'.$qs.'&option='.$fieldname.'&keyword='.chr($i).'&search=truestart=1">'.chr($i).'</a> ';
		if (isset($_GET[keyword]) && $_GET[keyword] == "")
			$link .= '<font  size="+1">' . ALL . '</font>';
		else
			$link .= '<a  href="' . $filename . '?' . $qs . '&option=' . $fieldname . '&keyword=' . '" title="Show All">' . ALL . '</a>';
		return $link;
	}

	### Added by chetan on 16-Jan-2006 ####

	function DisplayTopInListAdd($TOP_HEADER, $BACK_LABEL = '', $BACK_LINK = '', $HEADING = '') {
		global $CFG;

		$html = '<div class="screenTitle1">
				<table width="100%" cellspacing="3" class="bott-border" cellpadding="3" border="0">
				<tr>
				<td>
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tr>
				<td width="1%"><img src="' . $CFG->wwwroot . "/public/images/" . 'on.gif"></td>
						<td align="left">&nbsp;' . $TOP_HEADER . '</td>';
		if ($BACK_LABEL != '')
			$html .= '<td align="right"><a href="' . $BACK_LINK . '">' . $BACK_LABEL . '</a>&nbsp;&nbsp;</td>';
		$html .= '</tr>
				</table>
				</td>
				</tr>
				</table>
				</div>';
		return $html;
	}

	function DisplayTopInListAddDealer($TOP_HEADER, $BACK_LABEL = '', $BACK_LINK = '', $HEADING = '') {
		global $CFG;


		$html = '<div class="screenTitle">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tr>
					
				<td align="left">&nbsp;' . $TOP_HEADER . '</td>';
		if ($BACK_LABEL != '')
			$html .= '<td align="right"><img src="' . $CFG->wwwroot . "/public/images/" . 'icon/back-icon.gif" align="absmiddle"/>&nbsp;<a href="' . $BACK_LINK . '" class="backlisting-link">' . $BACK_LABEL . '</a>&nbsp;</td>';
		if ($HEADING != '')
			$html .= '<td align="right" width="5%">&nbsp;' . $HEADING . '</td>';
		$html .= '</tr>
				</table>
				</div>';
		return $html;
	}

	function DisplayBackLink($TOP_HEADER = '', $BACK_LABEL = '', $BACK_LINK = '', $HEADING = '') {
		global $CFG;


		if ($BACK_LABEL != '')
			$html .= '<div style="float:right;"><img src="' . $CFG->wwwroot . "/public/images/" . 'icon/back-icon.gif" align="absmiddle">&nbsp;<a href="' . $BACK_LINK . '" class="backlisting-link">' . $BACK_LABEL . '</a>&nbsp;</div>';
		if ($HEADING != '')
			$html .= '<td align="right" width="5%">&nbsp;' . $HEADING . '</td>';

		return $html;
	}

	function displayMenu($parent_id, $pre = "5") {
		global $CFG;

		global $parent_rec, $dealer_theme_image_url;

		$submenu_arr = $this->getSubMenus($parent_id);
		$totRec = count($submenu_arr);

		//$DISPLAY_IMAGE=($_COOKIE['coo_Kent_Menu']=="On"?"Y":"N");
		$DISPLAY_IMAGE = "Y";
		if ($parent_id == 0)
			$parent_rec = $totRec;
		if ($totRec > 0) {

			for ($i = 0; $i < $totRec; $i++) {
				if ($parent_id == 0) {
					if ($i % (ceil($parent_rec / 3)) == 0)
						echo "</td><td valign='top'>";
					echo "<span class='bluematter'>";
				}else {
					echo "<span class=''>";
				}
				//if(gen_checkSiteFeature($submenu_arr[$i][vSiteFeatureCode])) {
				echo "<ul style='line-height:20px; margin-top: 10px;'>";

				if ($DISPLAY_IMAGE == "Y") {
					if (trim($submenu_arr[$i]['vImage']) != "" && @file($dealer_theme_image_url . $submenu_arr[$i]['vImage'])) {
						echo '
								<img src=' . $dealer_theme_image_url . $submenu_arr[$i]['vImage'] . "'>&nbsp;";
					}else
						echo "<font color='#0067C6'><img src='" . $CFG->wwwroot . "/public/images/" . "arrow-sitemap.gif'></font>";
				}else {
					echo "<li>";
				}
				if ($submenu_arr[$i][vURL] == "#") {
					echo"
							<font color='#0067C6'>" . $submenu_arr[$i][vMenuDisplay] . "</font>";
				} else {
					echo "
							<a href='" . $submenu_arr[$i][vURL] . "' title='" . $submenu_arr[$i][vMenuDisplay] . "' class='sitemap' >'" . $submenu_arr[$i][vMenuDisplay] . "</a>";
				}
				if ($DISPLAY_IMAGE != "Y") {
					echo "</li>";
				}
				echo "
						</span>";
				echo $this->displayMenu($submenu_arr[$i][iMenuId], $pre + 15);
				echo "</ul>";
			}
		} else {
			return 1;
		}
	}

	function gen_DisplayRecPerPage($rec_limit = "") {
		global $RECLIMIT, $CFG;
		include_once($CFG->dirroot . "/lib/classes/" . 'ajax/AJAX.Class.php5');
		$ajaxObj = new AJAX();
		$getArgu = $ajaxObj->getPOSTGETParam();
		$select_combo = "";
		$select_combo.='<select name="rec_limit" onchange="return checkRecordLimit(\'' . $getArgu . '\', this.value);">';
		$select_combo.='<option value="">Default Limit (' . $RECLIMIT . ')</option>';
		if ($rec_limit == '')
			$rec_limit = $RECLIMIT;
		for ($i = 10; $i <= 100; $i = $i + 10) {
			if ($i == $rec_limit)
				$select_combo.='<option selected value="' . $i . '">' . $i . '</option>';
			else
				$select_combo.='<option value="' . $i . '">' . $i . '</option>';
		}

		$select_combo.='</select>';
		//$select_combo.="<script type="text/javascript">window.location='';</script>";
		return $select_combo;
	}

	function replaceChars($string) {
		$string = htmlspecialchars($string);
		$string = str_replace("&", "&amp;", $string);
		//$string = htmlentities($string);
		return $string;
	}

	function replaceSpecialChar($string) {
		$string = str_replace('&', '&amp;', stripslashes($string));
		$string = htmlspecialchars($string);
		//$string .= "<![CDATA[".$string."]]>";
		return $string;
	}

	function ReplaceQuotes($string) {
		$string = str_replace('"', '\""', $string);
		return $string;
	}
	// By Danil
	//    function newTopMenu() {
	//        global $CFG;
	//
	//
	//        $DISPLAY_IMAGE = 'Y';
	//        $db_menu_rs = $this->top_getTopMenuArray();
	//        echo "
	//        <div id='topnav-tabstrips'>
	//            <ul>
	//                ";
	//        $cnt = 0;
	//        for ($i = 0; $i < count($db_menu_rs); $i++) {
	//            if ($db_menu_rs[$i]['iParentId'] == "0") {
	//                $cnt++;
	//                echo "
	//                        <li><a rel='dropmenu" . $cnt . "' href='#' title='Home'><em>"
	//                . $db_menu_rs[$i]['vMenuDisplay'] . "</em></a>
	//                            <div id='dropmenu." . $cnt . "' class='dropmenudiv'>";
	//            }
	//            if ($db_menu_rs[$i]['iParentId'] != "0") {
	//                echo "
	//                                <a href='#'>" . $db_menu_rs[$i]['vMenuDisplay'] . "</a>";
	//            }
	//            if ($db_menu_rs[$i + 1]['iParentId'] == "0") {
	//                echo "
	//                            </div>
	//                        </li>
	//                ";
	//            }
	//        }
	//        echo "
	//            </ul>
	//        </div>
	//        ";
	//    }

	function newTopMenuRec($parent_id, $menu) {
		global $CFG;

		//$DISPLAY_IMAGE=($_COOKIE['coo_Kent_Menu']=="On"?"Y":"N");
		$DISPLAY_IMAGE = 'Y';
		$submenu_arr = $this->getSubMenus($parent_id); //print_r($submenu_arr);
		//echo $parent_id."<hr>";
		$totRec = count($submenu_arr);

		$cnt = 0;
		if ($parent_id == "0")
			$menu .= '<ul>';
		for ($i = 0; $i < count($submenu_arr); $i++) {
			//$menu .= '<li>';
			if ($parent_id == "0") {
				$cnt++;

				$menu .= '<li><a rel="dropmenu' . $cnt . '" href="#" title="Home"><em>' . $submenu_arr[$i]['vMenuDisplay'] . '</em></a>';

				if (count($this->getSubMenus($submenu_arr[$i][iMenuId])) >= 0) {
					$menu .= '<div id="dropmenu' . $cnt . '" class="dropmenudiv">';
					$menu .= $this->newTopMenuRec($submenu_arr[$i][iMenuId], '');
					$menu .= '</div></li>';
				}
			} else {
				$menu .= '<a href="#">' . $submenu_arr[$i]['vMenuDisplay'] . '</a>';
			}
			//$menu .= '</li>';
		}
		if ($parent_id == "0")
			$menu .= '</ul>';
		return $menu;
	}

	function gen_DisplayHelp($id, $help_text) {
		global $CFG;

		$value = $help_text;
		$value = str_replace('"', '&quot;', $value);
		$img = "";
		if (trim($value) != '') {
			$img = "&nbsp;<input style='border:0;' id='" . $id . "' type='Image' src='" . $CFG->wwwroot . "/public/images/" . "help.gif' title='Help' onmouseover=\"JS_CALENDAR_FLAG=true;DivShowToolTip('" . $id . "','" . $value . "')\" onmouseout=\"JS_CALENDAR_FLAG=false;setTimeout('DivHideToolTip();','5000');\" onclick='return false;'>";
		}
		return $img;
	}

}

?>
