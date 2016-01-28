<?php

if($_REQUEST['mode'] == "Update")
{

	$sql = "select vName, vValue, vDefValue, eDisplayType from setting where eConfigType = '".$_REQUEST[eConfigType]."'  order by iOrderBy";

	$db_setting_rs=$obj->sql_query($sql);
	$n = count($db_setting_rs);
	for($i=0;$i<$n;$i++)
	{
		$field_name = $db_setting_rs[$i]["vName"];
		$vDefValue = $db_setting_rs[$i]["vDefValue"];
		if($db_setting_rs[$i]["eDisplayType"] == 'checkbox')
		{
			if(isset($_REQUEST["$field_name"]) || $_REQUEST["$field_name"] != "")
				$vValue = "Y";
			else
				$vValue = "N";
		}
		else if($db_setting_rs[$i]["eDisplayType"] == 'selectbox')
		{
			if(is_array($_REQUEST["$field_name"]))
				$vValue = implode("|",$_REQUEST["$field_name"]);
			else
				$vValue = $_REQUEST["$field_name"];
		}
		else
			$vValue = $_REQUEST["$field_name"];
		if($vValue!="" && $vValue!="-9")
		{
			$vValue = $vValue;
		}
		else
		{
			$vValue = $vDefValue;
		}

		$sql = "Update setting set vValue = '".$vValue."' where vName = '".$field_name."'";
		$db_update = $obj->sql_query($sql);
	}


	if($db_update)
	{
		$var_msg= "System Settings Value Updated Successfully";
		header("Location:index.php?file=t-settinglist&AX=No&Type=".$_REQUEST[eConfigType]."&var_msg=$var_msg");
		exit;
	}
	else
	{
		$var_msg= "General Setting Value Not Updated Successfully";
		header("Location:index.php?file=t-settinglist&AX=No&Type=".$_REQUEST[eConfigType]."&var_msg=$var_msg");
		exit;
	}
}
?>
