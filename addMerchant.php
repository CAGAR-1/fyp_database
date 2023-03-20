<?php

// include 'DatabaseConfig.php';
// include 'helper_functions/authentication_functions.php';
// // Creating MySQL Connection.


// if (isset($_POST['email']) && isset($_POST['password'])) {

//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     //check if the email is already in the database
//     $check_email = "SELECT * FROM users WHERE email = '$email'";
//     $result = mysqli_query($con, $check_email);
//     $count = mysqli_num_rows($result);
//     if ($count > 0) {
//         echo json_encode(
//             [
//                 'success' => false,
//                 'message' => 'Email already exists'
//             ]
//         );
//     } else {
//         addMerchant($email, $password);
//     }
// } else {
//     echo json_encode(
//         [
//             'message' => 'Please fill all the fields.',
//             'success' => false
//         ]
//     );
// }





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
        addMerchant($username,$contactno,$email, $password, $address);
    }
} else 
    echo json_encode(
        [
            'message' => 'Please fill all the fields.',
            'success' => false
        ]
    );


