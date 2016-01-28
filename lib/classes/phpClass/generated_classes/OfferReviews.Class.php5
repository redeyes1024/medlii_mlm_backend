<?php
/*
 *
* -------------------------------------------------------
* CLASSNAME:        OfferReviews
* GENERATION DATE:  07.07.2011
* CLASS FILE:       /home/www/DealFinder/hbpanel/lib/classes/phpClass/generated_classes/OfferReviews.Class.php5
* FOR MYSQL TABLE:  offer_reviews
* FOR MYSQL DB:     dealfinder
* -------------------------------------------------------
*
*/

class OfferReviews
{


	/**
	 *   @desc Variable Declaration with default value
	 */

	protected $iReviewsId;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_iReviewsId;
	protected $_iOfferClientId;
	protected $_iRestaurantId;
	protected $_iOfferId;
	protected $_iClientId;
	protected $_vReviewTitle;
	protected $_iOverallRating;
	protected $_iFoodRating;
	protected $_iAmbienceRating;
	protected $_iStaffRating;
	protected $_eRecommend;
	protected $_eHonored;
	protected $_fPrice;
	protected $_eBestFor;
	protected $_vDescription;
	protected $_dReviewDate;



	/**
	 *   @desc   CONSTRUCTOR METHOD
	 */

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_iReviewsId = null;
		$this->_iOfferClientId = null;
		$this->_iRestaurantId = null;
		$this->_iOfferId = null;
		$this->_iClientId = null;
		$this->_vReviewTitle = null;
		$this->_iOverallRating = null;
		$this->_iFoodRating = null;
		$this->_iAmbienceRating = null;
		$this->_iStaffRating = null;
		$this->_eRecommend = null;
		$this->_eHonored = null;
		$this->_fPrice = null;
		$this->_eBestFor = null;
		$this->_vDescription = null;
		$this->_dReviewDate = null;
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


	public function getiReviewsId()
	{
		return $this->_iReviewsId;
	}

	public function getiOfferClientId()
	{
		return $this->_iOfferClientId;
	}

	public function getiRestaurantId()
	{
		return $this->_iRestaurantId;
	}

	public function getiOfferId()
	{
		return $this->_iOfferId;
	}

	public function getiClientId()
	{
		return $this->_iClientId;
	}

	public function getvReviewTitle()
	{
		return $this->_vReviewTitle;
	}

	public function getiOverallRating()
	{
		return $this->_iOverallRating;
	}

	public function getiFoodRating()
	{
		return $this->_iFoodRating;
	}

	public function getiAmbienceRating()
	{
		return $this->_iAmbienceRating;
	}

	public function getiStaffRating()
	{
		return $this->_iStaffRating;
	}

	public function geteRecommend()
	{
		return $this->_eRecommend;
	}

	public function geteHonored()
	{
		return $this->_eHonored;
	}

	public function getfPrice()
	{
		return $this->_fPrice;
	}

	public function geteBestFor()
	{
		return $this->_eBestFor;
	}

	public function getvDescription()
	{
		return $this->_vDescription;
	}

	public function getdReviewDate()
	{
		return $this->_dReviewDate;
	}


	/**
	 *   @desc   SETTER METHODS
	 */


	public function setiReviewsId($val)
	{
		$this->_iReviewsId =  $val;
	}

	public function setiOfferClientId($val)
	{
		$this->_iOfferClientId =  $val;
	}

	public function setiRestaurantId($val)
	{
		$this->_iRestaurantId =  $val;
	}

	public function setiOfferId($val)
	{
		$this->_iOfferId =  $val;
	}

	public function setiClientId($val)
	{
		$this->_iClientId =  $val;
	}

	public function setvReviewTitle($val)
	{
		$this->_vReviewTitle =  $val;
	}

	public function setiOverallRating($val)
	{
		$this->_iOverallRating =  $val;
	}

	public function setiFoodRating($val)
	{
		$this->_iFoodRating =  $val;
	}

