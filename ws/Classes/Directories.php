
<?php

class Directories {

	function __construct() {

	}

	function index() {
		return Array("index\n\n\n");
	}

	function DirectoryList() {
		global $obj, $GeneralObj;

		$keyword = $_REQUEST['keyword'];
		$group_id = $_REQUEST['group_id'];


		if (!empty($keyword)) {
			$ssql = "AND (concat(d.vFirstname ,' ',d.vLastname) LIKE '%" . $keyword . "%' OR d.vEmail LIKE '%" . $keyword . "%' )";
		}

		$sql = "SELECT concat(d.vFirstname ,' ',d.vLastname) as member_name,vJobTitle,d.vEmail as email,d.vPhone as contact_no,concat(d.vFirstname,' ',d.vLastname,' ',d.vEmail) as member_email
				FROM Directory d JOIN SubGroup sg ON sg.iSGroupId = d.iSGroupId
				WHERE d.eStatus = 'Active' AND ".         "( sg.iSGroupId in (select sga.iSGroupId from SubGroupUserAssign sga where sga.iUserId='" . $group_id . "') or (  ".
				"sg.vGroupName = 'Default Group' AND sg.iCompanyId=(select top 1 sgy.iCompanyId from SubGroupUserAssign sga join SubGroup sgy on sgy.iSGroupId=sga.iSGroupId where sga.iUserId='" . $group_id . "') ))"


						." AND sg.eStatus='1'   " . $ssql . " ORDER BY d.vFirstname";
		#  echo $sql; exit;
		$db_data = $obj->select($sql);

		if (is_array($db_data) && count($db_data) > 0) {

			$db_data[0]['message'] = 'Directories are found.';
			$db_data[0]['success'] = '1';
			$db_data = $GeneralObj->filterDataArr($db_data);
		} else {
			$db_data[0]['message'] = 'No directory found.';
			if (!empty($keyword)) {
				$db_data[0]['message'] = 'No directory found.';
			}
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

	function EventList() {
		global $obj, $GeneralObj;

		$event_date = $_REQUEST['event_date'];
		$event_title = $_REQUEST['event_title'];
		$group_id = $_REQUEST['group_id'];


		if (!empty($event_date)) {
			$ssql = "AND DATE_FORMAT(e.dEventDateTime,'%Y-%m-%d') =  '" . $event_date . "' ";
		}

		if (!empty($event_title)) {
			$ssql = "AND e.vEventTitle LIKE  '%" . $event_title . "%' ";
		}

		$sql = "SELECT e.iEventId as event_id,e.vEventTitle  as event_name,e.vDescription as message,e.dEventDateTime as date
				FROM Event e JOIN SubGroup sg ON sg.iSGroupId = e.iSGroupId
				WHERE e.eStatus = 'Active' AND  ".
				"( sg.iSGroupId in (select sga.iSGroupId from SubGroupUserAssign sga where sga.iUserId='" . $group_id . "') or (  ".
				"sg.vGroupName = 'Default Group' AND sg.iCompanyId=(select top 1 sgy.iCompanyId from SubGroupUserAssign sga join SubGroup sgy on sgy.iSGroupId=sga.iSGroupId where sga.iUserId='" . $group_id . "') ))"
						." AND sg.eStatus='1'   " . $ssql . "  AND CURDATE()<=e.dEventDateTime ORDER BY e.dEventDateTime";
		#        echo $sql; exit;
		$db_data = $obj->select($sql);

		if (is_array($db_data) && count($db_data) > 0) {



			$db_data[0]['message'] = 'Events are found.';
			$db_data[0]['success'] = '1';
			$db_data = $GeneralObj->filterDataArr($db_data);
		} else {
			$db_data[0]['message'] = 'No event found.';
			if (!empty($keyword)) {
				$db_data[0]['message'] = 'No event found.';
			}
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

	function EventDetail() {
		global $obj, $GeneralObj;
		$event_id = $_REQUEST['event_id'];


		if (!empty($event_id)) {
			$sql = "SELECT vEventTitle as event_name,vDescription as event_desc,DATE_FORMAT(dEventDateTime, '%M %d, %Y   %h:%i %p') as event_date1,dEventDateTime as event_date,
					`showDate` as event_st FROM Event WHERE iEventId='" . $event_id . "' AND  eStatus='Active' ";
			//echo $sql; exit;
			$db_data = $obj->select($sql);

			if (is_array($db_data) && count($db_data) > 0) {

				if (strtotime($db_data[0]['event_date']) >= 0 && strtotime($db_data[0]['event_date']) != "") {
					$db_data[0]['event_date'] = date('M d, Y h:i A', strtotime($db_data[0]['event_date']));
				} else {
					$db_data[0]['event_date'] = "TBD";
				}
				if ($db_data[0]['event_st']==0){
					$db_data[0]["event_date"]="TBD";
				}


				$db_data[0]['message'] = 'Event Detail are found.';
				$db_data[0]['success'] = '1';
				$db_data = $GeneralObj->filterDataArr($db_data);
			} else {
				$db_data[0]['message'] = 'No Event Found.';
				$db_data[0]['success'] = '0';
			}
		} else {
			$db_data[0]['message'] = 'Invalid parameter.';
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

	function CourseList() {
		global $obj, $GeneralObj;

		$course_class = $_REQUEST['course_class'];
		$course_title = $_REQUEST['course_title'];
		$group_id = $_REQUEST['group_id'];

		if (!empty($course_class)) {
			//        $ssql="AND IF(  (SELECT cl.iClassId FROM Class cl,CourseClasses cs,Course c  WHERE  cl.iClassId=cs.iClassId AND cs.iCourseId = c.iCourseId AND cl.vClassname LIKE  '$course_class%' ) =c.iClassId,1,0) ";
			$ssql = "Having classname LIKE '$course_class%' OR classname LIKE '%," . $course_class . "%' ";
		}

		if (!empty($course_title)) {
			$ssql1 = "AND c.vCoursename LIKE  '%$course_title%' ";
		}

		$com_sql = "SELECT iCompanyId FROM SubGroup WHERE iSGroupId='" . $group_id . "' ";
		$db_com = $obj->select($com_sql);
		$company_id = $db_com[0]['iCompanyId'];

		$ssql_count = ",(SELECT count(cs.iCCId) FROM Class cl,CourseClasses cs  WHERE  cl.iClassId=cs.iClassId  AND cs.iCourseId= c.iCourseId AND cs.eStatus='Active' AND cl.eStatus='Active') as no_class";
		$ssql_name = ",(SELECT group_concat(vClassname) FROM Class cl,CourseClasses cs WHERE cl.iClassId=cs.iClassId AND cs.iCourseId=c.iCourseId AND cs.eStatus='Active' AND cl.eStatus='Active' group by cs.iCourseId ) as classname";
		$sql = "SELECT  c.iCourseId as course_id,c.vCoursename  as course_name,DATE_FORMAT(c.dCourseDateTime, '%M %d, %Y   %h:%i %p') as course_date1,c.dCourseDateTime as course_date,c.vDescription as course_desc
				" . $ssql_count . "
						" . $ssql_name . "
								FROM Course as c  JOIN SubGroup sg ON sg.iSGroupId = c.iSGroupId
								WHERE c.eStatus = 'Active' AND ".

								"( sg.iSGroupId in (select sga.iSGroupId from SubGroupUserAssign sga where sga.iUserId='" . $group_id . "') or ( ".
								"sg.vGroupName = 'Default Group' AND sg.iCompanyId=(select top 1 sgy.iCompanyId from SubGroupUserAssign sga join SubGroup sgy on sgy.iSGroupId=sga.iSGroupId where sga.iUserId='" . $group_id . "') ))"






										." AND sg.eStatus='1' " . $ssql1 . " GROUP BY c.iCourseId  " . $ssql . "  ORDER BY c.vCoursename ";
		# echo $sql; exit;




		$db_data = $obj->select($sql);
		#      print_r($db_data); exit;
		if (is_array($db_data) && count($db_data) > 0) {


			for ($i = 0; $i < count($db_data); $i++) {
				if ($db_data[$i]['no_class'] != '0') {
					$db_data[$i]['course_name'] .= " (" . $db_data[$i]['no_class'] . ")";
				}
				if (strtotime($db_data[$i]['course_date']) >= 0 && strtotime($db_data[$i]['course_date']) != "") {
					$db_data[$i]['course_date'] = date('M d, Y h:i A', strtotime($db_data[$i]['course_date']));
				} else {
					$db_data[$i]['course_date'] = "TBD";
				}


				/*
				 if($db_data[$i]['course_date']='January 01, 1970 01:00 AM') {
				//  echo "hardik";exit;
				$db_data[$i]['course_date']='TBD';
				}
				*/
			}

			$db_data[0]['message'] = 'Courses are found.';
			$db_data[0]['success'] = '1';
			//               $db_data = $GeneralObj->filterDataArr($db_data);
		} else {
			$db_data[0]['message'] = 'No Course Found.';
			if (!empty($keyword)) {
				$db_data[0]['message'] = 'No Course Found.';
			}
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

	function CourseDetail() {
		global $obj, $GeneralObj;
		$course_id = $_REQUEST['course_id'];
		$keyword = $_REQUEST['keyword'];



		if (!empty($course_id)) {

			/*          $sql = "SELECT c.vCoursename as course_name,cs.iCCId as cssid,cl.vClassname as class_name,DATE_FORMAT(cs.dClassDateTime, '%M %d, %Y   %h:%i %p') as class_date,cs.iDuration as duration,
			 c.vDescription as course_desc,DATE_FORMAT(c.dCourseDateTime, '%M %d, %Y   %h:%i %p') as course_date
			FROM Course as c
			LEFT JOIN CourseClasses as cs ON cs.iCourseId=c.iCourseId
			JOIN Class as cl ON cs.iClassId=cl.iClassId
			WHERE c.iCourseId='$course_id' AND  c.eStatus='Active' "; */



			$sql = "SELECT c.vCoursename as course_name,nc.cssid,nc.class_name,nc.duration,nc.class_date,c.vDescription as course_desc,
					DATE_FORMAT(c.dCourseDateTime, '%M %d, %Y   %h:%i %p') as course_date1,c.dCourseDateTime as course_date
					FROM Course as c LEFT JOIN (
					SELECT cs.iCCId as cssid,cs.iCourseId as iCourseId,cl.vClassname as class_name,DATE_FORMAT(cs.dClassDateTime, '%M %d, %Y   %h:%i %p') as class_date,
					cs.iDuration as duration FROM CourseClasses as cs, Class as cl WHERE cs.iCourseId='" . $course_id . "' AND cs.iClassId=cl.iClassId AND cs.eStatus='Active' AND cl.eStatus='Active') as nc ON nc.iCourseId = c.iCourseId
			WHERE c.iCourseId='" . $course_id . "' AND c.eStatus='Active' ";
			// echo $sql; exit;
			$db_data = $obj->select($sql);

			if (is_array($db_data) && count($db_data) > 0) {
				if (strtotime($db_data[0]['course_date']) >= 0 && strtotime($db_data[0]['course_date']) != "") {
					$db_data[0]['course_date'] = date('M d, Y h:i A', strtotime($db_data[0]['course_date']));
				} else {
					$db_data[0]['course_date'] = "TBD";
				}

				if ($keyword == 'ipad') {


					$html.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

							<html>
							<head>
							<link href="style_ipad.css" rel="stylesheet" type="text/css" />
							<title>SLI</title>
							</head>
							<body>
							<form action="~Screen3" method="post">
							<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
							<tr>
							<td align="left" valign="top" height="24" class="new-u1">Course: ' . $db_data[0]['course_name'] . '</td>
									</tr>
									<tr>
									<td height="10">&nbsp;</td>
									</tr>
									<tr>
									<td align="left" valign="top" height="24" class="jun1">' . $db_data[0]['course_date'] . '</td>
											</tr>
											<tr>
											<td height="10">&nbsp;</td>
											</tr>

											<tr>
											<td align="left" valign="top" height="0" class="font11">Description:</td>
											</tr>
											<tr>
											<td height="10">&nbsp;</td>
											</tr>
											<tr>
											<td valign="top"  class="font12" align="justify">' . $db_data[0]['course_desc'] . '</td></tr>
													<tr>
													<tr>
													<td height="10">&nbsp;</td>
													</tr>';
					if (!empty($db_data[0]['cssid'])) {
						$html.='<td align="left" valign="middle" height="28" class="font11">Classes:</td>
								</tr>
								<tr>
								<td height="10">&nbsp;</td>
								</tr>
								<tr>
								<td><table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" class="bo-left">
								<tr class="classes1">
								<td width="30" height="39" align="center" class="sno1">Sno</td>
								<td width="49" height="39" align="center" class="sno1">Class</td>
								<td width="127" height="39" align="center" class="sno1">Time</td>
								<td width="50" height="39" align="center" class="sno1">Duration</td>
								</tr>';
						//$i=1;

						for ($i = 0; $i < count($db_data); $i++) {
							$html.='<tr class="class1">
									<td width="30" height="39" align="center" class="cl-text">' . ($i + 1) . '</td>
											<td width="49" height="39" align="center" class="cl-text">' . $db_data[$i]['class_name'] . '</td>
													<td width="127" height="39" align="center" class="cl-text">' . $db_data[$i]['class_date'] . '</td>
															<td width="50" height="39" align="center" class="cl-text">' . $db_data[$i]['duration'] . '</td>
																	</tr>';
						}
					}
					$html.='</table>
							</td>
							</tr>
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</form>
							<script type="text/javascript" src="HBGeneral.html"></script>
							</body>
							</html>';
				} else {

					$html.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

							<html>
							<head>
							<link href="style.css" rel="stylesheet" type="text/css" />
							<title>SLI</title>
							</head>
							<body>
							<form action="~Screen3" method="post">
							<table cellpadding="0" cellspacing="0" border="0" width="90%" align="center">
							<tr>
							<td align="left" valign="top" height="24" class="new-u1">Course: ' . $db_data[0]['course_name'] . '</td>
									</tr>
									<tr>
									<td height="10">&nbsp;</td>
									</tr>
									<tr>
									<td align="left" valign="top" height="24" class="jun1">' . $db_data[0]['course_date'] . '</td>
											</tr>
											<tr>
											<td height="10">&nbsp;</td>
											</tr>
											<tr>
											<td align="left" valign="top" height="0" class="font11">Description:</td>
											</tr>
											<tr>
											<td height="10">&nbsp;</td>
											</tr>
											<tr>
											<td align="left" valign="top" class="font12">' . $db_data[0]['course_desc'] . '</td></tr>
													<tr>
													<tr>
													<td height="10">&nbsp;</td>
													</tr>';
					if (!empty($db_data[0]['cssid'])) {
						$html.='<td align="left" valign="middle" height="28" class="font11">Classes:</td>
								</tr>
								<tr>
								<td height="10">&nbsp;</td>
								</tr>
								<tr>
								<td><table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" class="bo-left">
								<tr class="classes1">
								<td width="30" height="39" align="center" class="sno1">Sno</td>
								<td width="49" height="39" align="center" class="sno1">Class</td>
								<td width="127" height="39" align="center" class="sno1">Time</td>
								<td width="50" height="39" align="center" class="sno1">Duration</td>
								</tr>';
						//$i=1;

						for ($i = 0; $i < count($db_data); $i++) {
							$html.='<tr class="class1">
									<td width="30" height="39" align="center" class="cl-text">' . ($i + 1) . '</td>
											<td width="49" height="39" align="center" class="cl-text">' . $db_data[$i]['class_name'] . '</td>
													<td width="127" height="39" align="center" class="cl-text">' . $db_data[$i]['class_date'] . '</td>
															<td width="50" height="39" align="center" class="cl-text">' . $db_data[$i]['duration'] . '</td>
																	</tr>';
						}
					}
					$html.='</table>
							</td>
							</tr>
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</form>
							<script type="text/javascript" src="HBGeneral.html"></script>
							</body>
							</html>';
					//	echo $html;exit;
				}
				$db_data[0]['html_data'] = str_replace(Array('\r', '\n', '\t'), '', $html);
				$db_data[0]['html_data'] = trim($db_data[0]['html_data']);
				$db_data[0]['message'] = 'Course Detail are found.';
				$db_data[0]['success'] = '1';
				$db_data = $GeneralObj->filterDataArr($db_data);
			} else {
				$db_data[0]['message'] = 'No Course Found.';
				$db_data[0]['success'] = '0';
			}
		} else {
			$db_data[0]['message'] = 'Invaild Parameter.';
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

	function CourseDetail_a() {
		global $obj, $GeneralObj;
		$course_id = $_REQUEST['course_id'];


		if (!empty($course_id)) {



			$sql = "SELECT c.vCoursename as course_name,nc.cssid,nc.class_name,nc.duration,nc.class_date,c.vDescription as course_desc,
					DATE_FORMAT(c.dCourseDateTime, '%M %d, %Y   %h:%i %p') as course_date1,c.dCourseDateTime as course_date
					FROM Course as c LEFT JOIN (
					SELECT cs.iCCId as cssid,cs.iCourseId as iCourseId,cl.vClassname as class_name,DATE_FORMAT(cs.dClassDateTime, '%M %d, %Y   %h:%i %p') as class_date,
					cs.iDuration as duration FROM CourseClasses as cs, Class as cl WHERE cs.iCourseId='" . $course_id . "' AND cs.iClassId=cl.iClassId AND cs.eStatus='Active' AND cl.eStatus='Active') as nc ON nc.iCourseId = c.iCourseId
							WHERE c.iCourseId='" . $course_id . "' AND c.eStatus='Active'  ";
			// echo $sql; exit;
			$db_data = $obj->select($sql);

			if (is_array($db_data) && count($db_data) > 0) {

				if (strtotime($db_data[0]['course_date']) >= 0 && strtotime($db_data[0]['course_date']) != "") {
					$db_data[0]['course_date'] = date('M d, Y h:i A', strtotime($db_data[0]['course_date']));
				} else {
					$db_data[0]['course_date'] = "TBD";
				}
				$db_data[0]['message'] = 'Course Detail are found.';
				$db_data[0]['success'] = '1';
				$db_data = $GeneralObj->filterDataArr($db_data);
			} else {
				$db_data[0]['message'] = 'No Course Found.';
				$db_data[0]['success'] = '0';
			}
		} else {
			$db_data[0]['message'] = 'Invaild Parameter.';
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

	function Dropdown_class() {
		global $obj, $GeneralObj;
		$group_id = $_REQUEST['group_id'];

		$sql = "select c.vClassname as vClassname,c.iClassId from Class as c
				join  CourseClasses as cc ON cc.iClassId=c.iClassId
				JOIN SubGroup sg ON sg.iSGroupId = c.iSGroupId
				where c.eStatus='Active' AND ".


				"( sg.iSGroupId in (select sga.iSGroupId from SubGroupUserAssign sga where sga.iUserId='" . $group_id . "') or (  ".
				"sg.vGroupName = 'Default Group' AND sg.iCompanyId=(select top 1 sgy.iCompanyId from SubGroupUserAssign sga join SubGroup sgy on sgy.iSGroupId=sga.iSGroupId where sga.iUserId='" . $group_id . "') ))"
						 


						. " AND sg.eStatus = '1' GROUP BY c.iClassId order by vClassname  ";
		#    echo $sql; exit;
		$db_data = $obj->select($sql);

		if (is_array($db_data) && count($db_data) > 0) {

			$db_data[0]['message'] = 'Classes are found.';
			$db_data[0]['success'] = '1';
			$db_data = $GeneralObj->filterDataArr($db_data);
		} else {
			$db_data[0]['message'] = 'No Class found.';
			if (!empty($keyword)) {
				$db_data[0]['message'] = 'No Class found.';
			}
			$db_data[0]['success'] = '0';
		}

		return $db_data;
	}

}

?>
