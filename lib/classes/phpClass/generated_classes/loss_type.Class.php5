<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        loss_type
* GENERATION DATE:  07.04.2011
* CLASS FILE:       /home/mobile/iPhoneWS/schadehulp/hbpanel/lib/classes/phpClass/generated_classes/loss_type.Class.php5
* FOR MYSQL TABLE:  loss_type
* FOR MYSQL DB:     schadehulp
* -------------------------------------------------------
*
*/

class loss_type
{


	/**
	*   @desc Variable Declaration with default value
	*/

	protected $iLossId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iLossId;
	protected $_vTitle;
	protected $_tDescriptions;
	protected $_eStatus;



	/**
	*   @desc   CONSTRUCTOR METHOD
	*/

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iLossId = null;
		$this->_vTitle = null;
		$this->_tDescriptions = null;
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


	public function getiLossId()
	{
		return $this->_iLossId;
	}

	public function getvTitle()
	{
		return $this->_vTitle;
	}

	public function gettDescriptions()
	{
		return $this->_tDescriptions;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	*   @desc   SETTER METHODS
	*/


	public function setiLossId($val)
	{
		$this->_iLossId =  $val;
	}

	public function setvTitle($val)
	{
		$this->_vTitle =  $val;
	}

	public function settDescriptions($val)
	{
		$this->_tDescriptions =  $val;
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
		$sql =  "SELECT * FROM loss_type WHERE iLossId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iLossId = $row[0]['iLossId'];
		$this->_vTitle = $row[0]['vTitle'];
		$this->_tDescriptions = $row[0]['tDescriptions'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	*   @desc   DELETE
	*/

	function delete($id)
	{
		$sql = "DELETE FROM loss_type WHERE iLossId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	*   @desc   INSERT
	*/

	function insert()
	{
		$this->iLossId = ""; // clear key for autoincrement

		$sql = "INSERT INTO loss_type ( vTitle,tDescriptions,eStatus ) VALUES ( '".$this->_vTitle."','".$this->_tDescriptions."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	*   @desc   UPDATE
	*/

	function update($id)
	{

		$sql = " UPDATE loss_type SET  vTitle = '".$this->_vTitle."' , tDescriptions = '".$this->_tDescriptions."' , eStatus = '".$this->_eStatus."'  WHERE iLossId = $id ";
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