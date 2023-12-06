<?php
include('../connection.php');
$room_number = $_PUT['room_number'];
$query = $mysqli->prepare('update rooms SET patient_id = null , status = "Free" Where room_number = ?');
$query->bind_param('i',$room_number);
$query->execute();
$reponse = [];
$reponse["status"] = "true";
echo json_encode($reponse);