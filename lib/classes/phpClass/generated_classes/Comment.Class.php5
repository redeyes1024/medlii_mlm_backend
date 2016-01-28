<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Comment
* GENERATION DATE:  15.04.2011
* CLASS FILE:       /home/mobile/iPhoneWS/Restaurant/hbpanel/lib/classes/phpClass/generated_classes/Comment.Class.php5
* FOR MYSQL TABLE:  comment
* FOR MYSQL DB:     restaurant
* -------------------------------------------------------
*
*/

class Comment
{


	/**
	*   @desc Variable Declaration with default value
	*/

	protected $iCommentId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iCommentId;
	protected $_iRestaurantId;
	protected $_vDeviceId;
	protected $_vUserName;
	protected $_vUserEmail;
	protected $_tComment;
	protected $_dCreated;



	/**
	*   @desc   CONSTRUCTOR METHOD
	*/

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iCommentId = null;
		$this->_iRestaurantId = null;
		$this->_vDeviceId = null;
		$this->_vUserName = null;
		$this->_vUserEmail = null;
		$this->_tComment = null;
		$this->_dCreated = null;
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


	public function getiCommentId()
	{
		return $this->_iCommentId;
	}

	public function getiRestaurantId()
	{
		return $this->_iRestaurantId;
	}

	public function getvDeviceId()
	{
		return $this->_vDeviceId;
	}

	public function getvUserName()
	{
		return $this->_vUserName;
	}

	public function getvUserEmail()
	{
		return $this->_vUserEmail;
	}

	public function gettComment()
	{
		return $this->_tComment;
	}

	public function getdCreated()
	{
		return $this->_dCreated;
	}


	/**
	*   @desc   SETTER METHODS
	*/


	public function setiCommentId($val)
	{
		$this->_iCommentId =  $val;
	}

	public function setiRestaurantId($val)
	{
		$this->_iRestaurantId =  $val;
	}

	public function setvDeviceId($val)
	{
		$this->_vDeviceId =  $val;
	}

	public function setvUserName($val)
	{
		$this->_vUserName =  $val;
	}

	public function setvUserEmail($val)
	{
		$this->_vUserEmail =  $val;
	}

	public function settComment($val)
	{
		$this->_tComment =  $val;
	}

	public function setdCreated($val)
	{
		$this->_dCreated =  $val;
	}


	/**
	*   @desc   SELECT METHOD / LOAD
	*/

	function select($id)
	{
		$sql =  "SELECT * FROM comment WHERE iCommentId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iCommentId = $row[0]['iCommentId'];
		$this->_iRestaurantId = $row[0]['iRestaurantId'];
		$this->_vDeviceId = $row[0]['vDeviceId'];
		$this->_vUserName = $row[0]['vUserName'];
		$this->_vUserEmail = $row[0]['vUserEmail'];
		$this->_tComment = $row[0]['tComment'];
		$this->_dCreated = $row[0]['dCreated'];
	}


	/**
	*   @desc   DELETE
	*/

	function delete($id)
	{
		$sql = "DELETE FROM comment WHERE iCommentId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	*   @desc   INSERT
	*/

	function insert()
	{
		$this->iCommentId = ""; // clear key for autoincrement

		$sql = "INSERT INTO comment ( iRestaurantId,vDeviceId,vUserName,vUserEmail,tComment,dCreated ) VALUES ( '".$this->_iRestaurantId."','".$this->_vDeviceId."','".$this->_vUserName."','".$this->_vUserEmail."','".$this->_tComment."','".$this->_dCreated."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	*   @desc   UPDATE
	*/

	function update($id)
	{

		$sql = " UPDATE comment SET  iRestaurantId = '".$this->_iRestaurantId."' , vDeviceId = '".$this->_vDeviceId."' , vUserName = '".$this->_vUserName."' , vUserEmail = '".$this->_vUserEmail."' , tComment = '".$this->_tComment."' , dCreated = '".$this->_dCreated."'  WHERE iCommentId = $id ";
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