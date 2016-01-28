<?php

class dbfun {

	protected $_obj;

	function __construct() {
		global $obj;
		$this->_obj = $obj;
	}

	function getRecords($table, $fields = "*", $jtbl = "", $where = "", $groupby = "", $orderby = "", $limit = array(), $pg = "") {
		$cnt = "";
		$cnt_count = "";
		if ($where != "") {
			$cnt = " Where 1 " . $where . " ";
			$cnt_count = " Where 1 " . $where . " ";
		}
		if ($groupby != "") {
			$cnt .= " Group By " . $groupby . " ";
			$cnt_count .= " Group By " . $groupby . " ";
		}
		if ($orderby != "") {
			$cnt .= " Order By " . $orderby . " ";
		}
		$start = 0;
		$end = 0;
		$total = 0;
		$limit_rec = "";
		$row = array();
		if (isset($limit[0]) && $limit[0] == 'yes' && $pg != 'yes') {
			$start = (isset($limit[2]) && (int) $limit[2] >= 0) ? (int) $limit[2] : 0;
			$limit_rec = " LIMIT $start, $limit[1] ";
		} else if (isset($limit[0]) && $limit[0] == 'yes' && $pg == 'yes') {
			$sql_count = "SELECT Count(*) as tot FROM " . $table . " " . $jtbl . " " . $cnt_count . "";
			$row_count = $this->_obj->select($sql_count);

			$start = (isset($limit[2]) && (int) $limit[2] >= 0) ? (int) $limit[2] : 0;
			$limit_rec = " LIMIT " . $start . ", " . $limit[1] . " ";

			if ($groupby != '') {
				$total = $row['tot'] = count($row_count);
			} else {
				$total = $row['tot'] = $row_count[0]['tot'];
			}

			if ($total == 0) {
				$row['start'] = 0;
				$row['end'] = 0;
				return $row;
			} else if ($total > 0) {
				if ($start > 0) {
					$row['start'] = $start = (($start + $limit[1]) <= $total) ? ($start - 1) + $limit[1] : $start;
					$limit_rec = " LIMIT " . $start . ", " . $limit[1] . " ";
				} else {
					$limit_rec = " LIMIT 0, " . $limit[1] . " ";
					$row['start'] = $start = 1;
				}
				$row['end'] = $end = ($start - 1) + $limit[1];
				if ($end > $total) {
					$row['end'] = $end = $total;
				}
			}
		}

		$sql = "SELECT " . $fields . " FROM " . $table . " " . $jtbl . " " . $cnt . " " . $limit_rec . "";
		$row = $this->_obj->select($sql);
		return $row;
	}

	function insertRecords($fields = "", $chk_dup = array()) {
		$result_id = 0;
		if (isset($chk_dup[0]) && $chk_dup[0] == 'yes' && trim($chk_dup[1]) != '') {
			$sql_exists = "Select * from " . $table . " WHERE " . $chk_dup[1] . "";
			$rslt = $this->_obj->select($sql_exists);
			return "exists";
		}
		if (trim($fields) != '') {
			$sql = "INSERT INTO " . $table . " " . $fields . "";
			$result_id = $this->_obj->insert($sql);
		}
		return $result_id;
	}

	function updateRecords($values = "", $where = "", $chk_dup = array()) {
		$rslt = 0;
		if (isset($chk_dup[0]) && $chk_dup[0] == 'yes' && trim($chk_dup[1]) != '') {
			$sql_exists = "Select * from " . $table . " WHERE " . $chk_dup[1] . "";
			$rslt = $this->_obj->select($sql_exists);
			return "exists";
		}
		if (trim($values) != '' && trim($where) != '') {
			$sql = "UPDATE " . $table . " SET " . $fields . " WHERE " . $where . "";
			$rslt = $this->_obj->sql_query($sql);
		}
		return $rslt;
	}

	function deleteRecords($fields = "", $join = "", $where) {
		$rslt = 0;
		if (trim($where) != '') {
			$sql = "DELETE " . $fields . " FROM " . $table . " " . $join . " WHERE " . $where . "";
			$rslt = $this->_obj->sql_query($sql);
		}
		return $rslt;
	}

}

?>