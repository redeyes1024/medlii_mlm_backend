<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Feedback
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/Occupy/hbpanel/lib/classes/phpClass/generated_classes/Feedback.Class.php5
* FOR MYSQL TABLE:  feedback
* FOR MYSQL DB:     occupy
* -------------------------------------------------------
*
*/

class Feedback
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iFeedbackId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iFeedbackId;
	protected $_iUserId;
	protected $_dPosteddate;
	protected $_eType;
	protected $_vDescription;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iFeedbackId = null;
		$this->_iUserId = null;
		$this->_dPosteddate = null;
		$this->_eType = null;
		$this->_vDescription = null;
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


	public function getiFeedbackId()
	{
		return $this->_iFeedbackId;
	}

	public function getiUserId()
	{
		return $this->_iUserId;
	}

	public function getdPosteddate()
	{
		return $this->_dPosteddate;
	}

	public function geteType()
	{
		return $this->_eType;
	}

	public function getvDescription()
	{
		return $this->_vDescription;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiFeedbackId($val)
	{
		$this->_iFeedbackId =  $val;
	}

	public function setiUserId($val)
	{
		$this->_iUserId =  $val;
	}

	public function setdPosteddate($val)
	{
		$this->_dPosteddate =  $val;
	}

	public function seteType($val)
	{
		$this->_eType =  $val;
	}

	public function setvDescription($val)
	{
		$this->_vDescription =  $val;
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
		$sql =  "SELECT * FROM feedback WHERE iFeedbackId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iFeedbackId = $row[0]['iFeedbackId'];
		$this->_iUserId = $row[0]['iUserId'];
		$this->_dPosteddate = $row[0]['dPosteddate'];
		$this->_eType = $row[0]['eType'];
		$this->_vDescription = $row[0]['vDescription'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM feedback WHERE iFeedbackId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iFeedbackId = ""; // clear key for autoincrement

		$sql = "INSERT INTO feedback ( iUserId,dPosteddate,eType,vDescription,eStatus ) VALUES ( '".$this->_iUserId."','".$this->_dPosteddate."','".$this->_eType."','".$this->_vDescription."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE feedback SET  iUserId = '".$this->_iUserId."' , dPosteddate = '".$this->_dPosteddate."' , eType = '".$this->_eType."' , vDescription = '".$this->_vDescription."' , eStatus = '".$this->_eStatus."'  WHERE iFeedbackId = $id ";
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
