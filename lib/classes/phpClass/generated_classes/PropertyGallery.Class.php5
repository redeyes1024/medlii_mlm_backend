<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        PropertyGallery
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/Occupy/hbpanel/lib/classes/phpClass/generated_classes/PropertyGallery.Class.php5
* FOR MYSQL TABLE:  propertygallery
* FOR MYSQL DB:     occupy
* -------------------------------------------------------
*
*/

class PropertyGallery
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iGalleryId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iGalleryId;
	protected $_iPropertyId;
	protected $_vImage;
	protected $_eFloormap;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iGalleryId = null;
		$this->_iPropertyId = null;
		$this->_vImage = null;
		$this->_eFloormap = null;
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

	public function getiPropertyId()
	{
		return $this->_iPropertyId;
	}

	public function getvImage()
	{
		return $this->_vImage;
	}

	public function geteFloormap()
	{
		return $this->_eFloormap;
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

	public function setiPropertyId($val)
	{
		$this->_iPropertyId =  $val;
	}

	public function setvImage($val)
	{
		$this->_vImage =  $val;
	}

	public function seteFloormap($val)
	{
		$this->_eFloormap =  $val;
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
		$sql =  "SELECT * FROM propertygallery WHERE iGalleryId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iGalleryId = $row[0]['iGalleryId'];
		$this->_iPropertyId = $row[0]['iPropertyId'];
		$this->_vImage = $row[0]['vImage'];
		$this->_eFloormap = $row[0]['eFloormap'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM propertygallery WHERE iGalleryId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iGalleryId = ""; // clear key for autoincrement

		$sql = "INSERT INTO propertygallery ( iPropertyId,vImage,eFloormap,eStatus ) VALUES ( '".$this->_iPropertyId."','".$this->_vImage."','".$this->_eFloormap."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE propertygallery SET  iPropertyId = '".$this->_iPropertyId."' , vImage = '".$this->_vImage."' , eFloormap = '".$this->_eFloormap."' , eStatus = '".$this->_eStatus."'  WHERE iGalleryId = $id ";
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
