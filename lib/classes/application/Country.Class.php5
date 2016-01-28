<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Country
* GENERATION DATE:  07.03.2011
* CLASS FILE:       /home/mobile/iPhoneWS/test/hbpanel/lib/classes/phpClass/generated_classes/Country.Class.php5
* FOR MYSQL TABLE:  country
* FOR MYSQL DB:     test25
* -------------------------------------------------------
*
*/

class Country
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iCountryId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iCountryId;
	protected $_vCountryName;
	protected $_vPicture;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iCountryId = null;
		$this->_vCountryName = null;
		$this->_vPicture = null;
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


	public function getiCountryId()
	{
		return $this->_iCountryId;
	}

	public function getvCountryName()
	{
		return $this->_vCountryName;
	}

	public function getvPicture()
	{
		return $this->_vPicture;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiCountryId($val)
	{
		$this->_iCountryId =  $val;
	}

	public function setvCountryName($val)
	{
		$this->_vCountryName =  $val;
	}

	public function setvPicture($val)
	{
		$this->_vPicture=  $val;
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
		$sql =  "SELECT * FROM country WHERE iCountryId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iCountryId = $row[0]['iCountryId'];
		$this->_vCountryName = $row[0]['vCountryName'];
		$this->_vPicture = $row[0]['vPicture'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM country WHERE iCountryId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iCountryId = ""; // clear key for autoincrement

		$sql = "INSERT INTO country ( vCountryName,vPicture,eStatus ) VALUES ( '".$this->_vCountryName."', '".$this->_vPicture."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE country SET  vCountryName = '".$this->_vCountryName."' ,vPicture = '".$this->_vPicture."' ,eStatus = '".$this->_eStatus."'  WHERE iCountryId = $id ";
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
