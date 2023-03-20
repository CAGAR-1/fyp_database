<?php
 include 'DatabaseConfig.php';
 include 'helper_functions/authentication_functions.php';
    // Creating MySQL Connection.
    // $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
    // $isAdmin = checkIfAdmin($_POST['token'] ?? null); 
    // if($isAdmin){
        if (isset($_POST['book_id']) && isset($_POST['available'])) {
            $book_id=$_POST['book_id'];
            $available = $_POST['available'];
            $insert_user = "UPDATE book SET available = '$available' WHERE id = $book_id";
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
            $data=['success'=>false, 'message'=>'Product Id and product status is required.'];
            echo json_encode($data);
        }
    
   
 ?>