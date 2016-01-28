<?php

#echo '##'; exit;
ini_set('memory_limit', '-1');
global $obj;

$path_name = $_FILES['vCSV']['tmp_name'];
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

	# echo '<pre>'; print_R($ExcelData); exit;
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

			if ($ExcelData[0][0] != "username") {
				$temp = 1;
			} else if ($ExcelData[0][1] != "password") {
				$temp = 1;
			} else if ($ExcelData[0][2] != "email") {
				$temp = 1;
			} else if ($ExcelData[0][3] != "employeeid") {
				$temp = 1;
			} else if ($ExcelData[0][4] != "alerts") {
				$temp = 1;
			}
			//  else if($ExcelData[0][5]!="status") { $temp=1;}
		}

		if ($temp == 1) {
			$msg = "CSV Format is not valid.";
			header("Location:index.php?file=User&AX=Yes" . $qs . "&var_msg=" . $msg);
			exit;
		}

		$sql_select = "SELECT * FROM User WHERE vUsername= '" . $ExcelData[$firm][0] . "' OR  (vEmail='" . $ExcelData[$firm][2] . "')";
		$db_data = $obj->select($sql_select);
		if (count($db_data) <= 0) {
			if ($ExcelData[$firm][4] == 'Yes') {
				$ExcelData[$firm][4] = 'On';
			} else {
				$ExcelData[$firm][4] = 'Off';
			}

			$str_sql.="('NULL','" . $iSGroupId . "','" . $ExcelData[$firm][0] . "','" . $ExcelData[$firm][1] . "','" . $ExcelData[$firm][2] . "','" . $ExcelData[$firm][3] . "','" . $ExcelData[$firm][4] . "','Unblock','Active'),";
			$k++;
		}
	}
	$str_sql = substr($str_sql, 0, -1);
	if ($str_sql != '') {
		$sql = "insert into User(iUserId,iSGroupId,vUsername,vPassword,vEmail,iEmployeeId,eAlerts,eStatus1,eStatus) values " . $str_sql;
		$obj->insert($sql);
	}

	//$str_sql='';



	$msg = "CSV Data for Users is successfully updated.\n";
} else {
	$msg = "Please Enter CSV Data for Users.\n";
}



header("Location:index.php?file=User&AX=Yes" . $qs . "&var_msg=" . $msg);
exit;
?>
