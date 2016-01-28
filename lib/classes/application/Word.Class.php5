<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Word
* GENERATION DATE:  23.12.2010
* CLASS FILE:       /home/mobile/iPhoneWS/IClubBar/hbpanel/lib/classes/phpClass/generated_classes/Word.Class.php5
* FOR MYSQL TABLE:  Word
* FOR MYSQL DB:     iclubbar
* -------------------------------------------------------
*
*/

class Word
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iWordID;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iWordID;
	protected $_iClubID;
	protected $_vWord;
	protected $_dPostDate;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iWordID = null;
		$this->_iClubID = null;
		$this->_vWord = null;
		$this->_dPostDate = null;
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


	public function getiWordID()
	{
		return $this->_iWordID;
	}

	public function getiClubID()
	{
		return $this->_iClubID;
	}

	public function getvWord()
	{
		return $this->_vWord;
	}

	public function getdPostDate()
	{
		return $this->_dPostDate;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiWordID($val)
	{
		$this->_iWordID =  $val;
	}

	public function setiClubID($val)
	{
		$this->_iClubID =  $val;
	}

	public function setvWord($val)
	{
		$this->_vWord =  $val;
	}

	public function setdPostDate($val)
	{
		$this->_dPostDate =  $val;
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
		$sql =  "SELECT * FROM Word WHERE iWordID = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iWordID = $row[0]['iWordID'];
		$this->_iClubID = $row[0]['iClubID'];
		$this->_vWord = $row[0]['vWord'];
		$this->_dPostDate = $row[0]['dPostDate'];
		$this->_eStatus = $row[0]['eStatus'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM Word WHERE iWordID = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iWordID = ""; // clear key for autoincrement

		$sql = "INSERT INTO Word ( iClubID,vWord,dPostDate,eStatus ) VALUES ( '".$this->_iClubID."','".$this->_vWord."','".$this->_dPostDate."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE Word SET  iClubID = '".$this->_iClubID."' , vWord = '".$this->_vWord."' , dPostDate = '".$this->_dPostDate."' , eStatus = '".$this->_eStatus."'  WHERE iWordID = $id ";
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
