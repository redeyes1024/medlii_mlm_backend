<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Currency
* GENERATION DATE:  11.08.2010
* CLASS FILE:       /home/www/mister_tailor/lib/classes/phpClass/generated_classes/Currency.Class.php5
* FOR MYSQL TABLE:  Currency
* FOR MYSQL DB:     mister_tailor
* -------------------------------------------------------
* AUTHOR:
* Zangs (HB)
* from: >> www.hiddenbrains.com
* -------------------------------------------------------
*
*/

class Currency
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iCurrencyId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iCurrencyId;
	protected $_vCurrency;
	protected $_vCountry;
	protected $_vCurrencyCode;
	protected $_vCurrencySymbol;
	protected $_vRate;
	protected $_eStatus;
	protected $_eDefault;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iCurrencyId = null;
		$this->_vCurrency = null;
		$this->_vCountry = null;
		$this->_vCurrencyCode = null;
		$this->_vCurrencySymbol = null;
		$this->_vRate = null;
		$this->_eStatus = null;
		$this->_eDefault = null;
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


	public function getiCurrencyId()
	{
		return $this->_iCurrencyId;
	}

	public function getvCurrency()
	{
		return $this->_vCurrency;
	}

	public function getvCountry()
	{
		return $this->_vCountry;
	}

	public function getvCurrencyCode()
	{
		return $this->_vCurrencyCode;
	}

	public function getvCurrencySymbol()
	{
		return $this->_vCurrencySymbol;
	}

	public function getvRate()
	{
		return $this->_vRate;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}

	public function geteDefault()
	{
		return $this->_eDefault;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiCurrencyId($val)
	{
		$this->_iCurrencyId =  $val;
	}

	public function setvCurrency($val)
	{
		$this->_vCurrency =  $val;
	}

	public function setvCountry($val)
	{
		$this->_vCountry =  $val;
	}

	public function setvCurrencyCode($val)
	{
		$this->_vCurrencyCode =  $val;
	}

	public function setvCurrencySymbol($val)
	{
		$this->_vCurrencySymbol =  $val;
	}

	public function setvRate($val)
	{
		$this->_vRate =  $val;
	}

	public function seteStatus($val)
	{
		$this->_eStatus =  $val;
	}

	public function seteDefault($val)
	{
		$this->_eDefault =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM Currency WHERE iCurrencyId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iCurrencyId = $row[0]['iCurrencyId'];
		$this->_vCurrency = $row[0]['vCurrency'];
		$this->_vCountry = $row[0]['vCountry'];
		$this->_vCurrencyCode = $row[0]['vCurrencyCode'];
		$this->_vCurrencySymbol = $row[0]['vCurrencySymbol'];
		$this->_vRate = $row[0]['vRate'];
		$this->_eStatus = $row[0]['eStatus'];
		$this->_eDefault = $row[0]['eDefault'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM Currency WHERE iCurrencyId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iCurrencyId = ""; // clear key for autoincrement

		$sql = "INSERT INTO Currency ( vCurrency,vCountry,vCurrencyCode,vCurrencySymbol,vRate,eStatus,eDefault ) VALUES ( '".$this->_vCurrency."','".$this->_vCountry."','".$this->_vCurrencyCode."','".$this->_vCurrencySymbol."','".$this->_vRate."','".$this->_eStatus."','".$this->_eDefault."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE Currency SET  vCurrency = '".$this->_vCurrency."' , vCountry = '".$this->_vCountry."' , vCurrencyCode = '".$this->_vCurrencyCode."' , vCurrencySymbol = '".$this->_vCurrencySymbol."' , vRate = '".$this->_vRate."' , eStatus = '".$this->_eStatus."' , eDefault = '".$this->_eDefault."'  WHERE iCurrencyId = $id ";
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

	function selectDefault()
	{

		$sql =  "SELECT count(iCurrencyId) as total FROM Currency WHERE eDefault='Yes'";
		$row =  $this->_obj->select($sql);
		if($row[0]['total']>0)
		{

			$sql = " UPDATE Currency SET  eDefault = 'No'";
			$result = $this->_obj->sql_query($sql);

		}
	}


}

?>
