<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';


    if (isset($_POST['name']) 
    && isset($_POST['location']) 
    && isset($_POST['owner_name']) 
    && isset($_POST["pan_no"])
    && isset($_POST["id"])

    ) {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $owner_name= $_POST['owner_name'];
        $pan_no = $_POST['pan_no'];
        $id = $_POST['id'];

     
                  //inserting data into database
                  $sql = "UPDATE shops SET name='$name', location='$location', owner_name='$owner_name', pan_no='$pan_no' WHERE id=$id";
                  $query = mysqli_query($con, $sql);
                  if ($query) {
                    $data=['success'=>true, 'message'=>'Shop Update successfully'];
                    echo json_encode($data);
                    //  getProducts("Product added successfully.");
                  }
                  
              } 


