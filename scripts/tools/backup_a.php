<?php     ob_clean();
include_once($CFG->dirroot."/lib/classes/"."application/Backup.Class.php5");
$dumper = new Mysqldumper($SERVER, $USERNAME,$PASSWORD,$DBASE);
$mode=$_POST[mode];
$chk=$_POST[chk];
$memfileNames=$_POST[memfileNames];
$currPath = $_POST[currPath];
##OPTIMIZE
if ($mode=="optimize_mem")
{
	$obj->DB_table_optimize($_POST[tableOp]);
	$msg = "Table optimization has been Optmized successfully.";
	header("Location:index.php?file=t-tablebackup&var_msg=".$msg."");
	exit;
}

##DELETE
if ($mode=="delete_db_file")
{
	for($i=0; $i<count($_POST[chkFull]); $i++)
	{
		$fileName=$site_backup_path.$_POST[chkFull][$i];
		@unlink($fileName);
	}
	$msg=rawurlencode("Database backup file has been Deleted successfully.");
	header("Location:index.php?file=t-backup&TabId=2&var_msg=".$msg."");
	exit;
}
##TABLE BACKUP
if ($mode=="tableBackup")
{

	# Variables have replaced original hard-coded values
	$dumper->setDBtables($chk);
	if($_POST[btnDownload]=="btnDownload")
	{
		$TabId=1;
		$dumpfinished = $dumper->createDumpDealer("callBack","");
		exit;
	}
	if($_POST[btnDownload] == "btnBackup")
	{
		$chk=$GeneralObj->getTablesForBackup();
		$dumper->setDBtables($chk);
		$dumpfinished = $dumper->createDumpDealer("callBack","");
		$TabId=2;
	}
	else
	{
		$TabId=1;
		$dumpfinished = $dumper->createDumpDealer("callBack","");
		exit;
	}
	$msg=rawurlencode("Database Saved Successfully ");
	header("Location:index.php?file=t-backup&TabId=".$TabId."&var_msg=".$msg."");
	exit;
}
if ($mode=="FileDownload")
{
	if(!headers_sent())
	{
		header('Content-type: application/download');
		header('Content-Disposition: attachment; filename='.$_POST[FileDown]);
		readfile($site_backup_path.$_POST[FileDown]);
		exit;
	}
}
?>
