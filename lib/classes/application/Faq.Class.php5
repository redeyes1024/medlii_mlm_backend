<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        Faq
* GENERATION DATE:  10.09.2010
* CLASS FILE:       /home/maintenance/bioscoopreview_new/lib/classes/phpClass/generated_classes/Faq.Class.php5
* FOR MYSQL TABLE:  faq
* FOR MYSQL DB:     bioscoopreview
* -------------------------------------------------------
*
*/

class Faq
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iFaqId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iFaqId;
	protected $_vQuestion;
	protected $_vAnswer;
	protected $_iOrderBy;
	protected $_eStatus;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iFaqId = null;
		$this->_vQuestion = null;
		$this->_vAnswer = null;
		$this->_iOrderBy = null;
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


	public function getiFaqId()
	{
		return $this->_iFaqId;
	}

	public function getvQuestion()
	{
		return $this->_vQuestion;
	}

	public function getvAnswer()
	{
		return $this->_vAnswer;
	}

	public function getiOrderBy()
	{
		return $this->_iOrderBy;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiFaqId($val)
	{
		$this->_iFaqId =  $val;
	}

	public function setvQuestion($val)
	{
		$this->_vQuestion =  $val;
	}

	public function setvAnswer($val)
	{
		$this->_vAnswer =  $val;
	}

	public function setiOrderBy($val)
	{
		$this->_iOrderBy =  $val;
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
		$sql =  "SELECT * FROM faq WHERE iFaqId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iFaqId = $row[0]['iFaqId'];
		$this->_vQuestion = $row[0]['vQuestion'];
		$this->_vAnswer = $row[0]['vAnswer'];
		$this->_iOrderBy = $row[0]['iOrderBy'];
		$this->_eStatus = $row[0]['eStatus'];
	}

	function getAllFaq()
	{
		$sql =  "SELECT * FROM faq WHERE eStatus = 'Active' ORDER BY iOrderBy";
		$row =  $this->_obj->select($sql);
		return $row;

	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM faq WHERE iFaqId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iFaqId = ""; // clear key for autoincrement

		$sql = "INSERT INTO faq ( vQuestion,vAnswer,iOrderBy,eStatus ) VALUES ( '".$this->_vQuestion."','".$this->_vAnswer."','".$this->_iOrderBy."','".$this->_eStatus."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE faq SET  vQuestion = '".$this->_vQuestion."' , vAnswer = '".$this->_vAnswer."' , iOrderBy = '".$this->_iOrderBy."' , eStatus = '".$this->_eStatus."'  WHERE iFaqId = $id ";
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
		$method_notArr=Array('getAllVar', 'getAllFaq');
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
