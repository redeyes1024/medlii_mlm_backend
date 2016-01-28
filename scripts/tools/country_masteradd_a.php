<?php  
include_once($CFG->dirroot."/lib/classes/"."application/Country.Class.php5");
$CountryObj = new Country();

$GeneralObj->getRequestVars();
$CountryObj->setAllVar();


$iCountryId= $_POST["iCountryId"];
$redirect_file="index.php?file=t-country_masteradd&mode=$mode&iCountryId=$iCountryId";
/*
 $ext='';
if($_REQUEST['keyword'] !='')
{
$ext .="&keyword=".$_REQUEST['keyword'];
}
if($_REQUEST['option'] !='')
{
$ext .="&option=".$_REQUEST['option'];
}  */
$GeneralObj->checkDuplicate('iCountryId', 'country_master', Array('vCountry'), $redirect_file, MSG_ALLREADY_EXIST,$iCountryId);
$msg = MSG_ALLREADY_EXIST;

if($mode=="Add")
{
	//$CountryObj->setvCountry($_POST["vCountry"]);
	$lastcountryid = $CountryObj->insert();
	$msg=MSG_ADD;
	header("Location:index.php?file=Country&AX=Yes&var_msg=$msg".$ExtraVal);
	//exit;

}
else if($mode=="Update")
{
	//	$CountryObj->setvCountry($_POST["vCountry"]);
	$CountryObj->update($iCountryId);
	$msg=MSG_UPDATE;
	header("Location:index.php?file=Country&AX=Yes&var_msg=$msg".$ExtraVal);
	exit;
}
?>
