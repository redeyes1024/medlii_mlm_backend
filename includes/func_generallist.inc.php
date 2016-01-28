<?php

include_once $CFG->dirroot . '/scripts/tools/CompanyGroupFilter.php';

function getFieldArray_List($ModuleName) {

	$Field_arr = array();
	$i = 0;
	//
	//    if ($ModuleName == "Admin") {
	//        $Field_arr[] = array("a.iAdminId", "iAdminId", "Id", "0", "No", "", "5%", "0", "0", "0");
	//        $Field_arr[] = array("concat(a.vFirstName,' ',a.vLastName)", "vFirstName", "Name", ++$i, "Yes", "left", "30%", "0", "1", "0");
	//        $Field_arr[] = array("a.vUserName", "vUserName", "User Name", ++$i, "Yes", "center", "15%", "0", "0", "0");
	//        $Field_arr[] = array("a.vEmail", "vEmail", "Email", ++$i, "Yes", "center", "20%", "0", "0", "0");
	//        $Field_arr[] = array("a.dLastLogin", "dLastLogin", "Last Access Date", ++$i, "Yes", "center", "20%", "Date_US_Format", "0", "0");
	//        $Field_arr[] = array("a.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "10%", "0", "0", "0");
	//    } else
	//        if ($ModuleName == "CompanyAdmin") {
	//        $Field_arr[] = array("a.iAdminId", "iAdminId", "Id", "0", "No", "", "5%", "0", "0", "0");
	//        $Field_arr[] = array("concat(a.vFirstName,' ',a.vLastName)", "vFirstName", "Name", ++$i, "Yes", "left", "30%", "0", "1", "0");
	//        $Field_arr[] = array("a.vUserName", "vUserName", "User Name", ++$i, "Yes", "center", "15%", "0", "0", "0");
	//        $Field_arr[] = array("a.vEmail", "vEmail", "Email", ++$i, "Yes", "center", "20%", "0", "0", "0");
	//        $Field_arr[] = array("a.dLastLogin", "dLastLogin", "Last Access Date", ++$i, "Yes", "center", "20%", "Date_US_Format", "0", "0");
	//        $Field_arr[] = array("a.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "10%", "0", "0", "0");
	//    } else
	//        if ($ModuleName == "SubGroupAdmin") {
	//        $Field_arr[] = array("a.iAdminId", "iAdminId", "Id", "0", "No", "", "5%", "0", "0", "0");
	//        $Field_arr[] = array("concat(a.vFirstName,' ',a.vLastName)", "vFirstName", "Name", ++$i, "Yes", "left", "30%", "0", "1", "0");
	//        $Field_arr[] = array("a.vUserName", "vUserName", "User Name", ++$i, "Yes", "center", "15%", "0", "0", "0");
	//        $Field_arr[] = array("a.vEmail", "vEmail", "Email", ++$i, "Yes", "center", "20%", "0", "0", "0");
	//        $Field_arr[] = array("a.dLastLogin", "dLastLogin", "Last Access Date", ++$i, "Yes", "center", "20%", "Date_US_Format", "0", "0");
	//        $Field_arr[] = array("a.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "10%", "0", "0", "0");
	//    } else
	switch ($ModuleName) {

		case "User":
			$Field_arr[] = array("u.iUserId", "iUserId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");
			$Field_arr[] = array("comp.iCompanyId", "iCompanyId", "iCompanyId", ++$i, "No", "left", "5%", "0", "1", "-1");
			$Field_arr[] = array("u.vUsername", "vUsername", "Username", ++$i, "Yes", "left", "40%", "0", "1", "0");
			$Field_arr[] = array("u.dLastLogin", "dLastLogin", "Last Login ", ++$i, "Yes", "center", "15%", "0", "0", "0");
			//$Field_arr[] = array("u.dLastAccess", "dLastAccess", "Last Access ", ++$i, "Yes", "center", "15%", "0", "0", "0");
			$Field_arr[] = array("u.dRegDate", "dRegDate", "Reg Date ", ++$i, "Yes", "center", "15%", "0", "0", "0");
			$Field_arr[] = array("u.eRights", "eRights", "System Rights", ++$i, "Yes", "center", "15%", "0", "0", "0");
			$Field_arr[] = array("u.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "15%", "0", "0", "0");

			break;
		case "CompanyAdmin":
			$Field_arr[] = array("u.iUserId", "iUserId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");
			$Field_arr[] = array("comp.iCompanyId", "iCompanyId", "iCompanyId", ++$i, "No", "left", "5%", "0", "1", "-1");
			$Field_arr[] = array("u.vUsername", "vUsername", "Username", ++$i, "Yes", "left", "40%", "0", "1", "0");
			$Field_arr[] = array("u.dLastLogin", "dLastLogin", "Last Login ", ++$i, "Yes", "center", "15%", "0", "0", "0");
			$Field_arr[] = array("u.dLastAccess", "dLastAccess", "Last Access ", ++$i, "Yes", "center", "15%", "0", "0", "0");
			$Field_arr[] = array("u.dRegDate", "dRegDate", "Reg Date ", ++$i, "Yes", "center", "15%", "0", "0", "0");
			$Field_arr[] = array("u.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "15%", "0", "0", "0");

			break;
		case "SubGroupAdmin":
			$Field_arr[] = array("u.iUserId", "iUserId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");
			$Field_arr[] = array("comp.iCompanyId", "iCompanyId", "iCompanyId", ++$i, "No", "left", "5%", "0", "1", "-1");
			$Field_arr[] = array("sg.iSGroupId", "iSGroupId", "iSGroupId", ++$i, "No", "left", "5%", "0", "1", "-1");
			$Field_arr[] = array("u.vUsername", "vUsername", "Username", ++$i, "Yes", "left", "40%", "0", "1", "0");
			$Field_arr[] = array("u.dLastLogin", "dLastLogin", "Last Login ", ++$i, "Yes", "center", "15%", "0", "0", "0");
			$Field_arr[] = array("u.dLastAccess", "dLastAccess", "Last Access ", ++$i, "Yes", "center", "15%", "0", "0", "0");
			$Field_arr[] = array("u.dRegDate", "dRegDate", "Reg Date ", ++$i, "Yes", "center", "15%", "0", "0", "0");
			$Field_arr[] = array("u.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "15%", "0", "0", "0");

			break;
		case "Company":
			$Field_arr[] = array("c.iCompanyId", "iCompanyId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");
			$Field_arr[] = array("c.vCompanyName", "vCompanyName", "Organization Name", ++$i, "Yes", "left", "25%", "0", "1", "0");
			$Field_arr[] = array("c.vCompanyCodeId", "vCompanyCodeId", "Organization Id", ++$i, "Yes", "left", "25%", "0", "0", "0");
			// $Field_arr[] = array("c.vEmail", "vEmail", "Email", ++$i, "Yes", "left", "25%", "0", "0", "0");
			$Field_arr[] = array("c.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "25%", "0", "0", "0");
			break;
		case "SubGroup":
			$Field_arr[] = array("sg.iSGroupId", "iSGroupId", "Id", 0, "No", "left", "5%", "0", "1", "0");
			$Field_arr[] = array("sg.iCompanyId", "iCompanyId", "iCompanyId", ++$i, "No", "left", "5%", "0", "1", "-1");
			$Field_arr[] = array("sg.vGroupName", "vGroupName", "Group Name", ++$i, "Yes", "left", "25%", "0", "1", "0");
			$Field_arr[] = array("sg.vGroupCodeId", "vGroupCodeId", "Group Id", ++$i, "Yes", "left", "25%", "0", "0", "0");
			$Field_arr[] = array("sg.vEmail", "vEmail", "Email", ++$i, "Yes", "left", "25%", "0", "0", "0");
			$Field_arr[] = array("sg.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "25%", "0", "0", "0");
			break;
		case "UsersGroups":
			$Field_arr[] = array("sg.iSGroupId", "iSGroupId", "Id", 0, "No", "left", "5%", "0", "1", "0");
			$Field_arr[] = array("sg.vGroupName", "vGroupName", "Group Name", ++$i, "Yes", "left", "25%", "0", "1", "0");
			$Field_arr[] = array("sg.vGroupCodeId", "vGroupCodeId", "Group Id", ++$i, "Yes", "left", "25%", "0", "0", "0");
			$Field_arr[] = array("sg.vEmail", "vEmail", "Email", ++$i, "Yes", "left", "25%", "0", "0", "0");
			$Field_arr[] = array("sg.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "25%", "0", "0", "0");
			break;
		case "GroupsForUsers":
			$Field_arr[] = array("sg.iSGroupId", "iSGroupId", "Id", 0, "No", "left", "5%", "0", "1", "0");
			$Field_arr[] = array("sg.vGroupName", "vGroupName", "Group Name", ++$i, "Yes", "left", "25%", "0", "1", "0");
			$Field_arr[] = array("sg.vGroupCodeId", "vGroupCodeId", "Group Id", ++$i, "Yes", "left", "25%", "0", "0", "0");
			$Field_arr[] = array("sg.vEmail", "vEmail", "Email", ++$i, "Yes", "left", "25%", "0", "0", "0");
			$Field_arr[] = array("sg.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "25%", "0", "0", "0");
			break;
		case "Directory":
			$Field_arr[] = array("d.iDirectoryId", "iDirectoryId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");
			$Field_arr[] = array("comp.iCompanyId", "iCompanyId", "iCompanyId", ++$i, "No", "left", "5%", "0", "1", "-1");
			$Field_arr[] = array("concat(d.vFirstname,' ',d.vLastname)", "vFirstname", "Name", ++$i, "Yes", "left", "20%", "0", "1", "0");
			$Field_arr[] = array("d.vEmail", "vEmail", "Email", ++$i, "Yes", "left", "20%", "0", "0", "0");
			$Field_arr[] = array("d.vPhone", "vPhone", "Phone", ++$i, "Yes", "center", "15%", "0", "0", "0");
			$Field_arr[] = array("d.vJobTitle", "vJobTitle", "Job Title", ++$i, "Yes", "left", "10%", "0", "0", "0");
			$Field_arr[] = array("d.vDept", "vDept", "Department", ++$i, "Yes", "left", "10%", "0", "0", "0");
			$Field_arr[] = array("d.vEmpId", "vEmpId", "Employee ID", ++$i, "Yes", "center", "10%", "0", "0", "0");
			$Field_arr[] = array("d.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "10%", "0", "0", "0");
			break;
		case "Events":
			$Field_arr[] = array("e.iEventId", "iEventId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");

			$Field_arr[] = array("e.vEventTitle", "vEventTitle", "Event Title", ++$i, "Yes", "left", "40%", "0", "1", "0");
			$Field_arr[] = array("e.dEventDateTime", "dEventDateTime", "Date", ++$i, "Yes", "left", "40%", "DateTime_Format_TBD", "0", "0");
			$Field_arr[] = array("e.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "15%", "0", "0", "0");
			break;
		case "Courses":
			$Field_arr[] = array("c.iCourseId", "iCourseId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");

			$Field_arr[] = array("c.vCoursename", "vCoursename", "Course Title", ++$i, "Yes", "left", "40%", "0", "1", "0");
			$Field_arr[] = array("c.dCourseDateTime", "dCourseDateTime", "Date", ++$i, "Yes", "left", "30%", "DateTime_Format_TBD", "0", "0");
			$Field_arr[] = array("c.iCourseId", "image", "View Classes", 0, "No", "center", "10%", "view_button_course", "0", "0");
			$Field_arr[] = array("c.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "15%", "0", "0", "0");
			break;
		case "CoursesClasses":
			$Field_arr[] = array("cc.iCCId", "iCCId", "Id", ++$i, "No", "left", "1%", "0", "1", "0");

			$Field_arr[] = array("c.vClassname", "vClassname", "Class", ++$i, "Yes", "left", "30%", "0", "1", "0");
			$Field_arr[] = array("cc.dClassDateTime", "dClassDateTime", "Date", ++$i, "Yes", "left", "30%", "DateTime_Format_TBD", "0", "0");
			$Field_arr[] = array("cc.iDuration", "iDuration", "Duration", ++$i, "Yes", "center", "10%", "0", "0", "0");
			$Field_arr[] = array("cc.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "20%", "0", "0", "0");
			break;
		case "Classes":
			$Field_arr[] = array("cl.iClassId", "iClassId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");

			$Field_arr[] = array("cl.vClassname", "vClassname", "Name", ++$i, "Yes", "left", "70%", "0", "1", "0");
			$Field_arr[] = array("cl.iClassId", "image", "View Courses", 0, "No", "center", "10%", "view_button_class", "0", "0");
			$Field_arr[] = array("cl.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "15%", "0", "0", "0");
			break;
		case "Library":
			$Field_arr[] = array("l.iLibCategoryId", "iLibCategoryId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");

			$Field_arr[] = array("l.vCategoryName", "vCategoryName", "Category", ++$i, "Yes", "left", "70%", "0", "1", "0");
			$Field_arr[] = array("l.iLibCategoryId", "image", "View Documents", 0, "No", "center", "10%", "view_button_document", "0", "0");
			$Field_arr[] = array("l.eStatus", "eStatus", "Status ", ++$i, "Yes", "center", "15%", "0", "0", "0");
			break;
		case "VideoCategory":
			$Field_arr[] = array("vc.iVideoCategoryId", "iVideoCategoryId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");

			$Field_arr[] = array("vc.vCategoryName", "vCategoryName", "Category", ++$i, "Yes", "left", "70%", "0", "1", "0");
			$Field_arr[] = array("vc.iVideoCategoryId", "image", "View Videos", 0, "No", "center", "10%", "view_button_video", "0", "0");
			$Field_arr[] = array("vc.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "15%", "0", "0", "0");
			break;
		case "Video":
			$Field_arr[] = array("v.iVideoId", "iVideoId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");

			$Field_arr[] = array("v.vVideoName", "vVideoName", "Video Title", ++$i, "Yes", "left", "80%", "0", "1", "0");
			$Field_arr[] = array("v.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "15%", "0", "0", "0");
			break;
		case "Audio":
			$Field_arr[] = array("au.iAudioId", "iAudioId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");

			$Field_arr[] = array("au.vAudioName", "vAudioName", "Audio Title", ++$i, "Yes", "left", "80%", "0", "1", "0");
			$Field_arr[] = array("au.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "15%", "0", "0", "0");
			break;
		case "AudioCategory":
			$Field_arr[] = array("ac.iAudioCategoryId", "iAudioCategoryId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");

			$Field_arr[] = array("ac.vCategoryName", "vCategoryName", "Category", ++$i, "Yes", "left", "70%", "0", "1", "0");
			$Field_arr[] = array("ac.iAudioCategoryId", "image", "View Audios", 0, "No", "center", "10%", "view_button_audio", "0", "0");
			$Field_arr[] = array("ac.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "15%", "0", "0", "0");
			break;
		case "Documents":
			$Field_arr[] = array("do.iDocumentId", "iDocumentId", "Id", ++$i, "No", "left", "5%", "0", "1", "0");

			$Field_arr[] = array("do.vDocumentName", "vDocumentName", "Document", ++$i, "Yes", "left", "80%", "0", "1", "0");
			$Field_arr[] = array("do.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "15%", "0", "0", "0");
			break;
			//        case "Faq":
			//            $Field_arr[] = array("fq.iFaqId", "iFaqId", "Id", "0", "No", "", "3%", "0", "0", "0");
			//            $Field_arr[] = array("fq.vQuestion", "vQuestion", "Question", ++$i, "Yes", "left", "35%", "0", "1", "0");
			//            $Field_arr[] = array("fq.vAnswer", "vAnswer", "Answer", ++$i, "Yes", "left", "35%", "0", "0", "0");
			//            $Field_arr[] = array("fq.iOrderBy", "iOrderBy", "Order", ++$i, "Yes", "center", "15%", "0", "0", "0");
			//            $Field_arr[] = array("fq.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "10%", "", "0", "0");
			//            break;
			//        case "LoginHistory":
			//            $Field_arr[] = array("lh.iLogId", "iLogId", "Id", "0", "No", "", "3%", "0", "0", "0");
			//            $Field_arr[] = array("concat(admin.vFirstName,' ',admin.vLastName)", "vFirstName", "Name", ++$i, "Yes", "left", "35%", "0", "0", "0");
			//            $Field_arr[] = array("lh.vIP", "vIP", "IP Address", ++$i, "Yes", "left", "30%", "0", "0", "0");
			//            $Field_arr[] = array("lh.dLoginDate", "dLoginDate", "Last Login Date", ++$i, "Yes", "center", "30%", "", "0", "0");
			//            break;
		case "SystemMails":
			$Field_arr[] = array("se.iEmailTemplateId", "iEmailTemplateId", "Id", "0", "No", "", "3%", "0", "0", "0");
			$Field_arr[] = array("se.vEmailTitle", "vEmailTitle", "Title", ++$i, "Yes", "left", "25%", "0", "1", "0");
			$Field_arr[] = array("se.vFromName", "vFromName", "From", ++$i, "Yes", "left", "25%", "0", "0", "0");
			$Field_arr[] = array("se.vEmailSubject", "vEmailSubject", "Subject", ++$i, "Yes", "left", "48%", "0", "0", "0");
			break;
			//        case "Pagesetting":
			//            $Field_arr[] = array("p.iPageId", "iPageId", "Id", "0", "No", "", "", "0", "0", "0");
			//            $Field_arr[] = array("p.vPageTitle", "vPageTitle", "Page Title", ++$i, "Yes", "left", "25%", "0", "1", "0");
			//            $Field_arr[] = array("p.vPageCode", "vPageCode", "Page Code", ++$i, "Yes", "left", "15%", "0", "0", "0");
			//            $Field_arr[] = array("p.vFileName", "vFileName", "File name", ++$i, "Yes", "left", "15%", "0", "0", "0");
			//            $Field_arr[] = array("p.eStatus", "eStatus", "Status", ++$i, "Yes", "center", "8%", "0", "0", "0");
			//            break;



		default:
			break;
	}
	return $Field_arr;
}

// Return the Extra Module Related Data..
//  Pass table name ion below format [REQUIRED]
//	if single table $RelatedArr[Table][0]='tablename||aliasname';
//	if want another table $RelatedArr[Table][1]='tablename||aliasname';
//	you can add multiple table just increment 0,1,2,3,etc....
//	LeftJoinCondition >> [Optional]if you want to use left join then you hv to pass two table..
// 	ExtraCondition	>> [Optional] , you can pass any other condition (start with and e.g and eStatus='Active')
// 	Status_Field 	>> [REQUIRED] pass table's status field otherwise blank
//	AddFile			>> [REQUIRED] Add file name
//	Primary_Field	>> [REQUIRED] primary field of table without alias name
//	DefaultSort		>> [REQUIRED] default sorting on which field
//	AlphaSearch		>> [Optional]  alpha searhing on which field
//	ListTitle		>> [REQUIRED]  Listing Title
//	LegendTitle		>> [REQUIRED]  Legend Title
//	GroupBy			>> [Optional]  for group by
//	$RelatedArr[Image_Path] = '';
//   TabHeader = Tabname||TabId
//  LeftJoinConditionTable >> [Optional], in which table you want to set left join sql, pass 0,1,2
/*
 for display Active,Inactive, delete, add buttons pass value in this format 1|1|1|1 or 0|0|0|0 (Active|Inactive|Delete|Add) 1
 ex >	RelatedArr[ActiveInactiveDeleteAdd]='0|0|1|0' >> Means (Active,Inactive,add button not display, delete button display
 */


function getExtraArray_List($ModuleName, $ReturnParam = "") {

	global $obj, $_GET, $GENERAL_LISTFILE_NAME, $shop_coma, $GeneralObj;



	switch ($ModuleName) {



		case 'GroupsForUsers':
			$RelatedArr['Table'][0] = 'SubGroup||sg';
			//$RelatedArr['Table'][1] = 'admin||a';
			$RelatedArr['AddFile'] = "index.php?file=a-subgroupuserassignadd";
			$RelatedArr['Primary_Field'] = 'iSubGroup';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'sg.vGroupName';
			$RelatedArr['ListTitle'] = "Groups Listing";
			$RelatedArr['LegendTitle'] = "Groups ";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "0|0|0|0|1|0";
			$RelatedArr['LeftJoinCondition'] = '';
			$RelatedArr['ExtraCondition'] = 'and iIsDefault=0 and sg.iCompanyId=' . $_REQUEST['iCompanyId'];

			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			$RelatedArr['BackToTitle'] = 'Back to Users Groups Listing';
			$RelatedArr['BackToLink'] = "index.php?file=UsersGroups&AX=Yes&iUserId=" . $_REQUEST['iUserId'] . "&iCompanyId=" . $_REQUEST['iCompanyId'];
			break;

		case 'UsersGroups':
			$RelatedArr['Table'][0] = 'SubGroupUserAssign||ass';
			//$RelatedArr['Table'][1] = 'admin||a';
			$RelatedArr['AddFile'] = "index.php?file=GroupsForUsers&AX=Yes&iUserId=" . $_REQUEST['iUserId'] . "&iCompanyId=" . $_REQUEST['iCompanyId'];
			$RelatedArr['Primary_Field'] = 'iSubGroupUserAssignID';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'sg.vGroupName';
			$RelatedArr['ListTitle'] = "Users Groups Listing";
			$RelatedArr['LegendTitle'] = "Users Groups ";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "0|0|0|1|0|1";
			$RelatedArr['LeftJoinCondition'] = 'join SubGroup sg on sg.iSGroupId=ass.iSGroupId';
			$RelatedArr['ExtraCondition'] = 'and ass.iUserId=' . $_REQUEST['iUserId']." and sg.iIsDefault=0 ";

			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			$RelatedArr['TabHeader'] = 'User||2';
			$RelatedArr['BackToTitle'] = 'Back to User Listing';
			$RelatedArr['BackToLink'] = 'index.php?file=User&AX=Yes&iUserId=' . $_REQUEST['iUserId'] . "&iCompanyId=" . $_REQUEST['iCompanyId'];
			break;

		case 'User':

			$RelatedArr['Table'][0] = 'User||u';

			if ($_SESSION['sess_eType'] == '4') {
				$RelatedArr['AddFile'] = "index.php?file=m-useradd" . ($_REQUEST['iCompanyId']>0 ?'&iCompanyId=' . $_REQUEST['iCompanyId'] :'') . ($_REQUEST['iSGroupId']>0  ? "&iSGroupId=" . $_REQUEST['iSGroupId']:'' );
			} else if ($_SESSION['sess_eType'] == '3') {
				$RelatedArr['AddFile'] = "index.php?file=m-useradd&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == '2') {
				$RelatedArr['AddFile'] = "index.php?file=m-useradd";
			}

			$RelatedArr['Primary_Field'] = 'iUserId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'u.vUsername';
			$RelatedArr['ListTitle'] = "User Listing";
			$RelatedArr['LegendTitle'] = "User";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = 'JOIN SubGroupUserAssign sga ON sga.iUserId = u.iUserId JOIN SubGroup sg ON sg.iSGroupId = sga.iSGroupId JOIN Company comp ON comp.iCompanyId = sg.iCompanyId';

			if ($_SESSION['sess_eType'] > 2) {
				if ($_REQUEST['iSGroupId']>0) {
					$RelatedArr['ExtraCondition'] .= ' AND sga.iSGroupId=' . $_REQUEST['iSGroupId'];
				} else {
					if ($_REQUEST['iCompanyId']>0) {
						$RelatedArr['ExtraCondition'] .= ' AND comp.iCompanyId=' . $_REQUEST['iCompanyId'];
					} else {
						if ($_SESSION['sess_eType'] == 3) {
							$RelatedArr['ExtraCondition'] = ' AND comp.iCompanyId=' . $_SESSION['sess_iCompanyId'];
						}
					}
				}
			} else {
				$ar = array();
				foreach ($_SESSION["sess_iSGroupIds"] as $key => $value) {
					$ar[] = $value['iSGroupId'];
				}
				$RelatedArr['ExtraCondition'] = ' AND sga.iSGroupId in (' . implode(",", $ar) . ')';
			}

			$RelatedArr['GroupBy'] = 'u.iUserId,u.vUsername,u.dLastLogin,u.dLastAccess,u.dRegDate,u.eStatus';
			$RelatedArr['Image_Path'] = '';
			break;






		case 'CompanyAdmin':
			$filter = new CompanyGroupFilter($_SESSION["sess_iAdminId"], $_SESSION['sess_eType']);
			$RelatedArr['Table'][0] = 'User||u';
			if ($_SESSION['sess_eType'] == '4') {
				$RelatedArr['AddFile'] = "index.php?file=m-useradd&" . ($_REQUEST['iCompanyId'] > 0 ? "iCompanyId=" . $_REQUEST['iCompanyId'] : '');
			} else if ($_SESSION['sess_eType'] == '3') {
				$RelatedArr['AddFile'] = "index.php?file=m-useradd&iCompanyId=" . $_SESSION["sess_iCompanyId"];
			}

			$RelatedArr['Primary_Field'] = 'iUserId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'u.vUsername';

			$RelatedArr['ListTitle'] = "Organization Admin Listing";
			$RelatedArr['LegendTitle'] = "User ";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";

			$RelatedArr['LeftJoinCondition'] = 'JOIN SubGroupUserAssign sga ON sga.iUserId = u.iUserId JOIN SubGroup sg ON sg.iSGroupId = sga.iSGroupId JOIN Company comp ON comp.iCompanyId = sg.iCompanyId';
			$RelatedArr['ExtraCondition'] = 'and u.eRights=3 and comp.iCompanyId=' . $_REQUEST['iCompanyId'];



			$RelatedArr['GroupBy'] = 'u.iUserId,u.vUsername,u.dLastLogin,u.dLastAccess,u.dRegDate,u.eStatus';

			if ($_SESSION["sess_eType"] != "3") {
				$RelatedArr['BackToTitle'] = 'Back to Organization Listing';
				$RelatedArr['BackToLink'] = 'index.php?file=Company&AX=Yes';
			}
			$RelatedArr['Image_Path'] = '';

			$RelatedArr['TabHeader'] = 'Company||2';

			break;



		case 'SubGroupAdmin':

			$RelatedArr['Table'][0] = 'User||u';
			if ($_SESSION['sess_eType'] == '4') {
				$RelatedArr['AddFile'] = "index.php?file=m-useradd&" . ($_REQUEST['iCompanyId'] > 0 ? "iCompanyId=" . $_REQUEST['iCompanyId'] : '') . ($_REQUEST['iSGroupId'] > 0 ? "&iSGroupId=" . $_REQUEST['iSGroupId'] : '');
			} else if ($_SESSION['sess_eType'] == '3') {
				$RelatedArr['AddFile'] = "index.php?file=m-useradd&iCompanyId=" . $_SESSION["sess_iCompanyId"] . ($_REQUEST['iSGroupId'] > 0 ? "&iSGroupId=" . $_REQUEST['iSGroupId'] : '');
			}

			$RelatedArr['Primary_Field'] = 'iUserId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'u.vUsername';

			$RelatedArr['ListTitle'] = "Company Admin Listing";
			$RelatedArr['LegendTitle'] = "User ";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";

			$RelatedArr['LeftJoinCondition'] = 'JOIN SubGroupUserAssign sga ON sga.iUserId = u.iUserId JOIN SubGroup sg ON sg.iSGroupId = sga.iSGroupId JOIN Company comp ON comp.iCompanyId = sg.iCompanyId';
			$RelatedArr['ExtraCondition'] = 'and u.eRights=2 and comp.iCompanyId=' . $_REQUEST['iCompanyId'] . ' and sg.iSGroupId=' . $_REQUEST['iSGroupId'];



			$RelatedArr['GroupBy'] = 'u.iUserId,u.vUsername,u.dLastLogin,u.dLastAccess,u.dRegDate,u.eStatus';


			$RelatedArr['BackToTitle'] = 'Back to Group Listing';
			$RelatedArr['BackToLink'] = 'index.php?file=SubGroup&AX=Yes';

			$RelatedArr['Image_Path'] = '';

			$RelatedArr['TabHeader'] = 'Group||2';

			break;





		case 'Company':
			$RelatedArr['Table'][0] = 'Company||c';
			//$RelatedArr['Table'][1] = 'admin||a';
			//$iCompanyId =	$GeneralObj->giveCompanyId();
			$RelatedArr['AddFile'] = "index.php?file=m-companyadd";
			$RelatedArr['Primary_Field'] = 'iCompanyId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'c.vCompanyName';
			$RelatedArr['ListTitle'] = "Organization Listing";
			$RelatedArr['LegendTitle'] = "Organization";
			$RelatedArr['Status_Field'] = 'eStatus';

			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = '';
			$RelatedArr['ExtraCondition'] = '';
			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			break;







		case 'SubGroup':
			$RelatedArr['Table'][0] = 'SubGroup||sg';

			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-subgroupadd" . ($_REQUEST['iCompanyId'] > 0 ? "&iCompanyId=" . $_REQUEST['iCompanyId'] : '');
			} else {
				$RelatedArr['AddFile'] = "index.php?file=m-subgroupadd";
			}

			$RelatedArr['Primary_Field'] = 'iSGroupId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'sg.vGroupName';
			$RelatedArr['ListTitle'] = "Group Listing"; ///
			$RelatedArr['LegendTitle'] = "Group";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ExtraCondition'] = 'and iIsDefault=0';

			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = '';
			if (!empty($_REQUEST['iCompanyId']) && $_SESSION["sess_eType"] == "4") {
				$RelatedArr['ExtraCondition'] .= " AND sg.iCompanyId = '" . $_REQUEST['iCompanyId'] . "' ";
			} else if ($_SESSION["sess_eType"] == "3") {
				$RelatedArr['ExtraCondition'] .= " AND sg.iCompanyId = '" . $_SESSION['sess_iCompanyId'] . "' ";
			}
			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			break;







		case 'Directory':
			$RelatedArr['Table'][0] = 'Directory||d';
			//$RelatedArr['Table'][1] = 'admin||a';
			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-directoryadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-directoryadd&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['AddFile'] = "index.php?file=m-directoryadd";
			}

			$RelatedArr['Primary_Field'] = 'iDirectoryId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'd.vFirstname';
			$RelatedArr['ListTitle'] = "Directory Listing";
			$RelatedArr['LegendTitle'] = "Directory";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = ' join SubGroup sg on sg.iSGroupId=d.iSGroupId join Company comp on comp.iCompanyId=sg.iCompanyId';

			if ($_SESSION['sess_eType'] > 2) {
				if ($_REQUEST['iSGroupId'] > 0) {
					$RelatedArr['ExtraCondition'] .= ' AND d.iSGroupId=' . $_REQUEST['iSGroupId'];
				} else {
					if ($_REQUEST['iCompanyId'] > 0) {
						$RelatedArr['ExtraCondition'] .= ' AND comp.iCompanyId=' . $_REQUEST['iCompanyId'];
					} else {
						if ($_SESSION['sess_eType'] == 3) {
							$RelatedArr['ExtraCondition'] = ' AND comp.iCompanyId=' . $_SESSION['sess_iCompanyId'];
						}
					}
				}
			} else {
				$ar = array();
				foreach ($_SESSION["sess_iSGroupIds"] as $key => $value) {
					$ar[] = $value['iSGroupId'];
				}
				$RelatedArr['ExtraCondition'] = ' AND d.iSGroupId in (' . implode(",", $ar) . ')';
			}


			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			break;










		case 'Events':
			$RelatedArr['Table'][0] = 'Event||e';
			//$RelatedArr['Table'][1] = 'admin||a';
			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-eventadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-eventadd&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['AddFile'] = "index.php?file=m-eventadd";
			}
			$RelatedArr['Primary_Field'] = 'iEventId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'e.vEventTitle';
			$RelatedArr['ListTitle'] = "Event Listing";
			$RelatedArr['LegendTitle'] = "Event";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = '';
			if (!empty($_REQUEST['iSGroupId']) && ($_SESSION["sess_eType"] == "4" || $_SESSION['sess_eType'] == "3")) {
				$RelatedArr['ExtraCondition'] = 'AND e.iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['ExtraCondition'] = 'AND e.iSGroupId=' . $_SESSION['sess_iSGroupId'];
			} else {
				$RelatedArr['ExtraCondition'] = '';
			}
			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			break;







		case 'Courses':
			$RelatedArr['Table'][0] = 'Course||c';
			//$RelatedArr['Table'][1] = 'admin||a';
			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-courseadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-courseadd&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['AddFile'] = "index.php?file=m-courseadd";
			}
			$RelatedArr['Primary_Field'] = 'iCourseId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'c.vCoursename';
			$RelatedArr['ListTitle'] = "Course Listing";
			$RelatedArr['LegendTitle'] = "Course";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = '';
			if (!empty($_REQUEST['iCourseIds']) && ($_SESSION["sess_eType"] == "4" || $_SESSION['sess_eType'] == "3")) {
				$RelatedArr['ExtraCondition'] = 'AND c.iCourseId IN  (' . $_REQUEST['iCourseIds'] . ') AND iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if (!empty($_REQUEST['iCourseIds']) && $_SESSION["sess_eType"] == "2") {
				$RelatedArr['ExtraCondition'] = 'AND c.iCourseId IN  (' . $_REQUEST['iCourseIds'] . ') AND iSGroupId=' . $_SESSION['sess_iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "4" || $_SESSION['sess_eType'] == "3") {
				$RelatedArr['ExtraCondition'] = 'AND c.iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['ExtraCondition'] = 'AND c.iSGroupId=' . $_SESSION['sess_iSGroupId'];
			}
			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			break;







		case 'CoursesClasses':
			$RelatedArr['Table'][0] = 'CourseClasses||cc';
			//$RelatedArr['Table'][1] = 'admin||a';
			if (!empty($_REQUEST['iCourseId']) && $_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-courseclassesadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'] . "&iCourseId=" . $_REQUEST['iCourseId'];
			} else if (!empty($_REQUEST['iCourseId']) && $_SESSION['sess_eType'] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-courseclassesadd&iSGroupId=" . $_REQUEST['iSGroupId'] . "&iCourseId=" . $_REQUEST['iCourseId'];
			} else if (!empty($_REQUEST['iCourseId']) && $_SESSION["sess_eType"] == "2") {
				$RelatedArr['AddFile'] = "index.php?file=m-courseclassesadd&iCourseId=" . $_REQUEST['iCourseId'];
			} else if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-courseclassesadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-courseclassesadd&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['AddFile'] = "index.php?file=m-courseclassesadd";
			}
			$RelatedArr['Primary_Field'] = 'iCCId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'c.vClassname';
			$RelatedArr['ListTitle'] = "Class Listing";
			$RelatedArr['LegendTitle'] = "Class";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = 'JOIN Class c ON c.iClassId =  cc.iClassId JOIN Course co ON  co.iCourseId = cc.iCourseId';
			if (!empty($_REQUEST['iCourseId'])) {
				$RelatedArr['ExtraCondition'] = ' AND co.iCourseId = ' . $_REQUEST['iCourseId'];
			} else {
				$RelatedArr['ExtraCondition'] = '';
			}
			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			$RelatedArr['BackToTitle'] = 'Back To Course Listing';
			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['BackToLink'] = 'index.php?file=Courses&AX=Yes&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == "3") {
				$RelatedArr['BackToLink'] = 'index.php?file=Courses&AX=Yes&iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['BackToLink'] = 'index.php?file=Courses&AX=Yes';
			}

			$RelatedArr['TabHeader'] = 'Course||2';
			break;







		case 'VideoCategory':
			$RelatedArr['Table'][0] = 'VideoCategory||vc';
			//$RelatedArr['Table'][1] = 'admin||a';
			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-videocategoryadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-videocategoryadd&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == '2') {
				$RelatedArr['AddFile'] = "index.php?file=m-videocategoryadd";
			}
			$RelatedArr['Primary_Field'] = 'iVideoCategoryId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'vc.vCategoryName';
			$RelatedArr['ListTitle'] = "Video Category Listing";
			$RelatedArr['LegendTitle'] = "Video Category";
			$RelatedArr['Status_Field'] = 'eStatus';

			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = '';
			if (!empty($_REQUEST['iSGroupId']) && $_SESSION["sess_eType"] == "4") {
				$RelatedArr['ExtraCondition'] = ' AND iSGroupId = ' . $_REQUEST['iSGroupId'];
			} else if (!empty($_REQUEST['iSGroupId']) && $_SESSION["sess_eType"] == "3") {
				$RelatedArr['ExtraCondition'] = ' AND iSGroupId = ' . $_REQUEST['iSGroupId'];
			} else if (!empty($_REQUEST['iSGroupId']) && $_SESSION['sess_eType'] == 'Group Admin') {
				$RelatedArr['ExtraCondition'] = ' AND iSGroupId = ' . $_SESSION['sess_iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "4" || $_SESSION["sess_eType"] == "3") {
				$RelatedArr['ExtraCondition'] = ' AND iSGroupId = ' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == 'Group Admin') {
				$RelatedArr['ExtraCondition'] = ' AND iSGroupId = ' . $_SESSION['sess_iSGroupId'];
			}

			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			break;











		case 'AudioCategory':
			$RelatedArr['Table'][0] = 'AudioCategory||ac';
			//$RelatedArr['Table'][1] = 'admin||a';
			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-audiocategoryadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-audiocategoryadd&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == '2') {
				$RelatedArr['AddFile'] = "index.php?file=m-audiocategoryadd";
			}
			$RelatedArr['Primary_Field'] = 'iAudioCategoryId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'ac.vCategoryName';
			$RelatedArr['ListTitle'] = "Audio Category Listing";
			$RelatedArr['LegendTitle'] = "Audio Category";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = '';
			if (!empty($_REQUEST['iSGroupId']) && $_SESSION["sess_eType"] == "4") {
				$RelatedArr['ExtraCondition'] = ' AND iSGroupId = ' . $_REQUEST['iSGroupId'];
			} else if (!empty($_REQUEST['iSGroupId']) && $_SESSION["sess_eType"] == "3") {
				$RelatedArr['ExtraCondition'] = ' AND iSGroupId = ' . $_REQUEST['iSGroupId'];
			} else if (!empty($_REQUEST['iSGroupId']) && $_SESSION['sess_eType'] == '2') {
				$RelatedArr['ExtraCondition'] = ' AND iSGroupId = ' . $_SESSION['sess_iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "4" || $_SESSION["sess_eType"] == "3") {
				$RelatedArr['ExtraCondition'] = ' AND iSGroupId = ' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == 'Group Admin') {
				$RelatedArr['ExtraCondition'] = ' AND iSGroupId = ' . $_SESSION['sess_iSGroupId'];
			}
			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			break;









		case 'Classes':
			$RelatedArr['Table'][0] = 'Class||cl';
			//$RelatedArr['Table'][1] = 'admin||a';
			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-classadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-classadd&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['AddFile'] = "index.php?file=m-classadd";
			}

			$RelatedArr['Primary_Field'] = 'iClassId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'cl.vClassname';
			$RelatedArr['ListTitle'] = "Class Listing";
			$RelatedArr['LegendTitle'] = "Class";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = '';
			if ($_SESSION["sess_eType"] == "4" || $_SESSION['sess_eType'] == "3") {
				$RelatedArr['ExtraCondition'] = 'AND cl.iSGroupId =' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['ExtraCondition'] = 'AND cl.iSGroupId =' . $_SESSION['sess_iSGroupId'];
			}
			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			break;








		case 'Library':
			$RelatedArr['Table'][0] = 'LibraryCategory||l';
			//$RelatedArr['Table'][1] = 'admin||a';
			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-libraryadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-libraryadd&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['AddFile'] = "index.php?file=m-libraryadd";
			}
			$RelatedArr['Primary_Field'] = 'iLibCategoryId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'l.vCategoryName';
			$RelatedArr['ListTitle'] = "Library Listing";
			$RelatedArr['LegendTitle'] = "Library";
			$RelatedArr['Status_Field'] = 'eStatus';

			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = '';
			if ($_SESSION["sess_eType"] == "4" || $_SESSION['sess_eType'] == "3") {
				$RelatedArr['ExtraCondition'] = " AND iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['ExtraCondition'] = " AND iSGroupId=" . $_SESSION['sess_iSGroupId'];
			}
			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			break;










		case 'Video':
			$RelatedArr['Table'][0] = 'Video||v';
			//$RelatedArr['Table'][1] = 'admin||a';
			if (!empty($_REQUEST['iVideoCategoryId']) && $_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-videoadd&iVideoCategoryId=" . $_REQUEST['iVideoCategoryId'] . "&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if (!empty($_REQUEST['iVideoCategoryId']) && $_SESSION["sess_eType"] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-videoadd&iVideoCategoryId=" . $_REQUEST['iVideoCategoryId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if (!empty($_REQUEST['iVideoCategoryId']) && $_SESSION['sess_eType'] == '2') {
				$RelatedArr['AddFile'] = "index.php?file=m-videoadd&iVideoCategoryId=" . $_REQUEST['iVideoCategoryId'];
			} else if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-videoadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-videoadd&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == '2') {
				$RelatedArr['AddFile'] = "index.php?file=m-videoadd";
			}
			$RelatedArr['Primary_Field'] = 'iVideoId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'v.vVideoName';
			$RelatedArr['ListTitle'] = "Video Listing";
			$RelatedArr['LegendTitle'] = "Video";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = 'JOIN VideoCategory vc ON v.iVideoCategoryId =  vc.iVideoCategoryId ';
			if (!empty($_REQUEST['iVideoCategoryId'])) {
				$RelatedArr['ExtraCondition'] = 'AND v.iVideoCategoryId=' . $_REQUEST['iVideoCategoryId'];
			} else {
				$RelatedArr['ExtraCondition'] = '';
			}

			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			$RelatedArr['BackToTitle'] = 'Back to Video Category Listing';
			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['BackToLink'] = 'index.php?file=VideoCategory&AX=Yes&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "3") {
				$RelatedArr['BackToLink'] = 'index.php?file=VideoCategory&AX=Yes&iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == '2') {
				$RelatedArr['BackToLink'] = 'index.php?file=VideoCategory&AX=Yes';
			}
			$RelatedArr['TabHeader'] = 'Video||2';
			break;











		case 'Audio':
			$RelatedArr['Table'][0] = 'Audio||au';
			//$RelatedArr['Table'][1] = 'admin||a';
			if (!empty($_REQUEST['iAudioCategoryId']) && $_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-audioadd&iAudioCategoryId=" . $_REQUEST['iAudioCategoryId'] . '&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if (!empty($_REQUEST['iAudioCategoryId']) && $_SESSION["sess_eType"] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-audioadd&iAudioCategoryId=" . $_REQUEST['iAudioCategoryId'] . '&iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if (!empty($_REQUEST['iAudioCategoryId']) && $_SESSION['sess_eType'] == '2') {
				$RelatedArr['AddFile'] = "index.php?file=m-audioadd&iAudioCategoryId=" . $_REQUEST['iAudioCategoryId'];
			} else if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-audioadd&iCompanyId='" . $_REQUEST['iCompanyId'] . "'&iSGroupId='" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-audioadd&iSGroupId='" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == '2') {
				$RelatedArr['AddFile'] = "index.php?file=m-audioadd";
			}
			$RelatedArr['Primary_Field'] = 'iAudioId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'au.vAudioName';
			$RelatedArr['ListTitle'] = "Audio Listing";
			$RelatedArr['LegendTitle'] = "Audio";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = 'JOIN AudioCategory ac ON au.iAudioCategoryId =  ac.iAudioCategoryId ';
			if (!empty($_REQUEST['iAudioCategoryId'])) {
				$RelatedArr['ExtraCondition'] = 'AND au.iAudioCategoryId=' . $_REQUEST['iAudioCategoryId'];
			} else {
				$RelatedArr['ExtraCondition'] = '';
			}

			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			$RelatedArr['BackToTitle'] = 'Back to Audio Category Listing';
			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['BackToLink'] = 'index.php?file=AudioCategory&AX=Yes&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "3") {
				$RelatedArr['BackToLink'] = 'index.php?file=AudioCategory&AX=Yes&iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == '2') {
				$RelatedArr['BackToLink'] = 'index.php?file=AudioCategory&AX=Yes';
			}

			$RelatedArr['TabHeader'] = 'Audio||2';
			break;











		case'Documents':
			$RelatedArr['Table'][0] = 'Document||do';
			//$RelatedArr['Table'][1] = 'admin||a';
			if (!empty($_REQUEST['iLibCategoryId']) && $_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-documentadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'] . "&iLibCategoryId=" . $_REQUEST['iLibCategoryId'];
			} else if (!empty($_REQUEST['iLibCategoryId']) && $_SESSION["sess_eType"] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-documentadd&iSGroupId=" . $_REQUEST['iSGroupId'] . "&iLibCategoryId=" . $_REQUEST['iLibCategoryId'];
			} else if (!empty($_REQUEST['iLibCategoryId']) && $_SESSION['sess_eType'] == '2') {
				$RelatedArr['AddFile'] = "index.php?file=m-documentadd&iLibCategoryId=" . $_REQUEST['iLibCategoryId'];
			} else if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['AddFile'] = "index.php?file=m-documentadd&iCompanyId=" . $_REQUEST['iCompanyId'] . "&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "3") {
				$RelatedArr['AddFile'] = "index.php?file=m-documentadd&iSGroupId=" . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == '2') {
				$RelatedArr['AddFile'] = "index.php?file=m-documentadd";
			}
			$RelatedArr['Primary_Field'] = 'iDocumentId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'do.vDocumentName';
			$RelatedArr['ListTitle'] = "Document Listing";
			$RelatedArr['LegendTitle'] = "Document";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = 'JOIN LibraryCategory lc ON do.iLibCategoryId =  lc.iLibCategoryId ';
			if (!empty($_REQUEST['iLibCategoryId'])) {
				$RelatedArr['ExtraCondition'] = 'AND do.iLibCategoryId=' . $_REQUEST['iLibCategoryId'];
			} else {
				$RelatedArr['ExtraCondition'] = '';
			}

			$RelatedArr['GroupBy'] = '';
			$RelatedArr['BackToTitle'] = 'Back to Library Listing';
			if ($_SESSION["sess_eType"] == "4") {
				$RelatedArr['BackToLink'] = 'index.php?file=Library&AX=Yes&iCompanyId=' . $_REQUEST['iCompanyId'] . '&iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION['sess_eType'] == "3") {
				$RelatedArr['BackToLink'] = 'index.php?file=Library&AX=Yes&iSGroupId=' . $_REQUEST['iSGroupId'];
			} else if ($_SESSION["sess_eType"] == "2") {
				$RelatedArr['BackToLink'] = 'index.php?file=Library&AX=Yes';
			}

			$RelatedArr['Image_Path'] = '';
			$RelatedArr['TabHeader'] = 'Library||2';
			break;








		case 'Faq':
			$RelatedArr['Table'][0] = 'faq||fq';
			//$RelatedArr['Table'][1] = 'admin||a';
			$RelatedArr['AddFile'] = "index.php?file=t-faqadd";
			$RelatedArr['Primary_Field'] = 'iFaqId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'fq.vQuestion';
			$RelatedArr['ListTitle'] = "Faq Listing";
			$RelatedArr['LegendTitle'] = "Faq";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "1|1|1|1";
			$RelatedArr['LeftJoinCondition'] = '';
			$RelatedArr['ExtraCondition'] = '';
			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			break;










		case 'LoginHistory':
			$RelatedArr['Table'][0] = 'log_history||lh';
			$RelatedArr['AddFile'] = "";
			$RelatedArr['Primary_Field'] = 'iLogId';
			$RelatedArr['DefaultSort'] = 'lh.dLoginDate  DESC';
			//		$RelatedArr['AlphaSearch'] = 'lh.iLogId';
			$RelatedArr['ListTitle'] = "Log History List";
			$RelatedArr['LegendTitle'] = "Log History";
			$RelatedArr['Status_Field'] = '';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "0|0|0|0";
			$RelatedArr['LeftJoinCondition'] = 'left join admin as admin on lh.iUserId = admin.iAdminId ';
			$RelatedArr['ExtraCondition'] = 'and lh.iUserId="' . $_REQUEST['iAdminId'] . '"';
			$RelatedArr['GroupBy'] = '';
			$RelatedArr['Image_Path'] = '';
			$RelatedArr['TabHeader'] = 'Admin||2';
			break;









		case 'Pagesetting':
			$RelatedArr['Table'][0] = 'page_settings||p';
			$RelatedArr['AddFile'] = "index.php?file=t-page_settingadd";
			$RelatedArr['Primary_Field'] = 'iPageId';
			$RelatedArr['DefaultSort'] = $RelatedArr['AlphaSearch'] = 'p.vPageTitle';
			$RelatedArr['ListTitle'] = "Static Pages";
			$RelatedArr['LegendTitle'] = "Page Setting";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "0|0|1|1";
			break;









		case 'SystemMails' :
			$RelatedArr['Table'][0] = ' system_email ||se';
			$RelatedArr['AddFile'] = "index.php?file=t-system_emailadd";
			$RelatedArr['Primary_Field'] = 'iEmailTemplateId';
			$RelatedArr['DefaultSort'] = "se.vEmailTitle desc";
			$RelatedArr['AlphaSearch'] = '';
			$RelatedArr['ListTitle'] = "System Mails";
			$RelatedArr['LegendTitle'] = "System Mails";
			$RelatedArr['Status_Field'] = 'eStatus';
			$RelatedArr['ActiveInactiveDeleteAdd'] = "0|0|0|0";
			$RelatedArr['LeftJoinCondition'] = '';
			$RelatedArr['ExtraCondition'] = " and eStatus='Active' ";
			break;
		default :
			break;
	}

	if ($ReturnParam != "") {
		return $RelatedArr[$ReturnParam];
	} else {
		return $RelatedArr;
	}
}

function getSearchAlphaSQL_list($fieldname, $tablename) {
	global $obj;
	$sql_query = "SELECT DISTINCT substring( `$fieldname` , 1, 1 ) FROM `$tablename`";

	$db_result = $obj->select($sql_query);
}

// return the sorting variable (ex order by $sort)
function getSortandGroupVaribale_List($FieldArr, $RelatedArr) {
	global $_GET;
	$sorton = $_GET['sorton'];
	$stat = $_GET['stat'];
	$defaultsort = $RelatedArr['DefaultSort'];
	$ntot_field = count($FieldArr);
	if (isset($sorton)) {
		for ($i = 0; $i < $ntot_field; $i++) {
			if ($FieldArr[$i][3] == $sorton) {
				if ($stat == 1)
					$sort = $FieldArr[$i][0] . " ASC";
				else
					$sort = $FieldArr[$i][0] . " DESC";
			}
		}
	} else {
		$sort = $defaultsort;
	}
	$GroupBy = "";
	$GroupBy = $RelatedArr['GroupBy'];
	if (trim($GroupBy) != '')
		$GroupBy = " group by $GroupBy ";
	if (trim($sort) != '')
		$sort = " order by $sort ";
	else
		$sort = "";
	$query['GroupBy'] = $GroupBy;
	$query['sort'] = $sort;
	return $query;
	//return $GroupBy.$sort;
}

// return the table name for sql query with alias
function getTableNameForSQLQuery_List($RelatedArr) {

	//print_r($RelatedArr);
	$tablearray = $RelatedArr['Table'];
	//	print_R($RelatedArr[Table]);
	$tablesql = "";

	$LeftJoinCondition = $RelatedArr['LeftJoinCondition'];
	$LeftJoinConditionTable = $RelatedArr['LeftJoinConditionTable'];

	//print_r($tablearray);

	$tableleftsql = "";
	if ($LeftJoinConditionTable != "") {
		if (intval($LeftJoinConditionTable) >= 0) {
			$LeftJoinConditionTable = intval($LeftJoinConditionTable);
		}
	} else if ($LeftJoinCondition != "") {
		$LeftJoinConditionTable = 0;
	}
	#echo "<br> here >> $LeftJoinConditionTable";
	if ($LeftJoinCondition != "" && intval($LeftJoinConditionTable) >= 0) {
		list($tablename, $alias) = explode("||", $tablearray[$LeftJoinConditionTable]);
		$tableleftsql .= "$tablename as $alias $LeftJoinCondition";
		$tablearray1 = array_splice($tablearray, $LeftJoinConditionTable, 1);
	}

	$ntot_table = count($tablearray);

	for ($i = 0; $i < $ntot_table; $i++) {
		list($tablename, $alias) = explode("||", $tablearray[$i]);
		if ($i == $ntot_table - 1)
			$tablesql.="$tablename as $alias ";
		else
			$tablesql.="$tablename as $alias , ";
	}
	if ($tablesql != "" && $tableleftsql != "") {
		$tablesql .= ", $tableleftsql";
	} else {
		$tablesql .= "$tableleftsql";
	}
	return $tablesql;
}

//return the table name, primary field and status field of table
function getTableNameandPrimaryId_List($RelatedArr) {
	//	print_r($RelatedArr);	exit;
	$tablearray = $RelatedArr['Table'];
	$tablesql = "";
	list($tablename, $alias) = explode("||", $tablearray[0]);
	$tablearray['TableName'] = trim($tablename);
	$tablearray['Primary_Field'] = trim($RelatedArr['Primary_Field']);
	$tablearray['Status_Field'] = trim($RelatedArr['Status_Field']);
	return $tablearray;
}

//return the table field for sql query with alias
function getSelectFieldList_List($FieldArr) {
	$ntot_field = count($FieldArr);
	$select_field = "";
	for ($i = 0; $i < $ntot_field; $i++) {
		if ($i == $ntot_field - 1)
			$select_field.=$FieldArr[$i][0] . " as " . $FieldArr[$i][1];
		else
			$select_field.=$FieldArr[$i][0] . " as " . $FieldArr[$i][1] . " , ";
	}
	if ($select_field == "")
		$select_field = "*";
	#echo $select_field;
	return $select_field;
}

// return the searching combo
function getSearchListCombo_List($FieldArr) {
	$ntot_field = count($FieldArr);
	$option = trim($_REQUEST['option']);
	#echo ($option);
	$select_combo = "";
	$select_combo.="<select name='option' width='30%' id='option' onchange=' return changes_text();'>";
	for ($i = 0; $i < $ntot_field; $i++) {
		if ($FieldArr[$i][4] == 'Yes') {
			$val = $FieldArr[$i][0];

			if (substr_count($val, "concat") > 0)
				$val = $FieldArr[$i][1];
			if ($val == $option)
				$selected = "selected";
			else
				$selected = "";

			$select_combo.="<option $selected value='" . htmlentities($val) . "'>" . $FieldArr[$i][2] . "</option>";
		}
	}


	$select_combo.="</select>";
	return $select_combo;
}

//return the buttons and record msg
function getActionButtons_List($RelatedArr, $ListFile, $recmsg, $extraparam) {
	global $CFG, $obj;
	$tablearray = getTableNameandPrimaryId_List($RelatedArr);
	//mr($tablearray);
	$tablename = $tablearray['TableName'];
	$Status_Field = $tablearray['Status_Field'];
	$ModuleName = $_REQUEST['file'];
	$arr = array();
	if ($Status_Field != '') {
		$arr = array("Active", "Inactive");
		//$arr=$obj->mysql_enum_values($tablename,$Status_Field);
	}

	//!!!!    list($Active, $Inactive, $eDelete, $eAdd, $approved) = explode("|", $RelatedArr['ActiveInactiveDeleteAdd']);
	list($Active, $Inactive, $eDelete, $eAdd, $eAssign, $eUnAssign) = explode("|", $RelatedArr['ActiveInactiveDeleteAdd']);
	$select_buttons = '';
	$select_buttons.='<table width="100%" border="0" cellspacing="1" cellpadding="1" style="text-align:left">';
	$select_buttons.='<tr>';
	if ($eAssign == 1) {
		$onclick = ' onClick="return changeAjaxStatus(\'Assign\');" ';
		$select_buttons.='<td width="8%" class="td-listing"><img name="b1" type="image" src="' . $CFG->wwwroot . "/public/images/" . 'Assign.gif" ' . $onclick . ' alt="Assign" class="input1" style="cursor:pointer;"></td>';
	}
	if ($eUnAssign == 1) {
		$onclick = ' onClick="return changeAjaxStatus(\'UnAssign\');" ';
		$select_buttons.='<td width="8%" class="td-listing"><img name="b1" type="image" src="' . $CFG->wwwroot . "/public/images/" . 'UnAssign.gif" ' . $onclick . ' alt="UnAssign" class="input1" style="cursor:pointer;"></td>';
	}
	if ($eAdd == 1) {

		$select_buttons.='<td width="10%" class="td-listing"><img src="' . $CFG->wwwroot . "/public/images/" . 'addnew.gif" class="imagestyle" alt="Add New Record" onclick="window.location=\'' . $RelatedArr['AddFile'] . $extraparam . '\';return false;" style="cursor:pointer;"></td>';
	}

	if ($eDelete == 1) {
		$onclick = ' onClick="return changeAjaxStatus(\'Delete\');" ';
		$select_buttons.='<td width="8%" class="td-listing"><img name="b1" type="image" src="' . $CFG->wwwroot . "/public/images/" . 'delete.gif" ' . $onclick . ' alt="Delete" class="input1" style="cursor:pointer;"></td>';
	}


	for ($i = 0; $i < count($arr) && count($arr) > 1; $i++) {
		$val = $arr[$i];
		$val_mode = $arr[$i];
		//echo $val.$$val;
		$buttonname = strtolower($val_mode) . ".jpg";
		$buttonname = strtolower($val_mode) . ".gif";


		$onclick = ' onClick="return changeAjaxStatus(\'' . $val_mode . '\');" ';

		$href_btn_tag2 = '<input name="b1" type="image" src="' . $CFG->wwwroot . "/public/images/" . $buttonname . '" class="imagestyle" alt="' . $CFG->wwwroot . "/public/images/" . $buttonname . '" ' . $onclick . ' style="cursor:pointer;">';
		//$img_btn_tag = '<input name="b1" type="image" src="'.$CFG->wwwroot."/public/images/".$buttonname.'" class="imagestyle" alt="'.$CFG->wwwroot."/public/images/".$buttonname.'" '.$onclick.'>';
		$href_btn_tag = '<img name="b1" type="image" src="' . $CFG->wwwroot . "/public/images/" . $buttonname . '" alt="' . $val_mode . '" ' . $onclick . ' class="input1" style="cursor:pointer;">';

		$href_btn_tag1 = '<a href="#" id="' . strtolower($val) . '"  ' . $onclick . ' alt="' . $val . '" title="' . $val . '" style="cursor:pointer;">&nbsp;</a>';
		if ($val == 'Active' && $$val == 1)
			$select_buttons.='<td width="8%" class="td-listing">' . $href_btn_tag . '</td>';
		else if ($val == 'Inactive' && $$val == 1)
			$select_buttons.='<td width="8%" class="td-listing">' . $href_btn_tag . '</td>';
		else if ($val != 'Active' && $val != 'Inactive')
			$select_buttons.='<td width="8%" class="td-listing">' . $href_btn_tag . '</td>';
	}



	if ($ModuleName != 'SystemMails') {

		$select_buttons.='<td width="13%" class="td-listing"><img src="' . $CFG->wwwroot . "/public/images/" . 'showall.gif" class="imagestyle" alt="Show All" onclick="AjaxShowAllListing();return false;" style="cursor:pointer;"></td>';
	}

	//=============================== HB "Approved button" ==========================================//

	if (isset($approved) && $approved == 1) {
		$onclick = ' onClick="return changeVideoSequence(\'seq_no\');" ';
		$select_buttons.='<td width="11%" class="td-listing"><img name="a1" type="image" src="' . $CFG->wwwroot . "/public/images/" . 'approved.gif" ' . $onclick . ' alt="Approved" class="input1" style="cursor:pointer;"></td>';
	}

	//=========================================================================//

	$select_buttons.='<td width="80%" class="td-new2"></td>';
	$select_buttons.='</tr>';
	$select_buttons.='</table>';
	return $select_buttons;
}

function ActiveInactiveRecord_List($post_array, $ModuleName = '', $table_array = array()) {
	#print_r($post_array); exit;
	global $CFG, $DEFINE_ARRAY, $obj;

	//echo $CFG->dirroot."/lib/classes/";exit;
	$msg = "";
	if (isset($post_array) && ($post_array['Module'] != "" || $post_array['file'] != "")) {
		if (trim($ModuleName) == '') {
			$ModuleName = $post_array['Module'];
		}
		if (trim($ModuleName) == '') {
			$ModuleName = $_REQUEST['file'];
		}

		#echo "<br> in function >> $ModuleName >> ".$post_array[mode];
		if (count($table_array) == 0 || !is_array($table_array)) {
			$RelatedArr = getExtraArray_List($ModuleName);
			$table_array = getTableNameandPrimaryId_List($RelatedArr);
		}


		$mode = $post_array[mode];
		$array = array();
		for ($i = 0; $i < $post_array['no']; $i++) {
			$iId = $post_array["ch" . $i];
			if ($iId != "")
				$array[] = $iId;
		}
		$count = count($array);
		$array_val = implode(",", $array);
		if (count($array) > 0) {
			$change_id_array = implode(",", $array);
			//	print_r($change_id_array);exit;

			switch ($mode) {
				case "Delete":
					if ($count > 0) {
						if ($ModuleName == 'Company') {
							//$delete_sql = "DELETE FROM SubGroup WHERE iCompanyId IN(" . $change_id_array . ")";
							// $obj->sql_query($delete_sql);
							//$delete_sql = "DELETE FROM admin WHERE iCompanyId IN(" . $change_id_array . ")";
							// $obj->sql_query($delete_sql);
						} else if ($ModuleName == 'Courses') {
							$delete_sql = "DELETE FROM CourseClasses WHERE iCourseId IN(" . $change_id_array . ")";
							$obj->sql_query($delete_sql);
						} else if ($ModuleName == 'Library') {
							$delete_sql = "DELETE FROM Document WHERE iLibCategoryId IN(" . $change_id_array . ")";
							$obj->sql_query($delete_sql);
						} else if ($ModuleName == 'VideoCategory') {
							$delete_sql = "DELETE FROM Video WHERE iVideoCategoryId IN(" . $change_id_array . ")";
							$obj->sql_query($delete_sql);
						} else if ($ModuleName == 'AudioCategory') {
							$delete_sql = "DELETE FROM Audio WHERE iAudioCategoryId IN(" . $change_id_array . ")";
							$obj->sql_query($delete_sql);
						} else if ($ModuleName == 'SubGroup') {
							//  $delete_sql = "DELETE FROM admin WHERE iSGroupId IN(" . $change_id_array . ")";
							//   $obj->sql_query($delete_sql);
						}
						$db_sql = $obj->DB_query_change_status($table_array['TableName'], $change_id_array, $table_array['Primary_Field'], $table_array['Status_Field'], "Delete");
					}
					$msg = 'MSG_' . strtoupper($mode);
					$msg = $DEFINE_ARRAY[$msg];
					$msg = rawurlencode($count . " Record(s) " . $msg);
					$msg .= $delete_msg;
					break;
				case "Active":
					if ($ModuleName == 'Company') {
						$update_sql = "UPDATE SubGroup sg SET sg.eStatus = 'Active'
								WHERE sg.iCompanyId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);

						//$update_sql = "UPDATE admin SET eStatus = 'Active'
						//									WHERE iCompanyId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						// $obj->sql_query($update_sql);
					} else if ($ModuleName == 'Courses') {
						$update_sql = "UPDATE CourseClasses SET eStatus = 'Active'
								WHERE iCourseId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);
					} else if ($ModuleName == 'Library') {
						$update_sql = "UPDATE Document SET eStatus = 'Active'
								WHERE iLibCategoryId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);
					} else if ($ModuleName == 'VideoCategory') {
						$update_sql = "UPDATE Video SET eStatus = 'Active'
								WHERE 	iVideoCategoryId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);
					} else if ($ModuleName == 'AudioCategory') {
						$update_sql = "UPDATE Audio SET eStatus = 'Active'
								WHERE iAudioCategoryId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);
					} else if ($ModuleName == 'SubGroup') {
						$update_sql = "UPDATE admin SET eStatus = 'Active'
								WHERE iSGroupId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);
					}

					if ($count > 0) {
						$mode1 = $mode;
						$db_sql = $obj->DB_query_change_status($table_array['TableName'], $change_id_array, $table_array['Primary_Field'], $table_array['Status_Field'], $mode1);
					}
					$msg = 'MSG_' . strtoupper($mode);
					$msg = $DEFINE_ARRAY[$msg];
					$msg = rawurlencode($count . " Record(s) " . $msg);
					$msg .= $delete_msg;
					break;
				case "Inactive":

					if ($ModuleName == 'Company') {
						$update_sql = "UPDATE SubGroup sg SET sg.eStatus = 'Inactive'
								WHERE sg.iCompanyId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);

						//   $update_sql = "UPDATE admin SET eStatus = 'Inactive'
						//									WHERE iCompanyId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);
					} else if ($ModuleName == 'Courses') {
						$update_sql = "UPDATE CourseClasses SET eStatus = 'Inactive'
								WHERE iCourseId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);
					} else if ($ModuleName == 'Library') {
						$update_sql = "UPDATE Document SET eStatus = 'Inactive'
								WHERE iLibCategoryId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);
					} else if ($ModuleName == 'VideoCategory') {
						$update_sql = "UPDATE Video SET eStatus = 'Inactive'
								WHERE iVideoCategoryId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);
					} else if ($ModuleName == 'AudioCategory') {
						$update_sql = "UPDATE Audio SET eStatus = 'Inactive'
								WHERE iAudioCategoryId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);
					} else if ($ModuleName == 'SubGroup') {
						$update_sql = "UPDATE admin SET eStatus = 'Inactive'
								WHERE iSGroupId IN(" . $change_id_array . ")";
						#echo $update_sql;exit;
						$obj->sql_query($update_sql);
					}
					if ($count > 0) {
						$mode1 = $mode;
						$db_sql = $obj->DB_query_change_status($table_array['TableName'], $change_id_array, $table_array['Primary_Field'], $table_array['Status_Field'], $mode1);
					}
					$msg = 'MSG_' . strtoupper($mode);
					$msg = $DEFINE_ARRAY[$msg];
					$msg = rawurlencode($count . " Record(s) " . $msg);
					$msg .= $delete_msg;
					break;
				case "Assign":
					switch ($ModuleName) {
						case 'GroupsForUsers':
							if ($post_array['iUserId'] != '') {
								$sql = "insert ignore into  SubGroupUserAssign(iUserId,iSGroupId) select " . $post_array['iUserId'] . ",SubGroup.iSGroupId from SubGroup where SubGroup.iSGroupId in (" . $change_id_array . ")";
								$result = $obj->insert($sql);
								$msg = " Record(s) " . ' are added.';
							} else {
								$msg = "Cannot assign groups to unknown user!";
							}
							break;
						default:
							break;
					}
					break;
				case "UnAssign":
					switch ($ModuleName) {
						case 'UsersGroups':
							if ($post_array['iUserId'] != '') {
								$sql = 'select a.iSGroupId from SubGroupUserAssign a join SubGroup sg on sg.iSGroupId=a.iSGroupId where sg.iIsDefault=0 and a.iUserId=' . $post_array['iUserId'] . ' and sg.iSGroupId not in (' . $change_id_array . ")";
								$result = $obj->sql_query($sql);
								if ($result && count($result) > 0) {
									$sql = 'delete from SubGroupUserAssign where iUserId=' . $post_array['iUserId'] . ' and  iSGroupId in (' . $change_id_array . ")";
									$result = $obj->sql_query($sql);

									$msg = " Record(s) " . ' are deleted.';
								} else {
									$msg = "Can not perfom this operation as user will not have any group assigned.";
								}
							} else {
								$msg = "Cannot unassign groups from unknown user!";
							}
							break;
						default:
							break;
					}
					break;
				case "Approved":
				case "Declined":
				case "InProcess":
				case "Pending":
				case "Expired":
				case "Cancelled":

					if ($count > 0) {
						$mode1 = $mode;
						if ($ModuleName == "CountryTable") {
							$change_id_array = implode(',', $array);
							$db_sql = $obj->DB_query_change_status($table_array['TableName'], $change_id_array, $table_array['Primary_Field'], $table_array['Status_Field'], $mode1);
						} else {
							$db_sql = $obj->DB_query_change_status($table_array['TableName'], $change_id_array, $table_array['Primary_Field'], $table_array['Status_Field'], $mode1);
						}
					}
					$msg = 'MSG_' . strtoupper($mode);
					$msg = $DEFINE_ARRAY[$msg];
					$msg = rawurlencode($count . " Record(s) " . $msg);
					$msg .= $delete_msg;
					break;
			}
		} else {
			$msg = rawurlencode($count . " Record(s) " . MSG_ . strtoupper($mode) . _ERROR);
		}
	}
	return rawurldecode($msg);
}

