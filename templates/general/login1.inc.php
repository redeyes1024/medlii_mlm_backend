<script type="text/javascript" language="JavaScript1.2" src="<?php echo $CFG->wwwroot."/public/js/"?>login.js"></script>
<div class="errorbox-position">
	<div <?php  if($_REQUEST[err_msg]!='') {?> class="errorbox" <?}?> style="position: absolute; top: -18px; left: 270px;">
		<?php  if($_REQUEST[err_msg]!=''){ 
			echo $_REQUEST[err_msg];
		}?>
	</div>
</div>
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0" class="loginarea">
	<tr>
		<td colspan="3" class="login-headbg">Owner Login</td>
	</tr>
	<tr>
		<td class="loginbox-border">
			<table width="95%" border="0" cellpadding="1" cellspacing="1" rules=group align="center">
				<tr>
					<?php if($_REQUEST[err_msg]!=''){?>
					<td height="10" class="errormsg" align="center">
						<?php echo $_REQUEST[err_msg];?>
					</td>
					<?}
					?>
				</tr>
				<tr>
					<td>
						<p>
							<strong>Enter the login name into "Login" and password into the "Password" fields respectively. Then click "Login".</strong>
						</p>
						<form name="form1" action="scripts/admin/login1_a.php" method="post">
							<input type="hidden" name="mode" value="Login">
							<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="formFields">
								<tr>
									<td width="28%" class="bmatter1">
										<label for="login_name">Login </label>
									</td>
									<td width="4%" class="bmatter1">:</td>
									<td width="68%">
										<input type="text" name="login_name" id="login_name" value="" size="25" maxlength="255">
									</td>
								</tr>
								<tr>
									<td class="bmatter1">
										<label for="passwd">Password </label>
									</td>
									<td class="bmatter1">:</td>
									<td>
										<input type="password" name="passwd" id="passwd" size="25" value="">
									</td>
								</tr>
								<tr>
									<td colspan="2" class="main" id="get_password">&nbsp;</td>
									<td height="27" valign="bottom">
										<input type="image" src="<?php echo $CFG->wwwroot."/public/images/"?>btn-login.gif" value="Login" style="border: 0" onclick="return login(document.form1)">
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="<?php echo $CFG->wwwroot."/public/images/";?>loginbox-shadow.gif" alt="" />
		</td>
	</tr>
</table>
<script type="text/javascript">
	setFocus();
</script>
