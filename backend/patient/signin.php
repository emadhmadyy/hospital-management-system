<?php
include("../connection.php");
$email = $_POST['email'];
$password = $_POST['password'];
$query=$mysqli->prepare('select patient_id,first_name,password from patients where email=?');
$query->bind_param('s',$email);
$query->execute();
$query->store_result();
$num_rows=$query->num_rows;
$query->bind_result($id,$name,$hashed_password);
$query->fetch();


$response=[];
if($num_rows== 0){
    $response['status']= 'patient not found';
    echo json_encode($response);
} else {
    if(password_verify($password,$hashed_password)){
        $response['status']= 'logged in';
        $response['patient_id']=$id;
        $response['first_name']=$name;
        echo json_encode($response);
    } else {
        $response['status']= 'wrong credentials';
        echo json_encode($response);
    }
};