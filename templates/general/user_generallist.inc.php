<script type="text/javascript">
    var ModuleName='<?php echo $_REQUEST['file']; ?>';
</script>
<?php
//echo session_id();exit;
include_once $CFG->dirroot . '/scripts/tools/CompanyGroupFilter.php';
include_once $CFG->dirroot . '/scripts/tools/CompanyGroupFilterForContent.php';
include_once($CFG->dirroot . "/includes/func_generallist.inc.php");
#echo $admin_path;exit;
$ModuleName = $_REQUEST['file'];
if ($ModuleName == "") {
	gen_redirectURL_header("index.php");
}
$RelatedArr = getExtraArray_List($ModuleName);
$FieldArr = getFieldArray_List($ModuleName);

if (count($RelatedArr) == 0) {
	gen_redirectURL_header("index.php");
}
$extraReqParam = "";
foreach ($_GET as $key => $value) {
	if ($key != "file" && $key != "AX") {
		$extraReqParam .= "&" . $key . "=" . $value;
	}
}
foreach ($_POST as $key => $value) {
	if ($key != "file" && $key != "AX")
		$extraReqParam .= "&" . $key . "=" . $value;
}
// !!!! $ListFile = 'index.php?file=user_generallist&Module=' . $ModuleName . $RelatedArr['Extraquerystr'];
$ListFile = 'index.php?file=user_generallist&Module=' . $ModuleName;
/*
 if ($_REQUEST["tabid"] == "network") {
//  $extraparam.="&iNetworkId=".$_REQUEST["iNetworkId"];
} */
//mr($FieldArr);
#echo '<pre>'; print_R($_SERVER['QUERY_STRING']);

echo "<script type='text/javascript' language='JavaScript1.2' src='" . $CFG->wwwroot . "/public/js/jlist.js'></script>";



