<?php
//include('../config.php');
global $CFG;
include_once($CFG->dirroot . "/includes/header.php");
?>
<body>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="154" valign="top">
				<?php include($CFG->dirroot . "/templates/top/top_login.inc.php"); ?>
			</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		<tr>
			<td height="320" valign="top">
				<?php
				if (isset($_GET["type"]) && $_GET["type"] == "Owner") {
                    include($CFG->dirroot . "/templates/general/login1.inc.php");
                } else {
                    include($CFG->dirroot . "/templates/general/login.inc.php");
                }
                ?>
			</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td>
							<?php include_once($CFG->dirroot . "/templates/bottom/bottom.inc.php"); ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="5"></td>
		</tr>
	</table>
</body>
</html>
