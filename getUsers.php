<?php
include 'DatabaseConfig.php';
// include 'helper_functions/authentication_functions.php';
//get categories from the database
//  $categories = "SELECT * FROM users where isAdmin='0'";
 $categories = "SELECT username,contactno,role,id,email,address FROM users where role='user';";
    $result = mysqli_query($con, $categories);
    
    if ($result) {
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;

        }
        echo json_encode(
            [
                // 'success' => true,
                'data' => $data,
                // 'message' => "Users Fetched Successfully"
            ]
        );
    } 
    
    else {
        echo json_encode(
            [
                // 'success' => false,
                // 'message' => 'Error fetching Users'
            ]
        );
    }