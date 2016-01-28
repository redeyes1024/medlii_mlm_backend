<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Dealer
* GENERATION DATE:  08.08.2011
* CLASS FILE:       /home/www/Mobilease/hbpanel/lib/classes/phpClass/generated_classes/Dealer.Class.php5
* FOR MYSQL TABLE:  dealer
* FOR MYSQL DB:     mobilease
* -------------------------------------------------------
*
*/

class Dealer
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iDealerId ;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iDealerId;
	protected $_vDealername;
	protected $_vDealerAddress;
	protected $_vCity;
	protected $_vState;
	protected $_vDealerPhone1;
	protected $_vDealerPhone2;
	protected $_vDealerwebURL;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iDealerId = null;
		$this->_vDealername = null;
		$this->_vDealerAddress = null;
		$this->_vCity = null;
		$this->_vState = null;
		$this->_vDealerPhone1 = null;
		$this->_vDealerPhone2 = null;
		$this->_vDealerwebURL = null;
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


	public function getiDealerId()
	{
		return $this->_iDealerId;
	}

	public function getvDealername()
	{
		return $this->_vDealername;
	}

	public function getvDealerAddress()
	{
		return $this->_vDealerAddress;
	}

	public function getvCity()
	{
		return $this->_vCity;
	}

	public function getvState()
	{
		return $this->_vState;
	}

	public function getvDealerPhone1()
	{
		return $this->_vDealerPhone1;
	}

	public function getvDealerPhone2()
	{
		return $this->_vDealerPhone2;
	}

	public function getvDealerwebURL()
	{
		return $this->_vDealerwebURL;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiDealerId($val)
	{
		$this->_iDealerId =  $val;
	}

	public function setvDealername($val)
	{
		$this->_vDealername =  $val;
	}

	public function setvDealerAddress($val)
	{
		$this->_vDealerAddress =  $val;
	}

	public function setvCity($val)
	{
		$this->_vCity =  $val;
	}

	public function setvState($val)
	{
		$this->_vState =  $val;
	}

	public function setvDealerPhone1($val)
	{
		$this->_vDealerPhone1 =  $val;
	}

	public function setvDealerPhone2($val)
	{
		$this->_vDealerPhone2 =  $val;
	}

	public function setvDealerwebURL($val)
	{
		$this->_vDealerwebURL =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM dealer WHERE iDealerId  = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iDealerId = $row[0]['iDealerId'];
		$this->_vDealername = $row[0]['vDealername'];
		$this->_vDealerAddress = $row[0]['vDealerAddress'];
		$this->_vCity = $row[0]['vCity'];
		$this->_vState = $row[0]['vState'];
		$this->_vDealerPhone1 = $row[0]['vDealerPhone1'];
		$this->_vDealerPhone2 = $row[0]['vDealerPhone2'];
		$this->_vDealerwebURL = $row[0]['vDealerwebURL'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM dealer WHERE iDealerId  = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iDealerId  = ""; // clear key for autoincrement

		$sql = "INSERT INTO dealer ( iDealerId,vDealername,vDealerAddress,vCity,vState,vDealerPhone1,vDealerPhone2,vDealerwebURL ) VALUES ( '".$this->_iDealerId."','".$this->_vDealername."','".$this->_vDealerAddress."','".$this->_vCity."','".$this->_vState."','".$this->_vDealerPhone1."','".$this->_vDealerPhone2."','".$this->_vDealerwebURL."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE dealer SET  iDealerId = '".$this->_iDealerId."' , vDealername = '".$this->_vDealername."' , vDealerAddress = '".$this->_vDealerAddress."' , vCity = '".$this->_vCity."' , vState = '".$this->_vState."' , vDealerPhone1 = '".$this->_vDealerPhone1."' , vDealerPhone2 = '".$this->_vDealerPhone2."' , vDealerwebURL = '".$this->_vDealerwebURL."'  WHERE iDealerId  = $id ";
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
