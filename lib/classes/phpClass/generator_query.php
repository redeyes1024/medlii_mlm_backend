<?php
include("resources/class.database.php");
$database = new Database();

if ($_REQUEST["f"] == "") {
	?>

<font face="Arial" size="3"><b> PHP MYSQL Class Generator </b> </font>

<font face="Arial" size="2"><b>

		<form action="generator_query.php" method="POST" name="FORMGEN">

			1) Select Table Name: <br> <select name="tablename">

				<?php
				$database->OpenLink();
				$tablelist = mysql_list_tables($database->database, $database->link);
				while ($row = mysql_fetch_row($tablelist)) {
        print "<option value=\"$row[0]\">$row[0]</option>";
    }
    ?>
			</select>

			<p>
				2) Type Class Name (ex. "test"): <br> <input type="text"
					name="classname" size="50" value="">
			
			
			<p>
				3) Type Name of Key Field: <br> <input type="text" name="keyname"
					value="" size="50"> <br> <font size=1> (Name of key-field with type
					number with autoincrement!) </font>
			
			
			<p>


				<input type="submit" name="s1" value="Generate Class"> <input
					type="hidden" name="f" value="formshowed">
		
		</form>

</b> </font>
<p>
	<font size="1" face="Arial"> <a href="http://www.voegeli.li"
		target="_blank"> this is a script from www.voegeli.li </a>
	</font>


	<?php
} else {

	// fill parameters from form
	$table = $_REQUEST["tablename"];
	$class = $_REQUEST["classname"];
	$key = $_REQUEST["keyname"];

	$dir = dirname(__FILE__);

	$filename = $dir . "/generated_classes/" . $class . ".Class.php5";

	// if file exists, then delete it
	if (file_exists($filename)) {
		unlink($filename);
	}

	// open file in insert mode
	$file = fopen($filename, "w+");
	$filedate = date("d.m.Y");

	$c = "";
	$c = "<?php
	/*
	*
	* -------------------------------------------------------
	* CLASSNAME:        $class
	* GENERATION DATE:  $filedate
	* CLASS FILE:       $filename
	* FOR MYSQL TABLE:  $table
	* FOR MYSQL DB:     $database->database
	* -------------------------------------------------------
	*
	*/

	class $class
	{


	/**
	*   @desc Variable Declaration with default value
	*/

	\tprotected $$key;   // KEY ATTR. WITH AUTOINCREMENT
	";

	$sql = "SHOW COLUMNS FROM $table;";
	$database->query($sql);
	$result = $database->result;


	while ($row = mysql_fetch_row($result)) {
		$col = "_" . $row[0];

		if ($col != $key) {

			$c.= "
			\tprotected $$col;  ";
		} // endif
		//"print "$col";
	} // endwhile

	$cdb = "$" . "database";
	$cdb2 = "database";
	$c.="

			";

	$cthis = "$" . "this->_";
	$thisdb = "global $" . "obj;\n\t";
	$thisdb .= "\t" . $cthis . "obj = $" . "obj;";

	$unsetthisdb = "unset(" . $cthis . "obj);";

	$sql = "SHOW COLUMNS FROM $table;";
	$database->query($sql);
	$result = $database->result;

	$c.= "

	/**
	*   @desc   CONSTRUCTOR METHOD
	*/

	\tfunction __construct()
	\t{
	\t$thisdb
	";
	while ($row = mysql_fetch_row($result)) {
		$col = $row[0];
		$colthis = "\n\t\t$" . "this->_" . $col . " = null;";
		$c.= "$colthis ";
	}
	$c.= "
	\t}

	/**
	*   @desc   DECONSTRUCTOR METHOD
	*/

	\tfunction __destruct()
	\t{
	\t$unsetthisdb
	\t}

	";

	$c.="

			/**
			*   @desc   GETTER METHODS
			*/

			";


	// GETTER
	$database->query($sql);
	$result = $database->result;
	while ($row = mysql_fetch_row($result)) {
		$col = $row[0];
		$mname = "get" . $col . "()";
		$mthis = "$" . "this->_" . $col;
		$c.="
		\tpublic function $mname
		\t{
		\t\treturn $mthis;
		\t}
		";
	}


	$c.="

			/**
			*   @desc   SETTER METHODS
			*/

			";
	// SETTER
	$database->query($sql);
	$result = $database->result;
	while ($row = mysql_fetch_row($result)) {
		$col = $row[0];
		$val = "$" . "val";
		$mname = "set" . $col . "($" . "val)";
		$mthis = "$" . "this->_" . $col . " = ";
		$c.="
		\tpublic function $mname
		\t{
		\t\t $mthis $val;
		\t}
		";
	}


	$sql = "$" . "sql = ";
	$id = "$" . "id";
	$thisdb = "$" . "this->" . "obj";
	$thisdbquery = "$" . "this->" . "_obj->select($" . "sql" . ")";
	$result = "$" . "row = ";
	$row = "$" . "row";
	$result1 = "$" . "result";
	//$res = "$" . "result = $" . "this->obj->result;";

	$c.="

	/**
	*   @desc   SELECT METHOD / LOAD
	*/

	\tfunction select($id)
	\t{
	\t\t $sql \"SELECT * FROM $table WHERE $key = $id\";
	\t\t $result $thisdbquery; \n
	";
	$sql = "SHOW COLUMNS FROM $table;";
	$database->query($sql);
	$result = $database->result;
	while ($row = mysql_fetch_row($result)) {
		$col = $row[0];
		//$cthis = "$" . "this->" . $col . " = $" . "row->" . $col;
		$cthis = " $" . "this->_" . $col . " = $" . "row[0]['" . $col . "']";

		$c.="\t\t$cthis;
		";
	}

	$c.="\t}";

	$zeile1 = "$" . "sql" . " = \"DELETE FROM $table WHERE $key = $id\"";
	$zeile2 = "$" . "result = $" . "this->_obj->sql_query($" . "sql);";
	$c.="


	/**
	*   @desc   DELETE
	*/

	\tfunction delete($id)
	\t{
	\t\t $zeile1;
	\t\t $zeile2
	";
	$c.="\t}
				";


	$zeile1 = "$" . "this->$key = \"\"";
	$zeile2 = "INSERT INTO $table (";
	$zeile5 = ")";
	$zeile3 = "";
	$zeile4 = "";
	$zeile6 = "VALUES (";

	$sql = "SHOW COLUMNS FROM $table;";
	$database->query($sql);
	$result = $database->result;
	while ($row = mysql_fetch_row($result)) {
		$col = $row[0];

		if ($col != $key) {
			$zeile3.= "$col" . ",";
			//$zeile4.= "'$" . "this->_$col" . "',";
			$zeile4.= "'\".$" . "this->_$col" . ".\"',";
			//$zeile3 = rtrim($zeile3);
			//$zeile4 = rtrim($zeile4);
			//$zeile3 = str_replace(",", " ", $zeile3);
			//$zeile4 = str_replace(",", " ", $zeile4);
		}
	}

	$zeile3 = substr($zeile3, 0, -1);
	$zeile4 = substr($zeile4, 0, -1);
	$sql = "$" . "sql =";
	$zeile7 = "$" . "result = $" . "this->_obj->insert($" . "sql);";
	$zeile8 = "$" . "row";
	$zeile9 = "$" . "result";
	$zeile10 = "" . "return " . "$" . "result;";


	//$zeile10 = "$" . "this->$key = " . "mysql_insert_id($" . "this->database->link);";

	$c.="

	/**
	*   @desc   INSERT
	*/

	\tfunction insert()
	\t{
	\t\t $zeile1; // clear key for autoincrement

	\t\t $sql \"$zeile2 $zeile3 $zeile5 $zeile6 $zeile4 $zeile5\";
	\t\t $zeile7
	\t\t $zeile10
	\t}
	";


	// UPDATE ----------------------------------------

	$zeile1 = "$" . "this->_$key = \"\"";
	$zeile2 = "UPDATE $table SET ";
	$zeile5 = ")";
	$zeile3 = "";
	$zeile4 = "";
	$zeile6 = "VALUES (";

	$upd = "";

	$sql = "SHOW COLUMNS FROM $table;";
	$database->query($sql);
	$result = $database->result;
	while ($row = mysql_fetch_row($result)) {
		$col = $row[0];

		if ($col != $key) {
			$zeile3.= "$col" . ",";
			$zeile4.= "$" . "this->_$col" . ",";
			$upd.= "" . "$col = '\".$" . "this->_$col.\"' , ";
			//$zeile3 = rtrim($zeile3);
			//$zeile4 = rtrim($zeile4);
			//$zeile3 = str_replace(",", " ", $zeile3);
			//$zeile4 = str_replace(",", " ", $zeile4);
		}
	}

	$zeile3 = substr($zeile3, 0, -1);
	$zeile4 = substr($zeile4, 0, -2);
	$upd = substr($upd, 0, -2);
	$sql = "$" . "sql = \"";
	$zeile7 = "$" . "result = $" . "this->_obj->sql_query($" . "sql)";
	$zeile8 = "$" . "row";
	$zeile9 = "$" . "result";
	$zeile10 = "$" . "this->_$key = $" . "row->$key";
	$id = "$" . "id";
	$where = "WHERE " . "$key = $" . "id";

	$c.="

	/**
	*   @desc   UPDATE
	*/

	\tfunction update($id)
	\t{

	\t\t $sql $zeile2 $upd $where \";
	\t\t $zeile7;
	";
	$c.="
			\t}
			";
	$c.='
			function setAllVar()
			{
			$MethodArr = get_class_methods($this);
			foreach($_REQUEST AS $KEY => $VAL)
			{
			$method = "set".$KEY;
			if(in_array($method , $MethodArr))
			{
			call_user_method($method,&$this,$VAL);
}
}
}

			function getAllVar()
			{
			$MethodArr = get_class_methods($this);
			$method_notArr=Array(\'getAllVar\');
			$evalStr=\'\';
			for($i=0;$i<count($MethodArr);$i++)
			{
			if(substr($MethodArr[$i] , 0 ,3) == \'get\' && (!(in_array($MethodArr[$i],$method_notArr))))
			{
			$var_name = substr($MethodArr[$i] , 3 );
			$evalStr.= \'global $\'.$var_name.\'; $\'.$var_name.\' = $this->\'.$MethodArr[$i]."();";
}
}
			eval($evalStr);
}';

	$c.= "

}

					?>
					";

	#echo $c; exit;
	fwrite($file, $c);

	print "
	<font face=\"Arial\" size=\"3\"><b>
	PHP MYSQL Class Generator
	</b>
	<p>
	<font face=\"Arial\" size=\"2\"><b>
	Class '$class' successfully generated as file '$filename'!
	<p>
	<a href=\"javascript:history.back();\">
	back
	</a>

	</b></font>

	";
	?>
<p>
	<font size="2" face="Arial"> <a href="http://www.hiddenbrains.com"
		target="_blank"> this is a script from www.hiddenbrains.com </a>
	</font>





	<?php
} // endif
?>