<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Inquiry
* GENERATION DATE:  16.07.2011
* CLASS FILE:       /home/www/Occupy/hbpanel/lib/classes/phpClass/generated_classes/Inquiry.Class.php5
* FOR MYSQL TABLE:  inquiry
* FOR MYSQL DB:     occupy
* -------------------------------------------------------
*
*/

class Inquiry
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iInquiryId 	;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iInquiryId;
	protected $_vPostedEmail;
	protected $_dPosteddate;
	protected $_iPropertyId;
	protected $_vDescription;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iInquiryId = null;
		$this->_vPostedEmail = null;
		$this->_dPosteddate = null;
		$this->_iPropertyId = null;
		$this->_vDescription = null;
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


	public function getiInquiryId()
	{
		return $this->_iInquiryId;
	}

	public function getvPostedEmail()
	{
		return $this->_vPostedEmail;
	}

	public function getdPosteddate()
	{
		return $this->_dPosteddate;
	}

	public function getiPropertyId()
	{
		return $this->_iPropertyId;
	}

	public function getvDescription()
	{
		return $this->_vDescription;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiInquiryId($val)
	{
		$this->_iInquiryId =  $val;
	}

	public function setvPostedEmail($val)
	{
		$this->_vPostedEmail =  $val;
	}

	public function setdPosteddate($val)
	{
		$this->_dPosteddate =  $val;
	}

	public function setiPropertyId($val)
	{
		$this->_iPropertyId =  $val;
	}

	public function setvDescription($val)
	{
		$this->_vDescription =  $val;
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
		$sql =  "SELECT * FROM inquiry WHERE iInquiryId 	 = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iInquiryId = $row[0]['iInquiryId'];
		$this->_vPostedEmail = $row[0]['vPostedEmail'];
		$this->_dPosteddate = $row[0]['dPosteddate'];
		$this->_iPropertyId = $row[0]['iPropertyId'];
		$this->_vDescription = $row[0]['vDescription'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM inquiry WHERE iInquiryId 	 = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iInquiryId 	 = ""; // clear key for autoincrement

		$sql = "INSERT INTO inquiry ( iInquiryId,vPostedEmail,dPosteddate,iPropertyId,vDescription,eStatus ) VALUES ( '".$this->_iInquiryId."','".$this->_vPostedEmail."','".$this->_dPosteddate."','".$this->_iPropertyId."','".$this->_vDescription."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE inquiry SET  iInquiryId = '".$this->_iInquiryId."' , vPostedEmail = '".$this->_vPostedEmail."' , dPosteddate = '".$this->_dPosteddate."' , iPropertyId = '".$this->_iPropertyId."' , vDescription = '".$this->_vDescription."' , eStatus = '".$this->_eStatus."'  WHERE iInquiryId 	 = $id ";
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
