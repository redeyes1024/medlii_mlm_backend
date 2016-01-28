<?

class myclass {

	var $DBASE = "";
	var $CONN = "";

	// ////////////////////////////////////////////////////
	//	***************************************************
	//	PHP and MySQL Connection and Error Specific methods
	//	***************************************************

	function myclass($server = "", $dbase = "", $user = "", $pass = "") {
		$this->DBASE = $dbase;
		$conn = mysql_connect($server, $user, $pass);
		if (!$conn) {
			$this->error("Connection attempt failed");
		}
		if (!mysql_select_db($dbase, $conn)) {
			$this->error("Dbase Select failed");
		}
		$this->CONN = $conn;
		return true;
	}

	function close() {
		$conn = $this->CONN;
		$close = mysql_close($conn);
		if (!$close) {
			$this->error("Connection close failed");
		}
		return true;
	}

	function error($text) {
		$no = mysql_errno();
		$msg = mysql_error();
		exit;
	}

	function select($sql = "") {
		if (empty($sql)) {
			return false;
		}
		if (!eregi("^select", $sql)) {
			echo "wrongquery<br>" . $sql . "<p>";
			echo "<H2>Wrong function silly!</H2>\n";
			return false;
		}
		if (empty($this->CONN)) {
			return false;
		}
		$conn = $this->CONN;
		$results = @mysql_query($sql, $conn);
		if ((!$results) or (empty($results))) {
			return false;
		}
		$count = 0;
		$data = array();
		while ($row = mysql_fetch_array($results)) {
			$data[$count] = $row;
			$count++;
		}
		mysql_free_result($results);
		return $data;
	}

	function affected($sql = "") {
		if (empty($sql)) {
			return false;
		}
		if (!eregi("^select", $sql)) {
			echo "wrongquery<br>" . $sql . "<p>";
			echo "<H2>Wrong function silly!</H2>\n";
			return false;
		}
		if (empty($this->CONN)) {
			return false;
		}
		$conn = $this->CONN;
		$results = @mysql_query($sql, $conn);
		if ((!$results) or (empty($results))) {
			return false;
		}
		$tot = 0;
		$tot = mysql_affected_rows();
		return $tot;
	}

	function insert($sql = "") {
		if (empty($sql)) {
			return false;
		}
		if (!eregi("^insert", $sql)) {
			return false;
		}
		if (empty($this->CONN)) {
			return false;
		}
		$conn = $this->CONN;
		$results = mysql_query($sql, $conn);
		if (!$results) {
			$this->error("<H2>No results!</H2>\n");
			return false;
		}
		$id = mysql_insert_id();
		return $id;
	}

	function edit($sql = "") {
		if (empty($sql)) {
			return false;
		}
		if (!eregi("^update", $sql)) {
			return false;
		}
		if (empty($this->CONN)) {
			return false;
		}
		$conn = $this->CONN;
		$results = mysql_query($sql, $conn);
		if (!$results) {
			$this->error("<H2>No results!</H2>\n");
			return false;
		}
		$rows = 0;
		$rows = mysql_affected_rows();
		return $rows;
	}

	function sql_query($sql = "") {
		if (empty($sql)) {
			return false;
		}
		if (empty($this->CONN)) {
			return false;
		}
		$conn = $this->CONN;
		$results = mysql_query($sql, $conn) or die("query fail");
		if (!$results) {
			$message = "Query went bad!";
			$this->error($message);
			return false;
		}
		if (!eregi("^select", $sql)) {
			return true;
		} else {
			$count = 0;
			$data = array();
			while ($row = mysql_fetch_array($results)) {
				$data[$count] = $row;
				$count++;
			}
			mysql_free_result($results);
			return $data;
		}
	}

	function getfields($table) {
		$fields = mysql_list_fields($this->DBASE, $table, $this->CONN);
		$columns = mysql_num_fields($fields);

		for ($i = 0; $i < $columns; $i++) {
			$arr[] = mysql_field_name($fields, $i);
		}
		return $arr;
	}

	//ends the class over here
	#-------------------------------------------------------------------------------------
	# Insert/Update Query Perform
	# Usage:
	# $sql_data_array = array('vFirstName' => "Mike",
	#                         'vLastName' => "Ketich");
	# $id = $obj->DB_query_perform("admin", $sql_data_array);
	# echo $id;
	# $obj->DB_query_perform("admin", $sql_data_array,"update", "iAdminId=1");
	#-------------------------------------------------------------------------------------
	function DB_query_perform($table, $data, $action = 'insert', $parameters = '') {
		$conn = $this->CONN;
		reset($data);

		if ($action == 'insert') {
			$query = 'insert into ' . $table . ' (';
			while (list($columns, ) = each($data)) {
				$query .= $columns . ', ';
			}
			$query = substr($query, 0, -2) . ') values (';
			reset($data);
			while (list(, $value) = each($data)) {
				switch ((string) $value) {
					case 'null':
						$query .= 'null, ';
						break;
					default:
						$query .= '\'' . ($value) . '\', ';
						break;
				}
			}
			$query = substr($query, 0, -2) . ')'; //Insert Query ready
			$results = @mysql_query($query, $conn) or die("Query failed: " . mysql_error());
			$last_Id = mysql_insert_id();
			if ($last_Id > 0)
				return $last_Id;
			else {
				$this->error("Query went bad!");
				return false;
			}
		} elseif ($action == 'update') {
			$query = 'update ' . $table . ' set ';
			while (list($columns, $value) = each($data)) {
				switch ((string) $value) {
					case 'null':
						$query .= $columns .= ' = null, ';
						break;
					default:
						$query .= $columns . ' = \'' . ($value) . '\', ';
						break;
				}
			}
			$where = " where 1=1 ";
			$where .= $parameters;
			$query = substr($query, 0, -2) . $where; //Update Query ready
			$results = @mysql_query($query, $conn) or die("Query failed: " . mysql_error());
			if (!$results) {
				$this->error("Query went bad!");
				return false;
			}
		}
		return $results;
	}

