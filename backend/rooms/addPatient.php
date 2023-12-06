<?php
include('../connection.php');
$patient_id = $_PUT['patient_id'];
$room_number = $_PUT['room_number'];
$query = $mysqli->prepare('update rooms SET patient_id = ?, status= "Occupied" Where room_number=? ');
$query->bind_param('ii',$patient_id,$room_number);
$query->execute();
$response = [];
$reponse["status"] = "true";
echo json_encode($reponse);
