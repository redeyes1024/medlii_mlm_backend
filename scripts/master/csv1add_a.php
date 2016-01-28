<?php

//echo '##'; exit;
ini_set('memory_limit', '-1');
global $obj;

$path_name = $_FILES['vCSV1']['tmp_name'];
if ($path_name != "") {

	$handle = fopen($path_name, "r");
	$k = 0;
	while (($data = fgetcsv($handle, 65536, ",")) !== FALSE) {
		$num = count($data);
		$row++;

		for ($c = 0; $c < $num; $c++) {
			$ExcelData[$k][$c] = addslashes($data[$c]);
		}
		$k++;
	}
	fclose($handle);


	$str_sql = '';
	$k = 0;

	#echo '<pre>'; print_R($ExcelData); exit;
	#echo "<pre>";print_R($ExcelData[0]); exit;
	if ($_SESSION["sess_eType"] == "3") {
		$iCompanyId = $_SESSION['sess_iCompanyId'];
		$iSGroupId = $_REQUEST['iSGroupId'];
		$qs = '&iSGroupId=' . $iSGroupId;
	} else if ($_SESSION['sess_eType'] == 'Group Admin') {
		$iCompanyId = $_SESSION['sess_iCompanyId'];
		$iSGroupId = $_SESSION['sess_iSGroupId'];
		$qs = '';
	} else {
		$iSGroupId = $_REQUEST['iSGroupId'];
		$iCompanyId = $_REQUEST['iCompanyId'];
		$qs = '&iCompanyId=' . $iCompanyId . '&iSGroupId=' . $iSGroupId;
	}

	for ($firm = 1; $firm < count($ExcelData); $firm++) {

		if ($firm == 1) {
			if ($ExcelData[0][0] != "EmpId") {
				$temp = 1;
			} else if ($ExcelData[0][1] != "FirstName") {
				$temp = 1;
			} else if ($ExcelData[0][2] != "LastName") {
				$temp = 1;
			} else if ($ExcelData[0][3] != "Dept") {
				$temp = 1;
			} else if ($ExcelData[0][4] != "Email") {
				$temp = 1;
			} else if ($ExcelData[0][5] != "JobTitle") {
				$temp = 1;
			} else if ($ExcelData[0][6] != "Phone") {
				$temp = 1;
			} else if ($ExcelData[0][7] != "Status") {
				$temp = 1;
			}
			//  else if($ExcelData[0][5]!="status") { $temp=1;}
		}

		if ($temp == 1) {
			$msg = "CSV Format is not valid.";
			header("Location:index.php?file=Directory&AX=Yes" . $qs . "&var_msg=" . $msg);
			exit;
		}

		//$sql_select="SELECT * FROM User WHERE 	vUsername= '".$ExcelData[$firm][0]."' OR  (vEmail='".$ExcelData[$firm][2]."' OR  iEmployeeId = '".$ExcelData[$firm][3]."')";
		//$db_data=$obj->select($sql_select);
		//if(count($db_data) <= 0) {
		//       if($ExcelData[$firm][4]=='Yes') {
		//		  $ExcelData[$firm][4] = 'On';
		//	 } else {
		//  $ExcelData[$firm][4]='Off';
		//}
		$str_sql.="('NULL','" . $iSGroupId . "','" . $ExcelData[$firm][0] . "','" . $ExcelData[$firm][1] . "','" . $ExcelData[$firm][2] . "','" . $ExcelData[$firm][4] . "','" . $ExcelData[$firm][6] . "','" . $ExcelData[$firm][5] . "','" . $ExcelData[$firm][3] . "','Active'),";
		$k++;
		//}
	}
	$str_sql = substr($str_sql, 0, -1);
	if ($str_sql != '') {
		$sql = "insert into Directory(iDirectoryId,iSGroupId,vEmpId,vFirstname,vLastname,vEmail,vPhone,vJobTitle,vDept,eStatus) values " . $str_sql;
		$obj->insert($sql);
	}
	//echo $sql; exit;
	//$str_sql='';



	$msg = "CSV Data for Users is successfully updated.\n";
} else {
	$msg = "Please Enter CSV Data for Users.\n";
}



header("Location:index.php?file=Directory&AX=Yes" . $qs . "&var_msg=" . $msg);
exit;
?>
