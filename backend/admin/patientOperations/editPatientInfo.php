<?php
include('../connection.php');
$first_name = $_PUT['first_name'];
$last_name = $_PUT['last_name'];
$gender = $_PUT['gender'];
$contact_number = $_PUT['contact_number'];
$address = $_PUT['address'];
$date_of_birth = $_PUT['date_of_birth'];
$patient_id = $_PUT['patient_id'];
$query = $mysqli->prepare('update patients SET first_name =?, last_name =?, gender=?, contact_number=?, address=?, date_of_birth =? WHERE patient_id = ?');
$query->bind_param('ssssssi',$first_name,$last_name,$gender,$contact_number,$address,$date_of_birth,$patient_id);
$query->execute();
$response = [];
$reponse["status"] = "true";
echo json_encode($reponse);
