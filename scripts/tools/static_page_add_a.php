<?php
$contents_path = $site_path.'templates/static/';
$filename = $contents_path.$_POST['filename'];
$contents = $_POST['tStaticPage'];
$fp = @fopen($filename, 'w');
@fclose($fp);
@chmod ($filename,0777);

if(is_writable($filename)){
	if (!$fp = @fopen($filename, 'w+'))
		$msg = "Error in open file!";
	$tContents = $contents;
	$var_msg= "Static page updated successfully";
	if (!fwrite($fp, stripslashes($tContents)))
		$var_msg = "Error in write page!";
	fclose($fp);
}else{
	$var_msg = "File is not writable";
}
header("Location:index.php?file=t-static_page_list&var_msg=$var_msg");
exit;
?>
