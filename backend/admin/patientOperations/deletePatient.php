<?php
include('../connection.php');
$patient_id = $_DELETE['patient_id'];
$query = $mysqli->prepare('delete from patients where patient_id=?');
$query->bind_param('i',$patient_id);
$query->execute();
$response = [];
$response["status"] = "true";
echo json_encode($response);