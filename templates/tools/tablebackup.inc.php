<?php $result_table = $GeneralObj->getTablesForBackup();
?>
<form name="frmbackup" method="post" action="index.php?file=t-backup_a">
	<input type="hidden" name="TabId" id="TabId" value="<?php echo $TabId; ?>">
	<input type="hidden" name="mode" value="tableBackup">
	<input type="hidden" name="tableOp">
	<table width="100%" border="0" cellpadding="2" cellspacing="1" align="center">
		<tr>
			<td colspan="4" class="bluetextbold">
				<b>Check Table that You Want to Download/Backup</b>
			</td>
		</tr>
		<tr>
			<td width="3%">
				<input type="radio" name="btnDownload" class="noinput" checked value="btnDownload">
			</td>
			<td width="14%">Download Tables</td>
			<td width="2%">
				<input type="radio" name="btnDownload" class="noinput" value="">
			</td>
			<td width="81%">Save Backup and Download</td>
		</tr>
		<!-- onclick="BackupSubmit();return false;" -->
		<tr>
			<td colspan="4">
				<img src="<?php echo $CFG->wwwroot . "/public/images/" ?>download-backup.gif" style="CURSOR: POINTER" onclick="BackupSubmit();return false;">
			</td>
		</tr>
	</table>
	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
		<tr>
			<td>
				<table width="100%" class="listing-border" align="center" cellspacing="1" cellpadding="2" border="0">
					<tr>
						<th width="1%" height="20" align="center" class="top-headingbg">
							<div align="center">
								<input class="noinput" type="Checkbox" name="abc" value="1" onclick="checkAll()">
							</div>
						</th>
						<th width="25%" height="20" class="matterlink" style="text-align: left;">Table</th>
					</tr>
					<?php
					for ($i = 0; $i < count($result_table); $i++) {
            $bgcolor = ($i % 2) ? "td-dark" : "td-light";
            ?>
					<tr onmouseover="Highlight(this);" onmouseout="UnHighlight(this,'<?php echo $bgcolor; ?>');" class="<?php echo $bgcolor; ?>">
						<td width="1%" height="20" align="center">
							<input class="noinput" type="checkbox" name="chk[]" id="iId" value="<?php echo $result_table[$i]; ?>">
						</td>
						<td width="25%" height="20" align="left" class="bluematter">
							<?php echo $result_table[$i] ?>
						</td>
					</tr>
					<? } ?>
				</table>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
    function checkAll()
    {
        var rs = (document.frmbackup.abc.checked)?true:false;
	
        for(i=0;i<document.frmbackup.elements.length;i++){
            if(document.frmbackup.elements[i].id == 'iId'){
                document.frmbackup.elements[i].checked = rs;
            }
        }  
    }
    function BackupSubmit()
    {
        if(GetCountTables(document.frmbackup) ==0){
            alert("Please Select Tables");
            return false;
        }
        document.frmbackup.submit();
    }
    function GetCountTables(frm)
    {	
        var x=0;
        with(frm){
            for(i=0;i < elements.length;i++){	
                if (elements[i].id == 'iId' && elements[i].checked == true) 
                    x++;
            }
            return x;
        }
    }

    function Optimzetable(tablename)
    {
        document.frmbackup.mode.value = 'optimize_mem';
        document.frmbackup.tableOp.value = tablename;
        document.frmbackup.submit();
    }
</script>
