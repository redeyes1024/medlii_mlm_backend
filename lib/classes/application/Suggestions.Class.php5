<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Suggestions
* GENERATION DATE:  21.09.2010
* CLASS FILE:       /home/maintenance/iphoneAdmin/emallAdmin/lib/classes/phpClass/generated_classes/Suggestions.Class.php5
* FOR MYSQL TABLE:  suggestions
* FOR MYSQL DB:     emall
* -------------------------------------------------------
*
*/

class Suggestions
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $sug_id;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_sug_id;
	protected $_sug_name;
	protected $_sug_email;
	protected $_sug_cnumber;
	protected $_sug_text;
	protected $_sug_datetime;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_sug_id = null;
		$this->_sug_name = null;
		$this->_sug_email = null;
		$this->_sug_cnumber = null;
		$this->_sug_text = null;
		$this->_sug_datetime = null;
	}

	/**
	 *   @desc   DECONSTRUCTOR METHOD
	 */

	function __destruct()
	{
		unset($this->_obj);
	}



	/**
	 *   @desc   GETTER METHODS
	 */


	public function getsug_id()
	{
		return $this->_sug_id;
	}

	public function getsug_name()
	{
		return $this->_sug_name;
	}

	public function getsug_email()
	{
		return $this->_sug_email;
	}

	public function getsug_cnumber()
	{
		return $this->_sug_cnumber;
	}

	public function getsug_text()
	{
		return $this->_sug_text;
	}

	public function getsug_datetime()
	{
		return $this->_sug_datetime;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setsug_id($val)
	{
		$this->_sug_id =  $val;
	}

	public function setsug_name($val)
	{
		$this->_sug_name =  $val;
	}

	public function setsug_email($val)
	{
		$this->_sug_email =  $val;
	}

	public function setsug_cnumber($val)
	{
		$this->_sug_cnumber =  $val;
	}

	public function setsug_text($val)
	{
		$this->_sug_text =  $val;
	}

	public function setsug_datetime($val)
	{
		$this->_sug_datetime =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM suggestions WHERE sug_id = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_sug_id = $row[0]['sug_id'];
		$this->_sug_name = $row[0]['sug_name'];
		$this->_sug_email = $row[0]['sug_email'];
		$this->_sug_cnumber = $row[0]['sug_cnumber'];
		$this->_sug_text = $row[0]['sug_text'];
		$this->_sug_datetime = $row[0]['sug_datetime'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM suggestions WHERE sug_id = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->sug_id = ""; // clear key for autoincrement

		$sql = "INSERT INTO suggestions ( sug_name,sug_email,sug_cnumber,sug_text,sug_datetime ) VALUES ( '".$this->_sug_name."','".$this->_sug_email."','".$this->_sug_cnumber."','".$this->_sug_text."','".$this->_sug_datetime."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE suggestions SET  sug_name = '".$this->_sug_name."' , sug_email = '".$this->_sug_email."' , sug_cnumber = '".$this->_sug_cnumber."' , sug_text = '".$this->_sug_text."' , sug_datetime = '".$this->_sug_datetime."'  WHERE sug_id = $id ";
		$result = $this->_obj->sql_query($sql);

	}

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
		$method_notArr=Array('getAllVar');
		$evalStr='';
		for($i=0;$i<count($MethodArr);$i++)
		{
			if(substr($MethodArr[$i] , 0 ,3) == 'get' && (!(in_array($MethodArr[$i],$method_notArr))))
			{
				$var_name = substr($MethodArr[$i] , 3 );
				$evalStr.= 'global $'.$var_name.'; $'.$var_name.' = $this->'.$MethodArr[$i]."();";
			}
		}
		eval($evalStr);
	}

}

?>
