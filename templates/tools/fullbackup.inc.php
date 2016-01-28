<?php     $dbFiles = $GeneralObj->DirectoryListing($site_backup_path);
if(is_array($dbFiles))
	$dbFiles = array_reverse($dbFiles);
#print_r($Array);exit;
$var_msg = $_REQUEST['var_msg'];
?>
<link rel="stylesheet" href="style/thickbox.css" type="text/css">
<form name="frmFullBackup" method="post" action="index.php?file=t-backup_a">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId;?>">
	<input type="hidden" name="mode">
	<input type="hidden" name="btnDownload" value="btnBackup">
	<input type="hidden" name="FileDown">
	<table border="0" cellpadding="2" cellspacing="1" width="100%" align="center">
		<tr>
			<td colspan="4" class="bluetextbold">
				<b>Check Database File that You Want to Delete/Email </b>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<img src="<?php echo $CFG->wwwroot."/public/images/"?>btn-backup.gif" style="CURSOR: POINTER" onclick="BackupDatabase();return false;">&nbsp;&nbsp;<img
					src="<?php echo $CFG->wwwroot."/public/images/"?>btn-delete.gif" style="CURSOR: POINTER" onclick="DeleteDatabase();return false;">&nbsp;&nbsp;
			</td>
		</tr>
	</table>
	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td>
				<table width="100%" class="listing-border" align="center" cellspacing="1" cellpadding="2" border="0">
					<tr>
						<th width="4%" height="20" class="top-headingbg">
							<div align="center">
								<input class="noinput" type="Checkbox" name="abcFull" value="1" onclick="checkAllDatabase()">
							</div>
						</th>
						<th width="73%" align="left" class="top-headingbg">Database File</th>
						<th width="10%" align="center" class="top-headingbg">
							<div align="center">Download</div>
						</th>
						<th width="13%" align="center" class="top-headingbg">
							<div align="center">Data Size</div>
						</th>
					</tr>
					<?php		               for($i=0; $i<count($dbFiles); $i++)
					{
						$bgcolor = ($i%2)?"#F4F4F4" : "#FFFFFF";
						?>
					<tr onmouseover="this.style.backgroundColor='#E6E6E6'" onmouseout="this.style.backgroundColor='<?php  echo $bgcolor; ?>'" bgcolor="<?php  echo $bgcolor; ?>">
						<td align="center" class="bluematter">
							<input type="checkbox" class="noinput" name="chkFull[]" id="iIdFull" value="<?php echo $dbFiles[$i];?>">
						</td>
						<td align="left">
							<?php echo $dbFiles[$i]?>
						</td>
						<td align="center">
							<a href="<?php echo $DEALER_SITE_BACKUP_DBURL."/".$dbFiles[$i]?>" onclick="DownloadDB('<?php echo $dbFiles[$i];?>');return false;"><img
								src="<?php echo $CFG->wwwroot."/public/images/"?>icon/download.gif" border="0" /> </a>
						</td>
						<td align="center">
							<?php  $sizeDB = explode(" ",$GeneralObj->nicesize(filesize($site_backup_path.$dbFiles[$i]))); 
							?>
							<table border="0" width="100%">
								<tr>
									<td align="right" width="30%">
										<?php echo $sizeDB[0]?>
									</td>
									<td width="25%" align="left">
										<?php echo $sizeDB[1]?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<?php   $total+= filesize($site_backup_path.$dbFiles[$i]);
		          } ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td align="center">
							<?php   $totalSizeDB = explode(" ",$GeneralObj->nicesize($total));?>
							<table border="0" width="15%">
								<tr>
									<td align="right" width="30%">
										<b><?php echo $totalSizeDB[0]?> </b>
									</td>
									<td width="25%" align="left">
										<b><?php echo $totalSizeDB[1]?> </b>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
<div id="cart_message" style="display: none">
	<table width="100%" border="0" cellpadding="0" cellspacing="2" align="center">
		<tr>
			<td align="center" height="30">
				<strong>Product Addeded Successfully to Your Cart<br>
				</strong>
			</td>
		</tr>
	</table>
</div>
<script type="text/javascript">
function checkAllDatabase()
{
	var rs = (document.frmFullBackup.abcFull.checked)?true:false; 	
	for(i=0;i<document.frmFullBackup.elements.length;i++)
	{
	  	if(document.frmFullBackup.elements[i].id == 'iIdFull')
  		{
			document.frmFullBackup.elements[i].checked = rs;
		}                                                        
	}  
}
function DeleteDatabase()
{
	if(GetCountcheckAllDatabase(document.frmFullBackup) ==0)
	{
		alert("Please Select DB File");
		return false;
	}
	if(confirm('Are you sure to delete the Backup File?'))
	{
	     document.frmFullBackup.mode.value = 'delete_db_file';
	     document.frmFullBackup.submit();
     }
     else
     {
          return false;
     }	
}
function BackupDatabase()
{
	document.frmFullBackup.btnDownload.value = 'btnBackup';
	document.frmFullBackup.mode.value = 'tableBackup';
	document.frmFullBackup.submit();
}
function DownloadDB(Fname)
{
	document.frmFullBackup.mode.value = 'FileDownload';
	document.frmFullBackup.FileDown.value = Fname;
	document.frmFullBackup.submit();
}

function GetCountcheckAllDatabase(frm)
{	
	var x=0;
	with(frm)
	{
		for(i=0;i < elements.length;i++)
		{	
			if (elements[i].id == 'iIdFull' && elements[i].checked == true) 
				x++;
		}
		return x;
	}
}
function automaticEnable()
{
	if(document.frmFullBackup.vAutomatically.checked ==true)
     {
		document.getElementById('AutoCombo').style.display ='';
	}
     else
     {
		document.getElementById('AutoCombo').style.display ='none';
	}
	document.frmFullBackup.mode.value = 'CheckAutomatically';
}
</script>
