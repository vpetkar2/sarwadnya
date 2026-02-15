<?php
header('Access-Control-Allow-Origin: *');
$conn = mysqli_connect("localhost", "admindipak", "dipak@123", "dipakdb");
// print_r($conn);

// $json = file_get_contents("php://input");
// print_r($json);


  function product()
  {
        global $conn;
        $json = file_get_contents("php://input");
        $postdata = json_decode($json, true);
        // echo "<pre>";
        // print_r($postdata);
        // echo "</pre>";

        $id              = $postdata[0]["id"];
        $order_id        = $postdata[0]["order_id"];
        $name            = $postdata[0]["name"];
        print_r($name);
        $discountPrice   = $postdata[0]["discountPrice"];
        $total_price     = $postdata[0]["price"];
        $quantity        = $postdata[0]["quantity"];
        $size            = $postdata[0]["size"];
        $order_date      = $postdata[0]["order_date"];
        
         $query = "insert into  users_orders set 
                    user_id         = '$id',
                    order_id        = '$order_id',
			        name            = '$name',
			        discountPrice	= '$discountPrice', 
			        total_price     = '$total_price',
                    quantity        = '$quantity',
                    size            = '$size',
                    order_date      = '$order_date'";
                    print_r($query);

        if (!mysqli_query($conn, $query)) {
            echo "error".mysqli_error($conn);
            exit();
        } else {
        	$arr = array('message' => "Product Done Successfully.");
            echo json_encode($arr);
        }
        

  }
  product();