// generate sql query
// first argumnet . pass related array
// second argument . pass extra condition from module if required..
function getSearchSQL_List($RelatedArr, $ExtraSql = '') {
	global $_REQUEST;
	$option = trim($_REQUEST['option']);
	$keyword = trim($_REQUEST['keyword']);
	$alpha = trim($_REQUEST['alpha']);
	$ModuleName = $_REQUEST['file'];
	#echo $option;
	#echo $keyword;
	$ssql = "";
	$WhereSql = " where 1=1 ";
	$ExtraCondition = trim($RelatedArr['ExtraCondition']);
	//echo $option;
	if (substr_count($option, "concat") > 0 && $keyword != "") {

		$removespacekey = str_replace(" ", '', $keyword);
		$removespaceopt = str_replace(",' ',", ',', $option);
		//$ssql =" and ($option like '%".$keyword."%' or $removespaceopt like '%".$keyword."%')";

		$ssql = " and ($option like '" . $keyword . "%')";
	} else if (strstr($option, 'eStatus')) {
		$ssql = " AND " . $option . " like '" . $keyword . "'";
	} else if ($keyword != "") {
		if ($alpha == "true") {
			$ssql = " AND " . $option . " like '" . $keyword . "%'";
		} else {
			$ssql = " AND " . $option . " like '%" . $keyword . "%'";
		}
		#echo $ssql.'@@'; exit;

		if ($RelatedArr['Status_Field'] != '') {

			//if(substr_count($option,$RelatedArr[Status_Field])>0)
			#echo $option;
			if ($option == 'c.dCourseDateTime' || $option == 'e.dEventDateTime' || $option == 'cc.dClassDateTime' || $option == 'a.dLastLogin') {

				$keyword1 = date('Y-m-d', strtotime($keyword));
				$ssql = " AND " . $option . " like '" . $keyword1 . "%'";
			} else {
				if ($alpha == "true") {
					$ssql = " AND " . $option . " like '" . $keyword . "%'";
				} else {
					$ssql = " AND " . $option . " like '%" . $keyword . "%'";
				}
			}


			//echo $ssql;exit;
		}
	}

	//if($_GET['search'] == 'true')
	//	echo  $WhereSql.$ExtraCondition.$ssql.$ExtraSql;
	return $WhereSql . $ExtraCondition . $ssql . $ExtraSql;
}

