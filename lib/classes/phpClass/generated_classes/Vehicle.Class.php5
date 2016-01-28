<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Vehicle
* GENERATION DATE:  08.08.2011
* CLASS FILE:       /home/www/Mobilease/hbpanel/lib/classes/phpClass/generated_classes/Vehicle.Class.php5
* FOR MYSQL TABLE:  vehicles
* FOR MYSQL DB:     mobilease
* -------------------------------------------------------
*
*/

class Vehicle
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iVehicleId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iVehicleId;
	protected $_iMiles;
	protected $_iPrice;
	protected $_iDealerId;
	protected $_iYear;
	protected $_vMake;
	protected $_vModel;
	protected $_vTrim;
	protected $_vEngine;
	protected $_vTrans;
	protected $_vFuel;
	protected $_vColor;
	protected $_vInterior;
	protected $_vVin;
	protected $_iStockno;
	protected $_vBodytype;
	protected $_vCondition;
	protected $_vCategory;
	protected $_vDescription;
	protected $_vOptions;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iVehicleId = null;
		$this->_iMiles = null;
		$this->_iPrice = null;
		$this->_iDealerId = null;
		$this->_iYear = null;
		$this->_vMake = null;
		$this->_vModel = null;
		$this->_vTrim = null;
		$this->_vEngine = null;
		$this->_vTrans = null;
		$this->_vFuel = null;
		$this->_vColor = null;
		$this->_vInterior = null;
		$this->_vVin = null;
		$this->_iStockno = null;
		$this->_vBodytype = null;
		$this->_vCondition = null;
		$this->_vCategory = null;
		$this->_vDescription = null;
		$this->_vOptions = null;
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


	public function getiVehicleId()
	{
		return $this->_iVehicleId;
	}

	public function getiMiles()
	{
		return $this->_iMiles;
	}

	public function getiPrice()
	{
		return $this->_iPrice;
	}

	public function getiDealerId()
	{
		return $this->_iDealerId;
	}

	public function getiYear()
	{
		return $this->_iYear;
	}

	public function getvMake()
	{
		return $this->_vMake;
	}

	public function getvModel()
	{
		return $this->_vModel;
	}

	public function getvTrim()
	{
		return $this->_vTrim;
	}

	public function getvEngine()
	{
		return $this->_vEngine;
	}

	public function getvTrans()
	{
		return $this->_vTrans;
	}

	public function getvFuel()
	{
		return $this->_vFuel;
	}

	public function getvColor()
	{
		return $this->_vColor;
	}

	public function getvInterior()
	{
		return $this->_vInterior;
	}

	public function getvVin()
	{
		return $this->_vVin;
	}

	public function getiStockno()
	{
		return $this->_iStockno;
	}

	public function getvBodytype()
	{
		return $this->_vBodytype;
	}

	public function getvCondition()
	{
		return $this->_vCondition;
	}

	public function getvCategory()
	{
		return $this->_vCategory;
	}

	public function getvDescription()
	{
		return $this->_vDescription;
	}

	public function getvOptions()
	{
		return $this->_vOptions;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiVehicleId($val)
	{
		$this->_iVehicleId =  $val;
	}

	public function setiMiles($val)
	{
		$this->_iMiles =  $val;
	}

	public function setiPrice($val)
	{
		$this->_iPrice =  $val;
	}

	public function setiDealerId($val)
	{
		$this->_iDealerId =  $val;
	}

	public function setiYear($val)
	{
		$this->_iYear =  $val;
	}

	public function setvMake($val)
	{
		$this->_vMake =  $val;
	}

	public function setvModel($val)
	{
		$this->_vModel =  $val;
	}

	public function setvTrim($val)
	{
		$this->_vTrim =  $val;
	}

	public function setvEngine($val)
	{
		$this->_vEngine =  $val;
	}

	public function setvTrans($val)
	{
		$this->_vTrans =  $val;
	}

	public function setvFuel($val)
	{
		$this->_vFuel =  $val;
	}

	public function setvColor($val)
	{
		$this->_vColor =  $val;
	}

	public function setvInterior($val)
	{
		$this->_vInterior =  $val;
	}

	public function setvVin($val)
	{
		$this->_vVin =  $val;
	}

	public function setiStockno($val)
	{
		$this->_iStockno =  $val;
	}

	public function setvBodytype($val)
	{
		$this->_vBodytype =  $val;
	}

	public function setvCondition($val)
	{
		$this->_vCondition =  $val;
	}

	public function setvCategory($val)
	{
		$this->_vCategory =  $val;
	}

	public function setvDescription($val)
	{
		$this->_vDescription =  $val;
	}

	public function setvOptions($val)
	{
		$this->_vOptions =  $val;
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
		$sql =  "SELECT * FROM vehicles WHERE iVehicleId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iVehicleId = $row[0]['iVehicleId'];
		$this->_iMiles = $row[0]['iMiles'];
		$this->_iPrice = $row[0]['iPrice'];
		$this->_iDealerId = $row[0]['iDealerId'];
		$this->_iYear = $row[0]['iYear'];
		$this->_vMake = $row[0]['vMake'];
		$this->_vModel = $row[0]['vModel'];
		$this->_vTrim = $row[0]['vTrim'];
		$this->_vEngine = $row[0]['vEngine'];
		$this->_vTrans = $row[0]['vTrans'];
		$this->_vFuel = $row[0]['vFuel'];
		$this->_vColor = $row[0]['vColor'];
		$this->_vInterior = $row[0]['vInterior'];
		$this->_vVin = $row[0]['vVin'];
		$this->_iStockno = $row[0]['iStockno'];
		$this->_vBodytype = $row[0]['vBodytype'];
		$this->_vCondition = $row[0]['vCondition'];
		$this->_vCategory = $row[0]['vCategory'];
		$this->_vDescription = $row[0]['vDescription'];
		$this->_vOptions = $row[0]['vOptions'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM vehicles WHERE iVehicleId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iVehicleId = ""; // clear key for autoincrement

		$sql = "INSERT INTO vehicles ( iMiles,iPrice,iDealerId,iYear,vMake,vModel,vTrim,vEngine,vTrans,vFuel,vColor,vInterior,vVin,iStockno,vBodytype,vCondition,vCategory,vDescription,vOptions,eStatus ) VALUES ( '".$this->_iMiles."','".$this->_iPrice."','".$this->_iDealerId."','".$this->_iYear."','".$this->_vMake."','".$this->_vModel."','".$this->_vTrim."','".$this->_vEngine."','".$this->_vTrans."','".$this->_vFuel."','".$this->_vColor."','".$this->_vInterior."','".$this->_vVin."','".$this->_iStockno."','".$this->_vBodytype."','".$this->_vCondition."','".$this->_vCategory."','".$this->_vDescription."','".$this->_vOptions."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE vehicles SET  iMiles = '".$this->_iMiles."' , iPrice = '".$this->_iPrice."' , iDealerId = '".$this->_iDealerId."' , iYear = '".$this->_iYear."' , vMake = '".$this->_vMake."' , vModel = '".$this->_vModel."' , vTrim = '".$this->_vTrim."' , vEngine = '".$this->_vEngine."' , vTrans = '".$this->_vTrans."' , vFuel = '".$this->_vFuel."' , vColor = '".$this->_vColor."' , vInterior = '".$this->_vInterior."' , vVin = '".$this->_vVin."' , iStockno = '".$this->_iStockno."' , vBodytype = '".$this->_vBodytype."' , vCondition = '".$this->_vCondition."' , vCategory = '".$this->_vCategory."' , vDescription = '".$this->_vDescription."' , vOptions = '".$this->_vOptions."' , eStatus = '".$this->_eStatus."'  WHERE iVehicleId = $id ";
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
