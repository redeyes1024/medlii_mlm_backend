<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        recipe
* GENERATION DATE:  05.05.2011
* CLASS FILE:       /home/mobile/iPhoneWS/Kitchen/hbpanel/lib/classes/phpClass/generated_classes/recipe.Class.php5
* FOR MYSQL TABLE:  recipes
* FOR MYSQL DB:     theculinaryexchange
* -------------------------------------------------------
*
*/

class recipe
{


	/**
	*   @desc Variable Declaration with default value
	*/

	protected $recipe_id;   // KEY ATTR. WITH AUTOINCREMENT

	protected $_recipe_id;
	protected $_requested_id;
	protected $_recipe;
	protected $_description;
	protected $_yield;
	protected $_ingredients;
	protected $_directions;
	protected $_garnish_with;
	protected $_serve_in;
	protected $_authors_notes;
	protected $_posted_by;
	protected $_posted_on;
	protected $_type;
	protected $_approved;
	protected $_by_admin;



	/**
	*   @desc   CONSTRUCTOR METHOD
	*/

	function __construct()
	{
		global $obj;
		$this->_obj = $obj;

		$this->_recipe_id = null;
		$this->_requested_id = null;
		$this->_recipe = null;
		$this->_description = null;
		$this->_yield = null;
		$this->_ingredients = null;
		$this->_directions = null;
		$this->_garnish_with = null;
		$this->_serve_in = null;
		$this->_authors_notes = null;
		$this->_posted_by = null;
		$this->_posted_on = null;
		$this->_type = null;
		$this->_approved = null;
		$this->_by_admin = null;
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


	public function getrecipe_id()
	{
		return $this->_recipe_id;
	}

	public function getrequested_id()
	{
		return $this->_requested_id;
	}

	public function getrecipe()
	{
		return $this->_recipe;
	}

	public function getdescription()
	{
		return $this->_description;
	}

	public function getyield()
	{
		return $this->_yield;
	}

	public function getingredients()
	{
		return $this->_ingredients;
	}

	public function getdirections()
	{
		return $this->_directions;
	}

	public function getgarnish_with()
	{
		return $this->_garnish_with;
	}

	public function getserve_in()
	{
		return $this->_serve_in;
	}

	public function getauthors_notes()
	{
		return $this->_authors_notes;
	}

	public function getposted_by()
	{
		return $this->_posted_by;
	}

	public function getposted_on()
	{
		return $this->_posted_on;
	}

	public function gettype()
	{
		return $this->_type;
	}

	public function getapproved()
	{
		return $this->_approved;
	}

	public function getby_admin()
	{
		return $this->_by_admin;
	}


	/**
	*   @desc   SETTER METHODS
	*/


	public function setrecipe_id($val)
	{
		$this->_recipe_id =  $val;
	}

	public function setrequested_id($val)
	{
		$this->_requested_id =  $val;
	}

	public function setrecipe($val)
	{
		$this->_recipe =  $val;
	}

	public function setdescription($val)
	{
		$this->_description =  $val;
	}

	public function setyield($val)
	{
		$this->_yield =  $val;
	}

	public function setingredients($val)
	{
		$this->_ingredients =  $val;
	}

	public function setdirections($val)
	{
		$this->_directions =  $val;
	}

	public function setgarnish_with($val)
	{
		$this->_garnish_with =  $val;
	}

	public function setserve_in($val)
	{
		$this->_serve_in =  $val;
	}

	public function setauthors_notes($val)
	{
		$this->_authors_notes =  $val;
	}

	public function setposted_by($val)
	{
		$this->_posted_by =  $val;
	}

	public function setposted_on($val)
	{
		$this->_posted_on =  $val;
	}

	public function settype($val)
	{
		$this->_type =  $val;
	}

	public function setapproved($val)
	{
		$this->_approved =  $val;
	}

	public function setby_admin($val)
	{
		$this->_by_admin =  $val;
	}


	/**
	*   @desc   SELECT METHOD / LOAD
	*/

	function select($id)
	{
		$sql =  "SELECT * FROM recipes WHERE recipe_id = ".$id;
		$row =  $this->_obj->select($sql);

		$this->_recipe_id = $row[0]['recipe_id'];
		$this->_requested_id = $row[0]['requested_id'];
		$this->_recipe = $row[0]['recipe'];
		$this->_description = $row[0]['description'];
		$this->_yield = $row[0]['yield'];
		$this->_ingredients = $row[0]['ingredients'];
		$this->_directions = $row[0]['directions'];
		$this->_garnish_with = $row[0]['garnish_with'];
		$this->_serve_in = $row[0]['serve_in'];
		$this->_authors_notes = $row[0]['authors_notes'];
		$this->_posted_by = $row[0]['posted_by'];
		$this->_posted_on = $row[0]['posted_on'];
		$this->_type = $row[0]['type'];
		$this->_approved = $row[0]['approved'];
		$this->_by_admin = $row[0]['by_admin'];
	}


	/**
	*   @desc   DELETE
	*/

	function delete($id)
	{
		$sql = "DELETE FROM recipes WHERE recipe_id = ".$id;
		$result = $this->_obj->sql_query($sql);
	}


	/**
	*   @desc   INSERT
	*/

	function insert()
	{
		$this->recipe_id = ""; // clear key for autoincrement

		$sql = "INSERT INTO recipes ( requested_id,recipe,description,yield,ingredients,directions,garnish_with,serve_in,authors_notes,posted_by,posted_on,type,approved,by_admin ) VALUES ( '".$this->_requested_id."','".$this->_recipe."','".$this->_description."','".$this->_yield."','".$this->_ingredients."','".$this->_directions."','".$this->_garnish_with."','".$this->_serve_in."','".$this->_authors_notes."','".$this->_posted_by."','".$this->_posted_on."','".$this->_type."','".$this->_approved."','".$this->_by_admin."' )";
		$result = $this->_obj->insert($sql);
		return $result;
	}


	/**
	*   @desc   UPDATE
	*/

	function update($id)
	{

		$sql = " UPDATE recipes SET  requested_id = '".$this->_requested_id."' , recipe = '".$this->_recipe."' , description = '".$this->_description."' , yield = '".$this->_yield."' , ingredients = '".$this->_ingredients."' , directions = '".$this->_directions."' , garnish_with = '".$this->_garnish_with."' , serve_in = '".$this->_serve_in."' , authors_notes = '".$this->_authors_notes."' , posted_by = '".$this->_posted_by."' , posted_on = '".$this->_posted_on."' , type = '".$this->_type."' , approved = '".$this->_approved."' , by_admin = '".$this->_by_admin."'  WHERE recipe_id = $id ";
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