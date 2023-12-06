<?php
include("../connection.php");
$email = $_POST['email'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$specialty = $_POST['specialty'];

$select_query = $mysqli->prepare('select doctor_id from doctors where email=?');
$select_query->bind_param('s',$email);
$select_query->execute();
$select_query->store_result();
$num_rows=$select_query->num_rows;
if($num_rows>0){
    $response['status']= 'doctor already exists';
    echo json_encode($response);
}
else{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = $mysqli->prepare('insert into doctors(email,password,first_name,last_name,specialty) 
    values(?,?,?,?,?)');
    $query->bind_param('sssss', $email, $hashed_password, $first_name, $last_name,$specialty);
    $query->execute();
    $response = [];
    $response["status"] = "true";
    echo json_encode($response);

}
