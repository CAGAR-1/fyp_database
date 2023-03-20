<?php
    // include 'databaseConfig.php'; 
   
    // if( isset($_POST['email']) && isset($_POST['password'])){

    //     $email = $_POST['email'];
    //     $password = $_POST['password'];
    //     //check is the user with this email is present
    //     $sql = "SELECT * FROM users WHERE email='$email'";
    //     $result = mysqli_query($con, $sql);
    //     if(mysqli_num_rows($result) > 0){
    //         $row = mysqli_fetch_assoc($result);
    //         $passwordHash = $row['password'];
    //         if(password_verify($password, $passwordHash)){
    //             $data=[
    //                 'success' => true,
    //                 'message' => 'User logged in successfully'
    //             ];
    //         }else{
    //             $data=[
    //                 'success' => false,
    //                 'message' => 'Invalid password'
    //             ];
    //         }
    //     }
    // }else{

    
    //     $data = [
    //        'message'=> 'Email and password are required'

    //     ]; 
    // }
    // echo json_encode($data);




    
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';
// Creating MySQL Connection.



if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    //check if the email is already in the database
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $check_email);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
      //check if the password is correct
      $data=mysqli_fetch_assoc($result);
      $databasePassword= $data['password'];
      $userId= $data['id'];
      $role=$data['role'];
      login($password, $databasePassword, $userId,$role);
     
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'User Not Found'
            ]
        );
    }
} else 
    echo json_encode(
        [
            'message' => 'Please fill all the fields.',
            'success' => false
        ]
    );
?>