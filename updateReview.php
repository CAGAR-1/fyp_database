<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';


    if (isset($_POST['reviews']) 
    && isset($_POST['rating_bar']) 
    && isset($_POST["id"])

    ) {
        $reviews = $_POST['reviews'];
        $rating_bar = $_POST['rating_bar'];

        $id = $_POST['id'];

     
                  //inserting data into database
                  $sql = "UPDATE review SET reviews='$reviews',rating_bar='$rating_bar' WHERE id=$id";
                  $query = mysqli_query($con, $sql);
                  if ($query) {
                    $data=['success'=>true, 'message'=>'Review Update successfully'];
                    echo json_encode($data);
                    //  getProducts("Product added successfully.");
                  }
                  
              } 


