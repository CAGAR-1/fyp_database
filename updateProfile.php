<?php 
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';
    $tokenCheck=checkIdValidUser($_GET['token']??null);
    if(isset($_GET['token']) &&
    isset($_POST['username'])&& isset($_POST['contactno'])&& isset($_POST['email']) && isset($_POST['address'])
    && $tokenCheck != null){

        $userId=$tokenCheck; 

        $email = $_POST['email'];
        $username = $_POST['username'];
        $contactno = $_POST['contactno'];
        $address = $_POST['address'];

            
           
            $update_user = "UPDATE users SET username='$username',contactno='$contactno',email='$email',address='$address' WHERE id= '$userId'";
            $result = mysqli_query($con, $update_user);
            
            echo json_encode(
                [
                    'success' => true,
                    'message' => 'User Update Successfull',
                    
                    
                ]
            );
    }else{
        echo json_encode(
            [
                'success' => false,
                'message' =>'Access denied'
            ]
        );
    }
?>
