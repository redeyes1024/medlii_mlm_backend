<?php

/*
 * To change this template, choose Tools | Templates
* and open the template in the editor.
*/

/**
 * Description of BasicDBClass
 *
 * @author redeyes1024
 */
abstract class BasicDBClass {

	function __construct($id = null) {

		global $obj;

		$this->_obj = $obj;
		if ($id) {
			$this->select($id);
		}
	}

	function __destruct() {
		unset($this->_obj);
	}

	function setAllVar() {
		$classVars = get_class_vars(get_class($this));
		foreach ($_REQUEST AS $key => $value) {
			$methodName = "set" . $key;
			if (array_key_exists($key, $classVars)) {
				$this->$methodName($value);
			}
		}
	}

	function getAllVar() {
		$classVars = get_class_vars(get_class($this));
		foreach ($classVars as $varName => $value) {
			if (substr($varName, 0, 1) != '_') {
				$methodName = 'get' . $varName;
				global ${
					$varName};
					${
						$varName} = $this->$methodName();
			}
		}
	}

	public function __call($name, $args) {
		$methodPrefix = substr($name, 0, 3);
		$methodProperty = substr($name, 3);
		switch ($methodPrefix) {
			case 'get':
				return $this->$methodProperty;
				break;
			case 'set':
				if (count($args) == 1) {
					$this->$methodProperty = $args[0];
				} else {
					throw new Exception("Default setter support 1 argument!");
				}
				break;
			default :
				throw new Exception("Magic method doesn't support that prefix:$methodProperty");
		}
	}

	abstract public function select($id);

	abstract public function delete($id);

	abstract public function insert();

	abstract public function update($id);
}

?>
