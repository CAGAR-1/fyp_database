<?php
    // include 'databaseConfig.php';
    // if( isset($_POST['email']) && isset($_POST['password'])){
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];
    //     $passwordHash= password_hash($password, PASSWORD_DEFAULT);

    //     $sql = "INSERT INTO users (email, password) VALUES ('$email', '$passwordHash')";
    //     $result = mysqli_query($con, $sql);
    //     if($result){
    //         $data=[
    //             'success' => true,
    //             'message' => 'User registered successfully'
    //         ];
    //     }else{
    //         $data=[
    //             'success' => false,
    //             'message' => 'Something went wrong'
    //         ];
    //     }
    // }else{
    //     $data = [
    //        'message'=> 'Email and password are required'

    //     ]; 
    // }
    




    // echo json_encode($data);




    // ========================


    include 'DatabaseConfig.php';
    include 'helper_functions/authentication_functions.php';
    // Creating MySQL Connection.


    if (isset($_POST['username'])&& isset($_POST['contactno'])&& isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address'])) {

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $contactno = $_POST['contactno'];
        $address = $_POST['address'];

        //check if the email is already in the database
        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $check_email);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            echo json_encode(
                [
                    'success' => true,
                    'message' => 'Email already exists'
                ]
            );
        } else {
            signUp($username,$contactno,$email, $password, $address);
        }
    } else 
        echo json_encode(
            [
                'message' => 'Please fill all the fields.',
                'success' => false
            ]
        );
?>

