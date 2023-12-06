<?php
include('../connection.php');
$email = $_POST['email'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST["date_of_birth"];
$gender = $_POST["gender"];
$contact_number = $_POST["contact_number"];
$address = $_POST["address"];

$select_query = $mysqli->prepare('select patient_id from patients where email=?');
$select_query->bind_param('s',$email);
$select_query->execute();
$select_query->store_result();
$num_rows=$select_query->num_rows;
if($num_rows>0){
    $response['status']= 'patient already exists';
    echo json_encode($response);
}
else{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = $mysqli->prepare('insert into patients(email,password,first_name,last_name,date_of_birth,gender,contact_number,address) 
    values(?,?,?,?,?,?,?,?)');
    $query->bind_param('ssssisis', $email, $hashed_password, $first_name, $last_name,$date_of_birth,$gender,$contact_number,$address);
    $query->execute();
    $response = [];
    $response["status"] = "true";
    echo json_encode($response);
}