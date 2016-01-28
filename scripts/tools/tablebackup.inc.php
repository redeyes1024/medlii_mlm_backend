<?php
echo $db_name = $DBASE;exit;
if($db_name != '')
	mysql_select_db($db_name) or die(mysql_error());
$result_table = @mysql_query("SHOW TABLE status FROM  ".$db_name) or die(mysql_error());
?>
<form name="frmbackup" method="post" action="<?php echo ADMIN_ACTION_URL?>/backup_a.php">
	<input type="hidden" name="action" value="tableBackup">
	<input type="hidden" name="tableOp">
	<p>
		<span style='color: #990033'><b>Note:</b> </span> Overhead is unused space reserved by MySQL. To free up this space, click on the table's overhead figure.
	</p>
	<table border="0" cellpadding="2" cellspacing="3">
		<tr>
			<td colspan="4" style='color: #093664'>
				<b>Check Table that You Want to Download/Backup</b>
			</td>
		</tr>
		<tr>
			<td>
				<input type="radio" name="btnDownload" checked value="btnDownload">
			</td>
			<td>Download Tables</td>
			<td>
				<input type="radio" name="btnDownload" value="btnBackup">
			</td>
			<td>Save Backup at Root</td>
			<td>
				<input type="radio" name="btnDownload" value="">
			</td>
			<td>Save Backup and Download</td>
		</tr>
		<!-- onclick="BackupSubmit();return false;" -->
		<tr>
			<td colspan="4" style='color: #990033'>
				<img src="<?php echo ADMIN_BUTTONS?>/download-backup.gif" style="CURSOR: POINTER" onclick="BackupSubmit();return false;">
			</td>
		</tr>
	</table>
	<table width="100%" class="table-border1" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td width="1%" height="20" class="top-headingbg">
				<input type="Checkbox" name="abc" value="1" onclick="checkAll()">
			</td>
			<td width="25%" height="20" class="top-headingbg">&nbsp;&nbsp;Table</td>
			<td width="8%" align="center" class="top-headingbg">Records</td>
			<td width="10%" align="center" class="top-headingbg">Data Size</td>
			<td width="10%" align="center" class="top-headingbg">Data Free (Overhead)</td>
			<td width="10%" align="center" class="top-headingbg">Effective Size</td>
			<td width="10%" align="center" class="top-headingbg">Index Size</td>
			<td width="10%" align="center" class="top-headingbg">Total Size</td>
		</tr>
		<?while ($result_table != '' && $row = mysql_fetch_array($result_table)){
			$bgcolor = ($i%2)?"#FFFFFF" : "#EFEFEF";?>
		<tr onmouseover="this.style.backgroundColor='#DFDFDF'" onmouseout="this.style.backgroundColor='<?php echo $bgcolor?>'" bgcolor="<?php echo $bgcolor?>">
			<td width="1%" height="20" align="left">
				<input type="checkbox" name="chk[]" id="iId" value="<?php echo $row[0];?>">
			</td>
			<td width="25%" height="20" align="left" class="bluematter">
				<a href="#"><?php echo $row[0]?> </a>
			</td>
			<td width="8%" align="center">
				<?php echo $row[4]?>
			</td>
			<!-- DATA_LENGTH -->
			<td width="10%" align="center">
				<?php				$dataSize  = explode(" ",nicesize($row[6]));
				?>
				<table border="0" width="100%">
					<tr>
						<td align="right" width="30%">
							<?php echo $dataSize[0]?>
						</td>
						<td width="25%" align="left">
							<?php echo $dataSize[1]?>
						</td>
					</tr>
				</table>
			</td>
			<!-- DATA_FREE -->
			<td width="15%" align="center">
				<a href="javascript:Optimzetable('<?php echo $row[0];?>');"> <?php					$dataFree  = explode(" ",nicesize($row[9]));
				?>
					<table border="0" width="100%">
						<tr>
							<td align="right" width="30%">
								<?php echo $dataFree[0]?>
							</td>
							<td width="25%" align="left">
								<?php echo $dataFree[1]?>
							</td>
						</tr>
					</table>
			
			</td>
			<!-- DATA_LENGTH - DATA_FREE -->
			<td width="15%" align="center">
				<?php				$EffectiveSize  = explode(" ",nicesize($row[6]-$row[9]));
				?>
				<table border="0" width="100%">
					<tr>
						<td align="right" width="30%">
							<?php echo $EffectiveSize[0]?>
						</td>
						<td width="25%" align="left">
							<?php echo $EffectiveSize[1]?>
						</td>
					</tr>
				</table>
			</td>
			<!-- INDEX_LENGTH -->
			<td width="15%" align="center">
				<?php				$IndexSize  = explode(" ",nicesize($row[8]));
				?>
				<table border="0" width="100%">
					<tr>
						<td align="right" width="30%">
							<?php echo $IndexSize[0]?>
						</td>
						<td width="25%" align="left">
							<?php echo $IndexSize[1]?>
						</td>
					</tr>
				</table>
			</td>
			<!-- DATA LENGTH +  INDEX_LENGTH + DATA_FREE -->
			<td width="15%" align="center">
				<?php				$TotaltableSize  = explode(" ",nicesize($row[8]+$row[6]+$row[9]));
				?>
				<table border="0" width="100%">
					<tr>
						<td align="right" width="30%">
							<?php echo $TotaltableSize[0]?>
						</td>
						<td width="25%" align="left">
							<?php echo $TotaltableSize[1]?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<?php	$total = $total+$row[6]+$row[9];
		$totaloverhead = $totaloverhead+$row[9];
		}

		?>
		<tr bgcolor="EFEFEF">
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td align="center">
				<b><?php echo nicesize($totaloverhead)."<br>(".number_format($totaloverhead)." B)"; ?> </b>
			</td>
			<td></td>
			<td></td>
			<td align="center">
				<b> <?php		$TotalDBSize  = explode(" ",nicesize($total));
				?>
					<table border="0" width="100%">
						<tr>
							<td align="right" width="30%">
								<b><?php echo $TotalDBSize[0]?> </b>
							</td>
							<td width="25%" align="left">
								<b><?php echo $TotalDBSize[1]?> </b>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="left">
								<b><?php echo number_format($total)." B"?> </b>
							</td>
						</tr>
					</table>
			
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
function checkAll()
{
	var rs = (document.frmbackup.abc.checked)?true:false;
	
	for(i=0;i<document.frmbackup.elements.length;i++)
	{
	  	if(document.frmbackup.elements[i].id == 'iId')
  		{
			document.frmbackup.elements[i].checked = rs;
		}

	}  
}
function BackupSubmit()
{
	if(GetCountTables(document.frmbackup) ==0)
	{
		alert("Please Select Tables");
		return false;
	}
	document.frmbackup.submit();
}
function GetCountTables(frm)
{	
	var x=0;
	with(frm)
	{
		for(i=0;i < elements.length;i++)
		{	
			if (elements[i].id == 'iId' && elements[i].checked == true) 
				x++;
		}
		return x;
	}
}

function Optimzetable(tablename)
{
	document.frmbackup.action.value = 'optimize_mem';
	document.frmbackup.tableOp.value = tablename;
	document.frmbackup.submit();
}
</script>
