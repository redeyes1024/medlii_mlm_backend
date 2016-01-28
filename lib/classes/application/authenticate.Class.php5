<?php
class authenticate extends AppClass {
	/*
	 function startup( & $controller )
	 {
	// this code is going to be changed as per your requirement
	$this->controller = & $controller;
	//pr($this->params);

	if($this->controller->params['action'] != 'index' && $this->controller->params['action'] != 'login_action' )
	{
	if(!$this->checkValidAuth())
	{
	$url=$this->getLoginUrl();
	http_redirect($url);
	}
	else
	{
	$sess_auth_arr = $this->getAuthIdentity();
	$this->setVars($sess_auth_arr,"sess_auth_arr");
	}
	}

	}*/

	function getLoginUrl() {
		// based on request parameters you can change this function
		if(strpos($_SERVER['REQUEST_URI'],'backoffice/')!== false) {
			$url = SITE_URL.'admin/login';
		}
		else
			$url = SITE_URL.'login';
		return  $url;
		// place else if condtions for fornt end login url etc..
	}


	function checkValidAuth() {
		// based on request parameters you can change this function
		$flag = false;
		if($this->hasAuthIdentity()) {
			$sess_auth_arr = $this->getAuthIdentity();
			//$sess_auth_arr = array();
			//pr($sess_auth_arr);
			//pr($this->controller->cookie->read("cookie_keepmesignin"));exit;
			// do required authentication for admin, or other back office users
			if($sess_auth_arr['sess_eType'] == 'Admin' && $sess_auth_arr['sess_iAdminId'] > 0 && strstr(SITE_URL,'backoffice'))
				$flag =true;
			elseif($sess_auth_arr['sess_iUserId'] > 0 && $sess_auth_arr['sess_vFirstName'] != '')
			$flag =true;
			elseif($this->controller->cookie->checkKeepMeSignIn()) {
				$cookie_keepmesignin = $this->controller->cookie->getKeepMeSignIn();
				$this->setAuthIdentity($cookie_keepmesignin);
				$flag =true;
			}
			// place else if condtions for fornt end validtation etc..
		}
		return $flag;
	}


	function setAuthIdentity($arr) {
		$_SESSION['sess_auth'] = array();
		#pr($arr);exit;
		foreach($arr as $key => $val) {
			$_SESSION['sess_auth']['sess_'.$key] = $val;
		}
	}


	function hasAuthIdentity() {
		if(count($_SESSION['sess_auth']) > 0)
			return true;
		else
			return false;
	}


	function getAuthIdentity() {
		return $_SESSION['sess_auth'];
	}
}
?>