function DisplayTopInListAdd_List($TOP_HEADER, $BACK_LABEL = '', $BACK_LINK = '', $HEADING = '', $img = '') {
	global $CFG;
	$html = '<div class="screenTitle">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tr>
			<td style="border-bottom:1px solid #000000;">';
	if ($img == "")
		$img = "on.gif";

	$html.='<img src="' . $CFG->wwwroot . "/public/images/" . '/' . $img . '">';

	$html .='&nbsp;' . $TOP_HEADER . '</td>';
	if ($BACK_LABEL != '')
		$html .= '<td align="right"><a href="' . $BACK_LINK . '">' . $BACK_LABEL . '</a>&nbsp;&nbsp;</td>';
	$html .= '</tr>
			</table>
			</div>';
	return $html;
}

function gen_DisplayRecPerPage_List($rec_limit = "") {
	global $REC_LIMIT, $RECLIMIT;
	//$getArgu = getPOSTGETParam();
	$selected = "";
	$select_combo = "";
	$select_combo.='<select name="rec_limit" onchange="return checkRecordLimit(this.value);">';
	$select_combo.='<option value="">Limit (' . $RECLIMIT . ')</option>';
	if ($rec_limit == 'ALL')
		$selected = "selected";
	$select_combo.='<option $selected value="ALL">All</option>';
	if ($rec_limit == '')
		$rec_limit = $REC_LIMIT;

	$num_array = array("10", "20", "25", "50", "75", "100", "150", "200", "250", "300", "500", "750", "1000", "1250", "1500", "2000");
	for ($i = 0; $i < count($num_array); $i++) {
		if ($num_array[$i] == $rec_limit)
			$select_combo.='<option selected value="' . $num_array[$i] . '">' . $num_array[$i] . '</option>';
		else
			$select_combo.='<option value="' . $num_array[$i] . '">' . $num_array[$i] . '</option>';
	}

	$select_combo.='</select>';

	return $select_combo;
}

