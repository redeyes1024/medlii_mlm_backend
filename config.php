<?php

unset($CFG);
date_default_timezone_set('UTC');
$CFG = new stdClass();
$CFG->wwwroot = 'http://adminpanellocal.hospitalu.net';
$CFG->dirroot = '/Users/redeyes1024/Documents/Work/MLM/WEB/adminpanel/source';
$CFG->datadirroot = $CFG->dirroot . '/uploads';
$CFG->datawwwroot = $CFG->wwwroot . "/uploads";
$CFG->servicedirroot = $CFG->dirroot . "/ws";
$CFG->servicewwwroot = $CFG->wwwroot . "/ws";
$CFG->AJAX_listing = true;



$CFG->dbhost = 'localhost';
$CFG->dbname = 'C241847_mlm';
$CFG->dbuser = 'C241847_mlm';
$CFG->dbpass = 'Qwerty456';
$CFG->prefix = '';
$CFG->GAUserEncKey = "TAILOR@HB";


$CFG->sitefolder = '/adminpanel/source/';
$CFG->rec_limit = "50";



$CFG->site_path = $_SERVER["DOCUMENT_ROOT"] . $CFG->sitefolder;
$CFG->site_url = "http://" . $_SERVER["HTTP_HOST"] . $CFG->sitefolder;
$CFG->secure_url = "http://" . $_SERVER["HTTP_HOST"] . $CFG->sitefolder;



### Site Image Path And URL (for editor)
//$CFG->editor_upload_path = $CFG->sitefolder . "/public/uploades/FCKUploads/";
//$CFG->fck_editor_path = $CFG->site_comp_path . "FCKeditor/";
//$CFG->fck_editor_url = $CFG->site_comp_url . "FCKeditor/";
####	Database Backup files Path and Url #####
//$CFG->site_backup_path = $CFG->site_path . "adminpanel/db_back/";
//$CFG->site_backup_url = $CFG->site_url . "adminpanel/db_back/";
///$CFG->ADMIN_USER_NAME = 'admin';
//$CFG->imagemagickinstalldir = '/usr/bin';
//$CFG->useimagemagick = "Yes"; ///!!!




/* * ***** Debug mode for Query Execustion time ************ */
$DEBUG_LEVEL = "0";
/* * ***************************************** */

/* layout files to be change */
$CFG->DEFAULT_LAYOUT_NAME = 'template.tpl';
$CFG->LAYOUT_NAME = 'template.tpl';
/* * ************************* */

###-Email SUBJECTS########
##Mall Images Image size #####
define('MALL_IMAGES_LARGE_IMAGE_SIZE', "125X125");
define('MALL_IMAGES_THUMB_IMAGE_SIZE', "75X75");

####Mall Images prefix of image.....
define('MALL_IMAGES_LARGE_IMAGE_PREFIX', "2");
define('MALL_IMAGES_THUMB_IMAGE_PREFIX', "1");



$SEO_URL = 'Yes';
###Gallery Image size #####
define('GALLERY_THUMB_IMAGE_SIZE', "125X125");
define('GALLERY_MEDIUM_IMAGE_SIZE', "75X75");
define('GALLERY_LARGE_IMAGE_SIZE', "500X400");
#### clip image prefix of image.....
define('GALLERY_THUMB_IMAGE_PREFIX', "1");
define('GALLERY_MEDIUM_IMAGE_PREFIX', "2");
define('GALLERY_LARGE_IMAGE_PREFIX', "3");
?>
