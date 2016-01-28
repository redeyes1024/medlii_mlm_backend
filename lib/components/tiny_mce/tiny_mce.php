<?php

class tinyEditor {

	public $initialized = false;
	public $textareaAttributes = array("rows" => 10, "cols" => 80);

	/**
	 * Initializes CKEditor (executed only once).
	*/
	private function init() {
		global $CFG;
		$out = "";

		if ($this->initialized) {
			return "";
		}

		$out .= "<script type='text/javascript' src='" . $CFG->wwwroot . "/components/tiny_mce/tiny_mce.js' ></script>\n";
		$initComplete = $this->initialized = true;

		return $out;
	}

	public function editor($name, $value = "") {

		$attr = "";
		$out = "<textarea name=\"" . $name . "\"" . $attr . ">" . htmlspecialchars($value) . "</textarea>\n";
		if (!$this->initialized) {
			$out .= $this->init();
		}
		foreach ($this->textareaAttributes as $key => $val) {
			$attr.= " " . $key . '="' . str_replace('"', '&quot;', $val) . '"';
		}

		// $out .= "<textarea name=\"" . $name . "\"" . $attr . ">" . htmlspecialchars($value) . "</textarea>\n";
		$out .= $this->script($this->configureEditor($name));


		print $out;
		return true;
	}

	/**
	 * Prints javascript code.
	 *
	 * @param string $js
	 */
	private function script($js) {
		$out = "<script type=\"text/javascript\">";
		$out .= "//<![CDATA[\n";
		$out .= $js;
		$out .= "\n//]]>";
		$out .= "</script>\n";

		return $out;
	}

	private function configureEditor($name) {

		$out = "";
		$out =

		'     tinyMCE.init({
				// General options
				mode : "textareas",
				theme : "advanced",
				skin : "o2k7",
				plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

				// Theme options
				theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
				theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : true,

				// Example word content CSS (should be your site CSS) this one removes paragraph margins
				//content_css : "css/word.css",

				// Drop lists for link/image/media/template dialogs
				//template_external_list_url : "lists/template_list.js",
				//external_link_list_url : "lists/link_list.js",
				//external_image_list_url : "lists/image_list.js",
				//media_external_list_url : "lists/media_list.js",

				// Replace values for the template plugin
				template_replace_values : {
				username : "Some User",
				staffid : "991234"
	}
	});
				';
		return $out;
	}

}
?>