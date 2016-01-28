<?php
$sitefolder	= "/tph/";
$adminfolder	= "tphpanel/";

### Site Path And URL
$site_path	= $_SERVER["DOCUMENT_ROOT"].$sitefolder;
$site_url	= "http://".$_SERVER["HTTP_HOST"].$sitefolder;
$secure_url	= "https://".$_SERVER["HTTP_HOST"].$sitefolder;

if($_SERVER[HTTPS])
	$site_url = $secure_url;
### Admin Control Panel Path And URL
$admin_path	= $site_path . $adminfolder;
$CFG->dirroot	= $site_url . $adminfolder;

### Site Image Path And URL
$site_image_path	= $site_path."images/";
$site_image_url	= $site_url."images/";

### Admin Control Panel Image Path And URL
$admin_image_path 	= $site_path.$adminfolder."images/";
//$CFG->wwwroot."/public/images/" 	= $site_url.$adminfolder."images/";

### Site Style Path And URL
$site_style_path	= $site_path."style/";
$site_style_url	= $site_url."style/";

### Admin Control Panel Style Path And URL
$admin_style_path	= $admin_path."style/";
$admin_style_url	= $CFG->dirroot."style/";

### Site Image Path And URL (for editor)
$editor_image_path	= $sitefolder."images/";
$editor_image_url		= $sitefolder."images/";


$asc_order 	= $CFG->wwwroot."/public/images/"."asc_order.gif";
$desc_order 	= $CFG->wwwroot."/public/images/"."desc_order.gif";

### Ajax File Path
$ajax_url = $site_url."ajax_file/";
$secure_ajax_url = $secure_url."ajax_file/";

### user icon
$usericon_path=$admin_image_path."user_icon/";
$usericon_url=$CFG->wwwroot."/public/images/"."user_icon/";

### banner
$banner_path=$admin_image_path."banner/";
$banner_url=$CFG->wwwroot."/public/images/"."banner/";


$DEF_COUNTRY_CODE='US';
$IP = $_SERVER["REMOTE_ADDR"];
?>