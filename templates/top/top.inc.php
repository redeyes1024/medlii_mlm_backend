<?php
global $CFG;

include_once $CFG->dirroot . '/lib/classes/application/SiteMap.php';
?>
<script type="text/javascript">


    function menuItemClicked(defaultURL){

        var weiCompanyId='';
        var weiSGroupId='';
        var westr_company='';
        var westr_group='';
        weiCompanyId = $.getQuery('iCompanyId');
        weiSGroupId= $.getQuery('iSGroupId');
        if(weiCompanyId) {
            westr_company ='&iCompanyId='+weiCompanyId;
        }
        if(weiSGroupId) {
            westr_group ='&iSGroupId='+weiSGroupId;
        }
        var urlcustom=westr_company+''+westr_group;

        if(urlcustom){
            window.location =defaultURL+urlcustom;}
        else{window.location =defaultURL;}
        return false;
    }


</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<?php
		if ((int) $_SESSION["sess_eType"] < "4") {
            echo "<td  height='90px'><span><font size='6'>" . $_SESSION["sess_vCompanyName"] . "</font></span></td>";
        } else {
            echo "<td width='21%' height='91' align='left'><a href='" . $CFG->wwwroot . "/index.php'><img class='noinput' src='" . $CFG->wwwroot . "/public/images/logo.png' /><a></td>";
        }
        ?>
		<td class="toprightarea">
			<span class="loggedname"><strong>Logged User :&nbsp;</strong> <?php echo " " . $_SESSION['sess_vUserName']; ?> </span>
			<?php
			if ((int) $_SESSION["sess_eType"] == "2") {
                $groups = '';
                foreach ($_SESSION["sess_iSGroupIds"] as $key => $value) {
                    $groups.= $value[1] . ',';
                }
                echo '<br /><b>Group Code ID</b>: ' . $groups;
            }
            ?>
			<br />
			<?php echo $GeneralObj->TimetoDate(time()); ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="90%" class="topnav">
						<ul id="MenuBar" class="MenuBarHorizontal">
							<?php
							$class = "";
							$siteMap = new SiteMap();
							// $r=$_SESSION["sess_eType"];
							//  echo "<b>rights === ".$r."</b><br/>";
							$menuItems = $siteMap->getItemsByRights($_SESSION["sess_eType"]);
							//  echo "<b>COUNT === ".count($menuItems)."</b>";

							for ($i = 0; $i < count($menuItems); $i++) {
								$currentItem = current($menuItems);
								echo "<li  alt='" . $currentItem['vMenuDisplay'] . "'>";
								if ($currentItem['vMenuDisplay'] == 'Content Mgmt') {

									echo "<a href='#' onclick='menuItemClicked(\"" . $currentItem['vURL'] . "\");return false;' class='MenuBarItemSubmenu' title='" . $currentItem['vMenuDisplay'] . "' >" .
											"<span><em>" . $currentItem['vMenuDisplay'] . "</em></span></a>";
								} else {
									echo "<a href='" . $currentItem['vURL'] . "' class='MenuBarItemSubmenu' title='" . $currentItem['vMenuDisplay'] . "' >" .
											"<span><em>" . $currentItem['vMenuDisplay'] . "</em></span></a>";
								}
								if (count($currentItem['eSubMenu']) > 0) {
                                    $currentSubMenu = $currentItem['eSubMenu'];
                                    echo "<ul '>";
                                    for ($d = 0; $d < count($currentSubMenu); $d++) {
                                        $currentSubItem = current($currentSubMenu);
                                        echo "<li   alt='" . $currentSubItem['vMenuDisplay'] . "'>";
                                        $module_array = array('Directory', 'Events', 'Courses', 'AudioCategory', 'VideoCategory', 'Library', 'Classes','Audios','Videos');
                                        if (in_Array($currentSubItem['vMenuDisplay'], $module_array)) {

                                            echo "<a class='MenuBarItemSubmenuItem' href='#' onclick='menuItemClicked(\"" . $currentSubItem['vURL'] . "\");return false;'  title='" . $currentSubItem['vMenuDisplay'] . "' >" .
                                              "<span><em>" . $currentSubItem['vMenuDisplay'] . "</em></span></a>";
                                        } else {
                                            echo "<a class='MenuBarItemSubmenuItem' href='" . $currentSubItem['vURL'] . "'  title='" . $currentSubItem['vMenuDisplay'] . "' >" .
                                              "<span><em>" . $currentSubItem['vMenuDisplay'] . "</em></span></a>";
                                        }
                                        echo "</li>";
                                        next($currentSubMenu);
                                    }
                                    echo"</ul>";
                                }
                                echo "</li>";
                                next($menuItems);
							}
							?>
						</ul>
					</td>
					<td width="10%" valign="top" align="right" style="padding-right: 5px;">
						<a href="<?php echo $CFG->wwwroot ?>/includes/logout.php" class="logout">Logout</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="top-submenu"></td>
	</tr>
</table>
<script type="text/javascript">
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar", {imgDown:"<?php echo $CFG->wwwroot ?>/public/images/SpryMenuBarDownHover.gif", imgRight:"<?php echo $CFG->wwwroot ?>/public/images/SpryMenuBarRightHover.gif"});

</script>