	public function setiAmbienceRating($val)
	{
		$this->_iAmbienceRating =  $val;
	}

	public function setiStaffRating($val)
	{
		$this->_iStaffRating =  $val;
	}

	public function seteRecommend($val)
	{
		$this->_eRecommend =  $val;
	}

	public function seteHonored($val)
	{
		$this->_eHonored =  $val;
	}

	public function setfPrice($val)
	{
		$this->_fPrice =  $val;
	}

	public function seteBestFor($val)
	{
		$this->_eBestFor =  $val;
	}

	public function setvDescription($val)
	{
		$this->_vDescription =  $val;
	}

	public function setdReviewDate($val)
	{
		$this->_dReviewDate =  $val;
	}


	/**
	 *   @desc   SELECT METHOD / LOAD
	 */

	function select($id)
	{
		$sql =  "SELECT * FROM offer_reviews WHERE iReviewsId = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_iReviewsId = $row[0]['iReviewsId'];
		$this->_iOfferClientId = $row[0]['iOfferClientId'];
		$this->_iRestaurantId = $row[0]['iRestaurantId'];
		$this->_iOfferId = $row[0]['iOfferId'];
		$this->_iClientId = $row[0]['iClientId'];
		$this->_vReviewTitle = $row[0]['vReviewTitle'];
		$this->_iOverallRating = $row[0]['iOverallRating'];
		$this->_iFoodRating = $row[0]['iFoodRating'];
		$this->_iAmbienceRating = $row[0]['iAmbienceRating'];
		$this->_iStaffRating = $row[0]['iStaffRating'];
		$this->_eRecommend = $row[0]['eRecommend'];
		$this->_eHonored = $row[0]['eHonored'];
		$this->_fPrice = $row[0]['fPrice'];
		$this->_eBestFor = $row[0]['eBestFor'];
		$this->_vDescription = $row[0]['vDescription'];
		$this->_dReviewDate = $row[0]['dReviewDate'];
	}


	/**
	 *   @desc   DELETE
	 */

	function delete($id)
	{
		$sql = "DELETE FROM offer_reviews WHERE iReviewsId = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	 *   @desc   INSERT
	 */

	function insert()
	{
		$this->iReviewsId = ""; // clear key for autoincrement

		$sql = "INSERT INTO offer_reviews ( iOfferClientId,iRestaurantId,iOfferId,iClientId,vReviewTitle,iOverallRating,iFoodRating,iAmbienceRating,iStaffRating,eRecommend,eHonored,fPrice,eBestFor,vDescription,dReviewDate ) VALUES ( '".$this->_iOfferClientId."','".$this->_iRestaurantId."','".$this->_iOfferId."','".$this->_iClientId."','".$this->_vReviewTitle."','".$this->_iOverallRating."','".$this->_iFoodRating."','".$this->_iAmbienceRating."','".$this->_iStaffRating."','".$this->_eRecommend."','".$this->_eHonored."','".$this->_fPrice."','".$this->_eBestFor."','".$this->_vDescription."','".$this->_dReviewDate."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	 *   @desc   UPDATE
	 */

	function update($id)
	{

		$sql = " UPDATE offer_reviews SET  iOfferClientId = '".$this->_iOfferClientId."' , iRestaurantId = '".$this->_iRestaurantId."' , iOfferId = '".$this->_iOfferId."' , iClientId = '".$this->_iClientId."' , vReviewTitle = '".$this->_vReviewTitle."' , iOverallRating = '".$this->_iOverallRating."' , iFoodRating = '".$this->_iFoodRating."' , iAmbienceRating = '".$this->_iAmbienceRating."' , iStaffRating = '".$this->_iStaffRating."' , eRecommend = '".$this->_eRecommend."' , eHonored = '".$this->_eHonored."' , fPrice = '".$this->_fPrice."' , eBestFor = '".$this->_eBestFor."' , vDescription = '".$this->_vDescription."' , dReviewDate = '".$this->_dReviewDate."'  WHERE iReviewsId = $id ";
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
