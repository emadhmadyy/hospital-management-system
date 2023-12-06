<?php
include('../connection.php');
$doctor_id = $_DELETE['doctor_id'];
$query = $mysqli->prepare('delete from doctors where doctor_id=?');
$query->bind_param('i',$doctor_id);
$query->execute();
$response = [];
$response["status"] = "true";
echo json_encode($response);