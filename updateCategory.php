<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';


    if (isset($_POST['name']) 
    && isset($_POST['description']) 

    && isset($_POST["id"])

    ) {
        $name = $_POST['name'];
        $description = $_POST['description'];
  
        $id = $_POST['id'];

     
                  //inserting data into database
                  $sql = "UPDATE categories SET name='$name', description='$description' WHERE id=$id";
                  $query = mysqli_query($con, $sql);
                  if ($query) {
                    $data=['success'=>true, 'message'=>'Category Update successfully'];
                    echo json_encode($data);
                    //  getProducts("Product added successfully.");
                  }
                  
              } 


