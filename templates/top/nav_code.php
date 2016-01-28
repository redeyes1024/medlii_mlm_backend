<?php

if (isset($_GET['file'])) {
	$script_name = $_GET['file'];

	switch ($script_name) {
		##--------- Home -------------
		case 'a-sitestatics':
			$main_menu_code = 'Home';
			$submenu_code = 'Statistics';
			break;
		case 'a-sitemap':
			$main_menu_code = 'Home';
			//$submenu_code = 'SiteMap';
			break;
		case 'a-dashboard':
			$main_menu_code = 'Home';
			//$submenu_code = 'SiteMap';
			break;


			##-------- User ------------
		case 'Admin':
		case 'a-adminadd':

		case 'User':
			$main_menu_code = 'User';
			break;

		case 'm-useradd':
			$main_menu_code = 'User';
			$submenu_code = 'Admin';
			break;

		case 'LoginHistory':
			$main_menu_code = 'User';
			$submenu_code = 'Admin';
			break;


			##-------- Company Management ------------
		case 'Company':
			$submenu_code = 'Company Management';
			$main_menu_code = 'Company Mgmt';
			break;

		case 'm-companyadd':
			if ($_SESSION["sess_eType"] != "Company Admin") {
				$main_menu_code = 'Company Mgmt';
			} else {
				$main_menu_code = 'User';
			}
			break;

		case 'm-companyadminadd':
			if ($_SESSION["sess_eType"] != "Company Admin") {
				$main_menu_code = 'Company Mgmt';
			} else {
				$main_menu_code = 'User';
			}
			break;

		case 'CompanyAdmin':
			if ($_SESSION["sess_eType"] != "Company Admin") {
				$main_menu_code = 'Company Mgmt';
			} else {
				$main_menu_code = 'User';
			}

			break;


			##-------- Sub Group ------------
		case 'SubGroup' :


		case 'm-subgroupadd':
			if ($_SESSION["sess_eType"] != "Group Admin") {
				$main_menu_code = 'SubGroup';
			} else {
				$main_menu_code = 'User';
			}
			break;

		case 'm-subgroupadminadd':
			if ($_SESSION["sess_eType"] != "Group Admin") {
				$main_menu_code = 'SubGroup';
			} else {
				$main_menu_code = 'User';
			}
			break;

		case 'SubGroupAdmin':
			if ($_SESSION["sess_eType"] != "Group Admin") {
				$main_menu_code = 'SubGroup';
			} else {
				$main_menu_code = 'User';
			}
			break;





			##-------- Master ------------
		case 'Master' :

		case 'Directory':

		case 'm-directoryadd':

		case 'Events' :
		case 'm-eventadd':

		case 'Courses' :
		case 'm-courseadd':

		case 'Classes' :

		case 'm-classadd':


		case 'Library' :

		case 'm-libraryadd':

		case 'VideoCategory':


		case 'm-videocategoryadd':
			//$main_menu_code = 'Master';
			$sub_menu_code = 'VideoCategory';

		case 'AudioCategory' :
		case 'm-audiocategoryadd':
			$sub_menu_code = 'AudioCategory';




		case 'CoursesClasses' :
		case 'm-courseclassesadd':
			$sub_menu_code = 'CoursesClasses';

		case 'Documents' :
		case 'm-documentadd':
			$sub_menu_code = 'Documents';

		case 'Video' :
		case 'm-videoadd':
			$sub_menu_code = 'Video';

		case 'Audio' :
		case 'm-audioadd':
			$sub_menu_code = 'Audio';

			$main_menu_code = 'Master';
			break;

			//case 'store'  :
			// case 'm-storeadd':
			// $sub_menu_code = 'store';
			//case 'category'  :
			//case 'm-categoryadd':
			// $sub_menu_code = 'category';
			// case 'product'  :
			// case 'm-productadd':
				// $sub_menu_code = 'product';
				//case 'categoryproduct'  :
				//case 'm-categoryproductadd':
				// $sub_menu_code = 'categoryproduct';

					/*     case 'name'  :
					 case 'm-nameadd':
					$sub_menu_code = 'name';

					case 'name'  :
					case 'm-nameadd':
					$sub_menu_code = 'name';
					case 'importcsv' :
					case 'm-importcsvadd':
					$sub_menu_code = 'ImportCSV';
					*/


					/*
					 $main_menu_code = 'Master';

					break;
					*/

					## -------- Site Settings ------
				case 't-settinglist':
					$main_menu_code = 'Settings';
					break;
				case 'Pagesetting':
				case 't-static_page_add':
				case 't-page_settingsadd':
				case 'SystemMails':
				case 't-system_emailadd':
				case 't-page_settingadd':
					$main_menu_code = 'Settings';
					break;
					## -------- Module Generator ------
				case 'u-general_param_list':
					$main_menu_code = 'Module';
					$submenu_code = 'Module Generator';
					break;
				case 't-backup':
					$main_menu_code = 'Utility';
					//$submenu_code = 'Backup';
					break;
	}
}
?>
