<?php
header('Access-Control-Allow-Origin: *');
$conn = mysqli_connect("localhost", "admindipak", "dipak@123", "dipakdb");
// print_r($conn);
 




  function add_register()
  {
      
        global $conn;
        $json = file_get_contents("php://input");
        $postdata = json_decode($json, true);

        $name     = $postdata["name"]; 
        $email    = $postdata["email"];
        $phone    = $postdata["phone"]; 
        $password = $postdata["password"]; 
        // print_r($password);
        $email_data = mysqli_query($conn,"select * from users where email='$email'");
        // print_r($email_data);
        if (mysqli_num_rows($email_data)>0) {
            $arr = array('message' => "User Email already exists.");
            echo json_encode($arr);
        } else {
            $query = "insert into  users set 
			        name         = '$name',
			        email        = '$email',
			        phone	     = '$phone', 
			        password     = '$password'";

        if (!mysqli_query($conn, $query)) {
            echo "error".mysqli_error($conn);
            exit();
        } else {
        	$arr = array('message' => "Registration Done Successfully.");
            echo json_encode($arr);
        }
        }
        
        
        
        

  }
  add_register();
