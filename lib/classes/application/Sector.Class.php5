<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Sector
* GENERATION DATE:  07.01.2011
* CLASS FILE:       /home/mobile/iPhoneWS/CompanyApp/hbpanel/lib/classes/phpClass/generated_classes/Sector.Class.php5
* FOR MYSQL TABLE:  sector
* FOR MYSQL DB:     companyapp
* -------------------------------------------------------
*
*/

class Sector
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iSectorId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iSectorId;
	protected $_vName;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iSectorId = null;
		$this->_vName = null;
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


	public function getiSectorId()
	{
		return $this->_iSectorId;
	}

	public function getvName()
	{
		return $this->_vName;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiSectorId($val)
	{
		$this->_iSectorId =  $val;
	}

	public function setvName($val)
	{
		$this->_vName =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM sector WHERE iSectorId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iSectorId = $row[0]['iSectorId'];
		$this->_vName = $row[0]['vName'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM sector WHERE iSectorId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iSectorId = ""; // clear key for autoincrement

		$sql = "INSERT INTO sector ( vName ) VALUES ( '".$this->_vName."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE sector SET  vName = '".$this->_vName."'  WHERE iSectorId = $id ";
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
