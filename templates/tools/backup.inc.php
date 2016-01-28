<?php     $tab_arr=$GeneralObj->tab_header('Backup');
$num_totrec1=count($tab_arr);
$TabId=$_REQUEST[TabId];
if($TabId == '')	$TabId=1;

?>
<BODY>
	<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="37">
				<h1>
					<?php echo $GenFunctionObj->DisplayTopInListAddDealer("DataBase Backup");?>
				</h1>
			</td>
			<td width="8%" align="right">
				<?php echo $help?>
			</td>
		</tr>
		<tr>
			<td height="40">
				<?php echo $GeneralObj->tab_displayTab($tab_arr); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="listArea">
					<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td>
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td class="inner-topcurve">
											<div>
												<img src="<?php echo $CFG->wwwroot."/public/images/"?>spacer.gif" />
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="3" class="inner-bodycurve-listing">
											<span id="form1"><?php  include_once("tablebackup.inc.php"); ?> </span> <span id="form2"><?php  include_once("fullbackup.inc.php"); ?> </span>
										</td>
									</tr>
									<tr>
										<td class="inner-bottcurve">
											<div>
												<img src="<?php echo $CFG->wwwroot."/public/images/"?>spacer.gif" />
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</body>
<script type="text/javascript">
	submenu('<?php echo $TabId?>','<?php echo $num_totrec1?>');
</script>
