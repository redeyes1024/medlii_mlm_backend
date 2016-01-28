<?php
include_once($CFG->dirroot . "/lib/classes/" . "application/Company.Class.php5");
include_once($CFG->dirroot . "/lib/classes/" . "application/User.Class.php5");
include_once $CFG->dirroot . '/scripts/tools/CompanyGroupFilter.php';
$userObj = new User();
$ddlist = new CompanyGroupFilter($_SESSION["sess_iAdminId"], $_SESSION['sess_eType']);

$dCreated = date('Y-m-d H:i:s');
$GeneralObj->getRequestVars();
$iSGroupId=${
	$ddlist::groupValueFilterName};
	$iCompanyId=${
		$ddlist::companyValueFilterName};

		$userObj->setAllVar();
		global $obj;

		if ($_SESSION['sess_eType'] == '3') {
			$iCompanyId = $_SESSION['sess_iCompanyId'];
			$qs = '&iSGroupId=' . $iSGroupId;
		} else if ($_SESSION['sess_eType'] == '2') {
			$iCompanyId = $_SESSION['sess_iCompanyId'];
			$iSGroupId = $_SESSION['sess_iSGroupId'];
			$qs = '';
		} else {
			$qs = '&'.$ddlist::companyValueFilterName.'=' . $iCompanyId . '&'.$ddlist::groupValueFilterName.'=' . $iSGroupId;
		}

		$redirect_file = "index.php?file=m-useradd&mode=" . $mode . "&iUserId=" . $iUserId . $qs;
		$GeneralObj->checkDuplicate('iUserId', 'User', Array('vUsername'), $redirect_file, "Email Already Exists ", $iUserId, 'OR');

		if ($mode == "Add") {
			$msg = '';
			try {
				$company = new Company($iCompanyId);

				if (!$company) {
					throw new Exception("Cannot get organization information!");
				}
				$result = $userObj->insert();
				if (!$result) {
					throw new Exception("Cannot add user!");
				}
				$result = $userObj->assignUserToGroup($iSGroupId);
				if (!$result) {
					throw new Exception("Cannot add user to group!");
				}
				$logo_url = $CFG->wwwroot . "/public/images/logo.png";
				$to = '' . $_REQUEST['vUsername'] . '';
				$subject = 'MLM Registration!';
				$message = "<html>
						<head><title></title></head>
						<body>
						<table>
						<tr><td align='left'><img src=\"" . $logo_url . "\" border=\"0\" height='90' width='300'></td></tr>
								<tr><td height='10'>&nbsp;</tr></td>
								<tr><td>Your registration is successful with Company " . $company->getvCompanyName() . "</td></tr>
										<tr><td height='10'>&nbsp;</tr></td>
										<tr><td>Please find your login credentials as following: <br/><br/>User Name: " . $_REQUEST['vUsername'] . " <br/>Password: " . $_REQUEST['vPassword'] . "</td></tr>
												<tr><td height='10'>&nbsp;</tr></td>
												<tr><td height='10'>Thanks,<br/> Mobile Learning Manager</tr></td>
												</table>
												</body>
												</html>";
				$headers = 'From: ' . $company->getvEmail() . "\r\n";
				$headers.='Content-type: text/html; charset=iso-8859-1';
				@ mail($to, $subject, $message, $headers);
			} catch (Exception $exc) {
				$msg = $exc->getTraceAsString();
			}


			// $userObj->setdCreated($dCreated);
			//  $userObj->setiSGroupId($iSGroupId);
			//$userObj->setvEmail($vUsername);
			//// for sending mail ///////



			$msg = MSG_ADD;
			$url = 'index.php?file=User&AX=Yes' . $qs . '&var_msg=' . $msg;
			header("Location:" . $url);
			exit;
		} else if ($mode == "Update") {
			$userObj->update($iUserId);
			$msg = MSG_UPDATE;
			$url = 'index.php?file=User&AX=Yes' . $qs . '&var_msg=' . $msg;
			header("Location:" . $url);
			exit;
		}
		?>
