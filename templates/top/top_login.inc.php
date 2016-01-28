<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="21%" align="left" height="89">
			<img src='<?php echo $CFG->wwwroot . "/public/images/logo.png" ?>' />
		</td>
		<td class="toprightarea">
			<span class="loggedname"><strong>Site Control Panel for :&nbsp;</strong> <?php echo $CPANEL_TITLE; ?> </span>
			<br />
			<?php
			global $GeneralObj;

			echo $GeneralObj->Date_US_Format(date('F j Y'));
			?></td>
	</tr>
</table>
