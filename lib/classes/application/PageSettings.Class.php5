<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        PageSettings
* GENERATION DATE:  01.09.2010
* CLASS FILE:       /home/maintenance/bioscoopreview_new/lib/classes/phpClass/generated_classes/PageSettings.Class.php5
* FOR MYSQL TABLE:  page_settings
* FOR MYSQL DB:     bioscoopreview
* -------------------------------------------------------
*
*/

class PageSettings
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iPageId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iPageId;
	protected $_vPageTitle;
	protected $_vPageCode;
	protected $_tMetaTitle;
	protected $_tMetaKeyword;
	protected $_tMetaDesc;
	protected $_vFileName;
	protected $_vFilePath;
	protected $_iOrderBy;
	protected $_eStatus;
	protected $_tContents;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iPageId = null;
		$this->_vPageTitle = null;
		$this->_vPageCode = null;
		$this->_tMetaTitle = null;
		$this->_tMetaKeyword = null;
		$this->_tMetaDesc = null;
		$this->_vFileName = null;
		$this->_vFilePath = null;
		$this->_iOrderBy = null;
		$this->_eStatus = null;
		$this->_tContents = null;
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


	public function getiPageId()
	{
		return $this->_iPageId;
	}

	public function getvPageTitle()
	{
		return $this->_vPageTitle;
	}

	public function getvPageCode()
	{
		return $this->_vPageCode;
	}

	public function gettMetaTitle()
	{
		return $this->_tMetaTitle;
	}

	public function gettMetaKeyword()
	{
		return $this->_tMetaKeyword;
	}

	public function gettMetaDesc()
	{
		return $this->_tMetaDesc;
	}

	public function getvFileName()
	{
		return $this->_vFileName;
	}

	public function getvFilePath()
	{
		return $this->_vFilePath;
	}

	public function getiOrderBy()
	{
		return $this->_iOrderBy;
	}

	public function geteStatus()
	{
		return $this->_eStatus;
	}

	public function gettContents()
	{
		return $this->_tContents;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiPageId($val)
	{
		$this->_iPageId =  $val;
	}

	public function setvPageTitle($val)
	{
		$this->_vPageTitle =  $val;
	}

	public function setvPageCode($val)
	{
		$this->_vPageCode =  $val;
	}

	public function settMetaTitle($val)
	{
		$this->_tMetaTitle =  $val;
	}

	public function settMetaKeyword($val)
	{
		$this->_tMetaKeyword =  $val;
	}

	public function settMetaDesc($val)
	{
		$this->_tMetaDesc =  $val;
	}

	public function setvFileName($val)
	{
		$this->_vFileName =  $val;
	}

	public function setvFilePath($val)
	{
		$this->_vFilePath =  $val;
	}

	public function setiOrderBy($val)
	{
		$this->_iOrderBy =  $val;
	}

	public function seteStatus($val)
	{
		$this->_eStatus =  $val;
	}

	public function settContents($val)
	{
		$this->_tContents =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM page_settings WHERE iPageId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iPageId = $row[0]['iPageId'];
		$this->_vPageTitle = $row[0]['vPageTitle'];
		$this->_vPageCode = $row[0]['vPageCode'];
		$this->_tMetaTitle = $row[0]['tMetaTitle'];
		$this->_tMetaKeyword = $row[0]['tMetaKeyword'];
		$this->_tMetaDesc = $row[0]['tMetaDesc'];
		$this->_vFileName = $row[0]['vFileName'];
		$this->_vFilePath = $row[0]['vFilePath'];
		$this->_iOrderBy = $row[0]['iOrderBy'];
		$this->_eStatus = $row[0]['eStatus'];
		$this->_tContents = $row[0]['tContents'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM page_settings WHERE iPageId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iPageId = ""; // clear key for autoincrement

		$sql = "INSERT INTO page_settings ( vPageTitle,vPageCode,tMetaTitle,tMetaKeyword,tMetaDesc,vFileName,vFilePath,iOrderBy,eStatus,tContents ) VALUES ( '".$this->_vPageTitle."','".$this->_vPageCode."','".$this->_tMetaTitle."','".$this->_tMetaKeyword."','".$this->_tMetaDesc."','".$this->_vFileName."','".$this->_vFilePath."','".$this->_iOrderBy."','".$this->_eStatus."','".$this->_tContents."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE page_settings SET  vPageTitle = '".$this->_vPageTitle."' , vPageCode = '".$this->_vPageCode."' , tMetaTitle = '".$this->_tMetaTitle."' , tMetaKeyword = '".$this->_tMetaKeyword."' , tMetaDesc = '".$this->_tMetaDesc."' , vFileName = '".$this->_vFileName."' , vFilePath = '".$this->_vFilePath."' , iOrderBy = '".$this->_iOrderBy."' , eStatus = '".$this->_eStatus."' , tContents = '".$this->_tContents."'  WHERE iPageId = $id ";
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
		$method_notArr=Array('getAllVar', 'get_page_by_code');
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

	public function get_page_by_code($code) {
		$sql_select = 'SELECT * FROM page_settings WHERE vPageCode="'.$code.'" AND eStatus ="Active" ';
		$db_select =  $this->_obj->select($sql_select);
		return $db_select;
	}

	public function write_content($iPageId, $content) {
		global $site_path;
		$this->select($iPageId);

		$fp = @fopen($site_path.$this->getvFilePath().$this->getvFileName(), 'w');
		if ($fp) {
			fwrite($fp, $content);
		}
		fclose($fp);

	}
}

?>
