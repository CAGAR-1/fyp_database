<?php
function signUp($username,$contactno,$email, $password, $address)
{
    //insert the user into the database
    global $con;
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $insert_user = "INSERT INTO users (username,contactno,email, password,address) VALUES ('$username','$contactno','$email', '$encrypted_password', '$address')";
    $result = mysqli_query($con, $insert_user);
    if ($result) {
        echo json_encode(
            [
                'success' => true,
                'message' => 'User Register successfully'
            ]
        );
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'User creation failed'
            ]
        );
    }
}
function login($password, $databasePassword, $userID, $role)
{
    //insert the user into the database

    if (password_verify($password, $databasePassword)) {
        //create a personal access token 
        $token = bin2hex(openssl_random_pseudo_bytes(16));
        //insert the token into the database
        global $con;
        $insert_token = "INSERT INTO personal_access_token (user_id, token) VALUES ('$userID', '$token')";
        $result = mysqli_query($con, $insert_token);
        if ($result) {
            echo json_encode(
                [
                    'success' => true,
                    'message' => 'logged in successfully',
                    'token' => $token,
                    'role'=>$role
                ]
            );
        } else {
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'User login failed'
                ]
            );
        }
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'Password is incorrect'
            ]
        );
    }
}

//



function addMerchant($username,$contactno,$email, $password, $address)
{
    //insert the user into the database
    global $con;
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $insert_user = "INSERT INTO users (username,contactno,email, password,address,role) VALUES ('$username','$contactno','$email', '$encrypted_password', '$address','merchant')";
    $result = mysqli_query($con, $insert_user);
    if ($result) {
        echo json_encode(
            [
                'success' => true,
                'message' => 'Vendors created successfully'
            ]
        );
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'Merchant creation failed'
            ]
        );
    }
}



//

function checkIdValidUser($token)
{
    global $con;
    if ($token != null) {
        $check_token = "SELECT * FROM personal_access_token WHERE token = '$token'";//ERROR YO THAM MA AAKO HO HAI
        $result = mysqli_query($con, $check_token);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $userID = mysqli_fetch_assoc($result)['user_id'];
            return $userID;
        } else {
            return null;
        }
    } else {
        return null;
    }
}
function checkIfAdmin($token)
{
    $userId=checkIdValidUser($token);
    if($userId!=null){
        global $con;
        $check_admin = "SELECT * FROM users WHERE id = '$userId'";
        $result = mysqli_query($con, $check_admin);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $user = mysqli_fetch_assoc($result);
            if ($user['role'] == "admin") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }else{
        return false;
    }
}







// --------------------------------------------------------------





// function signUp($email, $password)
// {
//     //insert the user into the database
//     global $con;
//     $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
//     $insert_user = "INSERT INTO users (email, password) VALUES ('$email', '$encrypted_password')";
//     $result = mysqli_query($con, $insert_user);
//     if ($result) {
//         echo json_encode(
//             [
//                 'success' => true,
//                 'message' => 'User created successfully'
//             ]
//         );
//     } else {
//         echo json_encode(
//             [
//                 'success' => false,
//                 'message' => 'User creation failed'
//             ]
//         );
//     }
// }
// function login($password, $databasePassword, $userID)
// {
//     //insert the user into the database

//     if (password_verify($password, $databasePassword)) {
//         //create a personal access token 
//         $token = bin2hex(openssl_random_pseudo_bytes(16));
//         //insert the token into the database
//         global $con;
//         $insert_token = "INSERT INTO personal_access_tokens (user_id, token) VALUES ('$userID', '$token')";
//         $result = mysqli_query($con, $insert_token);
//         if ($result) {
//             echo json_encode(
//                 [
//                     'success' => true,
//                     'message' => 'User logged in successfully',
//                     'token' => $token
//                 ]
//             );
//         } else {
//             echo json_encode(
//                 [
//                     'success' => false,
//                     'message' => 'User login failed'
//                 ]
//             );
//         }
//     } else {
//         echo json_encode(
//             [
//                 'success' => false,
//                 'message' => 'Password is incorrect'
//             ]
//         );
//     }
// }

// function checkIdValidUser($token)
// {
//     global $con;
//     if ($token != null) {
//         $check_token = "SELECT * FROM personal_access_tokens WHERE token = '$token'";
//         $result = mysqli_query($con, $check_token);
//         $count = mysqli_num_rows($result);
//         if ($count > 0) {
//             $userID = mysqli_fetch_assoc($result)['user_id'];
//             return $userID;
//         } else {
//             return null;
//         }
//     } else {
//         return null;
//     }
// }
// function checkIfAdmin($token)
// {
//     $userId=checkIdValidUser($token);
//     if($userId!=null){
//         global $con;
//         $check_admin = "SELECT * FROM users WHERE id = '$userId'";
//         $result = mysqli_query($con, $check_admin);
//         $count = mysqli_num_rows($result);
//         if ($count > 0) {
//             $user = mysqli_fetch_assoc($result);
//             if ($user['isAdmin'] == 1) {
//                 return true;
//             } else {
//                 return false;
//             }
//         } else {
//             return false;
//         }
//     }else{
//         return false;
//     }
// }
?>