<?php
include("../connection.php");
$email = $_POST['email'];
$password = $_POST['password'];
$select_query = $mysqli->prepare('select admin_id,email,password from admins where email=?');
$select_query->bind_param('s',$email);
$select_query->execute();
$select_query->store_result();
$num_rows=$select_query->num_rows;
if($num_rows>0){
    $response['status']= 'user already exists';
    echo json_encode($response);
}
else{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = $mysqli->prepare('insert into admins(email,password) 
    values(?,?)');
    $query->bind_param('ss', $email, $hashed_password);
    $query->execute();
    $response = [];
    $response["status"] = "true";
    echo json_encode($response);
}


// C:\xampp\htdocs\hms\admin\signup.php