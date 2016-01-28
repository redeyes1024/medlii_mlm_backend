<?php

/*
 * To change this template, choose Tools | Templates
* and open the template in the editor.
*/

/**
 * Description of TopMenu
 *
 * @author redeyes1024
 */
class SiteMap {

	protected $siteMap;

	protected function createMenuItem($iMenuId, $iParentId, $iAccessLevel, $vMenuDisplay, $vImage, $vURL, $eSubMenus = null) {
		return array("iMenuId" => $iMenuId, "iParentId" => $iParentId, 'iAccessLevel' => $iAccessLevel, "vMenuDisplay" => $vMenuDisplay, "vImage" => $vImage, "vURL" => $vURL, "eSubMenu" => $eSubMenus);
	}

	function __construct() {
		$db_menu_rs = array();
		$i = 0;
		$b = $i;
		$db_menu_rs[] = $this->createMenuItem($i, null, 1, 'Home', 'home-icon.gif', "index.php?file=a-sitemap", array($this->createMenuItem(++$i, $b, 1, 'Site Map', 'sitemap-icon.gif', "index.php?file=a-sitemap")));
		$b = $i;
		$db_menu_rs[] = $this->createMenuItem(++$i, null, 2, 'User Mgmt', 'user-icon.gif', 'index.php?file=User&AX=Yes', array($this->createMenuItem(++$i, $b, 2, 'User', 'admin-icon.gif', "index.php?file=User&AX=Yes"))
		);
		$b = $i;

		$db_menu_rs[] = $this->createMenuItem($i, null, 4, 'Organization Mgmt', 'user-icon.gif', "index.php?file=Company&AX=Yes", array($this->createMenuItem(++$i, $b, 4, 'Organization Management', 'user-icon.gif', "index.php?file=Company&AX=Yes")));
		$b = $i;



		$db_menu_rs[] = $this->createMenuItem($i, null, 2, 'Group Mgmt', 'user-icon.gif', "index.php?file=SubGroup&AX=Yes", array($this->createMenuItem(++$i, $b, 2, 'Group Management', 'user-icon.gif', "index.php?file=SubGroup&AX=Yes")));
		$b = $i;

		$db_menu_rs[] = $this->createMenuItem($i, null, 2, 'Content Mgmt', 'user-icon.gif', "index.php?file=Directory&AX=Yes", array($this->createMenuItem(++$i, $b, 2, 'Directory', 'user-icon.gif', "index.php?file=Directory&AX=Yes"),
				$this->createMenuItem(++$i, $b, 2, 'Events', 'user-icon.gif', "index.php?file=Events&AX=Yes"),
				$this->createMenuItem(++$i, $b, 2, 'Courses', 'user-icon.gif', "index.php?file=Courses&AX=Yes"),
				$this->createMenuItem(++$i, $b, 2, 'Classes', 'user-icon.gif', "index.php?file=Classes&AX=Yes"),
				$this->createMenuItem(++$i, $b, 2, 'Library', 'user-icon.gif', "index.php?file=Library&AX=Yes"),
				$this->createMenuItem(++$i, $b, 2, 'Videos', 'user-icon.gif', "index.php?file=VideoCategory&AX=Yes"),
				$this->createMenuItem(++$i, $b, 2, 'Audios', 'user-icon.gif', "index.php?file=AudioCategory&AX=Yes")
		));

		$b = $i;

		$db_menu_rs[] = $this->createMenuItem($i, null, 4, 'Settings', 'sitesetting-icon.gif', "index.php?file=t-settinglist&AX=No&Type=Email", array($this->createMenuItem(++$i, $b, 4, 'System Settings', 'user-icon.gif', "index.php?file=t-settinglist&AX=No&Type=Email"),
				$this->createMenuItem(++$i, $b, 4, 'System Mails', 'generalsetting-icon.gif', "index.php?file=SystemMails&AX=Yes")));

		$this->siteMap = $db_menu_rs;
	}

	function getItemsByRights($eRights) {
		$itemsList = '';
		reset($this->siteMap);
		for ($i = 0; $i < count($this->siteMap); $i++) {
			$currentItem = current($this->siteMap);
			if ($currentItem['iAccessLevel'] <= $eRights) {
				$subItems = null;
				$sumItemslist=$currentItem['eSubMenu'];
				for ($b = 0; $b < count($sumItemslist); $b++) {
					$currentSubItem = current($sumItemslist);
					if ($currentSubItem['iAccessLevel'] <= $eRights) {
						$subItems[] = $currentSubItem;
					}
					next($sumItemslist);
				}
				$currentItem['eSubMenu'] = $subItems;
				$itemsList[] = $currentItem;
			}
			next($this->siteMap);
		}
		return $itemsList;
	}

}

?>
