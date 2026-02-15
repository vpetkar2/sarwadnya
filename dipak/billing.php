<?php
header('Access-Control-Allow-Origin: *');
$conn = mysqli_connect("localhost", "admindipak", "dipak@123", "dipakdb");
// print_r($conn);
// print_r($_REQUEST);


  function billing()
  {
        global $conn;
        $json = file_get_contents("php://input");
        $postdata = json_decode($json, true);
        $getdata = json_decode($json, true);

        $id             = $getdata["id"];
        $name           = $postdata["name"];
        $address1       = $postdata["address1"]; 
        $address2       = $postdata["address2"]; 
        $city           = $postdata["city"];
        $state          = $postdata["state"];
        $zipcode        = $postdata["zipcode"];
        
        
        $query = "insert into  users_billing set 
                    user_id         = '$id',
			        fullname        = '$name',
			        address1        = '$address1',
			        address2	    = '$address2', 
                    city            = '$city',
                    state           = '$state',
                    zipcode         = '$zipcode'";

        if (!mysqli_query($conn, $query)) {
            echo "error".mysqli_error($conn);
            exit();
        } else {
        	$arr = array('message' => "Billing Done Successfully.");
            echo json_encode($arr);
        }
        

  }
  billing();
