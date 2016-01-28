
<?php
//!!!!include_once($CFG->dirroot."/lib/classes/" . 'ajax/AJAX.Class.php5');
$ajaxlistObj = new AJAX();

//!!!include_once($CFG->dirroot."/lib/classes/" . 'ajax/AjaxAdd.Class.php5');
$ajaxaddObj = new AjaxAdd();
$getParam = '';
//if($_REQUEST['file']=='product')
//{
//echo "<pre/>";print_r($_REQUEST);EXIT;
//}
$file = $_REQUEST['file'];
#echo $file;exit;

if ($_REQUEST['file'] == 'LoginHistory') {
	$getParam = " AND  log_history.iUserId = '" . $_REQUEST['iId'] . "' AND eUserType='Admin' ";
}

if ($_REQUEST['file'] == 'faq_category') {
	$getParam = " AND language.ePrimary = 'yes' ";
}

if ($_REQUEST['file'] == 'Attribute') {
	$getParam = " AND language.ePrimary = 'yes' ";
}

if ($_REQUEST['file'] == 'News') {
	$getParam = " AND language.ePrimary = 'yes' ";
}


if ($_REQUEST['file'] == 'ProductGarments') {
	$getParam = " AND language.ePrimary = 'yes' ";
}

if ($_REQUEST['file'] == 'SubAttribute') {
	$getParam = " AND language.ePrimary = 'yes' ";
}

if ($_REQUEST['file'] == 'ProductCollection') {
	$getParam = " AND language.iLanguageId=1 AND product_category_language.iLanguageId=1 ";
}

if ($_REQUEST['file'] == 'Category') {
	$getParam = " AND language.ePrimary = 'yes' ";
}

if ($_REQUEST['file'] == 'promotions') {
	$getParam = " AND promotions_language.iLanguageId = 1 AND product_category_language.iLanguageId=1";
}





#echo $getParam;exit;
$module_access = substr($_REQUEST['file'], 0, 6);

###	Default Status
if (isset($_GET[eStatus]) && $_GET[eStatus] != "")
	$eStatus = $_GET[eStatus];
else
	$eStatus = "Search";

###	Default Page Start value
if (isset($_GET[start]) && $_GET[start] != "")
	$start = $_GET[start];
else
	$start = "0";

###	Default Stat Value => ASC or DESC
if (isset($_GET['stat']) && $_GET['stat'] != "")
	$stat = $_GET['stat'];
else
	$stat = "0";

###	Default sorton value
if (isset($_GET['sorton']) && $_GET['sorton'] != "")
	$sorton = $_GET['sorton'];
else
	$sorton = "0";

if (isset($_GET['search']) && $_GET['search'] != "")
	$search = $_GET['search'];
else
	$search = "0";

## Get tablename which is used in this Modulename
## you can find more help in function/AJAX.inc.php file..
$ModuleName = $_REQUEST['file'];

//	$TableArr = getTableArray($ModuleName);
$TableArr = $ajaxlistObj->getTableArray_DB($ModuleName);
if (count($TableArr) == 0) {
	header("Location:index.php?file=sitemap&AX=No");
	exit;
}

for ($i = 0, $ni = count($TableArr); $i < $ni; $i++) {
	$TableArr_inc[] = $ajaxlistObj->encrptyArrayFields($TableArr[$i]);
}
$js_TableArr_var = "TableArr = new Array(" . implode(",\n\t", $TableArr_inc) . ");";

## Get the Parameter Ex- Set default sorting, Module Heading, Add Link etc =>	you can find more help in function/AJAX.inc.php file..
//$ExtraPara = getExtraParamArray($ModuleName);
$ExtraPara = $ajaxlistObj->getExtraParamArray_DB($ModuleName);
$ExtraPara_inc[] = $ajaxlistObj->encrptyArrayFields($ExtraPara);
$js_ExtraPara_var = "ExtraPara = new Array(" . implode(",", $ExtraPara_inc) . ");";

## Get Field Information Which Display on Listing
## Ex- FieldId, Display Name on Heading, Set Searching or Not, Set Alignment, Set Width, Etc
## you can find more help in function/AJAX.inc.php file..
//$Field_arr = getFieldArray($ModuleName);
$Field_arr = $ajaxlistObj->getFieldArray_DB($ModuleName);
for ($i = 0, $ni = count($Field_arr); $i < $ni; $i++) {
	$field_arr_inc[] = $ajaxlistObj->encrptyArrayFields($Field_arr[$i]);
}
$js_field_var = "Field_arr = new Array(" . implode(",\n\t", $field_arr_inc) . ");";

