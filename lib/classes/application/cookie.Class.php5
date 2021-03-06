<?php 
/**
 * Cookie.php
 *
 * Cookie Component for HB Skel
 */

class Cookie extends AppClass {
	/**
	 * @var int $default_cookie_life
	 * Default time that a cookie will last for if not specified (604800 = 1 week)
	 */
	var $default_cookie_life = 604800;		// one week

	/**
	 * @var boolean $use_mcrypt
	 * Encrypt cookie data using the mcrypt extension, MCrypt will use the
	 * CAKE_SESSION_STRING constant as the key.
	 */
	var $use_mcrypt = true;
	var $params;

	var $cake_checksum_key = "DYhG93b0qyJfIxfs2guVoUubWwvniR2G0FgaC9me";
	/**
	 * Constructor.
	 * Check that mCrypt is present, if not disable it.
	 *
	 *	@return Void.
	 */
	function __construct($params) {
		//parent::__construct();

		// Over-ride mcrypt choice if module not avaliable.
		if ($this->use_mcrypt && !extension_loaded('mcrypt')) {
			$this->use_mcrypt = false;
		}

		$this->params = $params;
	}


	/**
	 * Gets called immediatley after beforeFilter() by the Controller.
	 * empty.
	 *
	 *	@param object $controller		Reference to Controller.
	 *	@return Void
	 */



	/**
	 * Returns the variable $key from the cookie specified by $cookie.  If
	 * you do not specify $key, the whole array will be returned.
	 *
	 *	@param string $cookie
	 *	@param string $key
	 *	@return mixed				false on failure.  Array / String on success.
	 */
	function read($cookie, $key = null) {
		if (!$this->valid($cookie))
			return false;
		// Read in the cookie from $_COOKIE
		$cookie = $_COOKIE[$cookie];

		// Unpack the stored cookie, error if unpacking fails.
		if (!$cookie_array = $this->__unpackCookie($cookie)) {
			return false;
		}

		if (!is_array($cookie_array)) {
			$error = __METHOD__." cookie: {$cookie} was not a serialized array.";
			trigger_error($error);
		}

		// Extract key.
		if ($key) {
			if (!isset($cookie_array[$key]))
				return false;

			return $cookie_array[$key];
		}

		// Return whole unserialised array.
		else {
			return $cookie_array;
		}
	}


	/**
	 * Writes the array specified by $data to the cookie specified by $cookie
	 * which will expire after $expires (Which can either be time as a string
	 * or in seconds).
	 *
	 *	@param string $cookie
	 *	@param array $data
	 *	@param string $expires
	 *	@return boolean
	 */
	function write($cookie, $data, $expires = null) {
		if (!is_array($data)) {
			$error = __METHOD__ . " expects an array.";
			trigger_error($error);
		}
		$expires = $this->__getCookieExpires($expires);
		$contents = $this->__packCookie($data, $expires);

		if (!setcookie($cookie, $contents, $expires, '/')) {
			trigger_error(__METHOD__." failed to write cookie: {$cookie}");
			return false;
		}
		return true;
	}


	/**
	 * Deletes the cookie specified by $cookie
	 *
	 *	@param string $cookie
	 *	@return boolean
	 */
	function delete($cookie) {
		if (!$this->valid($cookie))
			return false;

		if (!setcookie($cookie, '', time()-1, '/')) {
			trigger_error(__METHOD__." failed to delete cookie {$cookie}");
			return false;
		}

		return true;
	}


	/**
	 * Delete the cookie specified by $cookie
	 *
	 *	@param string $cookie
	 *	@return boolean
	 */
	function del($cookie) {
		return $this->delete($cookie);
	}


	/**
	 * Returns true if the cookie specified by $cookie has been set.
	 *
	 *	@param string $cookie
	 *	@return boolean
	 */
	function valid($cookie) {
		return (isset($_COOKIE[$cookie]));
	}


	/**
	 * Private function to get the exiration value when setting a cookie.
	 * $value can either be expressed as the number of seconds into the future,
	 * or as a string that will be parsed via strtotime.
	 *
	 *	@param mixed $value
	 *	@return mixed			unix_timestamp on success, false on failure.
	 */
	function __getCookieExpires($value = null) {
		if (!$value)
			$expires = time() + $this->default_cookie_life;

		else if (is_numeric($value)) {
			$expires = time() + $value;
		}

		else {
			$time = strtotime($value);
			if ($time != false && is_numeric($time) && $time > time()) {
				$expires = $time;
			}

			else {
				trigger_error(__METHOD__ . " failed to parse expires val: {$value}", LOG_DEBUG);
				return false;
			}
		}

		return $expires;
	}


	/**
	 * Encodes a mixed value specified by $data into a string value which can
	 * be stored safely in a cookie.  This function also adds checksumming,
	 * expiration date validtion (as specified by $expires) and, if mcrypt is
	 * enabled, encryption.  Cookie's packed with __packCookie() can be unpacked
	 * by calling __unpackCookie() on them.
	 *
	 *	@param mixed $data		Data to store in the cookie (will be serialized)
	 *	@param int $expires		Date (unix timestamp) that the cookie is set to expire.
	 *	@return string			base64 encoded, seralized data safe to store in a cookie.
	 */
	function __packCookie($data, $expires) {
		if (!is_numeric($expires) || $expires < time()) {
			trigger_error(__METHOD__.' $expires must be a valid timestamp not in the past.');
		}

		$serialized 		= serialize(array($data, $expires));
		$checksum 			= md5($serialized . $this->cake_checksum_key);
		$cookie_data		= serialize(array($serialized, $checksum));

		if ($this->use_mcrypt) {
			$cookie_data = $this->__encrypt($cookie_data);
		}

		// base64 encode for safe storage in US-ASCII Cookie format
		return base64_encode($cookie_data);
	}


