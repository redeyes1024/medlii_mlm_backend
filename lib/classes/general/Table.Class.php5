<?php

/**
 *
 * -------------------------------------------------------
 * CLASSNAME:        TABLE
 * GENERATION DATE:  04.03.2008
 * CLASS FILE:       /home/www/b2b/classes/general/Table.Class.php5
 * -------------------------------------------------------
 * @AUTHOR:
 * Zangs (HB)
 * from: >> www.hiddenbrains.com
 * -------------------------------------------------------
 *  @desc:   Stored Table name
 */

Class Table
{
	public $tbl_arr;
	public function __construct($table_prefix)
	{
		$this->tbl_arr = array();
		$this->tbl_arr['Ajaxlist_Extra'] 	= $table_prefix."ajaxlist_extra";
		$this->tbl_arr['Ajaxlist_Field'] 	= $table_prefix."ajaxlist_field";
		$this->tbl_arr['Ajaxlist_Table'] 	= $table_prefix."ajaxlist_table";
		$this->tbl_arr['Admin'] 			= $table_prefix."admin";
		$this->tbl_arr['Country'] 			= $table_prefix."country_master";
		$this->tbl_arr['LogHistory'] 		= $table_prefix."log_history";
		$this->tbl_arr['PageSettings'] 		= $table_prefix."page_settings";
		$this->tbl_arr['Setting'] 			= $table_prefix."setting";
		$this->tbl_arr['State'] 			= $table_prefix."state_master";
		$this->tbl_arr['SystemEmails'] 		= $table_prefix."system_email";
		$this->tbl_arr['NewsLetterMember'] 		= $table_prefix."newsletter_member";
		$this->tbl_arr['Language']			= $table_prefix."language";
		$this->tbl_arr['LanguageLabel']		= $table_prefix."language_lable";
		$this->tbl_arr['Labels']		= $table_prefix."labels";

	}
}
?>
