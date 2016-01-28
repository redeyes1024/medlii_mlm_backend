<?
/*
 * @package  MySQLdumper
* @version  1.0
* @author   Dennis Mozes <opensource@mosix.nl>
* @url		http://www.mosix.nl/mysqldumper
* @since    PHP 4.0
* @copyright Dennis Mozes
* @license GNU/LGPL License: http://www.gnu.org/copyleft/lgpl.html
**/
class Mysqldumper {
	var $_host;
	var $_dbuser;
	var $_dbpassword;
	var $_dbname;
	var $_dbtables;
	var $_isDroptables;

	function Mysqldumper($host = "localhost", $dbuser = "", $dbpassword = "", $dbname = "") {
		$this->setHost($host);
		$this->setDBuser($dbuser);
		$this->setDBpassword($dbpassword);
		$this->setDBname($dbname);
		// Don't drop tables by default.
		$this->setDroptables(false);
	}

	function setHost($host) {
		$this->_host = $host;
	}

	function getHost() {
		return $this->_host;
	}

	function setDBname($dbname) {
		$this->_dbname = $dbname;
	}

	function getDBname() {
		return $this->_dbname;
	}

	function getDBuser() {
		return $this->_dbuser;
	}

	function setDBpassword($dbpassword) {
		$this->_dbpassword = $dbpassword;
	}

	function getDBpassword() {
		return $this->_dbpassword;
	}

	function setDBuser($dbuser) {
		$this->_dbuser = $dbuser;
	}

	function setDBtables($dbtables) {
		$this->_dbtables = $dbtables;
	}

	// If set to true, it will generate 'DROP TABLE IF EXISTS'-statements for each table.
	function setDroptables($state) {
		$this->_isDroptables = $state;
	}

	function isDroptables() {
		return $this->_isDroptables;
	}

