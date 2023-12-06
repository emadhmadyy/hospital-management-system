<?php
include('../connection.php');
$patient_id = $_POST["patient_id"];
$query = $mysqli->prepare("insert into emergency_room_requests(patient_id) values(?)");
$query->bind_param('i',$patient_id);
$query->execute();
$response = [];
$response["status"] = "true";
echo json_encode($response);