function gen_DisplayPaging_Top_List($code, $showLetter = "Y", $showPaging = "Y", $width = "100%") {
	global $recmsg, $page_link;
	if ($showPaging == "N")
		$style = "style=display:none";
	else
		$style = "style=display:''";
	if ($showLetter == "N")
		$style_alpha = "style=display:none";
	else
		$style_alpha = "style=display:''";
	echo '<table width="' . $width . '" cellpadding="0" cellspacing="0" border="0">
			<tr style="height:20px">
			<td width="20%" class="paging" align="left" style="white-space: nowrap;text-align:left;">&nbsp;<span ' . $style . ' class="disprecordmsg"  id="RECMSG_TOP">' . (($showPaging == "Y") ? $recmsg : "") . '&nbsp;</span></td>
					<td  style="text-align:center" nowrap><span ' . $style_alpha . ' valign="baseline" class="sortby"  id="ALPHA_PAGING_TOP">' . (($showLetter == "Y") ? getSearchByLetter_List($code) : "") . '</span></td>
							<td width="20%" style="text-align:right;padding-bottom:0px;" ><span ' . $style . ' class="paging"   id="PAGING-TOP">' . (($showPaging == "Y") ? $page_link : "") . '&nbsp;</span></td>
									</tr>
									</table>';
}