$tablename = $TableArr[0][0];
$tablealias = $TableArr[0][1];

if ($_REQUEST['Status'] != '') {
	$getParam.=" and " . $tablealias . ".eStatus='" . $_REQUEST['Status'] . "'";
}
if ($_REQUEST['DateAdded'] == 'LastMonth') {
	$getParam.=" and dtAddedDate>DATE_SUB(curdate(),INTERVAL 1 MONTH)AND dtAddedDate <= Now() ";
}
if ($_REQUEST['DateAdded'] == 'LastWeek') {
	$getParam.=" and dtAddedDate>DATE_SUB(curdate(),INTERVAL 7 DAY)AND dtAddedDate <= Now() ";
}

$tableString = $ajaxlistObj->setTableAndRelationforAlphaSearch($ModuleName);
#echo $tableString ;exit;

$sql = "SELECT count(" . $ExtraPara[8] . ") as tot FROM " . $tableString;
$db_count = $obj->select($sql);
$ntotrec = $db_count[0]['tot'];

$BACK_LINK = "";
if ($_GET['file'] == 'Help_Page_Detail') {
	$BACK_LINK = "index.php?file=Help_Page&AX=Yes";
} else if ($_GET['file'] == 'Member_Model' && $_GET['iMakeId'] != '') {
	$BACK_LINK = "index.php?file=Member_Make&AX=Yes";
}


// get Extra info on title like Tab, Help etc

$tab_arr = $GeneralObj->tab_header('Comments', 2);
$num_totrec1 = count($tab_arr);
//print_r($num_totrec1); exit;
$TabId = $_REQUEST[TabId];


if ($TabId == '')
	$TabId = 1;
$iId = $_REQUEST['iId'];
$URL = $CFG->dirroot . '/index.php?file=' . $_REQUEST['file'] . '&iId=' . $iId;


$TOP_HEADER = $ExtraPara[2] . " List ";
include($CFG->dirroot . '/templates/general/generallist_title.inc.php');
?>
<script type="text/javascript">
    // Set the Message to Display fOR Various Functionality
   // ADMIN_USER_NAME = '<?php echo $ADMIN_USER_NAME ?>';			// admin user name
    site_url = '<?php echo $site_url ?>';			// Site URL
    MSG_ACTIVE = '<?php echo MSG_ACTIVE ?>';			// Active Msg
    MSG_INACTIVE = '<?php echo MSG_INACTIVE ?>';		// Inactive MSG
    MSG_DELETE = '<?php echo MSG_DELETE ?>';			// Delete Msg
    MSG_APPROVED = '<?php echo MSG_APPROVED ?>';		// Approved Msg
    MSG_PENDING = '<?php echo MSG_PENDING ?>';		// Pending
    MSG_SUSPENDED = '<?php echo MSG_SUSPENDED ?>';	// Suspended
    MSG_BLOCKED = '<?php echo MSG_BLOCKED ?>';		// Blocked
    MSG_READ = '<?php echo MSG_UNREAD ?>';	        //Read
    MSG_UNREAD = '<?php echo MSG_READ ?>';	        //UnRead
    REC_LIMIT = '<?php echo $REC_LIMIT ?>';			// Record Limit on one screen for one page..
    PAGELIMIT = '<?php echo $PAGELIMIT ?>';			// Page limit on one screen
<?php echo $js_field_var ?>;						// Table Field Array
<?php echo $js_ExtraPara_var ?>;					// Extra Param Array
<?php echo $js_TableArr_var ?>;					// Table Name Array

<?php echo $js_ExtraPara_Addvar ?>;
<?php echo $js_FieldArr_Addvar ?>;
    show = '<?php echo $show ?>';
    //alpha_rs = new Array (<?php echo $alpha_rs ?>);




