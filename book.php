<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';


// $isAdmin = checkIfAdmin($_POST['token'] ?? null);
// if ($isAdmin) {
    if (isset($_POST['user_id']) 
    && isset($_POST['service_id']) 
    && isset($_POST['time']) 
    && isset($_POST['shop_id']) 
    ) {
        $user_id = $_POST['user_id'];
        $service_id = $_POST['service_id'];
        $time= $_POST['time'];
        $shop_id = $_POST['shop_id'];
                  $sql = "INSERT INTO book (user_id, service_id, time, shop_id) VALUES ('$user_id','$service_id', '$time', '$shop_id')";
                  $query = mysqli_query($con, $sql);
                  if ($query) {
                    $data=['success'=>true, 'message'=>'Booked Successfully'];
                    echo json_encode($data);
                    //  getProducts("Product added successfully.");
                  } else {
                      $data=['success'=>false, 'message'=>'Something went wrong.'];
                      echo json_encode($data);
                  }
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'Please fill all the fields.'
            ]
        );
    }