function gen_DisplayPaging_Bottom_List($code, $showLetter = "Y", $showPaging = "Y", $width = "100%") {
	global $recmsg, $page_link, $rec_limit;
	if ($showPaging == "N")
		$style = "style=display:none";
	else
		$style = "style=display:''";
	echo '<table width="' . $width . '" cellpadding="0" cellspacing="0" border="0">
			<tr style="height:20px">
			<td width="30%" class="disprecordmsg"><span ' . $style . ' class="disprecordmsg"  id="RECMSG_BOTTOM">' . (($showPaging == "Y") ? $recmsg : "") . '&nbsp;</span></td>
					<td width="70%" nowrap>
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					<td align="right" style="padding-right:5px;">';
	echo gen_DisplayRecPerPage_List($rec_limit);
	echo '</td>
			<td width="2%" align="center" nowrap class="paging-bottom" id="PAGING-BOTTOM">' . (($showPaging == "Y") ? $page_link : "") . '&nbsp;</td>
					</tr>
					</table>
					</td>
					</tr>
					</table>';
}

function getSearchByLetter_List($fieldname) {
	//	global $QUERY_STRING;
	global $db_alpha, $CFG;
	#mr($db_alpha);
	foreach ($_GET as $key => $value) {
		if ($key != "Module" && $key != "file" && $key != "option" && $key != "keyword")
			$qs .= "&" . $key . "=" . $value;
	}
	//echo "here >> $CFG->AJAX_listing";
	$filename = basename($_SERVER['PHP_SELF']);
	$link = "";
	for ($i = 65; $i <= 90; $i++) {
		IF ($_GET['keyword'] == chr($i))
		$link .= '<font class="sortby-active">' . chr($i) . '</font> ';
		else {
			//	print_r($db_alpha);

			if ($db_alpha[chr($i)]) {
				if ($CFG->AJAX_listing) {
					//$link .= '<a href="#" onclick="AjaxAlphaListing(\''.$qs.'&option='.rawurldecode($fieldname).'&keyword='.chr($i).'&search=true&start=1\');" title="Search with '.chr($i).'">'.chr($i).'</a>';
					$link .= '<a href="#" onclick="AjaxAlphaListing(\'' . $qs . '&option=' . rawurldecode($fieldname) . '&keyword=' . chr($i) . '&search=true&alpha=true&start=1\');return false;" title="Search with ' . chr($i) . '">' . chr($i) . '</a>';
				} else {
					$link .= '<a href="' . $filename . '?' . $qs . '&option=' . rawurldecode($fieldname) . '&keyword=' . chr($i) . '&search=true&start=1" title="Search with ' . chr($i) . '">' . chr($i) . '</a>';
				}
			} else {
				$link .= '<font class="sortby-disabled">' . chr($i) . '</font> ';
			}
		}
	}
	//$link .= '<a class="bluetext" href="'.$filename.'?'.$qs.'&option='.$fieldname.'&keyword='.chr($i).'&search=truestart=1">'.chr($i).'</a> ';
	if (isset($_GET['keyword']) && $_GET['keyword'] == "")
		$link .= '<font color="ff6600" size="+1">ALL</font>';
	else {
		if ($CFG->AJAX_listing) {
			$link .= '<a class="bluetext"  onclick="AjaxAlphaListing(\'' . $qs . '&option=' . rawurldecode($fieldname) . '&keyword=&start=1\');return false;" href="#" title="All">ALL</a>';
		} else {
			$link .= '<a class="bluetext" href="' . $filename . '?' . $qs . '&option=' . $fieldname . '&keyword=' . '" title="All">ALL</a>';
		}
	}
	//print_r($link);
	return $link;
}

