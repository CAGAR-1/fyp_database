<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';


    if (isset($_POST['email']) 
    && isset($_POST['contactno']) 
    && isset($_POST['username']) 
    && isset($_POST["address"])
    && isset($_POST["role"])
    && isset($_POST["id"])


    ) {
        $email = $_POST['email'];
        $contactno = $_POST['contactno'];
        $username= $_POST['username'];
      
        $address = $_POST['address'];
        $role = $_POST['role'];
        $id = $_POST['id'];
        

     
                  //inserting data into database
                  $sql = "UPDATE users SET email='$email', contactno='$contactno', username='$username', address='$address',role='$role' WHERE id=$id";
                  $query = mysqli_query($con, $sql);
                  if ($query) {
                    $data=['success'=>true, 'message'=>'Service Update successfully'];
                    echo json_encode($data);
                    //  getProducts("Product added successfully.");
                  }
                  else {
                    $data=['success'=>false, 'message'=>'Something Error Happen'];
                    echo json_encode($data);
                  }
              } else {
                $data=['success'=>false, 'message'=>'Please Enter Field'];
                    echo json_encode($data);
              }


