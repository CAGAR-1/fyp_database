<?php
 include 'DatabaseConfig.php';
 include 'helper_functions/authentication_functions.php';

 if (isset($_POST['id']) && isset($_POST['old_password']) && isset($_POST['new_password'])) {
    $id = $_POST['id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Retrieve the user's hashed password from the database
    $select_user = "SELECT password FROM users WHERE id = '$id'";
    $result = mysqli_query($con, $select_user);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Check if the old password matches the hashed password in the database
        if (password_verify($old_password, $hashed_password)) {
            // Hash the new password
            $encrypted_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            // Update the user's password in the database
            $update_user = "UPDATE users SET password = '$encrypted_password' WHERE id = '$id'";
            $result = mysqli_query($con, $update_user);
            if ($result) {
                echo json_encode(
                    [
                        'success' => true,
                        'message' => 'Password changed successfully.'
                    ]
                );
            } else {
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'Failed to change password.'
                    ]
                );
            }
        } else {
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'Old password is incorrect.'
                ]
            );
        }
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'Failed to retrieve user data.'
            ]
        );
    }
} else {
    echo json_encode(
        [
            'success' => false,
            'message' => 'User ID, old password, and new password are required.'
        ]
    );
}

    
   
 ?>