if ($ModuleName == 'Directory') {
	echo "<form name='frmlist' method='post' enctype='multipart/form-data' action='index.php?file=m-csv1add_a' onsubmit='return CheckExtension1('vCSV1');'>";
}
if ($ModuleName == 'User') {
	echo "<form name='frmlist' method='post' enctype='multipart/form-data' action='index.php?file=m-csvadd_a' onsubmit='return CheckExtension('vCSV');'>";
} else {

    echo "<form name='frmlist' method='post'  action='' >";
}
?>
<input type="hidden" id="mode" name="mode" value="Search">
<input type="hidden" id="iSiteAdminId" name="iSiteAdminId">
<input type="hidden" id="ModuleName" name="ModuleName" value="<?php echo $ModuleName ?>">
<input type="hidden" id="file" name="file" value="<?php echo $ModuleName ?>">
<input type="hidden" id="extraReqParam" name="extraReqParam" value="<?php echo $extraReqParam ?>">
<table width="97%" class="table-dottedborder" border="0" align="center" cellpadding="2" cellspacing="1">
	<tr>
		<td height="40">
			<h1>
				<?php echo $GenFunctionObj->DisplayTopInListAddDealer($RelatedArr['ListTitle'], $RelatedArr['BackToTitle'], $RelatedArr['BackToLink']); ?>
			</h1>
		</td>
	</tr>
	<?php
	// Show Company DropDown


	if ($ModuleName == 'User') {
		echo "<tr><td height='40' style='text-align:right'>" . "<div  style='padding-right:35px; padding-bottom:15px;'>";
		echo '<b>Organization : </b>';
		$ddlist = new CompanyGroupFilter($_SESSION["sess_iAdminId"], $_SESSION['sess_eType']);
		echo $ddlist->getCompaniesList($_SESSION['sess_iCompanyId'], $_REQUEST[$ddlist::companyValueFilterName]);
		echo "</div>" . "</td></tr>" . "<tr><td height='40' style='text-align:right'>" . "<div  style='padding-right:35px; padding-bottom:15px;'>";
		echo '<b>Group : </b>';
		echo $ddlist->getGroupsList($_REQUEST[$ddlist::companyValueFilterName], $_REQUEST[$ddlist::groupValueFilterName]);
		echo "</div>";
		echo "</td></tr>";
		echo $ddlist->getJScripts();
	}
	if ($ModuleName == 'SubGroup') {
        echo "<tr><td height='40' style='text-align:right'>" . "<div  style='padding-right:35px; padding-bottom:15px;'>";
        echo '<b>Organization : </b>';
        $ddlist = new CompanyGroupFilter($_SESSION["sess_iAdminId"], $_SESSION['sess_eType']);
        echo $ddlist->getCompaniesList($_SESSION['sess_iCompanyId'], $_REQUEST[$ddlist::companyValueFilterName]);
        echo "</div>" . "</td></tr>";
        //                . "<tr><td height='40' style='text-align:right'>" . "<div  style='padding-right:35px; padding-bottom:15px;'>";
        //        echo '<b>Group : </b>';
        //        echo $ddlist->getGroupsList($_REQUEST[$ddlist::companyValueFilterName], $_REQUEST[$ddlist::groupValueFilterName]);
        //        echo "</div>";
        //        echo "</td></tr>";
        echo $ddlist->getJScripts();
    }
    $module_array = array('Directory', 'Events', 'Courses', 'AudioCategory', 'VideoCategory', 'Library', 'Classes');
    if (in_Array($ModuleName, $module_array)) {
        echo "<tr><td height='40' style='text-align:right'>" . "<div  style='padding-right:35px; padding-bottom:15px;'>";
        echo '<b>Organization : </b>';
        $ddlist = new CompanyGroupFilterForContent($_SESSION["sess_iAdminId"], $_SESSION['sess_eType']);

        echo $ddlist->getCompaniesList($_SESSION['iCompanyId'], $_REQUEST['iCompanyId'], 'Default Group');
        echo "</div>" . "</td></tr>" . "<tr><td height='40' style='text-align:right'>" . "<div  style='padding-right:35px; padding-bottom:15px;'>";

        echo '<b>Group : </b>';
        echo $ddlist->getGroupsList($_REQUEST['iCompanyId'], $_REQUEST['iSGroupId'], 'Default Group');
        echo "</div>";
        echo "</td></tr>";
        echo $ddlist->getJScripts();
        echo "<script type='text/javascript'>
			$(function(){
			var test_iCompanyId = $.getQuery('iCompanyId');
			if(!test_iCompanyId){
			// debugger;
			changeGroupList() ;}
			//
			//var test_iSGroupId = $.getQuery('iSGroupId');
			//if( !test_iSGroupId){
			//debugger;
			//        changeGroupList();}
			//
    });

			</script>";
    }





    if (isset($RelatedArr['TabHeader'])) {
        $class = "class='tab_border'";
        list($TabHeader, $TabId) = explode("||", $RelatedArr['TabHeader']);
        echo "<tr> <td valign='bottom'>" . $GeneralObj->DisplayTab($TabHeader, $TabId) . "</td> </tr>";
    }
    ?>
	<?php
	if ($ModuleName == 'User') {
        echo "  <tr>
    		<td colspan='2' class='midd-contentbg' align='center'>
    		<table width='50%' border='0' cellpadding='0' cellspacing='0' align='center' class='midd-tableborder'>
    		<tr>
    		<td width='30%' valign='top' align='right'><b>Upload Users</b></td>
    		<td width='5%' valign='top'>:</td>
    		<td width='23%' valign='top'>
    		<input class='INPUT' type='file' lang='*' title='CSV File' id='vCSV' name='vCSV' size='25'  onchange='' >
    		<br/><small><font color='red'>Valid Extension. : .CSV</font></small>
    		</td>
    		<td width='65%' valign='top' align='left'>&nbsp;
    		<input type='Image' class='buttonstyle' lang='Add' src='" . $CFG->wwwroot . "/public/images/btn-add.gif' style='cursor:hand;border:0' >
			</td>
			</tr>
			</table>
			</tr>";
    }
    ?>
	<?php
	if ($ModuleName == 'Directory') {
        echo "  <tr>
    		<td colspan='2' class='midd-contentbg' align='center'>
    		<table width='50%' border='0' cellpadding='0' cellspacing='0' align='center' class='midd-tableborder'>
    		<tr>
    		<td width='30%' valign='top' align='right'><b>Upload Directory</b></td>
    		<td width='5%' valign='top'>:</td>
    		<td width='23%' valign='top'>
    		<input class='INPUT' type='file' lang='*' title='CSV File' id='vCSV1' name='vCSV1' size='25'  onchange='' >
    		<br/><small><font color='red'>Valid Extension. : .CSV</font></small>
    		</td>
    		<td width='65%' valign='top' align='left'>&nbsp;
    		<input type='Image' class='buttonstyle' lang='Add' src='" . $CFG->wwwroot . "/public/images/btn-add.gif' style='cursor:hand;border:0' >
				</td>
				</tr>
				</table>
				</tr>
				";
    }
    ?>
	<tr>
		<td colspan="2" class="midd-contentbg">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="midd-tableborder">
				<tr>
					<td colspan="6">
						<table width="100%" border="0" cellspacing="0" cellpadding="2">
							<tr>
								<td width="65%" style="text-align: left">
									<?php echo getActionButtons_List($RelatedArr, $ListFile, '', ''); ?>
								</td>
								<TD style="text-align: right">
									<?php
									if ($ModuleName != 'SystemMails') {
                                        echo "<table width='100%' border='0' cellspacing='1' cellpadding='1'><tr>" .
                                          "<td width='40%' class='td-listing' nowrap style='text-align:right'>" . getSearchListCombo_List($FieldArr) . "</td>" .
                                          "<td width='1%' >&nbsp;</td>" .
                                          "<td width='12%'  style='text-align:left'>" .
                                          "<div id='searchdiv'><input  name='keyword' id='keyword' type='Text' size='15' value='"
		. (isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '')
		. "' onkeypress='return valid_search(\"" . $ListFile . "\")'></div>" .
		"</td>
				<td width='5%'  style='text-align:left'>
				<input class='imagestyle' name='Search' style='border:none;' type='image' src='" . $CFG->wwwroot . "/public/images/icon/search.gif' alt='Search' onClick='return valid(\"" . $ListFile . "\")'>
		</td>
		</tr>
		</table>
		";
                                    }
                                    ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr style="display: none">
					<td colspan="6">
						<table width="100%" border="0" cellspacing="0" cellpadding="2">
							<tr>
								<td></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="6">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="inner-topcurve">
									<div>
										<img src="<?php echo $CFG->wwwroot . "/public/images/" ?>spacer.gif" />
									</div>
								</td>
							</tr>
							<?php
							if (isset($RelatedArr['DateSearch']) && $RelatedArr['DateSearch'] == '1') {
                                echo "               <tr>
		<td colspan='3' class='inner-bodycurve-listing'>

		<table width='100%' border='0' cellspacing='0' cellpadding='2'>
		<tr>
		<td>" .
		// by Danil
                                //  <script language='JavaScript1.2' src='" . $CFG->wwwroot . "/public/js/jquery.min.js'></script>
                                //    <script language='JavaScript1.2' src='" . $CFG->wwwroot . "/public/js/jquery-ui-custom.min.js'></script>
                                "  <!--<link href='" . $CFG->wwwroot . "/public/js/jquery-ui-custom.css' rel='stylesheet' type='text/css' />-->
		<b>" . $RelatedArr['DateSearchTitle'] . "</b>
				</td>
				</tr>
				<tr>
				<td width='20%'>From date  </td>
				<td align='center' width='2%'>:</td>
				<td><b><input class='INPUT' lang='*{D}' type='Text' title='Birth Date' name='FromDate' id='FromDate' value='" . $FromDate . "' size='13' class='transperentInput'>&nbsp; </b></td>
		<td colspan='3' ></td>
		</tr>
		<tr>
		<td width='20%'>To date  </td>
		<td align='center' width='2%'>:</td>
		<td><b><input class='INPUT' lang='*{D}' type='Text' title='Birth Date' name='ToDate' id='ToDate' value='" . $ToDate . "' size='13' class='transperentInput'>&nbsp; </b></td>
		<td colspan='3' ></td>
		</tr>
		<tr>
		<td width='20%'></td>
		<td align='center' width='2%'></td>
		<td><input type='Submit' value='Go'></td>
		<td width='20%'></td>
		<td align='center' width='2%'></td>
		<td></td>
		</tr>
		</table>
		</td>
		</tr>
		";
                            }
                            ?>
							<tr>
								<td colspan="3" class="inner-bodycurve-listing">
									<span id="ajax-listing" style="width: 100%"> </span>
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
		</td>
	</tr>
	<tr>
		<td style="height: 10px;">&nbsp;</td>
	</tr>