	function createDump($callBack) {
		global $site_name,$full_appname,$site_backup_path;
		ob_clean();
		// Set line feed
		$lf = "\n";

		$resource = mysql_connect($this->getHost(), $this->getDBuser(), $this->getDBpassword());
		mysql_select_db($this->getDbname(), $resource);
		$result = mysql_query("SHOW TABLES",$resource);
		$tables = $this->result2Array(0, $result);
		foreach ($tables as $tblval) {
			$result = mysql_query("SHOW CREATE TABLE `$tblval`");
			$createtable[$tblval] = $this->result2Array(1, $result);
		}
		// Set header
		$output = "#". $lf;
		$output .= "# ".addslashes($site_name)." Database Dump" . $lf;
		$output .= "# ".$full_appname.$lf;
		$output .= "# ". $lf;
		$output .= "# Host: " . $this->getHost() . $lf;
		$output .= "# Generation Time: " . date("M j, Y at H:i") . $lf;
		$output .= "# Server version: ". mysql_get_server_info() . $lf;
		$output .= "# PHP Version: " . phpversion() . $lf;
		$output .= "# Database : `" . $this->getDBname() . "`" . $lf;
		$output .= "#";

		// Generate dumptext for the tables.
		if (isset($this->_dbtables) && count($this->_dbtables)) {
			$this->_dbtables = implode(",",$this->_dbtables);
		}
		else {
			unset($this->_dbtables);
		}
		foreach ($tables as $tblval) {
			// check for selected table
			if(isset($this->_dbtables)) {
				if (strstr(",".$this->_dbtables.",",",$tblval,")===false) {
					continue;
				}
			}
			$output .= $lf . $lf . "# --------------------------------------------------------" . $lf . $lf;
			$output .= "#". $lf . "# Table structure for table `$tblval`" . $lf;
			$output .= "#" . $lf . $lf;
			// Generate DROP TABLE statement when client wants it to.
			if($this->isDroptables()) {
				$output .= "DROP TABLE IF EXISTS `$tblval`;" . $lf;
			}
			$output .= $createtable[$tblval][0].";" . $lf;
			$output .= $lf;
			$output .= "#". $lf . "# Dumping data for table `$tblval`". $lf . "#" . $lf;
			$result = mysql_query("SELECT * FROM `$tblval`");
			$rows = $this->loadObjectList("", $result);
			foreach($rows as $row) {
				$insertdump = $lf;
				$insertdump .= "INSERT INTO `$tblval` VALUES (";
				$arr = $this->object2Array($row);
				foreach($arr as $key => $value) {
					$value = addslashes($value);
					$value = str_replace("\n", '\\r\\n', $value);
					$value = str_replace("\r", '', $value);
					$insertdump .= "'$value',";
				}
				$output .= rtrim($insertdump,',') . ");";
			}
			// invoke callback
			if($_POST[btnDownload] =="btnDownload"){
				if ($callBack) {
					if (!$callBack($output)) break;
					$output = "";
				}
			}
			if($_POST[btnDownload] == "")
			{
				$today = date("d-M-y H-i-s");
				$today = strtolower($today);
				if(!$handle = fopen($site_backup_path.$today.'_database_backup.sql', "w"))
					echo "Can't open file!!";
				if(!fwrite($handle, $output))
					echo "Can't write to  file!!";
				if ($callBack) {
					if (!$callBack($output)) break;
					$output = "";
				}
			}
		}

		if($_POST[btnDownload] == "btnBackup")
		{
			$today = date("d-M-y H-i-s");
			$today = strtolower($today);

			if(!$handle = fopen($site_backup_path.$today.'_database_backup.sql', "w"))
				echo "Can't open file!!";
			if(!fwrite($handle, $output))
				echo "Can't write to  file!!";
		}
		mysql_close($resource);
		return ($callBack) ? true: $output;
	}
	function createDumpDealer($callBack,$where='') {
		Global $site_name,$full_appname,$site_backup_path;
		if(!is_dir($site_backup_path))
			mkdir($site_backup_path, 0777);
		ob_clean();
		// Set line feed
		$lf = "\n";

		$resource = mysql_connect($this->getHost(), $this->getDBuser(), $this->getDBpassword());
		mysql_select_db($this->getDbname(), $resource);
		$result = mysql_query("SHOW TABLES",$resource);
		$tables = $this->result2Array(0, $result);
		foreach ($tables as $tblval) {
			$result = mysql_query("SHOW CREATE TABLE `$tblval`");
			$createtable[$tblval] = $this->result2Array(1, $result);
		}
		// Set header
		$output = "#". $lf;
		$output .= "# ".addslashes($site_name)." Database Dump" . $lf;
		$output .= "# ".$full_appname.$lf;
		$output .= "# ". $lf;
		$output .= "# Host: " . $this->getHost() . $lf;
		$output .= "# Generation Time: " . date("M j, Y at H:i") . $lf;
		$output .= "# Server version: ". mysql_get_server_info() . $lf;
		$output .= "# PHP Version: " . phpversion() . $lf;
		$output .= "# Database : `" . $this->getDBname() . "`" . $lf;
		$output .= "#";

		// Generate dumptext for the tables.
		if (isset($this->_dbtables) && count($this->_dbtables)) {
			$this->_dbtables = implode(",",$this->_dbtables);
		}
		else {
			unset($this->_dbtables);
		}
		foreach ($tables as $tblval)
		{
			// check for selected table
			if(isset($this->_dbtables)) {
				if (strstr(",".$this->_dbtables.",",",$tblval,")===false) {
					continue;
				}
			}
			$output .= $lf . $lf . "# --------------------------------------------------------" . $lf . $lf;
			$output .= "#". $lf . "# Table structure for table `$tblval`" . $lf;
			$output .= "#" . $lf . $lf;
			// Generate DROP TABLE statement when client wants it to.
			if($this->isDroptables()) {
				$output .= "DROP TABLE IF EXISTS `$tblval`;" . $lf;
			}
			$output .= $createtable[$tblval][0].";" . $lf;
			$output .= $lf;
			$output .= "#". $lf . "# Dumping data for table `$tblval`". $lf . "#" . $lf;
			$result = mysql_query("SELECT * FROM `$tblval` $where ");
			$rows = $this->loadObjectList("", $result);
			foreach($rows as $row)
			{
				$insertdump = $lf;
				$insertdump .= "INSERT INTO `$tblval` VALUES (";
				$arr = $this->object2Array($row);
				foreach($arr as $key => $value) {
					$value = addslashes($value);
					$value = str_replace("\n", '\\r\\n', $value);
					$value = str_replace("\r", '', $value);
					$insertdump .= "'$value',";
				}
				$output .= rtrim($insertdump,',') . ");";
			}
			// invoke callback
				
		}
		if($_POST[btnDownload] =="btnDownload")
		{
			if ($callBack)
			{
				if (!$callBack($output)) break;
				$output = "";
			}
		}
		if($_POST[btnDownload] == "")
		{
			$today = date("d-M-y H-i-s");
			$today = strtolower($today);
			if(!$handle = fopen($site_backup_path.$today.'_database_backup.sql', "w"))
				echo "Can't open file!!";
			if(!fwrite($handle, $output))
				echo "Can't write to  file!!";
			if ($callBack) {
				if (!$callBack($output)) break;
				$output = "";
			}
		}
		if($_POST[btnDownload] == "btnBackup")
		{
			$today = date("d-M-y H-i-s");
			$today = strtolower($today);
			if(!$handle = fopen($site_backup_path.$iSiteId."/".$today.'_database_backup.sql', "w"))
				echo "Can't open file!!";
			if(!fwrite($handle, $output))
				echo "Can't write to  file!!";
		}
		mysql_close($resource);
		return ($callBack) ? true: $output;
	}
	function source_backup($backup_file_folder_name="")
	{
		global $site_path,$site_backup_source_path, $site_path;
		$backup_file_folder_path=$site_path.$backup_file_folder_name;
		$day = date("Y-m-d_H-m-s");
		$backupfile = $site_backup_source_path.$backup_file_folder_name.'_'.$day.'.tar.gz';
		$excludedir = array();
		$excludedir[] = $site_path."backup/";
		$excludedir[] = $site_path."templates_c/";
		$excludedir[] = $site_path."doc/";
		$excludedir[] = $site_path."sql/";
		for($x=0;$x<count($excludedir);$x++)
			$excludeString .= " --exclude=".$excludedir[$x];

		//echo 'tar -czf '.$backupfile.' '.$backup_file_folder_path.$excludeString;
		//exit;
		exec('tar -czf '.$backupfile.' '.$backup_file_folder_path." --exclude=".$site_backup_source_path);
		return $backupfile;
	}

	// Private function object2Array.
	function object2Array($obj) {
		$array = null;
		if(is_object($obj)) {
			$array = array();
			foreach (get_object_vars($obj) as $key => $value) {
				if(is_object($value))
					$array[$key] = $this->object2Array($value);
				else
					$array[$key] = $value;
			}
		}
		return $array;
	}

	// Private function loadObjectList.
	function loadObjectList($key='', $resource) {
		$array = array();
		while ($row = mysql_fetch_object($resource)) {
			if ($key)
				$array[$row->$key] = $row;
			else
				$array[] = $row;
		}
		mysql_free_result($resource);
		return $array;
	}

	// Private function result2Array.
	function result2Array($numinarray = 0, $resource) {
		$array = array();
		while ($row = mysql_fetch_row($resource)) {
			$array[] = $row[$numinarray];
		}
		mysql_free_result($resource);
		return $array;
	}
}
function callBack(&$dumpstring){
	$today = date("d-M-y H-i-s");
	$today = strtolower($today);
	if(!headers_sent()) {
		header('Content-type: application/download');
		header('Content-Disposition: attachment; filename='.$today.'_database_backup.sql');
	}
	echo $dumpstring;
	return true;
}
?>


