<?php


class General {

	function __construct() {

	}

	function index() {
		return Array("index\n\n\n");
	}

	function filterDataArr($data_arr) {
		if (is_array($data_arr) && count($data_arr) > 0) {
			foreach ($data_arr as $key => $value) {
				if (is_array($value)) {
					foreach ($value as $key2 => $value2) {
						if (empty($value2)) {
							$value2 = "";
							$data_arr2[$key][$key2] = $value2;
						} else {
							$data_arr2[$key][$key2] = $value2;
						}
					}
				} else {
					if (empty($value)) {
						$value = "";
						$data_arr2[$key] = $value;
					} else {
						$data_arr2[$key] = $value;
					}
				}
			}
		}
		else
			$data_arr2 = $data_arr;
		return $data_arr2;
	}

	function ShortenText($text, $chars) {
		// Change to the number of characters you want to display
		$text = $text . " ";
		$text = substr($text, 0, $chars);
		$text = substr($text, 0, strrpos($text, ' '));
		$text = $text . "...";
		return $text;
	}

	function Make_Currency($text, $parameter = 2, $defCurrency = '&euro;') {
		if ($text == 0) {
			return '00.00';
		} else {
			return (($defCurrency) ? $defCurrency . ' ' : '') . number_format($text, $parameter, '.', ',');
		}
	}

	function getImageExtenstion($mime) {

		$extensions[] = array(
				'image/jpeg' => '.jpg',
				'image/gif' => '.gif',
				'image/png' => '.png'
		);

		return $extensions[$mime];
	}

}