</table>
</form>
<script type="text/javascript">
    function changeURL(combo) {
        //alert(combo.value);
        // debugger;
        var redirect_url  = 'index.php?'+"<?php echo $_SERVER['QUERY_STRING'] ?>";
 
        if(combo.value!='') {
            file = $('input#file').val();
            if(file=='SubGroup') {
                window.location ='index.php?file='+file+'&AX=Yes&iCompanyId='+combo.value;
                return false;
            } else {
                var iCompanyId = $("select#iCompanyId").val();
             
                $.get(admin_url+'scripts/ajax/getGroup.php','iCompanyId='+iCompanyId+'&file='+file,function(data){
                    $("#showGroup").html(data);
                  
                    changeGroup();
                });
			
                //	alert('@@');
                //changeGroup();
			
            }
		
        }
    }

    function changeGroup()
    {
        //debugger;
        //alert(admin_url); return false;
        var iCompanyId='';
        var iSGroupId ='';
        var str_company='';
        var str_group='';
        iCompanyId = $("#iCompanyId").val();
        iSGroupId = $("#iSGroupId").val();
        //	alert(iSGroupId); return false;
        //	alert(iSGroupId+'@'+iCompanyId)
        //if(iSGroupId!=null && iCompanyId!=null ) 
        {
            //alert(iCompanyId +'##'+iSGroupId );
            //	alert(iCompanyId);
            if(iCompanyId!='') {
                str_company ='&iCompanyId='+iCompanyId;
            }
            if(iSGroupId!='') {
                str_group ='&iSGroupId='+iSGroupId;
            }
            file = $('input#file').val();
            url='index.php?file='+file+'&AX=Yes'+str_company+''+str_group;
            //	alert(url);
					
            window.location =url;
            return false;
        }
			
    }



    function changes_text(){
	
        if(document.getElementById('option').options[document.getElementById('option').selectedIndex].text == 'Status'){
	
            document.getElementById('keyword').style.display='none'; 
            var combo ="<select name='keyword' style='width:110px'><option VALUE='Inactive'> Inactive </option><option VALUE='Active'> Active </option></select>";
            document.getElementById('searchdiv').innerHTML= combo;
	
        }  else if(document.getElementById('option').options[document.getElementById('option').selectedIndex].text == 'Date & Time' || document.getElementById('option').options[document.getElementById('option').selectedIndex].text == 'Start Date' || document.getElementById('option').options[document.getElementById('option').selectedIndex].text == 'Date'|| document.getElementById('option').options[document.getElementById('option').selectedIndex].text == 'End Date' ||document.getElementById('option').options[document.getElementById('option').selectedIndex].text == 'Order Date'|| document.getElementById('option').options[document.getElementById('option').selectedIndex].text == 'Last Access Date' || document.getElementById('option').options[document.getElementById('option').selectedIndex].text == 'Last Login Date' )
        {
            document.getElementById('searchdiv').innerHTML="";
            document.getElementById('searchdiv').innerHTML="";
            document.getElementById('searchdiv').innerHTML= "<input style='vertical-align:middle;'  name='keyword' id='keyword' type='Text' size='15' value='<?php echo isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '' ?>' onkeypress='return valid_search(\"<?php echo $ListFile; ?>\")'>";
            //alert(img);
            var max; 
            if(document.getElementById('option').options[document.getElementById('option').selectedIndex].text == "Last Access Date"){
                max = "+0D"; 
            }
            var img = "<?php echo $CFG->wwwroot . "/public/images/" ?>cal.gif";
            $(function(){
                $("#keyword").datepicker({ dateFormat: 'MM dd,yy',
                    inline: true,
                    changeYear: true,
                    showOn: "both",
                    buttonImage: img,
                    buttonImageOnly: true,
                    maxDate:max
                });
            });
        }
        else{
            document.getElementById('searchdiv').innerHTML="";
            document.getElementById('searchdiv').innerHTML= "<input  name='keyword' id='keyword' type='Text' size='15' value='<?php echo isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '' ?>' onkeypress='return valid_search(\"<?php echo $ListFile; ?>\")'>";
        }
    }


    function CheckExtension(id)  
    {       
        var a=document.getElementById('vCSV').value;
        
        if(a==''){
            alert("Please Select Csv File To Upload");
            return false;
        } else {
            //alert(id);
            // alert("ok");return false;
            var valid_extensions = /(.csv)$/i; 
            //alert(valid_extensions.test(a));
  
            if(valid_extensions.test(a)){
                //alert("sds");return false;
                return true;  
            } else {
         
                alert("Please upload file with extension .csv");
                return false;
         
            }
        } 
    }
    function CheckExtension1(id)  
    {       
        var a=document.getElementById('vCSV1').value;
        
        if(a==''){
            alert("Please Select Csv File To Upload");
            return false;
        } else {
            //alert(id);
            // alert("ok");return false;
            var valid_extensions = /(.csv)$/i; 
            //alert(valid_extensions.test(a));
  
            if(valid_extensions.test(a)){
                //alert("sds");return false;
                return true;  
            } else {
         
                alert("Please upload file with extension .csv");
                return false;
         
            }
        } 
    } 
 

    function checkRecordLimit(val)
    {
        var sorton ='';
        var keyword='';
        var option='';
<?php
if (isset($_GET['sorton']) && $_GET['sorton'] != '') {
    echo "sorton = '&sorton=" . $_GET['sorton'] . "; ";
}


if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
    echo "keyword = '&keyword=" . $_GET['keyword'] . "; ";
}

