<?php
$copyrighttext ="";// str_replace("#CURRENT_YEAR#",date('Y'),$COPYRIGHTED_TEXT);
?>
<table width="99%" align="center" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center" width="5">
			<img src="public/images/bott-left-cov.gif" />
		</td>
		<td height="25" align="center" class="copyright">
			<?php echo $copyrighttext ?>
		</td>
		<td height="25" align="center" class="copyright">
			Copyright -
			<?php echo date('Y');?>
			&copy; Mobile Learning Manager. All rights reserved.
		</td>
		<td align="center" style="width: 5px; border: 0px solid #F3F3F3;">
			<img src="<?php echo $CFG->wwwroot ?>/public/images/bott-right-cov.gif" />
		</td>
	</tr>
</table>
