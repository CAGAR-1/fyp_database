<?php

// include 'DatabaseConfig.php';
// include 'helper_functions/authentication_functions.php';
// //get categories from the database
// // $id = '4';
// $user_id="";
// $categories = "SELECT shops.id, shops.name, shops.location, shops.pan_no, users.email FROM shops join users 
// on shops.user_id = users.id where users.id='$user_id'";
//     $result = mysqli_query($con, $categories);
//     if ($result) {
//         $data = [];
//         while ($row = mysqli_fetch_assoc($result)) {
//             $data[] = $row;
//         }
//         echo json_encode(
//             [
//                 'success' => true,
//                 'data' => $data,
//                 'message' => "Products fetched successfully"
//             ]
//         );
//     } else {
//         echo json_encode(
//             [
//                 'success' => false,
//                 'message' => 'Error fetching categories'
//             ]
//         );
//     }


/////












include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';
    $tokenCheck=checkIdValidUser($_GET['token']??null);
    if(isset($_GET['token']) && $tokenCheck != null){
            $userId=$tokenCheck;
            //get the user details
            $getUserDetails="SELECT shops.id, shops.name, shops.location, shops.pan_no, shops.image, users.email, users.contactno, users.username FROM shops join users 
            on shops.user_id = users.id where users.id='$userId'";
            $result = mysqli_query($con, $getUserDetails);
            $data=mysqli_fetch_assoc($result);
            echo json_encode(
                [
                    'success' => true,
                    'message' => 'User found',
                    'data' => $data
                    
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

    