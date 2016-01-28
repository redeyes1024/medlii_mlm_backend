<?php
require_once('config.php');
global $CFG;
include_once("includes/include.php");

$vPDF =$_REQUEST['vPDF'];
$vPDFpath = $_REQUEST['vPDFpath'];

$size[0]="auto";
$size[1]="auto";
header("Location: $vPDFpath");
exit();
?>
<html>
<head>
<title><?php echo $SITE_NAME?></title>
<LINK REL=StyleSheet HREF="style/style.css" TYPE="text/css">

</head>

<body topmargin="0" leftmargin="0"
	onLoad="window_onload(<?php echo $size[0]?>,<?php echo $size[1]?>);">
	<div style="padding: 10px;">
		<table width="100%" border="1" class="table-dottedborder" border="0"
			align="center" cellpadding="2" cellspacing="1">
			<tr>
				<td><layer src="<?php echo $vPDFpath;?>"> <iframe width="1021"
						height="700" src="<?php echo $vPDFpath;?>"></iframe> </layer>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>
