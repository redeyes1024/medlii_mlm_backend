<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Gallery
* GENERATION DATE:  08.08.2011
* CLASS FILE:       /home/www/Mobilease/hbpanel/lib/classes/phpClass/generated_classes/Gallery.Class.php5
* FOR MYSQL TABLE:  gallery
* FOR MYSQL DB:     mobilease
* -------------------------------------------------------
*
*/

class Gallery
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iGalleryId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iGalleryId;
	protected $_iVehicleId;
	protected $_vImage;
	protected $_eIsdefault;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iGalleryId = null;
		$this->_iVehicleId = null;
		$this->_vImage = null;
		$this->_eIsdefault = null;
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


	public function getiGalleryId()
	{
		return $this->_iGalleryId;
	}

	public function getiVehicleId()
	{
		return $this->_iVehicleId;
	}

	public function getvImage()
	{
		return $this->_vImage;
	}

	public function geteIsdefault()
	{
		return $this->_eIsdefault;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiGalleryId($val)
	{
		$this->_iGalleryId =  $val;
	}

	public function setiVehicleId($val)
	{
		$this->_iVehicleId =  $val;
	}

	public function setvImage($val)
	{
		$this->_vImage =  $val;
	}

	public function seteIsdefault($val)
	{
		$this->_eIsdefault =  $val;
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
		$sql =  "SELECT * FROM gallery WHERE iGalleryId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iGalleryId = $row[0]['iGalleryId'];
		$this->_iVehicleId = $row[0]['iVehicleId'];
		$this->_vImage = $row[0]['vImage'];
		$this->_eIsdefault = $row[0]['eIsdefault'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM gallery WHERE iGalleryId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iGalleryId = ""; // clear key for autoincrement

		$sql = "INSERT INTO gallery ( iVehicleId,vImage,eIsdefault,eStatus ) VALUES ( '".$this->_iVehicleId."','".$this->_vImage."','".$this->_eIsdefault."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE gallery SET  iVehicleId = '".$this->_iVehicleId."' , vImage = '".$this->_vImage."' , eIsdefault = '".$this->_eIsdefault."' , eStatus = '".$this->_eStatus."'  WHERE iGalleryId = $id ";
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
