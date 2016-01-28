<?php
$TOP_HEADER = 'Site Map';

$sql = "Select * from log_history where iUserId = '" . $_SESSION['sess_iAdminId'] . "' order by dLoginDate Desc limit 0,1";
$db_sql = $obj->select($sql);

$vUserLogged = $_SESSION['sess_vUserName'];
$vLastLoginDate = $db_sql[0]['dLoginDate'];
$vFromIP = $db_sql[0]['vIP'];
$sql = "select count( u.iUserId ) AS total, 'Admin' AS type FROM User u " .
		"left join SubGroupUserAssign sga on sga.iUserId=u.iUserId " .
		"left join SubGroup sg on sg.iSGroupId=sga.iSGroupId " .
		"left join CompanyId comp on com.iCompanyId=sg.iCompanyId " .
		" group by u.iUserId ";


if ($_SESSION["sess_eType"] == "4") {
	$sql.= " WHERE u.eStatus = 'Active'  AND u.eType='4'  ";
} elseif ($_SESSION['sess_eType'] == "3") {
	$sql.= " WHERE u.eStatus = 'Active'  AND u.eType='3' AND comp.iCompanyId='" . $_SESSION['sess_iCompanyId'] . "' ";
} else if ($_SESSION["sess_eType"] == "2") {
	$sql.= " WHERE u.eStatus = 'Active'  AND u.eType='2' AND sga.iSGroupId='" . $_SESSION['sess_iSGroupId'][0]['iSGroupdId'] . "' ";
}

$db_tot = $obj->selectfetch($sql, 'mysqli_fetch_assoc', 'type');

$tot_admin = $db_tot['Admin'][0]['total'];
/* $tot_static_pages = $db_tot['Static'][0]['total'];
 $tot_user = $db_tot['User'][0]['total']; */
?>
<table width="97%" align="center" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td valign="top">
			<table width="100%" border="0" cellspacing="1" cellpadding="2">
				<tr>
					<td align="left">
						<h1>Welcome to Mobile Learning Manager admin panel</h1>
					</td>
				</tr>
				<tr>
					<td>
						<table width="680" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td height="20" colspan="3" valign="top"></td>
							</tr>
							<tr>
								<td width="33%" height="115" class="homepage-middbox" align="left">
									<div class="homepage-middbox-icon">
										<a href="<?php $CFG->wwwroot . '/index.php?file=Admin&AX=Yes' ?>"><img src="<?php echo $CFG->wwwroot ?>/public/images/icon/admin-mgmt.gif" border="0" style="margin-right: 20px;" /> </a>
									</div>
									<h2>User Mgmt</h2>
									<?php
									echo
									"<a href='" . $CFG->wwwroot . "/index.php?file=User&AX=Yes' style='line-height:25px;'>Application User</a> ";

									echo "</td>";
									if ($_SESSION["sess_eType"] == "4") {
                                        echo "  <td width='33%' height='115' class='homepage-middbox' align='left'>" .
                                          "<div class='homepage-middbox-icon'><a href='" . $CFG->wwwroot . "'/index.php?file=t-settinglist&AX=Yes' > " . "<img src='" . $CFG->wwwroot . "/public/images/icon/site-mgmt.gif' border='0' style='margin-right:20px;'/></a></div>" .
                                          " <h2>Setting Mgmt</h2>" .
                                          " <a href='" . $CFG->wwwroot . "/index.php?file=t-settinglist&AX=No&Type=Company' >Settings</a>" .
                                          "</td>   ";
                                    } else {
                                        echo " <td width='33%' height='115' ></td>";
                                    }
                                    echo "  <td width='33%' height='115' ></td></tr>  ";
                                    ?>
							
							
							<tr>
								<?php
								//      if ($_SESSION["sess_eType"] == "Admin") {
								//                   echo "<td height='115'>" .
								//                   "<td height='115'>" .
								//                    "<td height='115'>" .
								//                   "<td height='115' ><!--div class='homepage-middbox-icon'><a href='#'><img src='" . $CFG->wwwroot . "/public/images/icon/utility-mgmt.gif' border='0' style='margin-right:20px;' /></a></div>" .
								//                   "<h2>Utility Mgmt </h2><a href='" . $CFG->wwwroot . "/index.php?file=t-backup' >Database Backup</a>--></td>";
								//               }
								?>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		<td width="283" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="rightpart-topcurve">
						<div>
							<img src="<?php echo $CFG->wwwroot ?>/public/images/spacer.gif" />
						</div>
					</td>
				</tr>
				<tr>
					<td class="rightpart-bodycurve">
						<table width="100%" border="0" cellspacing="1" cellpadding="2">
							<tr>
								<td align="left">
									<h2>Last Login Details</h2>
								</td>
							</tr>
							<tr>
								<td>
									<table width="100%" border="0" cellspacing="1" cellpadding="1">
										<tr>
											<td width="46%" align="left">Last Logged Admin</td>
											<td width="1%" align="left">:</td>
											<td width="53%" align="left">
												<?php echo $vUserLogged; ?>
											</td>
										</tr>
										<tr>
											<td align="left">Last Login Date</td>
											<td align="left">:</td>
											<td align="left">
												<?php echo $GeneralObj->my_DateTime_Format($vLastLoginDate); ?>
											</td>
										</tr>
										<tr>
											<td align="left">From IP</td>
											<td align="left">:</td>
											<td align="left">
												<?php echo $vFromIP; ?>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="left">
									<h2>Site Statistics</h2>
								</td>
							</tr>
							<tr>
								<td>
									<table width="100%" border="0" cellspacing="1" cellpadding="1">
										<tr>
											<td width="60%" align="left">Total Active Admin</td>
											<td width="4%" align="left">:</td>
											<td width="25%" align="left">
												<?php
												if ($tot_admin > 0) {

                                                    echo " <a href='" . $CFG->wwwroot . "/index.php?file=User&AX=Yes'>" . $tot_admin . "</a>  ";
                                                } else
                                                	echo 0;
                                                ?>
											</td>
										</tr>
										<tr>
									
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td class="rightpart-bottcurve">
						<div>
							<img src="<?php echo $CFG->wwwroot ?>/public/images/spacer.gif" />
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
