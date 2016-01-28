<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        State
* GENERATION DATE:  18.08.2010
* CLASS FILE:       /home/maintenance/bioscoopreview_new/lib/classes/phpClass/generated_classes/State.Class.php5
* FOR MYSQL TABLE:  state_master
* FOR MYSQL DB:     bioscoopreview
* -------------------------------------------------------
*
*/

class State
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iStateId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iStateId;
	protected $_vState;
	protected $_vStateCode;
	protected $_vCountryCode;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iStateId = null;
		$this->_vState = null;
		$this->_vStateCode = null;
		$this->_vCountryCode = null;
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

	public function getvState()
	{
		return $this->_vState;
	}

	public function getvStateCode()
	{
		return $this->_vStateCode;
	}

	public function getvCountryCode()
	{
		return $this->_vCountryCode;
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

	public function setvState($val)
	{
		$this->_vState =  $val;
	}

	public function setvStateCode($val)
	{
		$this->_vStateCode =  $val;
	}

	public function setvCountryCode($val)
	{
		$this->_vCountryCode =  $val;
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
		$sql =  "SELECT * FROM state_master WHERE iStateId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iStateId = $row[0]['iStateId'];
		$this->_vState = $row[0]['vState'];
		$this->_vStateCode = $row[0]['vStateCode'];
		$this->_vCountryCode = $row[0]['vCountryCode'];
		$this->_eStatus = $row[0]['eStatus'];
		return $row ;
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM state_master WHERE iStateId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iStateId = ""; // clear key for autoincrement

		$sql = "INSERT INTO state_master ( vState,vStateCode,vCountryCode,eStatus ) VALUES ( '".$this->_vState."','".$this->_vStateCode."','".$this->_vCountryCode."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE state_master SET  vState = '".$this->_vState."' , vStateCode = '".$this->_vStateCode."' , vCountryCode = '".$this->_vCountryCode."' , eStatus = '".$this->_eStatus."'  WHERE iStateId = $id ";
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
