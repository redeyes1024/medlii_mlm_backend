<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Static
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/Occupy/hbpanel/lib/classes/phpClass/generated_classes/Static.Class.php5
* FOR MYSQL TABLE:  static
* FOR MYSQL DB:     occupy
* -------------------------------------------------------
*
*/

class _Static
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iStaticId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iStaticId;
	protected $_vMetaTitle;
	protected $_vDescription;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iStaticId = null;
		$this->_vMetaTitle = null;
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


	public function getiStaticId()
	{
		return $this->_iStaticId;
	}

	public function getvMetaTitle()
	{
		return $this->_vMetaTitle;
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


	public function setiStaticId($val)
	{
		$this->_iStaticId =  $val;
	}

	public function setvMetaTitle($val)
	{
		$this->_vMetaTitle =  $val;
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
		$sql =  "SELECT * FROM static WHERE iStaticId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iStaticId = $row[0]['iStaticId'];
		$this->_vMetaTitle = $row[0]['vMetaTitle'];
		$this->_vDescription = $row[0]['vDescription'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM static WHERE iStaticId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iStaticId = ""; // clear key for autoincrement

		$sql = "INSERT INTO static ( vMetaTitle,vDescription,eStatus ) VALUES ( '".$this->_vMetaTitle."','".$this->_vDescription."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE static SET  vMetaTitle = '".$this->_vMetaTitle."' , vDescription = '".$this->_vDescription."' , eStatus = '".$this->_eStatus."'  WHERE iStaticId = $id ";
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
