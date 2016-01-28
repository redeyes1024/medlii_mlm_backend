<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        PropertyType
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/Occupy/hbpanel/lib/classes/phpClass/generated_classes/PropertyType.Class.php5
* FOR MYSQL TABLE:  propertytype
* FOR MYSQL DB:     occupy
* -------------------------------------------------------
*
*/

class PropertyType
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iPropertytypeId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iPropertytypeId;
	protected $_vPropertyType;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iPropertytypeId = null;
		$this->_vPropertyType = null;
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


	public function getiPropertytypeId()
	{
		return $this->_iPropertytypeId;
	}

	public function getvPropertyType()
	{
		return $this->_vPropertyType;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiPropertytypeId($val)
	{
		$this->_iPropertytypeId =  $val;
	}

	public function setvPropertyType($val)
	{
		$this->_vPropertyType =  $val;
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
		$sql =  "SELECT * FROM propertytype WHERE iPropertytypeId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iPropertytypeId = $row[0]['iPropertytypeId'];
		$this->_vPropertyType = $row[0]['vPropertyType'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM propertytype WHERE iPropertytypeId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iPropertytypeId = ""; // clear key for autoincrement

		$sql = "INSERT INTO propertytype ( vPropertyType,eStatus ) VALUES ( '".$this->_vPropertyType."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE propertytype SET  vPropertyType = '".$this->_vPropertyType."' , eStatus = '".$this->_eStatus."'  WHERE iPropertytypeId = $id ";
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
