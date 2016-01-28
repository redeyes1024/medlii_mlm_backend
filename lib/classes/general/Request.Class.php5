<?php

/**
 * CLASS FILE:       /home/www1/calms/lib/classes/general/Request.Class.php5
 * @desc 	Function files for server variables
 * @since	19.8.2006
 * @author	Zangs (www.hiddenbrains.com)
 */

define('POST_METHOD', 'POST');
define('GET_METHOD', 'GET');

// see HttpServletRequest
class Request {
	public $attributes = null;
	public $parameters = null;
	public $files = null;
	public $method = null;
	public $cookies = null;

	/**
	 * Do not instantiate directly.
	 */
	function Request(&$parameters) {
		if ($GLOBALS['getInstanceRequest']) {
			register_shutdown_function(array(&$this, '_doShutdown'));
			$this->attributes = array();

			if (is_array($parameters)) {
				$this->parameters =& $parameters;
			}

			$this->method = $_SERVER['REQUEST_METHOD'];
			$this->cookies = $_COOKIE;
			$this->files = $_FILES;

			unset($GLOBALS['getInstanceRequest']);
		} else {
			require_once(dirname(__FILE__) . '/Util.class.php5');
			Util::triggerCannotInstantiateError($this);
		}


	}


	function _doShutdown() {
		unset($this);
	}


	/**
	 * Usage: $request =& Request::getInstance();
	 * Note: It's important to return this value as a reference and to use the =& operator to set the variable to the reference.
	 */
	function &getInstance() {
		static $thisRequest;

		if (!isset($thisRequest)) {
			$GLOBALS['getInstanceRequest'] = true;

			$method = '$_' . $_SERVER['REQUEST_METHOD'];
			eval('$params' . " =& $method;");

			$thisRequest = new Request($params);
		}

		return $thisRequest;
	}


	function &getAttribute($name) {
		if (isset($this->attributes[$name])) {
			return $this->attributes[$name];
		}

		return null;
	}


	function setAttribute($name, $value) {
		$this->attributes[$name] = $value;
	}


	function addAttribute($name, $value) {
		$this->setAttribute($name, $value);
	}


	function getFiles() {
		return $this->files;
	}


	function getFile($file) {
		if (is_array($this->files)) {
			return $this->files[$file];
		}
	}

	// TODO handle file array info

	function getCookies() {
		return $this->cookies;
	}


	function getCookie($name) {
		return $this->cookies[$name];
	}


	function setCookie($name, $value=null, $expire=null, $path=null, $domain=null, $secure=null) {
		$this->cookies[$name] = $value;
		return setcookie($name, $value, $expire, $path, $domain, $secure);
	}


	/**
	 * expire a cookie
	 */
	function unsetCookie($name) {
		setcookie($name, null, time() - 3600);
	}


	function &getBoolParameter($name) {
		return (TRUE_VALUE == $this->parameters[$name]);
	}


	function &getParameter($name) {
		if (isset($this->parameters[$name])) {
			if(is_array($this->parameters[$name])){
				$param = $this->parameters[$name];

			} else {
				$param = trim($this->parameters[$name]);

				if (get_magic_quotes_gpc()) {
					$param = stripslashes($param);
				}
			}

			return $param;
		}

		return null;
	}


	function setParameter($name, $value) {
		if (null == $value) {
			unset($this->parameters[$name]);
		} else {
			$this->parameters[$name] = $value;

			$_REQUEST[$name] = $value;
			$method = '$_' . $_SERVER['REQUEST_METHOD'];
			if (is_array($value)) {
				//	$temp = $method . '[\'' . $name . '\'] = ' . $value . ';';
			} else {
				$temp = $method . '[\'' . $name . '\'] = \'' . $value . '\';';
			}

			eval($temp);
		}
	}


	function setParameters($parameters) {
		$this->parameters = $parameters;
	}


	function addParameter($name, $value) {
		$this->setParameter($name, $value);
	}


	function &getParameters() {
		return $this->parameters;
	}


	function removeParameter($name) {
		if (isset($this->parameters[$name])) {
			unset($this->parameters[$name]);
		}
	}


	function removeAllParameters() {
		unset($this->parameters);
	}


	function removeAttribute($name) {
		if (isset($this->attributes[$name])) {
			unset($this->attributes[$name]);
		}
	}


	function getMethod() {
		return $this->method;
	}


	function setMethod($method) {
		$this->method = $method;

	}


	function getParameterString() {
		if (is_array($this->parameters)) {
			$ret = null;

			foreach($this->parameters as $key => $value) {
				if ('x' == $key || 'y' == $key) {
					continue;
				}

				$ret .= "$key=$value&";
			}

			if (isset($ret)) {
				// strip off last &
				$pattern = '/&$/';
				$replacement = null;
				$ret = preg_replace($pattern, $replacement, $ret);
			}

			return $ret;
		}
	}
}

?>