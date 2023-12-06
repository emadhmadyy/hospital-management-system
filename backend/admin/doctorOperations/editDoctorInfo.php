<?php
include('../connection.php');
$first_name = $_PUT['first_name'];
$last_name = $_PUT['last_name'];
$speciality = $_PUT['specialty'];
$doctor_id = $_PUT['doctor_id'];
$query = $mysqli->prepare('update doctors SET first_name =?, last_name =?, specialty=? WHERE doctor_id = ?');
$query->bind_param('sssi',$first_name,$last_name,$speciality,$doctor_id);
$query->execute();
$response = [];
$reponse["status"] = "true";
echo json_encode($reponse);
