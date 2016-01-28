<?php

/*
 *
* -------------------------------------------------------
* CLASSNAME:        User
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/SLI/hbpanel/lib/classes/phpClass/generatedclasses/User.Class.php5
* FOR MYSQL TABLE:  User
* FOR MYSQL DB:     lsiiphone
* -------------------------------------------------------
*
*/
include_once 'BasicDBClass.php';

class User extends BasicDBClass {

	protected $iUserId;   // KEY ATTR. WITH AUTOINCREMENT
	protected $vUsername;
	protected $vPassword;
	protected $iEmployeeId;
	protected $eAlerts;
	protected $eStatus;
	protected $eRights;
	protected $dLastLogin;
	protected $dLastAccess;
	protected $dRegDate;
	protected $vFromIP;
	static public $rightsList = array('User' => 1, 'Group Admin' => 2, 'Organization Admin' => 3, 'Supper Admin' => 4);

	function select($id) {
		$sql = "SELECT * FROM User WHERE iUserId = " . $id;
		$row = $this->_obj->select($sql);

		$this->iUserId = $row[0]['iUserId'];
		$this->vUsername = $row[0]['vUsername'];
		$this->vPassword = $row[0]['vPassword'];
		$this->iEmployeeId = $row[0]['iEmployeeId'];
		$this->eAlerts = $row[0]['eAlerts'];
		$this->eStatus = $row[0]['eStatus'];
		$this->eRights = $row[0]['eRights'];
		$this->dLastLogin = $row[0]['dLastLogin'];
		$this->dLastAccess = $row[0]['dLastAccess'];
		$this->dRegDate = $row[0]['dRegDate'];
		$this->vFromIP = $row[0]['vFromIP'];
	}

	function delete($id) {
		$sql = "DELETE FROM User WHERE iUserId = " . $id;
		$result = $this->_obj->sqlquery($sql);
		return $result;
	}

	function insert() {
		$this->iUserId = ""; // clear key for autoincrement

		$sql = "INSERT INTO User ( vUsername,vPassword,iEmployeeId,eAlerts,eRights,dLastLogin,dLastAccess,dRegDate,vFromIP,eStatus ) VALUES ( '"
				. $this->vUsername . "','"
						. $this->vPassword . "','"
								. $this->iEmployeeId . "','"
										. $this->eAlerts . "','"
												. $this->eRights . "','"
														. $this->dLastLogin . "','"
																. $this->dLastAccess . "',"
																		. "FROM_UNIXTIME(".time() . "),'"
																				. $this->vFromIP . "','"
																						. $this->eStatus . "' )";
		$result = $this->_obj->insert($sql);
		if (is_int($result)) {
			$this->iUserId = $result;
		}
		return $result;
	}

	function update($id) {

		$sql = " UPDATE User SET  vUsername = '" . $this->vUsername
		. "' , vPassword = '" . $this->vPassword
		. "' , iEmployeeId = '" . $this->iEmployeeId
		. "' , eAlerts = '" . $this->eAlerts
		. "' ,eRights = '" . $this->eRights
		. "' ,dLastLogin = '" . $this->dLastLogin
		. "' ,dLastAccess = '" . $this->dLastAccess
		. "' ,dRegDate = '" . $this->dRegDate
		. "' ,vFromIP = '" . $this->vFromIP
		. "' , eStatus = '" . $this->eStatus
		. "'  WHERE iUserId =" . $id;
		$result = $this->_obj->sql_query($sql);
		return $result;
	}

	function getNotificationUsers($iSGroupId) {
		throw new Exception("Function 'getNotificationUsers' is not completed");

		//   $resemails = array();
		//   $k = 0;
		$selectusers = "SELECT vEmail,vUsername  FROM  User WHERE eStatus='Active' AND eStatus1='Unblock' AND eAlerts='On'  AND iSGroupId=" . $iSGroupId . "  ";
		$dbdata = $this->_obj->select($selectusers);

		if (count($dbdata) > 0) {
			$selectadminemail = "SELECT vValue  FROM  setting WHERE vName='EMAILADMIN' ";
			$dbres = $this->_obj->select($selectadminemail);
			$dbdata['adminemail'] = $dbres[0]['vValue'];
		}

		return $dbdata;
	}

	function assignUserToGroup($iSGroupId) {
		$result = '';
		try {
			if (is_null($this->iUserId)) {
				throw new Exception("Can not assign user to a group as it user is null.");
			}
			$sql = "INSERT INTO SubGroupUserAssign ( iSGroupId,iUserId ) VALUES ( '"
					. $iSGroupId . "','"
							. $this->iUserId . "' )";
			$result = $this->_obj->insert($sql);
		} catch (Exception $exc) {
			$result = false;
		}
		return $result;
	}

