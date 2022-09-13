<?php
    include 'databaseConfig.php'; 
   
    if( isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        //check is the user with this email is present
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $passwordHash = $row['password'];
            if(password_verify($password, $passwordHash)){
                $data=[
                    'success' => true,
                    'message' => 'User logged in successfully'
                ];
            }else{
                $data=[
                    'success' => false,
                    'message' => 'Invalid password'
                ];
            }
        }
    }else{
        $data = [
           'message'=> 'Email and password are required'

        ]; 
    }
    echo json_encode($data);
?>