function OpenPopupImageWindow_List($imagename, $imagepath) {
	global $site_url, $site_path;
	$imagepath = str_replace($site_url, $site_path, $imagepath);
	if ($imagename != '' && is_file($imagepath . $imagename)) {
		$httpimagepath = str_replace($site_path, $site_url, $imagepath);
		return '<a id="imageid" onclick="openPopupImageWindow(\'' . $imagename . '\',\'' . $httpimagepath . '\')" href="#">Image</a>';
	} else {
		return '--';
	}
}

function DisplayProvinciasDataListing($db_res, $FieldArr, $AddFile) {
	global $CFG;
	$tabledata = "";
	//print_r($db_res);
	$j = 0;
	for ($i = 0; $i < count($db_res); $i++) {
		$bgcolor = ($i % 2) ? "td-light" : "td-dark";
		$pri_field = $FieldArr[0][1];
		$pri_value = $db_res[$i][$pri_field];
		$j = 0;
		$tabledata.="<tr onmouseover='Highlight(this);'  onmouseout='UnHighlight(this,\"" . $bgcolor . "\");' class='" . $bgcolor . "'>";
		$tabledata.='<td class="td-listing" style="text-align:center">';
		$tabledata.='<input  type="checkbox" id="iId" name="ch' . $i . '" value="' . $pri_value . '">';
		$tabledata.='</td>';
		$tabledata.='<td  class="td-listing" style="text-align:center"><img src="' . $CFG->wwwroot . "/public/images/" . 'img-bullet-2.gif" border="0"></td>';

		//$value="<a title='Click here for update' href='".$hreflink."'>$value</a>";
		$j++;
		$field = $FieldArr[$j][1];
		$alignment = $FieldArr[$j][5];
		$value = $db_res[$i][$field];
		$tabledata.='<td style="text-align:' . $alignment . '">';
		$tabledata.='&nbsp;<input type="Text" name="nombre_provincia_' . $pri_value . '" value="' . $value . '" size="40" style="text-align:left">&nbsp;';
		//$tabledata.='&nbsp;'.$value.'&nbsp;';
		$tabledata.='</td>';
		$tabledata.='</tr>';
	}
	return $tabledata;
}

