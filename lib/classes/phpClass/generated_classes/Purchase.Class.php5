<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Purchase
* GENERATION DATE:  08.08.2011
* CLASS FILE:       /home/www/Mobilease/hbpanel/lib/classes/phpClass/generated_classes/Purchase.Class.php5
* FOR MYSQL TABLE:  purchase
* FOR MYSQL DB:     mobilease
* -------------------------------------------------------
*
*/

class Purchase
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iPurchaseid;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iPurchaseid;
	protected $_iVehicleId;
	protected $_vName;
	protected $_vAddress;
	protected $_vPhone;
	protected $_vEmail;
	protected $_dPostedon;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iPurchaseid = null;
		$this->_iVehicleId = null;
		$this->_vName = null;
		$this->_vAddress = null;
		$this->_vPhone = null;
		$this->_vEmail = null;
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


	public function getiPurchaseid()
	{
		return $this->_iPurchaseid;
	}

	public function getiVehicleId()
	{
		return $this->_iVehicleId;
	}

	public function getvName()
	{
		return $this->_vName;
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

	public function getdPostedon()
	{
		return $this->_dPostedon;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiPurchaseid($val)
	{
		$this->_iPurchaseid =  $val;
	}

	public function setiVehicleId($val)
	{
		$this->_iVehicleId =  $val;
	}

	public function setvName($val)
	{
		$this->_vName =  $val;
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

	public function setdPostedon($val)
	{
		$this->_dPostedon =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM purchase WHERE iPurchaseid = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iPurchaseid = $row[0]['iPurchaseid'];
		$this->_iVehicleId = $row[0]['iVehicleId'];
		$this->_vName = $row[0]['vName'];
		$this->_vAddress = $row[0]['vAddress'];
		$this->_vPhone = $row[0]['vPhone'];
		$this->_vEmail = $row[0]['vEmail'];
		$this->_dPostedon = $row[0]['dPostedon'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM purchase WHERE iPurchaseid = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iPurchaseid = ""; // clear key for autoincrement

		$sql = "INSERT INTO purchase ( iVehicleId,vName,vAddress,vPhone,vEmail,dPostedon ) VALUES ( '".$this->_iVehicleId."','".$this->_vName."','".$this->_vAddress."','".$this->_vPhone."','".$this->_vEmail."','".$this->_dPostedon."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE purchase SET  iVehicleId = '".$this->_iVehicleId."' , vName = '".$this->_vName."' , vAddress = '".$this->_vAddress."' , vPhone = '".$this->_vPhone."' , vEmail = '".$this->_vEmail."' , dPostedon = '".$this->_dPostedon."'  WHERE iPurchaseid = $id ";
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
