<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        City
* GENERATION DATE:  07.03.2011
* CLASS FILE:       /home/mobile/iPhoneWS/test/hbpanel/lib/classes/phpClass/generated_classes/City.Class.php5
* FOR MYSQL TABLE:  city
* FOR MYSQL DB:     test25
* -------------------------------------------------------
*
*/

class City
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iCityId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iCityId;
	protected $_vCity;
	protected $_iCountryId;
	protected $_vLogo;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iCityId = null;
		$this->_vCity = null;
		$this->_iCountryId = null;
		$this->_vLogo = null;
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


	public function getiCityId()
	{
		return $this->_iCityId;
	}
	public function getvLogo()
	{
		return $this->_vLogo;
	}

	public function getvCity()
	{
		return $this->_vCity;
	}

	public function getiCountryId()
	{
		return $this->_iCountryId;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiCityId($val)
	{
		$this->_iCityId =  $val;
	}

	public function setvCity($val)
	{
		$this->_vCity =  $val;
	}

	public function setiCountryId($val)
	{
		$this->_iCountryId =  $val;
	}
	public function setvLogo($val)
	{
		$this->_vLogo =  $val;
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
		$sql =  "SELECT * FROM city WHERE iCityId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iCityId = $row[0]['iCityId'];
		$this->_vCity = $row[0]['vCity'];
		$this->_iCountryId = $row[0]['iCountryId'];
		$this->_vLogo = $row[0]['vLogo'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM city WHERE iCityId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iCityId = ""; // clear key for autoincrement
		 
		$sql = "INSERT INTO city ( vCity,iCountryId,eStatus,vLogo ) VALUES ( '".$this->_vCity."','".$this->_iCountryId."','".$this->_eStatus."','".$this->_vLogo."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{
		 
		$sql = " UPDATE city SET  vCity = '".$this->_vCity."' , iCountryId = '".$this->_iCountryId."' , eStatus = '".$this->_eStatus."',vLogo='".$this->_vLogo."'  WHERE iCityId = $id ";
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
