<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

    if ( 
     isset($_POST['description']) 
    && isset($_POST['sunday_to_monday']) 
    && isset($_POST['friday_to_sunday']) 
    && isset($_POST["shop_id"])
    ) {
        $description = $_POST['description'];
        $sunday_to_monday = $_POST['sunday_to_monday'];
        $friday_to_sunday= $_POST['friday_to_sunday'];
        $shop_id = $_POST['shop_id'];     
                  //inserting data into database
                  $sql = "INSERT INTO shop_details (description, sunday_to_monday, friday_to_sunday,shop_id) VALUES ('$description', '$sunday_to_monday', '$friday_to_sunday', '$shop_id')";
                  $query = mysqli_query($con, $sql);

                  if ($query) {
                    $data=['success'=>true, 'message'=>'Shop Details added successfully'];
                    echo json_encode($data);
                    //  getProducts("Product added successfully.");
                  } else {
                      $data=['success'=>false, 'message'=>'Something went wrong.'];
                      echo json_encode($data);
                  }
              } else {
                  $data=['success'=>false, 'message'=>'Something went wrong.'];
                  echo json_encode($data);
              }
          

      
   

