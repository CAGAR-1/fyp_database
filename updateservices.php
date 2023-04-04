<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';


    if (isset($_POST['name']) 
    && isset($_POST['description']) 
    && isset($_POST['price']) 
    && isset($_POST["seat"])
    && isset($_POST["id"])

    ) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price= $_POST['price'];
      
        $seat = $_POST['seat'];
        $id = $_POST['id'];

     
                  //inserting data into database
                  $sql = "UPDATE services SET name='$name', description='$description', price='$price', seat='$seat' WHERE id=$id";
                  $query = mysqli_query($con, $sql);
                  if ($query) {
                    $data=['success'=>true, 'message'=>'Service Update successfully'];
                    echo json_encode($data);
                    //  getProducts("Product added successfully.");
                  }
              } 


