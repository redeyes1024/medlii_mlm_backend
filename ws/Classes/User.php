<?php

class User {

	//protected $dbfobj;



	function __construct() {

	}

	function index() {
		return Array("index\n\n\n");
	}

	function Login() {                         //screen#2
		global $obj, $GeneralObj;
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];

		if (!empty($email) && !empty($password)) {
			$sql = "SELECT u.iUserId as user_id,u.eStatus,u.eStatus1,u.iUserId  as group_id ,u.vEmail,u.vPassword,sg.iCompanyId as company_id,sg.vGroupName as group_name,sg.vEmail as group_mail,c.vAddress as address,c.vCompanyName as company_name,c.vGoogleAPI as vGoogleAPI,c.vGoogleAPIvalue as vGoogleAPIvalue
					from User u JOIN SubGroup sg ON sg.iSGroupId = u.iSGroupId JOIN Company c ON c.iCompanyId = sg.iCompanyId
					where u.vUsername ='" . $email . "' AND u.vPassword ='" . $password . "' AND sg.eStatus='1' ";
			//echo $sql;exit;
			$data = $obj->select($sql);

			if (is_array($data) && count($data) > 0 && $data[0]['vPassword'] == $password && $data[0]['vEmail'] == $email) {
				if ($data[0]['eStatus'] == 'Active' && $data[0]['eStatus1'] == 'Unblock') {
					$db_data = $data;
					$db_data[0]['message'] = 'You are successfully logged in';
					$db_data[0]['success'] = '1';
					// $db_data = $GeneralObj->filterDataArr($db_data);
				} else {
					$db_data[0]['message'] = 'Your account is temporarily Inactive/Unblock. Please contact Administrator to activate it.';
					$db_data[0]['success'] = '0';
				}
			} else {
				$db_data[0]['message'] = 'Wrong E-mail OR Password.';
				$db_data[0]['success'] = '0';
			}
		} else {
			$db_data[0]['success'] = "0";
			$db_data[0]['message'] = "Invalid Parameter.";
		}
		return $db_data;
	}

	function ForgotPassword() {             //screen#2A
		global $obj, $GeneralObj;

		$email_id = $_REQUEST['email'];

		if ($email_id == '') {

			$new_arr[0]['success'] = '0';
			$new_arr[0]['message'] = "Invalid Parameter";
		} else {
			$sql = "select vEmail,vPassword,vUsername,iUserId as user_id from User where vUsername ='" . $email_id . "' AND eStatus='1'";
			$db_data = $obj->select($sql);
			$new_arr = array();

			if (count($db_data) > 0 && $db_data[0]['vEmail'] == $email_id) {


				$to = '' . $email_id . '';
				$subject = 'MLM Password!';
				$message = "<html>
						<head><title></title></head>
						<body>
						<table>
						<tr><td align='left'><img src=\"" . $CFG->dirroot . "/public/images/logo.png" . "\" border=\"0\" height='90' width='300'></td></tr>
								<tr><td height='10'>&nbsp;</tr></td>
								<tr><td>Looks like you've forgotten your password!</td></tr>
								<tr><td height='10'>&nbsp;</tr></td>
								<tr><td>Here are your requested details: <br/><br/>User Name: " . $db_data[0]['vUsername'] . " <br/>Password: " . $db_data[0]['vPassword'] . "</td></tr>
										<tr><td height='10'>&nbsp;</tr></td>
										<tr><td height='10'>Thanks,<br/> Mobile Learning Manager</tr></td>
										</table>

										</body>
										</html>";
				$headers = 'From: info@hb.com' . "\r\n";
				$headers.='Content-type: text/html; charset=iso-8859-1';
				@ mail($to, $subject, $message, $headers);

				$new_arr[0]['user_id'] = $db_data[0]['user_id'];
				$new_arr[0]['success'] = '1';
				$new_arr[0]['message'] = 'Your Password has been successfully sent to your email address.';
				$new_arr = $GeneralObj->filterDataArr($new_arr);
			} else {
				$new_arr[0]['success'] = '0';
				$new_arr[0]['message'] = "This Email address is not available.please enter another email address.";
			}
		}

		return $new_arr;
	}

	function Registration() {                    //screen#2B
		global $obj, $GeneralObj;
		$username = $_REQUEST['username'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$employee_id = $_REQUEST['employee_id'];
		$confirm_password = $_REQUEST['confirm_password'];
		$group_id = strtoupper($_REQUEST['group_id']);

		if (!empty($password)) {
			// For GroupId
			$sqlGroup = "select iSGroupId from SubGroup where vGroupCodeId = '" . $group_id . "' AND eStatus ='1'";
			$dbGroup = $obj->select($sqlGroup);

			// For GroupId
			if (count($dbGroup) > 0) {
				$sqlcheck = "select vEmail,vUsername from User where  ( vEmail ='" . $email . "'  OR  vUsername ='" . $username . "' )  ";
				//	echo $sqlcheck;exit;
				$db_check = $obj->select($sqlcheck);
				//print_r($db_check);exit;
				if (is_array($db_check) && count($db_check) > 0) {
					$db_result[0]['message'] = 'Email Already In Use';
					$db_result[0]['success'] = '0';
				} else {

					if (!empty($password) && !empty($confirm_password)) {
						if ($password == $confirm_password) {

							$sql_insert = "INSERT INTO `User` (
									`vUsername` ,
									`vPassword` ,
									`iEmployeeId`,
									`eAlerts`,
									`eStatus`,
									`eRights`
									)
									VALUES (
									'" . $username . "', '" . $password . "','"  . $employee_id . "', '1','1','1'
											)";
							// echo $sql_insert;exit;
							$user_id = $obj->insert($sql_insert);

							if (!empty($user_id)) {

								$sql_insert = "INSERT INTO `SubGroupUserAssign` (
										`iUserId` ,
										`iSGroupId`
										)
										VALUES (
										'" . $user_id . "', '" . $dbGroup[0]['iSGroupId']  . "')";

								// echo $sql_insert;exit;
								$user_re = $obj->insert($sql_insert);


								$to = '' . $_REQUEST['email'] . '';
								$subject = 'MLM Registration!';
								$message = "<html>
										<head><title></title></head>
										<body>
										<table>
										<tr><td align='left'><img src=\"" . $CFG->dirroot . "/public/images/logo.png" . "\" border=\"0\" height='90' width='300'></td></tr>
												<tr><td height='10'>&nbsp;</tr></td>
												<tr><td>Your registration is successfully</td></tr>
												<tr><td height='10'>&nbsp;</tr></td>
												<tr><td>Please find your login credentials as following: <br/><br/>Email: " . $_REQUEST['email'] . " <br/>Password: " . $_REQUEST['password'] . "</td></tr>
														<tr><td height='10'>&nbsp;</tr></td>
														<tr><td height='10'>Thanks,<br/> Mobile Learning Manager</tr></td>
														</table>
														</body>
														</html>";
								$headers = 'From: info@hb.com' . "\r\n";
								$headers.='Content-type: text/html; charset=iso-8859-1';
								@ mail($to, $subject, $message, $headers);


								$db_result[0]['user_id'] = $user_id;
								$db_result[0]['username'] = $username;
								$db_result[0]['message'] = 'Registered Successfully.';
								$db_result[0]['success'] = '1';
							} else {
								$db_result[0]['message'] = 'Registration Failed.';
								$db_result[0]['success'] = '0';
							}
						} else {
							$db_result[0]['message'] = 'Registration Failed, Password and Confirm Password must be same.';
							$db_result[0]['success'] = '0';
						}
					} else {
						$db_result[0]['message'] = 'Registration Failed, Password or Confirm Password should not be blank.';
						$db_result[0]['success'] = '0';
					}
				}
			} else {
				$db_result[0]['message'] = 'Group ID does not exist.';
				$db_result[0]['success'] = '0';
			}
		} else {
			$db_result[0]['message'] = 'Registration Failed, password should not be blank.';
			$db_result[0]['success'] = '0';
		}

		return $db_result;
	}

	function changepassword() {              //screen#20
		global $obj;
		$userid = $_REQUEST['user_id'];
		if (!empty($userid)) {
			$old_password = $_REQUEST['old_password'];
			$new_password = $_REQUEST['new_password'];
			$confirm_password = $_REQUEST['confirm_password'];
			$alerts_email = $_REQUEST['alerts_email'];

			/*      if(!empty($alerts_email))
			 {
			$sql="update User set eAlerts='$alerts_email' where iUserId ='$userid'";
			//echo $sql;exit;
			$result=$obj->sql_query($sql);
			$db_result[0]['message'] = 'Alert is updated successfully.';
			$db_result[0]['success'] = '0';
			return $db_result;exit;
			} */

			if (!empty($old_password)) {
				$sql = "select vPassword  from User where iUserId='" . $userid . "'";
				//echo $sql;exit;
				$db_result1 = $obj->select($sql);

				if ($old_password == $db_result1[0]['vPassword']) {

					if (!empty($new_password) && !empty($confirm_password)) {

						if ($new_password == $confirm_password) {
							$sql = "update User set vPassword ='" . $new_password . "',eAlerts='" . $alerts_email . "' where iUserId ='" . $userid . "'";
							$result = $obj->sql_query($sql);

							if ($result) {
								$db_result[0]['userid'] = $userid;
								$db_result[0]['message'] = 'Password Updated Successfully.';
								$db_result[0]['success'] = '1';
							} else {
								$db_result[0]['message'] = 'error.';
								$db_result[0]['success'] = '0';
							}
						} else {
							$db_result[0]['message'] = 'New Password and Confirm Password must be same. ';
							$db_result[0]['success'] = '0';
						}
					} else {
						$db_result[0]['message'] = 'New Password/Confirm Password should not be Blank.';
						$db_result[0]['success'] = '0';
					}
				} else {
					$db_result[0]['message'] = 'Incorrect old Password.';
					$db_result[0]['success'] = '0';
				}
			} else {

				if (!empty($alerts_email)) {
					$sql = "update User set eAlerts='$alerts_email' where iUserId ='" . $userid . "'";
					//echo $sql;exit;
					$result = $obj->sql_query($sql);
					$db_result[0]['message'] = 'Settings has been saved successfully!';
					$db_result[0]['success'] = '0';
					return $db_result;
					exit;
				}

				$db_result[0]['message'] = 'Old Password should not be Blank.';
				$db_result[0]['success'] = '0';
			}
		} else {
			$db_result[0]['message'] = 'Invalid parameter.';
			$db_result[0]['success'] = '0';
		}
		return $db_result;
	}

	function SettingView() {
		global $obj, $GeneralObj;
		$user_id = $_REQUEST['user_id'];


		if (!empty($user_id)) {
			$sql = "SELECT  eAlerts as alerts_email
					FROM User
					WHERE iUserId='" . $user_id . "' ";
			//  echo $sql; exit;
			$db_data = $obj->select($sql);

			if (is_array($db_data) && count($db_data) > 0) {


				$db_data[0]['message'] = 'Record is Found.';
				$db_data[0]['success'] = '1';
				$db_data = $GeneralObj->filterDataArr($db_data);
			} else {
				$db_data[0]['message'] = 'No Record Found.';
				$db_data[0]['success'] = '0';
			}
		} else {
			$db_data[0]['message'] = 'Invaild Parameter.';
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

}

?>
