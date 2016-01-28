<?php  
$link = mysql_connect("localhost", "root", "root")  or die("Could not connect");
$dbname = "autodealerspoint";
mysql_select_db($dbname) or die(mysql_error()); // Enter the database name

###  FOR LISTING DISPLAY MENU #####
global $module;
$module="State";

$test_array=array();
$test_array[]="";
//$test_array[]="vOrganizationName";

$test_array[]="vOrderNo";
$test_array[]="vFirstName";
$test_array[]="fTotal";
$test_array[]="dOrderDate";
$test_array[]="eStatus";
//$test_array[]="fValue";
//$test_array[]="dlast_updated";
//$test_array[]="eStatus";


if($_REQUEST['tb']!='')
	$tablename=$_REQUEST['tb']; // Enter the tablename for Query
else
	$tablename='state_master'; // Enter the tablename for Query
$fieldname=$_REQUEST['field'];


//echo "<br><br>FOR INSERT<bR><BR>";
//insert($tablename);
//echo "<br><br>FOR UPDATE<bR><BR>";
//update($tablename,$fieldname);
//select($tablename,$fieldname);
//procedure($tablename);
//add($tablename);
//listing($tablename,$test_array);
//js($tablename);
createprocedure($tablename);

mysql_close($link); // Closing connection
$ssql='';


function insert($tablename)
{
	$result = mysql_query("select * from $tablename");
	$field=mysql_num_fields($result);

	$msg1="Insert into $tablename (";
	for ($i = 1; $i < $field; $i++)
	{
		$msg=mysql_field_name($result, $i);
		//$msg1.=$msg;
		if($i==$field-1)
			$msg1.="$msg) values (";
		else
			$msg1.="$msg, ";
	}
	$fetchrow = mysql_fetch_row ($result);
	for($i = 1; $i < $field; $i++)
	{
		$msg=mysql_field_name($result, $i);
		//$msg1.=$msg;
		if($i==$field-1)
			$msg1.="in_$msg);";
		else
			$msg1.=" in_$msg, &nbsp;";
	}
	echo "$msg1<br>";
}


function update($tablename,$fieldname='')
{
	$result = mysql_query("select * from $tablename");
	$field=mysql_num_fields($result);
	$getfield=mysql_field_name($result, 0);
	if($fieldname!='')
		$ssql.="\n\t\tWHERE $fieldname=in_$fieldname;";
	else
		$ssql.="\n\t\tWHERE $getfield=in_$getfield;";
	$msg1="\tUPDATE $tablename SET";
	for ($i = 1; $i < $field; $i++)
	{
		$msg=mysql_field_name($result, $i);
		if($i==$field-1)
			$msg1.="\n\t\t$msg=in_$msg $ssql";
		else
			$msg1.="\n\t\t$msg=in_$msg , &nbsp;";
	}
	echo $msg1;
}


function createprocedure($tablename)
{
	global $dbname;
	$result1 = mysql_query("select * from $tablename");
	if (!$result1) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
	$field=mysql_num_fields($result1);
	for($i = 1; $i < $field; $i++)
	{
		$msg=mysql_field_name($result1, $i);
		$type=mysql_field_type($result1, $i);
		$length=mysql_field_len($result1, $i);

		if($type=='int' || $type=='date')
			$msgtemp="\tin in_$msg $type";
		else if($type == 'string')
			$msgtemp="\tin in_$msg varchar($length)";
		else
			$msgtemp="\tin in_$msg $type($length)";
		$msg_select.=" ,''";
		$msg_insupd.=" &nbsp;,'$$msg'";
		//$msg1.=$msg;
		//		if($i==$field-1)
		//		  	$msg3.=$msgtemp;
		//		else
		$msg3.=$msgtemp.",\n";
	}
	$parentid=mysql_field_name($result1, 0);
	$order=mysql_field_name($result1, 1);

	$procedurename="proc_".$tablename;
	echo "DELIMITER $$;<br>
			";
	echo "<pre>
	DROP PROCEDURE IF EXISTS `$dbname`.`proc_$tablename`$$

	CREATE PROCEDURE `proc_$tablename`
	(
	</pre>
	/*------------------------------------------------------------------------------------------------------
	<br>\n----------------     Created by HB   :  ".date("j-F-Y")."
			<br>\n----------------     Last modifed by HB  :  ".date("j-F-Y")."
					<br>\n----------------     Example  call ".$procedurename." ('Select',''".$msg_select." ,'and $parentid = \"1\" ')
					<br>\n----------------     Example  call ".$procedurename." ('SelectEdit','1' ".$msg_select.", '')
							<br>\n----------------     Example  call ".$procedurename." ('Insert','' ".$msg_insupd.", '')
									<br>\n----------------     Example  call ".$procedurename." ('Edit','$$parentid' ".$msg_insupd.", '')
											<br>\n----------------     Example  call ".$procedurename." ('Delete','$$parentid' ".$msg_select.", '')
											<br>\n--------------------------------------------------------------------------------------------------------*/<pre>
											in in_Type varchar(200),
											in in_$parentid int,
											".$msg3."	in in_tWhereCondition text
											)
											BEGIN
											START TRANSACTION;
											If(in_Type = 'Select')	Then
											set @sql =  concat(\"select * from $tablename where 1=1 \",in_tWhereCondition,\"\");
											PREPARE stmt FROM @sql;
											EXECUTE stmt;
											DEALLOCATE PREPARE stmt;
											elseif(in_Type = 'SelectEdit')	Then
											set @sql =  concat(\"select * from $tablename where $parentid in (\",in_$parentid,\")\");
											PREPARE stmt FROM @sql;
											EXECUTE stmt;
											DEALLOCATE PREPARE stmt;
											elseif(in_Type = 'Insert')	Then</pre>";
	insert($tablename);
	echo" <pre>
			select last_insert_id() as lastid;
			elseif(in_Type = 'Edit')	Then
			";
	update($tablename);
	echo"
	select in_$parentid;
	elseif(in_Type = 'Delete')	Then
	set @sql =  concat(\"delete from $tablename where $parentid in (\",in_$parentid,\")\");
	PREPARE stmt FROM @sql;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
	select in_$parentid;
	else
	select * from $tablename;
	End if;
	COMMIT;
	END$$

	DELIMITER ;$$
	</pre>";
}
?>
<script type="text/javascript">
	function forgot_pwd()
	{	
			window.open("forgotpassword.php","newwin","toolbar=0,scrollbars=0,location=0,status=0,menubars=0,resizable=0,width=642,height=400,top=0,left=0,maximize=yes");
	}
</script>
