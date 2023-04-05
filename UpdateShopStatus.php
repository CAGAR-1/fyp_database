<?php
 include 'DatabaseConfig.php';
 include 'helper_functions/authentication_functions.php';

        if (isset($_POST['shop_id']) && isset($_POST['status'])) {
            $shop_id=$_POST['shop_id'];
            $status = $_POST['status'];
            $insert_user = "UPDATE shops SET status = '$status' WHERE id = '$shop_id'";
            $result = mysqli_query($con, $insert_user);
            if ($result) {
                echo json_encode(
                    [
                        'success' => true,
                        'message' => 'Updated the status of Shop.'
                    ]
                );
            } else {
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'Failed to update the status of the product.'
                    ]
                );
            }
           
    
        }else{
            $data=['success'=>false, 'message'=>'Shop Id and status is required.'];
            echo json_encode($data);
        }
    
   
 ?>