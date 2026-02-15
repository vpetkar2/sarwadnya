<?php

$conn = mysqli_connect("localhost", "admindipak", "dipak@123", "dipakdb");

$json = file_get_contents("php://input");
$postdata = json_decode($json, true);

$email = $postdata['email'];
$password = $postdata['password'];

$query = mysqli_query($conn, "select * from users where email ='$email' and password = '$password'");

$data = mysqli_fetch_assoc($query);
// print_r($query);

if (!empty($data)) 
{ 
  echo json_encode(array( "data"=>$data, "message"=>"success", "status"=>1));
}
 else 
{
  echo json_encode(array("message"=>"fail", "status"=>0));
  
}
?>