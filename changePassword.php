<?php
 include 'DatabaseConfig.php';
 include 'helper_functions/authentication_functions.php';

        if (isset($_POST['id']) && isset($_POST['password'])) {
            $id=$_POST['id'];
            $password = $_POST['password'];
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_user = "UPDATE users SET password = '$encrypted_password' WHERE id = '$id'";
            $result = mysqli_query($con, $insert_user);
            if ($result) {
                echo json_encode(
                    [
                        'success' => true,
                        'message' => 'Password Change Successfully.'
                    ]
                );
            } else {
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'Failed to Change Password.'
                    ]
                );
            }
           
    
        }else{
            $data=['success'=>false, 'message'=>'User Id and Password is required.'];
            echo json_encode($data);
        }
    
   
 ?>