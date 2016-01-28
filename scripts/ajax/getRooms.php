<?php
include_once("../../includes/include.php");
include_once($CFG->dirroot."/lib/classes/" . 'general/JSON.php');
include_once($CFG->dirroot."/lib/classes/" . 'application/cinema.Class.php5');
include_once($CFG->dirroot."/lib/classes/" . 'application/rooms.Class.php5');

$cinemaObj = new cinema();
$roomObj = new rooms();
$iCinemaId = $_REQUEST['iCinemaId'];

$cinema_room_id = $cinemaObj->getRooms($iCinemaId);
$rooms = $roomObj->get_rooms_by_id($cinema_room_id);

$jObj = new Services_JSON();
echo $jObj->encode($rooms);

?>