<?php
include_once("include.php");
list($fieldname, $id_value,$checkfield) = explode("_",$_REQUEST[fieldname]);
if($checkfield =='price'){
	$priceArr = explode(' ',$_REQUEST[content]);
	if($priceArr[1] == '')
		$priceArr = explode('$',$_REQUEST[content]);

	if($priceArr[1] == '')
		$priceArr[1] = $_REQUEST[content];

	$priceArr[1] = str_replace(',','',$priceArr[1]);
	$sql = "update `".$_REQUEST[tb]."` set ".$fieldname."='".$priceArr[1]."'  where  ".$_REQUEST[id]."='".$id_value."' ";
	$_REQUEST[content] = $GeneralObj->Make_Currency($priceArr[1]);
}else{
	$sql = "update `".$_REQUEST[tb]."` set ".$fieldname."='".$_REQUEST[content]."'  where  ".$_REQUEST[id]."='".$id_value."' ";
}
$db=$obj->sql_query($sql);
echo stripslashes($_REQUEST[content]);
/*
 //print_r($_REQUEST);
list($fieldname, $id_value) = explode("_",$_REQUEST[fieldname]);
$sql = "update `".$_REQUEST[tb]."` set ".$fieldname."='".$_REQUEST[content]."'  where  ".$_REQUEST[id]."='".$id_value."' ";
$db=$obj->sql_query($sql);
echo stripslashes($_REQUEST[content]);
*/
?>