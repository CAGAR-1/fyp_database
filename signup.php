<?php
    include 'databaseConfig.php';
    if( isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordHash= password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$passwordHash')";
        $result = mysqli_query($con, $sql);
        if($result){
            $data=[
                'success' => true,
                'message' => 'User registered successfully'
            ];
        }else{
            $data=[
                'success' => false,
                'message' => 'Something went wrong'
            ];
        }
    }else{
        $data = [
           'message'=> 'Email and password are required'

        ]; 
    }
    




    echo json_encode($data);
?>

