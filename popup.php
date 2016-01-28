<?php
require_once('config.php');
global $CFG;
#print_r($_REQUEST);
include_once("includes/include.php");
$eType = (trim($_GET['eType'])== '')?'Image':$_GET['eType'];
$vImageName =$_REQUEST['vImage'];
$vImagepath = $_REQUEST['vImagepath'];
if($_SERVER[HTTPS])
	$site_url = "http://" . $_SERVER["HTTP_HOST"] . $CFG->sitefolder;
if(strstr($site_path,"hbpanel"))
{
	$site_path = str_replace("hbpanel/", "", $site_path);
	$site_url = str_replace("hbpanel/", "", $site_url);
}
$vImagePath = str_replace($site_url, $site_path, $vImagepath);
$vImageUrl = str_replace($site_path, $site_url, $vImagepath);
 
#print_r($vImageUrl); exit;
if($_GET['eType']=='video/quicktime')
{
	// $size = @getimagesize($vImagePath);
	// print_r($size); exit;
	$size[0]="480";
	$size[1]="550";
}
else if(is_file($vImagePath)){
	$size = @getimagesize($vImagePath);
		
}else{
	$noImage = $site_images."noimage.jpg";
	$size = @getimagesize($noImage);
}
?>
<html>
<head>
<title><?php echo $SITE_NAME?></title>
<LINK REL=StyleSheet HREF="style/style.css" TYPE="text/css">
<script language="javascript">

function window_onload(width1,height1){
   if(width1!="" && height1!="")
   {
   
   	window.resizeTo(width1+70,height1+100);
   }
   else
   {
    
    window.resizeTo("auto","auto");
   }
}

</script>
</head>
<body stats=1 topmargin="0" leftmargin="0"
	onLoad="window_onload(<?php echo $size[0]?>,<?php echo $size[1]?>);">
	<table align="center" cellpadding="7" height="100%" width=100%
		cellspacing="0" bgcolor="#F2F2F2">
		<tr valign=top height=25>
			<td valign=top><?	if(is_file($vImagePath)){
				if($eType=='Image'){?> <A HREf="" onclick="return window.close();"><img
					src="<?php echo $vImageUrl?>" border="0"
					alt="<?php echo $vImageName?>"> </A> <?php    } else if($eType=='Flash'){?>
				<A HREf="" onclick="return window.close();"><object
						classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
						codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"
						width="215" height="70">
						<param name="movie" value="<?php echo $vImagePath?>" />
						<param name="quality" value="high" />
						<param name="wmode" value="transparent" />
						<embed src="<?php echo $vImagepath?>" width="215" height="70"
							quality="high" wmode="transparent"
							pluginspage="http://www.macromedia.com/go/getflashplayer"
							type="application/x-shockwave-flash"></embed>
					</object> </A> <?php    } else if($eType=='video/quicktime'){?> <A
				HREf="" onclick="return window.close();"><object width="500"
						height="550">
						<param name="movie" value="<?php echo $vImagePath?>" />
						<param name="allowFullScreen" value="true" />
						<param name="wmode" value="transparent" />
						<param name="quality" value="high" />
						<embed src="<?php echo $vImagepath?>" width="500" height="550"
							quality="high" allowFullScreen="true" type="video/quicktime"></embed>
					</object> </A> <?		}
			}else{?> <A HREf="" onclick="return window.close();"><img
					src="<?php echo $noImage?>" border="0"
					alt="<?php echo $vImageName?>"> </A> <?php   } ?>
			</td>
		</tr>
	</table>
</body>
</html>
