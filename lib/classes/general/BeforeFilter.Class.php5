<?php 
class BeforeFilter {

	var $parent_allow_module_array = array("content");
	var $parent_disallow_module_array = array("login","register");
	var $Auth;
	var $params;
	// main constructor
	function __construct($params) {
		$this->params = $params;
		$authenticate = new authenticate();
		$this->Auth = $authenticate;
	}

	function BeforeFilter($child_allow_array, $child_disallow_array=""){
		global $site_url;
		$this->parent_allow_module_array = array_merge($child_allow_array,$this->parent_allow_module_array);
		$this->parent_allow_module_array = array_unique($this->parent_allow_module_array);
		if(!isset($child_disallow_array))
		{
			$child_disallow_array=array();
		}

		$this->parent_disallow_module_array = @array_merge($child_disallow_array,$this->parent_disallow_module_array);
		$this->parent_disallow_module_array = @array_unique($this->parent_disallow_module_array);

		if(@in_array($this->params['file'],$this->parent_disallow_module_array) && count($_SESSION['sess_auth'])>0)
		{
			http_redirects($site_url);
		}
	}

	// main distructor

	function __destruct() {
			
		//print "Destroying " . "\n";exit;
	}
	function is_authenticate($value)
	{
		global $GeneralObj, $site_url;

		if(!@in_array($this->params['file'],$this->parent_allow_module_array))
		{
			if($value===true)
			{
				$check_authnticate = $this->Auth->hasAuthIdentity();
				if(!$check_authnticate){
					$msg = "You are not logged in. You must log in to view this page.";
					$GeneralObj->setError_Message($msg,'err','login_err_id');
					http_redirects($site_url);
				}
			}
		}

	}
	function is_role_authenticate($array)
	{
		global $GeneralObj, $site_url;
		if(!@in_array($this->params['file'],$this->parent_allow_module_array))
		{
			$allow = false;
			if(count($array)>0)
			{
				$session_data = $this->Auth->getAuthIdentity();
				foreach($array as $key => $data)
				{
					if($session_data[$key]==$data)
					{
						$allow = true;
						break;
					}
				}
			}
			else
			{
				echo $allow=true;exit;
			}
			if($allow==false)
			{

				$arr = Array();
				$this->Auth->setAuthIdentity($arr);
				$msg = "Sorry! You are unauthorize to access this location.";
				$GeneralObj->setError_Message($msg,'err','login_err_id');
				if($array['sess_eUserType']=="Jobseeker")
					http_redirects($site_url."jobseeker_login");
				elseif($array['sess_eUserType']=="Recruiter")
				http_redirects($site_url."recruiter_login");
				else
					http_redirects($site_url);
			}
		}
			
	}

}
?>