</script>
<link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot . "/public/js/" ?>jautocomplete.css">
<script language="JavaScript1.2" src="<?php echo $CFG->wwwroot . "/public/js/" ?>CheckBoxGroup.js"></script>
<script language="JavaScript1.2" src="<?php echo $CFG->wwwroot . "/public/js/" ?>jajaxlist.js"></script>
<script language="JavaScript1.2" src="<?php echo $CFG->wwwroot . "/public/js/" ?>instantedit.js"></script>
<script language="JavaScript1.2" src="<?php echo $CFG->wwwroot . "/public/js/" ?>jgetState.js"></script>
<link type="text/css" href="<?php echo $CFG->wwwroot . "/public/js/" ?>css/ui-lightness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
<!--By Danil -->
<!--<script type="text/javascript" src="<?//php echo $CFG->wwwroot . "/public/js/" ?>jquery.js"></script>
<script type="text/javascript" src="<?//php echo $CFG->wwwroot . "/public/js/" ?>jquery-ui.min.js"></script>-->
<script type="text/javascript" src="<?php echo $CFG->wwwroot . "/public/js/" ?>timepicker.js"></script>
<form name="frmlist" id="frmlist" method="post" onSubmit="return checkvalid();">
	<input type="hidden" name="flag" id="flag" value="1">
	<input type="hidden" name="mstatus" id="mstatus" value="">
	<input type="hidden" name="getParam" value="<?php echo $getParam; ?>">
	<input type="hidden" name="stat" value="<?php echo $stat ?>">
	<input type="hidden" name="start" value="<?php echo $start ?>">
	<input type="hidden" name="search" value="<?php echo $search ?>">
	<input type="hidden" name="sorton" value="<?php echo $sorton ?>">
	<input type="hidden" name="more" id="more" value="<?php echo $_REQUEST['more']; ?>">
	<input type="hidden" name="file" id="file" value="<?php echo $file ?>">
	<input type="hidden" name="status_msg" id="status_msg" value="<?php echo $_REQUEST['var_msg']; ?>">
	<input name="hoption" id="hoption" type="hidden" size="20" value="<?php echo $keyword ?>">
	<span style="display: none"> <textarea id="tempval" name="tempval" style="width: 600px; height: 500px;"></textarea>
	</span>
	<table width="97%" border="1" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="40">
				<h1>
					<?php echo $GenFunctionObj->DisplayTopInListAddDealer($TOP_HEADER, $BACK_LABEL, $BACK_LINK, $help); ?>
				</h1>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo $tabHTML ?>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<?php echo $switchToHTML; ?>
						</td>
					</tr>
					<tr>
						<td>
							<div>
								<table width="100%" border="0" cellspacing="1" cellpadding="1">
									<tr>
										<td colspan="5"></td>
									</tr>
									<tr>
										<td width="45%">
											<table width="100%" border="0" cellspacing="0" cellpadding="2">
												<tr>
													<?php
													//Add name of files in which 'Add' button is not required
													$no_add_button = array("LoginHistory");
													?>
													<?php
													if (!in_array($_REQUEST['file'], $no_add_button)) {
                                                        if ($ExtraPara[4] != '0') {
                                                            ?>
													<td width="8%" class="td-listing">
														<?php if ($ExtraPara[9] == 'No') { ?>
														<img src="<?php echo $CFG->wwwroot . "/public/images/"; ?>addnew.gif" style="cursor: hand" class="imagestyle" onClick="return addLink();" alt="Add New" title="Add New">
														<?php } else { ?>
														<img src="<?php echo $CFG->wwwroot . "/public/images/"; ?>addnew.gif" style="cursor: hand" class="imagestyle" onClick="return addUpdateLink('<?php echo $ModuleName ?>','Add','0');"
															alt="Add New" title="Add New">
														<?php } ?>
													</td>
													<?php
                                                        }
                                                    }
                                                    ?>
													<?php
													//Add name of files in which 'Delete' button is not required
													$no_delete_button = array("SystemEmail");
													?>
													<?php if (!in_array($_REQUEST['file'], $no_delete_button)) { ?>
													<td width="8%" class="td-listing">
														<img src="<?php echo $CFG->wwwroot . "/public/images/"; ?>delete.gif" class="imagestyle  <?php echo $class_dilog ?>" style="cursor: hand" onclick="return checkStatus('Delete','1','0');"
															alt="Delete" title="Delete">
													</td>
													<?php } ?>
													<?php
													//Add name of files in which 'Status' buttons are not required
													$no_status_button = array("SystemContest", "job_master");
													?>
													<?php
													if (!in_array($_REQUEST['file'], $no_status_button)) {

                                                        $var_name = 'eStatus';
                                                        $bStatus = $ajaxlistObj->checkField($TableArr[0][0], $var_name);
                                                        //print_r($bStatus[$var_name] );exit;
                                                        if (is_array($bStatus[$var_name])) {
                                                            $e_Arr = str_replace("enum", "array", $bStatus[$var_name]['Type']);
                                                            //  print_r($e_Arr);exit;
                                                            eval("\$eStatus_Arr = " . $e_Arr . ";");
                                                            for ($i = 0; $i < count($eStatus_Arr); $i++) {
                                                                ?>
													<td width="8%" class="td-listing" <?php echo $style ?>>
														<img src="<?php echo $CFG->wwwroot . "/public/images/"; ?><?php echo strtolower($eStatus_Arr[$i]) ?>.gif" class="imagestyle <?php echo $class_dilog ?>" style="cursor: hand"
															onClick="return checkStatus('<?php echo $eStatus_Arr[$i] ?>','1','0');" alt="<?php echo $eStatus_Arr[$i] ?>" title="<?php echo $eStatus_Arr[$i] ?>">
													</td>
													<?php
                                                                }
                                                            }
                                                        }
                                                        ?>
													<td width="8%" colspan="7" class="td-listing">
														<?php if ($_REQUEST['file'] != 'LoginHistory') { ?>
														<img src="<?php echo $CFG->wwwroot . "/public/images/"; ?>showall.gif" style="cursor: hand" class="imagestyle" onClick="return checkStatus('Showall','1','0');" alt="Show All"
															title="Show All" />
														<?php } ?>
													</td>
													<td>&nbsp;</td>
													<?php if ($_REQUEST['file'] == 'User') { ?>
													<td width="8%" colspan="7" class="td-listing">
														<img src="<?php echo $CFG->wwwroot . "/public/images/"; ?>icon_b2b.gif" style="cursor: hand" class="imagestyle" onClick="return checkStatus('ShowallB2B','1','0');" alt="Show B2B Users"
															title="Show B2B Users" />
													</td>
													<td>&nbsp;</td>
													<td width="8%" colspan="7" class="td-listing">
														<img src="<?php echo $CFG->wwwroot . "/public/images/"; ?>indivisual.jpg" style="cursor: hand" class="imagestyle" onClick="return checkStatus('Individual','1','0');"
															alt="Show Individual Users " title="Show Individual Users" />
													</td>
													<td>&nbsp;</td>
													<td width="8%" colspan="7" class="td-listing">
														<img src="<?php echo $CFG->wwwroot . "/public/images/"; ?>wedding.png" style="cursor: hand" class="imagestyle" onClick="return checkStatus('Wedding','1','0');" alt="Show Wedding Users"
															title="how Wedding Users" />
													</td>
													<td>&nbsp;</td>
													<?php } ?>
												</tr>
											</table>
										</td>
										<td width="30%" valign="middle" align="right" class="td-listing" style="white-space: nowrap;"></td>
										<!--	Below Line Display the Searching Combo.
                                        Searching Field get from the getFieldArray() Function, where Fifth Parameter Set to Yes -->
										<?php $hidecombo = $_REQUEST['file']; ?>
										<td width="10%" class="td-listing" id="searching_combo" <?php if ($_REQUEST['file'] == 'SystemContest') { ?> style="display: none;" <?php } ?> align="right"></td>
										<!-- End Searching Param -->
										<td width="20%" class="td-listing">
											<div align="right" id="keyword_text">
												<!--  onkeyup="ajax_showList(this,'Search',event);" -->
												<input  class="keyword-control" name="keyword" id="keyword" type="Text" size="20"  value="<?php echo $keyword ?>" style="<?php if ($_REQUEST['file'] == 'SystemContest') echo "display:none"; ?>">
											</div>
											<div align="right" id="keyword_date_div" style="display: none; white-space: nowrap;">
												<input class="keyword-control" type="text" id="keyword_date" name="keyword_date" size="15" style="margin-right: 4px;" value="<?php echo $keyword ?>" readonly>
												&nbsp;&nbsp;&nbsp;
											</div>
											<div align="right" id="keyword_status_div" style="display: none">
												<select class="keyword-control" name="keyword_status" style="width: 120px">
													<option value="">Select Status</option>
													<?php
													$bStatus = $ajaxlistObj->checkField($TableArr[0][0], 'eStatus');
													if (is_array($bStatus['eStatus'])) {
                                                        $e_Arr = str_replace("enum", "array", $bStatus['eStatus']['Type']);
                                                        eval("\$eStatus_Arr = " . $e_Arr . ";");
                                                        for ($i = 0; $i < count($eStatus_Arr); $i++) {
                                                            ?>
													<option value="<?php echo $eStatus_Arr[$i] ?>">
														<?php echo $eStatus_Arr[$i] ?>
													</option>
													<?php
    }
}
?>
												</select>
											</div>
											<div align="right" id="keyword_type_div" name="keyword_type_div" style="display: none">
												<select class="keyword-control" name="keyword_garmenttype" id="keyword_garmenttype" style="width: 120px">
													<option value="">Select Type</option>
													<option value="Exterior">Exterior</option>
													<option value="Interior">Interior</option>
												</select>
											</div>
											<div align="right" id="keyword_gender_div" name="keyword_gender_div" style="display: none">
												<select class="keyword-control" name="keyword_gender" id="keyword_gender" style="width: 120px">
													<option value="">Select Gender</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
											<div align="right" id="keyword_request_div" style="display: none">
												<select class="keyword-control" name="keyword_request" id="keyword_request" style="width: 120px">
													<option value="">Select Type</option>
													<?php
													$bStatus = $ajaxlistObj->checkField($TableArr[0][0], 'eRequestType');
													if (is_array($bStatus['eRequestType'])) {
                                                        $e_Arr = str_replace("enum", "array", $bStatus['eRequestType']['Type']);
                                                        eval("\$eRequestType_Arr = " . $e_Arr . ";");
                                                        for ($i = 0; $i < count($eRequestType_Arr); $i++) {
                                                            ?>
													<option value="<?php echo $eRequestType_Arr[$i] ?>">
														<?php echo $eRequestType_Arr[$i] ?>
													</option>
													<?php
    }
}
?>
												</select>
											</div>
										</td>
										<td width="1%" class="td-listing" id="search_keyword_combo" style="display: none">
											<div align="right">
												<select class="keyword-control" name="keyword_status1"></select>
											</div>
										</td>
										<td width="5%" class="td-listing">
											<div align="right">
												<input type="Image" name="search"  onClick="return checkStatus('Search','1','0')"  style="cursor:hand; <?php if ($_REQUEST['file'] == 'Comments') echo 'display:none'; ?>" src="<?php echo $CFG->wwwroot . "/public/images/"; ?>icon/search.gif"  alt="Search" class="noinput" border="0">
										
										</td>
									</tr>
									<!-- ======================================================================================	-->
									<TR>
										<TD colspan="6">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td class="inner-topcurve">
														<div>
															<img src="<?php echo $CFG->wwwroot . "/public/images/" ?>spacer.gif" />
														</div>
													</td>
												</tr>
												<tr>
													<td colspan="3" class="inner-bodycurve-listing">
														<table width="100%" border="0" cellspacing="1" cellpadding="1">
															<tr>
																<td>
																	<?php /*
if ($_REQUEST['file'] == 'State')
{

echo $GeneralObj->gendb_dynamicDropeDown("country_master","vCountryCode","vCountry",""," 1=1 order by vCountry", '', $_REQUEST['vCountryCode'],'vCountryCode', '150px', '', 'Select Country','return checkStatus("Search",1,0);');
}

else if ($_REQUEST['file'] == 'City')
{

echo $GeneralObj->gendb_dynamicDropeDown("country_master","iCountryId","vCountry",""," 1=1 order by vCountry", '', $_REQUEST['iCountryId'],'iCountryId', '150px', '', 'Select Country','return checkStatus("Search",1,0);');
echo '&nbsp;&nbsp;&nbsp;';
echo $GeneralObj->gendb_dynamicDropeDown("state_master","iStateId","vState",""," 1=1 order by vState", '', $_REQUEST['iStateId'],'iStateId', '150px', '', 'Select State','return checkStatus("Search",1,0);');

}
*/
?>
																</td>
															</tr>
															<tr>
																<td>
																	<?php
																	//if ($_REQUEST['file'] != 'LoginHistory') {
																	echo $GenFunctionObj->gen_DisplayPaging_Top(rawurlencode($ALPHA), $ALPHA_SEARCH_TOP, $ADMIN_PAGING_TOP);
																	//}
																	?>
																</td>
															</tr>
															<tr>
																<td>
																	<span id="listing"></span>
																</td>
															</tr>
															<tr>
																<td colspan="3" class="listing-bottgradient">
																	<table width="100%" border="0" cellspacing="1" cellpadding="2">
																		<tr>
																			<td width="28%" id="RECMSG_BOTTOM"></td>
																			<td width="72%" nowrap>
																				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
																					<tr>
																						<td align="right" style="padding-right: 5px;">
																							<!--
                                                                                                          <select name="TotalRecords" style="width:50px;" onchange="return checkStatus('<?php echo $eStatus ?>','<?php echo $sorton ?>','<?php echo $start ?>');" >
                                                        
                                                                                                    <option value="<?php echo $ntotrec ?>">All</option>
                                                        
