<?php
include('../connection.php');
$request_id = $_PUT['request_id'];
$request_status = $_PUT['request_status'];
$query = $mysqli->prepare('update emergency_room_requests SET status=? Where request_id=?');
$query->bind_param('si',$request_status,$request_id);
$query->execute();
$response = [];
$response["status"] = "true";
echo json_encode($response);