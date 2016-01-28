<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        SellVehicle
* GENERATION DATE:  08.08.2011
* CLASS FILE:       /home/www/Mobilease/hbpanel/lib/classes/phpClass/generated_classes/SellVehicle.Class.php5
* FOR MYSQL TABLE:  sell_vehicle
* FOR MYSQL DB:     mobilease
* -------------------------------------------------------
*
*/

class SellVehicle
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iSellid;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iSellid;
	protected $_vSellernname;
	protected $_vAddress;
	protected $_vPhone;
	protected $_vEmail;
	protected $_vMake;
	protected $_vModel;
	protected $_vMiles;
	protected $_iYear;
	protected $_dPostedon;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iSellid = null;
		$this->_vSellernname = null;
		$this->_vAddress = null;
		$this->_vPhone = null;
		$this->_vEmail = null;
		$this->_vMake = null;
		$this->_vModel = null;
		$this->_vMiles = null;
		$this->_iYear = null;
		$this->_dPostedon = null;
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


	public function getiSellid()
	{
		return $this->_iSellid;
	}

	public function getvSellernname()
	{
		return $this->_vSellernname;
	}

	public function getvAddress()
	{
		return $this->_vAddress;
	}

	public function getvPhone()
	{
		return $this->_vPhone;
	}

	public function getvEmail()
	{
		return $this->_vEmail;
	}

	public function getvMake()
	{
		return $this->_vMake;
	}

	public function getvModel()
	{
		return $this->_vModel;
	}

	public function getvMiles()
	{
		return $this->_vMiles;
	}

	public function getiYear()
	{
		return $this->_iYear;
	}

	public function getdPostedon()
	{
		return $this->_dPostedon;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiSellid($val)
	{
		$this->_iSellid =  $val;
	}

	public function setvSellernname($val)
	{
		$this->_vSellernname =  $val;
	}

	public function setvAddress($val)
	{
		$this->_vAddress =  $val;
	}

	public function setvPhone($val)
	{
		$this->_vPhone =  $val;
	}

	public function setvEmail($val)
	{
		$this->_vEmail =  $val;
	}

	public function setvMake($val)
	{
		$this->_vMake =  $val;
	}

	public function setvModel($val)
	{
		$this->_vModel =  $val;
	}

	public function setvMiles($val)
	{
		$this->_vMiles =  $val;
	}

	public function setiYear($val)
	{
		$this->_iYear =  $val;
	}

	public function setdPostedon($val)
	{
		$this->_dPostedon =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM sell_vehicle WHERE iSellid = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iSellid = $row[0]['iSellid'];
		$this->_vSellernname = $row[0]['vSellernname'];
		$this->_vAddress = $row[0]['vAddress'];
		$this->_vPhone = $row[0]['vPhone'];
		$this->_vEmail = $row[0]['vEmail'];
		$this->_vMake = $row[0]['vMake'];
		$this->_vModel = $row[0]['vModel'];
		$this->_vMiles = $row[0]['vMiles'];
		$this->_iYear = $row[0]['iYear'];
		$this->_dPostedon = $row[0]['dPostedon'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM sell_vehicle WHERE iSellid = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iSellid = ""; // clear key for autoincrement

		$sql = "INSERT INTO sell_vehicle ( vSellernname,vAddress,vPhone,vEmail,vMake,vModel,vMiles,iYear,dPostedon ) VALUES ( '".$this->_vSellernname."','".$this->_vAddress."','".$this->_vPhone."','".$this->_vEmail."','".$this->_vMake."','".$this->_vModel."','".$this->_vMiles."','".$this->_iYear."','".$this->_dPostedon."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE sell_vehicle SET  vSellernname = '".$this->_vSellernname."' , vAddress = '".$this->_vAddress."' , vPhone = '".$this->_vPhone."' , vEmail = '".$this->_vEmail."' , vMake = '".$this->_vMake."' , vModel = '".$this->_vModel."' , vMiles = '".$this->_vMiles."' , iYear = '".$this->_iYear."' , dPostedon = '".$this->_dPostedon."'  WHERE iSellid = $id ";
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