	/**
	 * Unpacks the value of a cookie specified by $cookie into an array.  If
	 * the cookie data is not stored as expected it will return false.
	 *
	 *	@param string $cookie	Serialised cookie data.
	 *	@return array			array($data, $checksum);
	 *
	 */
	function __unpackCookie($cookie) {
		// base64 decode.
		$data = base64_decode($cookie);

		// decrypt the cookie
		if ($this->use_mcrypt) {
			$data = $this->__decrypt($data);
		}

		$checksum_array = unserialize($data);

		// $checksum_array[0] (the data) should match the hash we stored in
		if (md5($checksum_array[0] . $this->cake_checksum_key) !== $checksum_array[1]) {
			$msg = __METHOD__." cookie failed checksum, possible tampering.";
			//$this->log($msg);
			debug($msg);
			return false;
		}

		// Unserialise the checksumed data, now verify the timestamp.
		$expires_array = unserialize($checksum_array[0]);

		if (!is_numeric($expires_array[1]) || $expires_array[1] < time()) {
			$msg = __METHOD__." cookie should have expired, possible tampering.";
			return false;
		}
		return $expires_array[0];
	}


	/**
	 * Encrypt's a plain text string value specified by $plain_text into an
	 * encrypted string using the mcrypt encryption method specified by
	 * $method.
	 *
	 *	@param string $plain_text
	 *	@param string $method
	 *	@return string
	 *	@trigger_error 				on missing MCrypt Module.
	 */
	function __encrypt($plain_text, $method='rijndael-256') {
		// Check the method requested exists
		if (!in_array($method, mcrypt_list_algorithms())) {
			trigger_error(__METHOD__." requested encryption method {$method} is"
			. " not supported by your MCrypt library.");
		}

		$td = mcrypt_module_open($method, '', 'ecb', '');
		$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		$key_length = mcrypt_enc_get_key_size($td);

		// Chop the key to the correct size.
		$key = substr(md5($this->cake_checksum_key), 0, $key_length);

		mcrypt_generic_init($td, $key, $iv);
		$encrypted = mcrypt_generic($td, $plain_text);

		// Tear down.
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);

		return $encrypted;
	}


	/**
	 * Decryptes an encrypted string specified by $encrypted using the mcrypt
	 * module specified by $method
	 *
	 *	@param string $encrypted
	 *	@param string $method
	 *	@return string					Decrypted plain text.
	 */
	function __decrypt($encrypted, $method='rijndael-256') {
		$td = mcrypt_module_open($method, '', 'ecb', '');
		$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		$key_length = mcrypt_enc_get_key_size($td);

		// Chop the key to the correct size.
		$key = substr(md5($this->cake_checksum_key), 0, $key_length);

		mcrypt_generic_init($td, $key, $iv);
		return rtrim(mdecrypt_generic($td, $encrypted));
	}


	/* addded by nilay soni */
	function setRememberMe() {

		if($this->params['form']['vEmail']!="")
		{
			if($this->params['form']['rememberme']=='1') {
				$data = array(
						"jrememberme" => "checked",
						"jobseeker" => $this->params['form']['vEmail'],
						"jpassword" => $this->params['form']['vPassword']
				);
				$this->write("cookie_rememberme",$data);
			}
		}
		else
		{
			if($this->params['form']['rememberme']=='1') {
				$data = array(
						"rrememberme" => "checked",
						"recruiter" => $this->params['form']['vEmail1'],
						"rpassword" => $this->params['form']['vPassword1']
				);
				$this->write("cookie_rememberme",$data);
			}
		}
	}
	function setAutoLogin() {
		$data = array(
				"autologin" => "checked",
				"vUserName" => $this->params['vUserName'],
				"vPassword" => $this->params['vPassword'],
				"mode"      =>   "Login"
		);
		$this->write("cookie_autologin",$data);
	}
	function checkAutoLogin() {
		$cookie_autologin = $this->read('cookie_autologin');
		//pr($cookie_autologin);
		if(!empty($cookie_autologin)) {
			$this->params['vUserName']=$cookie_autologin['vUserName'];
			$this->params['vPassword']=$cookie_autologin['vPassword'];
			$this->params['mode']=$cookie_autologin['mode'];
			return true;
		}
	}
	function SetKeepMeSignIn($arr) {
		foreach($arr as $key => $data) {
			$cookie_data[$key]=$data;
		}
		$this->write("cookie_keepmesignin",$cookie_data);
	}
	function checkKeepMeSignIn() {
		$cookie_keepmesignin = $this->read('cookie_keepmesignin');
		//pr(cookie_keepmesignin);
		if(!empty($cookie_keepmesignin)) {
			$this->params['vUserName']=$cookie_keepmesignin['username'];
			$this->params['vPassword']=$cookie_keepmesignin['password'];
			$this->params['mode']=$cookie_keepmesignin['mode'];
			return true;
		}
	}
	function getKeepMeSignIn() {
		return $cookie_keepmesignin = $this->read('cookie_keepmesignin');
	}
}
?>