function gen_getGETPOSTPARAM() {
	$str_param = "";
	global $_REQUEST;
	if (isset($_REQUEST["tempvar"]) && $_REQUEST["tempvar"] != "")
		$str_param.="&tempvar=" . $_REQUEST["tempvar"];
	if (isset($_REQUEST["nstart"]) && $_REQUEST["nstart"] != "")
		$str_param.="&nstart=" . $_REQUEST["nstart"];
	if (isset($_REQUEST["start"]) && $_REQUEST["start"] != "")
		$str_param.="&start=" . $_REQUEST["start"];
	if (isset($_REQUEST["stat"]) && $_REQUEST["stat"] != "")
		$str_param.="&stat=" . $_REQUEST["stat"];
	if (isset($_REQUEST["option"]) && $_REQUEST["option"] != "")
		$str_param.="&option=" . $_REQUEST["option"];
	if (isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
		$str_param.="&keyword=" . $_REQUEST["keyword"];
	if (isset($_REQUEST["sorton"]) && $_REQUEST["sorton"] != "")
		$str_param.="&sorton=" . $_REQUEST["sorton"];
	if (isset($_REQUEST["TotalRecords"]) && $_REQUEST["TotalRecords"] != "")
		$str_param.="&TotalRecords=" . $_REQUEST["TotalRecords"];
	if ($_REQUEST["tabid"] == "network")
		$str_param.="&iNetworkId=" . $_REQUEST["iNetworkId"];
	if ($_REQUEST["tabid"] == "travelzam")
		$str_param.="&iTravelzamId=" . $_REQUEST["iTravelzamId"];
	return $str_param;
}

function gen_redirectURL_header($url) {
	header("Location:" . $url);
	exit;
}

?>
