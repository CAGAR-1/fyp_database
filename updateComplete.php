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
                        'message' => 'Updated the status of product.'
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
            $data=['success'=>false, 'message'=>'Book Id and product status is required.'];
            echo json_encode($data);
        }
    
   
 ?>