<?php for ($i = 0; $i < 10; $i++) { ?>
                                                                                                                <option <?php
    if (($i + 1) * 10 == $REC_LIMIT) {
        echo " selected";
    }
    ?> value="<?php echo ($i + 1) * 10 ?>"><?php echo ($i + 1) * 10 ?></option>
<?php } ?>
                                                                                                </select>
                                                                                                        -->
																						</td>
																						<td width="2%" align="center" nowrap class="paging-bottom" id="PAGING-BOTTOM"></td>
																						<td width="20" id="keyword_page" align="right" style="padding-left: 5px;"></td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td class="inner-bottcurve">
														<div>
															<img src="<?php echo $CFG->wwwroot . "/public/images/" ?>spacer.gif" />
														</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- Listing comes here frm .js file through innerHTML	-->
							</div>
						</td>
					</tr>
				</table>
				<input type="hidden" name="no" value="">
			</td>
		</tr>
		<tr>
			<td align="right" valign="top">
				<?php echo $BACK_TO ?>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
    //getSearchByLetter();
    setSerchingCombo('<?php echo $option ?>');
    checkStatus('<?php echo $eStatus ?>','<?php echo $sorton ?>','<?php echo $start ?>');
    function checkvalid()
    {
        checkStatus('Search','1','0');
        return false;
    }
    function setSerchingCombo(option)
    {
        var html="",sel="";
        var hidecombo='<?php echo $hidecombo ?>';
        if(hidecombo!='Comments'){
            html += '<select name="option" id="option" style="width:150px" onChange="setOptionValue(this.value);">';
        }
        else{
            html += '<select name="option" id="option" style="width:125px; display:none;" onChange="setOptionValue(this.value);">';
        }

        for(i=0;i<Field_arr.length;i++)
        {
            if(Field_arr[i][4] == 'Yes')
            {
                if(option == Field_arr[i][0])
                    html += "<option selected value='"+Field_arr[i][0]+"'>"+Field_arr[i][2]+"</option>";
                else
                    html += "<option value='"+Field_arr[i][0]+"'>"+Field_arr[i][2]+"</option>";
            }
        }
        //html += "<option value='pageno'>Go To Page No</option>";
        html += '</select>';

        document.getElementById("searching_combo").innerHTML = html;

    }
    function setOptionValue(val)
    {
        //alert(val);
        $('.keyword-control').val('');
        var dateVal = '';
        dateVal = val.split(".");       

        if(val == 'pageno')
        {
            document.getElementById("hoption").value = document.getElementById("option")[0].value;
            document.getElementById("keyword_text").style.display = 'none';
            document.getElementById("keyword_page").style.display = '';
            document.getElementById("keyword_date_div").style.display = 'none';
            document.getElementById("keyword_status_div").style.display = 'none';
            document.getElementById("keyword_gender_div").style.display = 'none';
            document.getElementById("keyword_type_div").style.display = 'none';
            
             
        }
        else if(dateVal[1] == 'eStatus')
        {
            document.getElementById("hoption").value = document.getElementById("option")[0].value;
            document.getElementById("keyword_text").style.display = 'none';
            document.getElementById("keyword_page").style.display = 'none';
            document.getElementById("keyword_date_div").style.display = 'none';
            document.getElementById("keyword_status_div").style.display = '';
            document.getElementById("keyword_gender_div").style.display = 'none';
            document.getElementById("keyword_request_div").style.display = 'none';
            document.getElementById("keyword_type_div").style.display = 'none'; 
            
        }      
        else if(dateVal[1] == 'dtDate' || dateVal[1] == 'dtFrom' || dateVal[1] == 'dtTo' || dateVal[1]=='dtAddedDate' || dateVal[1]=='dDate' ||dateVal[1]=='dLoginDate'  || dateVal[1]=='dtContestStartDate' || dateVal[1]=='dtContestEndDate' || dateVal[1] == 'dLogoutDate' ||dateVal[1] == 'dtDateTime' || dateVal[1]== 'dDob' || dateVal[1]=='dLastLogin' || dateVal[1]=='dtdatetime' ){
            document.getElementById("keyword_text").style.display = 'none';
            document.getElementById("keyword_page").style.display = 'none';
            document.getElementById("keyword_date_div").style.display = '';
            document.getElementById("keyword_status_div").style.display = 'none';
            document.getElementById("keyword_gender_div").style.display = 'none';
            document.getElementById("keyword_request_div").style.display = 'none';
            document.getElementById("keyword_type_div").style.display = 'none';
                        
            
            $('#keyword_date').datepicker({
                showTime: false,
                constrainInput: false,
                dateFormat: 'yy-mm-dd',
                showOn: 'both',
                buttonImage: site_url+'hbpanel/public/images/cal.gif',
                buttonImageOnly: true
            });
           
        }
        
        else if(dateVal[1] == 'eType')
        {
            document.getElementById("hoption").value = document.getElementById("option")[0].value;
            document.getElementById("keyword_text").style.display = 'none';
            document.getElementById("keyword_page").style.display = 'none';
            document.getElementById("keyword_date_div").style.display = 'none';
            document.getElementById("keyword_status_div").style.display = 'none';
            document.getElementById("keyword_gender_div").style.display = 'none';
            document.getElementById("keyword_request_div").style.display = 'none';
            document.getElementById("keyword_type_div").style.display = '';
                         
        }
        else if(dateVal[1] == 'eGender')
        {
            document.getElementById("hoption").value = document.getElementById("option")[0].value;
            document.getElementById("keyword_text").style.display = 'none';
            document.getElementById("keyword_page").style.display = 'none';
            document.getElementById("keyword_date_div").style.display = 'none';
            document.getElementById("keyword_status_div").style.display = 'none';
            document.getElementById("keyword_gender_div").style.display = '';
            document.getElementById("keyword_request_div").style.display = 'none';
            document.getElementById("keyword_type_div").style.display = 'none'; 
                       
        }
        
        else if(dateVal[1] == 'vTargetSallary')
        {
            document.getElementById("hoption").value = document.getElementById("option")[0].value;
            document.getElementById("keyword_text").style.display = 'none';
            document.getElementById("keyword_page").style.display = 'none';
            document.getElementById("keyword_date_div").style.display = 'none';
            document.getElementById("keyword_status_div").style.display = 'none';
            document.getElementById("keyword_gender_div").style.display = 'none';
            document.getElementById("keyword_request_div").style.display = 'none';
            document.getElementById("keyword_type_div").style.display = 'none'; 
                       
        }
        else
        {
            if(file !='SystemContest'){
                document.getElementById("keyword_text").style.display = '';
                document.getElementById("keyword_page").style.display = 'none';
                document.getElementById("keyword_date_div").style.display = 'none';
                document.getElementById("keyword_status_div").style.display = 'none';
                document.getElementById("keyword_gender_div").style.display = 'none';
                document.getElementById("keyword_request_div").style.display = 'none';
                document.getElementById("keyword_type_div").style.display = 'none'; 
             
            }
        }
    }
    function addLink()
    {
        if(ExtraPara[0][4])
            addLink = decode64(ExtraPara[0][4]);
        // alert(addLink);   
        document.frmlist.action = addLink;
        document.frmlist.submit();
    }
    function BackupSubmit(name)
    {
        alert(name);		
        //	document.frmlist.action="index.php?file=t-backup_a";
        //	document.frmlist.submit();
    }
</script>
