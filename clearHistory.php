<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

    if(($userid=$_GET['userid'])){
            $sql = "UPDATE book
            SET status = 'history'
            WHERE user_id = '$userid' AND status = 'complete';
            "; 
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo json_encode(
                    [
                        'success' => true,
                        'message' => "Booking details updated successfully"
                    ]
                );
            } else {
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'Error updating order'
                    ]
                );
            }
    }else{
        echo json_encode(
            [
                'success' => false,
                'message' =>'Access denied'
            ]
        );
    }