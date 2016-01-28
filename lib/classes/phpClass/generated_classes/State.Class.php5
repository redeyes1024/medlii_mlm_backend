<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        State
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/Occupy/hbpanel/lib/classes/phpClass/generated_classes/State.Class.php5
* FOR MYSQL TABLE:  state
* FOR MYSQL DB:     occupy
* -------------------------------------------------------
*
*/

class State
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iStateId 	;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iStateId;
	protected $_iCountryId;
	protected $_vStateName;
	protected $_vStateCode;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iStateId = null;
		$this->_iCountryId = null;
		$this->_vStateName = null;
		$this->_vStateCode = null;
		$this->_eStatus = null;
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


	public function getiStateId()
	{
		return $this->_iStateId;
	}

	public function getiCountryId()
	{
		return $this->_iCountryId;
	}

	public function getvStateName()
	{
		return $this->_vStateName;
	}

	public function getvStateCode()
	{
		return $this->_vStateCode;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiStateId($val)
	{
		$this->_iStateId =  $val;
	}

	public function setiCountryId($val)
	{
		$this->_iCountryId =  $val;
	}

	public function setvStateName($val)
	{
		$this->_vStateName =  $val;
	}

	public function setvStateCode($val)
	{
		$this->_vStateCode =  $val;
	}

	public function seteStatus($val)
	{
		$this->_eStatus =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM state WHERE iStateId 	 = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iStateId = $row[0]['iStateId'];
		$this->_iCountryId = $row[0]['iCountryId'];
		$this->_vStateName = $row[0]['vStateName'];
		$this->_vStateCode = $row[0]['vStateCode'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM state WHERE iStateId 	 = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iStateId 	 = ""; // clear key for autoincrement

		$sql = "INSERT INTO state ( iStateId,iCountryId,vStateName,vStateCode,eStatus ) VALUES ( '".$this->_iStateId."','".$this->_iCountryId."','".$this->_vStateName."','".$this->_vStateCode."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE state SET  iStateId = '".$this->_iStateId."' , iCountryId = '".$this->_iCountryId."' , vStateName = '".$this->_vStateName."' , vStateCode = '".$this->_vStateCode."' , eStatus = '".$this->_eStatus."'  WHERE iStateId 	 = $id ";
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
