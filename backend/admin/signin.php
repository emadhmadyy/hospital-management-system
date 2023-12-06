<?php
include("../connection.php");
$email = $_POST['email'];
$password = $_POST['password'];
$query=$mysqli->prepare('select admin_id,password from admins where email=? ');
$query->bind_param('s',$email);
$query->execute();
$query->store_result();
$num_rows=$query->num_rows;
$query->bind_result($id,$hashed_password);
$query->fetch();


$response=[];
if($num_rows== 0){
    $response['status']= "admin doesn't exist";
    echo json_encode($response);
} else {
    if(password_verify($password,$hashed_password)){
        $response['status']= 'logged in';
        $response['admin_id']=$id;
        echo json_encode($response);
    } else {
        $response['status']= 'wrong credentials';
        echo json_encode($response);
    }
};