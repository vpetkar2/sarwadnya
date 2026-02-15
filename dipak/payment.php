<?php
header('Access-Control-Allow-Origin: *');
$conn = mysqli_connect("localhost", "admindipak", "dipak@123", "dipakdb");
// print_r($conn);
// print_r($_REQUEST);


  function payment()
  {
        global $conn;
        $json = file_get_contents("php://input");
        $postdata = json_decode($json, true);
        $getdata = json_decode($json, true);

        $id             = $getdata["id"];
        $cardholdername = $postdata["cardholdername"];
        $cardnumber     = $postdata["cardnumber"];
        $mm             = $postdata["mm"];
        $yy             = $postdata["yy"];
        $cvv            = $postdata["cvv"];
        
         $query = "insert into  users_payment set 
                    user_id         = '$id',
                    cardholdername  = '$cardholdername',
			        cardnumber      = '$cardnumber',
			        month	        = '$mm', 
			        yy              = '$yy',
                    cvv             = '$cvv'";

        if (!mysqli_query($conn, $query)) {
            echo "error".mysqli_error($conn);
            exit();
        } else {
        	$arr = array('message' => "Payment Done Successfully.");
            echo json_encode($arr);
        }
        

  }
  payment();