	#-------------------------------------------------------------------------------------<br>
	#-------------------------------------------------------------------------------------
	# OPTIMIZE TABLE
	# Usage:
	# $obj->DB_table_optimize();
	#-------------------------------------------------------------------------------------

	function DB_table_optimize() {
		$conn = $this->CONN;
		$alltables = mysql_query("SHOW TABLES", $conn) or die("Error: " . mysql_error());

		while ($table = mysql_fetch_assoc($alltables)) {
			foreach ($table as $db => $tablename) {
				$query = "OPTIMIZE TABLE " . $tablename . ";";
				mysql_query($query, $conn) or die("Query failed: " . mysql_error());
				echo "TABLE " . $tablename . " OPTIMIZEED SUCCESSFULLY......<BR>";
			}
		}
	}

	function DB_query_change_status($table, $ids, $keyId, $field = 'eStatus', $updateValue = 'Active') {
		$conn = $this->CONN;
		if ($updateValue == 'Delete')
			$sql = "delete from " . $table . " where " . $keyId . " in (" . $ids . ")";
		else
			$sql = "update " . $table . " set " . $field . " = '" . $updateValue . "' where " . $keyId . " in (" . $ids . ")";
		$results = @mysql_query($sql, $conn) or die("Query failed: " . mysql_error());
		if (!$results) {
			$this->error("Query went bad!");
			return false;
		}
		return true;
	}

	// Call Below function to get the Results for a Query. It will return Two Dimesional Array.
	function select_assoc_array($sql = "", $key = '', $fetch = MYSQL_ASSOC) {
		$this->_COUNT++;
		if (empty($sql)) {
			return false;
		}
		if (!eregi("^select", $sql) && !eregi("^call", $sql)) {
			echo "wrongquery<br>$sql<p>";
			echo "<H2>Wrong function silly!</H2>\n";
			return false;
		}
		if (empty($this->CONN)) {
			return false;
		}
		$conn = $this->CONN;
		$results = mysql_query($sql, $conn);
		if ((!$results) or (empty($results))) {
			return false;
		}
		$count = 0;
		$data = array();
		while ($row = mysql_fetch_array($results, $fetch)) {
			$data[$row[$key]][] = $row;
			$count++;
		}
		mysql_free_result($results);
		return $data;
	}

	function ChangeStatus($table, $ids, $keyId, $field = 'eStatus', $updateValue = 'Active') {
		$this->_COUNT++;
		$conn = $this->CONN;
		if ($updateValue == 'Delete')
			$sql = "delete from " . $table . " where " . $keyId . " in (" . $ids . ")";
		else
			$sql = "update " . $table . " set " . $field . " = '" . $updateValue . "' where " . $keyId . " in (" . $ids . ")";
		$results = mysqli_query($conn, $sql) or die("query fail");
		mysqli_next_result($conn);
		if (!$results) {
			$this->error("Query went bad!");
			return false;
		}
		return true;
	}

	function mysql_enum_values($table, $field) {
		$conn = $this->CONN;
		$sql = "SHOW COLUMNS FROM " . $table . " LIKE '" . $field . "'";
		$sql_res = mysql_query($sql, $conn); //or die("Could not query:\n$sql");
		$row = mysql_fetch_assoc($sql_res);
		mysql_free_result($sql_res);
		return explode("','", preg_replace("/.*\('(.*)'\)/", "\\1", $row["Type"]));
	}

	function selectfetch($sql = "", $fetch = "mysql_fetch_assoc", $assoc_fields = '') {
		$fetch = "mysql_fetch_assoc";
		$this->_COUNT++;
		if (empty($sql)) {
			return false;
		}
		if (empty($this->CONN)) {
			return false;
		}
		$conn = $this->CONN;
		$results = mysql_query($sql, $conn);
		//mysql_next_result($conn);
		if ((!$results) or (empty($results))) {
			return false;
		}
		$count = 0;
		$data = array();
		if ($fetch == "mysql_fetch_assoc") {
			if ($assoc_fields == '') {
				while ($row = $fetch($results)) {
					$data[$count] = $row;
					$count++;
				}
			} else {
				while ($row = $fetch($results)) {
					$data[$row[$assoc_fields]][] = $row;
				}
			}
		} else {
			while ($row = $fetch($results)) {
				$data[$count] = $row;
				$count++;
			}
		}
		@mysql_free_result($results);
		return $data;
	}

}

#-------------------------------------------------------------------------------------
?>
