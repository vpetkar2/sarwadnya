<?php

$conn = mysqli_connect("localhost", "admindipak", "dipak@123", "dipakdb");

$json = file_get_contents("php://input");
$putdata = json_decode($json, true);

$name  = $putdata['name'];
$email = $putdata['email'];
$phone = $putdata['phone'];

$sql = "update users set name ='$name', email = '$email', phone = '$phone' ";

if (!mysqli_query($conn, $sql)) 
{
    echo "error".mysqli_error($conn);
    exit();
} else {
    $arr = array('message' => "Update Successfully.");
    echo json_encode($arr);
}

?>