<?php
/**

* @desc 	index.php file from where the execution start.

* @author	Danil Skripnikov

*/
require_once('config.php');
global $CFG;

include_once("includes/noentry.php");
include_once("includes/header.php");

ini_set("session.bug_compat_warn", 0);
ini_set("session.bug_compat_42", 0);

//global $admin_ajax_url;
if (isset($_GET['AX'])) {
	$AX = $_GET['AX'];
} else {
	$AX = "No";
}

if (isset($_GET['file'])) {
	$file = $_GET['file'];
}

if (isset($_GET['file'])) {
	$var = explode("-", $_GET['file']);
}
if (isset($var[0])) {
	$prefix = $var[0];
} else {
	$prefix = "admin";
}
if (isset($var[1])) {
	$script = $var[1];
} else {
	$script = "sitemap";
}

switch ($prefix) {
	case "u" :
		$module = "user";
		break;
	case "t" :
		$module = "tools";
		break;
	case "m" :
		$module = "master";
		break;
	case "a" :
		$module = "admin";
		break;


	default :
		$module = "admin";
		break;
}


if ($AX == "Yes") {
	$include_script = "templates/general/user_generallist.inc.php";
} else {
	$include_script = "templates/" . $module . "/" . $script . ".inc.php";
}

$include_script_a = 'scripts/' . $module . "/" . $script . ".php";
?>
<body>
	<script type="text/javascript" language="JavaScript1.2"
		src="<?php echo $CFG->wwwroot; ?>/public/js/emailvalid.js"></script>
	<script type="text/javascript" language="JavaScript1.2"
		src="<?php echo $CFG->wwwroot; ?>/public/js/validate_new.js"></script>
	<script type="text/javascript" language="JavaScript1.2"
		src="<?php echo $CFG->wwwroot; ?>/public/js/validate.js"></script>
	<script type="text/javascript" language="JavaScript1.2"
		src="<?php echo $CFG->wwwroot; ?>/public/js/general.js"></script>
	<script type="text/javascript" language="JavaScript1.2"
		src="<?php echo $CFG->wwwroot; ?>/public/js/thickbox.js"></script>

	<script type="text/javascript">
        var file = '<?php echo $file ?>';
        var log_id = '<?php echo $_SESSION["sess_iAdminId"] ?>';
        var admin_url = '<?php echo $CFG->wwwroot ?>/';
        var site_url = '<?php echo $CFG->wwwroot ?>/';
        var admin_image_url = '<?php echo $CFG->wwwroot . '/public/images/' ?>';
        var eDemo = 'No';
    </script>

	<table width="100%" border="0" align="center" cellpadding="0"
		cellspacing="0">
		<?php
		if ($script != 'job_image') {

            echo "<tr> <td height='154' valign='top'>";
            include_once($CFG->dirroot . "/templates/top/top.inc.php");
            echo "</td>  </tr>";
        }
        ?>
		<tr>
			<td height="20"></td>
		</tr>
		<tr>
			<td height="320" valign="top" align="center" align="center">
				<div class="errorbox-position" id="var_msg_cnt">
					<div
						style="position: absolute; top: -2px; right: 280px; z-index: 1000;">
						<a href="#" onClick="closeMessage();return false;"><img
							src="<?php echo $CFG->wwwroot ?>/public/images/icon/close-icon.gif"
							border="0"> </a>
					</div>
					<div class="errorbox" id="err_msg_cnt"
						style="position: relative; top: -20px; left: 0px;">
						<?php
						if (isset($_REQUEST['var_msg'])) {
                            echo $_REQUEST['var_msg'];
                        }
                        ?>
					</div>
				</div> <?php
				if (file_exists($include_script))
					include_once($include_script);

				else
					include_once($include_script_a);
				?>
			</td>
		</tr>
		<tr>
			<td height="20"></td>
		</tr>
		<tr>
			<td><table width="100%" border="0" align="center" cellspacing="0"
					cellpadding="0">
					<tr>
						<td align="center"><?php
						if ($script != 'job_image') {
                    include_once("templates/bottom/bottom.inc.php");
                }
                ?>
						</td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td height="5"></td>
		</tr>
	</table>
</body>
</html>
<?php
$obj->close();
?>
<script type="text/javascript">

    function closeMessage()
    {
        if ( $('#var_msg_cnt').css('display') != 'none' ) {
            $('#var_msg_cnt').slideUp();
        }
    }


    function setMessage(msg)
    {

        $('#err_msg_cnt').html(msg);
        if($('#var_msg_cnt').css('display')=='none')
            $('#var_msg_cnt').slideDown();
        //setTimeout('closeMessage()',3000);
    }
    
    (function($){
        $.getQuery = function( query ) {
            query = query.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
            var expr = "[\\?&]"+query+"=([^&#]*)";
            var regex = new RegExp( expr );
            var results = regex.exec( window.location.href );
            if( results !== null ) {
                return results[1];
                return decodeURIComponent(results[1].replace(/\+/g, " "));
            } else {
                return false;
            }
        };
    })(jQuery);

<?php
if (isset($_REQUEST['var_msg'])) {

    echo 'setMessage("' . $_REQUEST['var_msg'] . '");';
}
?>

</script>
