<?php
include_once("../../includes/include.php");
include_once($CFG->dirroot."/lib/classes/" . 'xml/XML.Class.php5');
$xmlObj = new XML();
if(isset($_REQUEST[Code]) && $_REQUEST[Code]!='')
	$Code = $_REQUEST[Code];
#else
#	$Code = 'US';
$ssql=" where vCountryCode='".$Code."'";
$sql_query 	= "select vState,vStateCode from state_master $ssql  order by vState";
$db_state_rs  = $obj->select($sql_query);
ob_end_clean();
$xmlcontent ='<?xml version="1.0"?>
		<list_data>';
$xmlcontent .= '<tot>'.count($db_state_rs ).'</tot>';
for($i=0,$n=count($db_state_rs);$i<$n;$i++)
{
	$xmlcontent .='<Id>'.$db_state_rs[$i]['vStateCode'].'</Id><Text><![CDATA['.str_replace("&","and",$db_state_rs[$i]['vState']).']]></Text>';
}
$xmlcontent.='</list_data>';
$arr_xml = $xmlObj->xml2php($xmlcontent);
$xml     = $xmlObj->php2xml($arr_xml);
$xmlObj->output_xml($xml);
?>