if (isset($_GET['option']) && $_GET['option'] != '') {
    echo "option = '&option=" . $_GET['option'] . "; ";
}
?>

        AjaxRecListing('&'+sorton+''+keyword+''+option+'&TotalRecords='+val);
        //window.location.href = adminURL+'<?php echo $ListFile; ?>&'+sorton+''+keyword+''+option+'&TotalRecords='+val;
    }


</script>
<?php if (isset($RelatedArr['DateSearch']) && $RelatedArr['DateSearch'] == '1') { ?>
<script type="text/javascript">
        var img = "<?php echo $CFG->wwwroot . "/public/images/" ?>icon-calander.gif";
        $(function(){
            $("#ToDate").datepicker({ dateFormat: 'yy-mm-dd', 
                inline: true,
                changeYear: true,
                buttonText:'Click to Select Date',
                showOn: "both",
                buttonImage: img,
                buttonImageOnly: true});
        });
    </script>
<script type="text/javascript">
        var img = "<?php echo $CFG->wwwroot . "/public/images/" ?>icon-calander.gif";
        $(function(){
            $("#FromDate").datepicker({ dateFormat: 'yy-mm-dd', 
                inline: true,
                changeYear: true,
                buttonText:'Click to Select Date',
                showOn: "both",
                buttonImage: img,
                buttonImageOnly: true});
        });

                                                                         
    </script>
<?php } ?>
<script type="text/javascript">
    AjaxListing();
</script>
