<?php

include_once("../../includes/include.php");

include_once($CFG->dirroot . "/lib/classes/" . "application/MusicType.Class.php5");
if (!empty($_POST['iMusicID'])) {
	$iMusicID = $_POST['iMusicID'];
	$musictypeObj = new MusicType();
	$musictypeObj->select($iMusicID);
	$eMusicType = $musictypeObj->geteMusicType();
	echo $eMusicType;
} else {
	echo "No Record Found.";
}
?>