	function tryToLogIn($userName, $userPassword) {
		$sql = "SELECT * FROM User WHERE vUsername = '" . trim(strtolower($userName)) . "' and vPassword='" . $userPassword . "'";
		$row = $this->_obj->select($sql);
		if ($row) {
			$this->iUserId = $row[0]['iUserId'];
			$this->vUsername = $row[0]['vUsername'];
			$this->vPassword = $row[0]['vPassword'];
			$this->iEmployeeId = $row[0]['iEmployeeId'];
			$this->eAlerts = $row[0]['eAlerts'];
			$this->eStatus = $row[0]['eStatus'];
			$this->eRights = $row[0]['eRights'];
			$this->dLastLogin = $row[0]['dLastLogin'];
			$this->dLastAccess = $row[0]['dLastAccess'];
			$this->dRegDate = $row[0]['dRegDate'];
			$this->vFromIP = $row[0]['vFromIP'];
			return true;
		} else {
			return false;
		};
	}

	function logInOut_WebEntry($eRights, $iId = '') {
		if (!$iId) {
			$iId = $this->iUserId;
		}
		if (isset($_SESSION["sess_iLogId"])) {
			$sql = "update log_history set dLogoutDate = FROM_UNIXTIME(" . time() . ") where iLogId='" . $_SESSION["sess_iLogId"] . "'";
			$db_log_id = $this->_obj->sql_query($sql);
		} else {
			$arrayList = self::$rightsList;
			$sql = "insert into log_history (iUserId,vIP,dLoginDate,eUserType ) values ('" . $iId . "','" . $_SERVER['REMOTE_ADDR'] . "',FROM_UNIXTIME(" . time() . "),'" . array_search($eRights, $arrayList) . "')";
			$sql1 = "update User set dLastLogin = FROM_UNIXTIME(" . time() . ") where iUserId='" . $iId . "'";
			$this->_obj->sql_query($sql1);
			$db_log_id = $this->_obj->insert($sql);
			$_SESSION["sess_iLogId"] = $db_log_id;
		};
	}

	function getGroupsOfUser($iUserId = null) {
		if (!$iUserId) {
			$iUserId = $this->iUserId;
		}
		$sql = "select iSGroupId from SubGroupUserAssign where iUserId=$iUserId";
		return $this->_obj->sql_query($sql);
	}

	function getCompanyOfuser($iUserId = null) {
		if (!$iUserId) {
			$iUserId = $this->iUserId;
		}
		$groups = $this->getGroupsOfUser($iUserId);
		if ($groups) {
			$sql = "select iCompanyId from SubGroup where iSGroupId=" . $groups[0]['iSGroupId'];
			$result= $this->_obj->sql_query($sql);
			$return=$result[0]['iCompanyId'];
			return $return;
		} else {
			return false;
		}
	}

	function getGroupCodeIDsOfUser($iUserId = null) {
		if (!$iUserId) {
			$iUserId = $this->iUserId;
		}
		$sql = "select  distinct  SubGroup.iSGroupId,SubGroup.vGroupCodeId from SubGroup " .
				"inner join SubGroupUserAssign on SubGroupUserAssign.iSGroupId= SubGroup.iSGroupId " .
				"where SubGroupUserAssign.iUserId=$iUserId ";
		return $this->_obj->sql_query($sql);
	}

	function getGroupsListForUser($eRights, $iUserId, $iCompanyId = null,$defalult=false) {
		$sql = 'select  distinct  SubGroup.iSGroupId as Id ,SubGroup.vGroupName as Name from SubGroup ' .
				"inner  join Company on Company.iCompanyId=SubGroup.iCompanyId ";
		if ($eRights < 3) {
			$sql.="inner join SubGroupUserAssign on SubGroupUserAssign.iSGroupId= SubGroup.iSGroupId ";
		}
		$sql.=" where SubGroup.eStatus=1 ";
		if ($eRights < 3) {
			$sql.=" and SubGroupUserAssign.iUserId=$iUserId ";
		}
		if (!$defalult) {
			$sql.=" and SubGroup.iIsDefault=0 ";
		}

		if (!is_null($iCompanyId) && $iCompanyId!=0) {
			$sql.=" and Company.iCompanyId=$iCompanyId";
		}
		$sql.=' order by SubGroup.vGroupName';
		return $this->_obj->sql_query($sql);
	}

	function getCompaniesListForUser($eRights, $iUserId = null) {
		if ($eRights == 4) {
			$sql = 'select distinct Company.iCompanyId as Id,Company.vCompanyName as Name from Company where eStatus=1  order by Company.vCompanyName';
		} else {
			$sql = 'select distinct Company.iCompanyId as Id,Company.vCompanyName as Name from SubGroup ' .
					"inner join SubGroupUserAssign on SubGroupUserAssign.iSGroupId= SubGroup.iSGroupId " .
					"inner  join Company on Company.iCompanyId=SubGroup.iCompanyId " .
					" where SubGroupUserAssign.iUserId=$iUserId and Company.eStatus=1 order by Company.vCompanyName";
		}
		return $this->_obj->sql_query($sql);
	}



}

?>
