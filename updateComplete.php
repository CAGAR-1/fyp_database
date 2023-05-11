<?php
 include 'DatabaseConfig.php';
 include 'helper_functions/authentication_functions.php';

        if (isset($_POST['book_id']) && isset($_POST['status'])) {
            $book_id=$_POST['book_id'];
            $status = $_POST['status'];
            $insert_user = "UPDATE book SET status = '$status' WHERE id = '$book_id'";
            $result = mysqli_query($con, $insert_user);
            if ($result) {
                echo json_encode(
                    [
                        'success' => true,
                        'message' => 'Update status of Service.'
                    ]
                );
            } else {
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'Failed to update the status of the service.'
                    ]
                );
            }
           
    
        }else{
            $data=['success'=>false, 'message'=>'Book Id and service status is required.'];
            echo json_encode($data);
        }
    
   
 ?>