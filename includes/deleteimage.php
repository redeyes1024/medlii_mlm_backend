<?php

include_once("include.php");

@unlink($_GET['deletePath'] . $_GET['ImageName']);
for ($i = 1; $i <= $_GET['noOfImage']; $i++) {
	@unlink($_GET['deletePath'] . $i . "_" . $_GET['ImageName']); # echo "<br>";exit;
}

$where_cond = " where 1 AND " . $_GET['WCond'];
$fieldName = $_GET['FieldName'];
$fieldArray = explode(",", $fieldName);
$srting = '';
for ($i = 0; $i < count($fieldArray); $i++) {
	if ($i == 0)
		$string.=" " . $fieldArray[$i] . " = ''";
	else
		$string.=", " . $fieldArray[$i] . " = ''";
}

$sql = "UPDATE " . $_GET['TableName'] . " SET " . $string . " " . $where_cond;
$result = $obj->sql_query($sql);

if ($result)
	echo 1;
else
	echo 0;
?>
