<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

    
    if (isset($_POST['name']) 
    && isset($_POST['description']) 

    && isset($_FILES["image"])

   
    
    ) {
        $name = $_POST['name'];
        $description = $_POST['description'];
         //getimage
         
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $image_path = "images/".$image;

      //upload image
      if ($image_size < 5000000) {
          if ($image_ext == "jpg" || $image_ext == "png" || $image_ext == "jpeg") {
              if (move_uploaded_file($image_tmp, $image_path)) {
                  //inserting data into database
                  $sql = "INSERT INTO categories (name, description,image) VALUES ('$name', '$description','$image_path')";
                  $query = mysqli_query($con, $sql);
                  if ($query) {
                    $data=['success'=>true, 'message'=>'Categories added successfully'];
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
          } else {
              $data=['success'=>false, 'message'=>'Image must be jpg, png or jpeg.'];
              echo json_encode($data);
          }
      } else {
          $data=['success'=>false, 'message'=>'Image size must be less than 5MB.'];
          echo json_encode($data);
      }

      
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'Please fill all the fields.'
            ]
        );
    }
// } else {
//     echo json_encode(
//         [
//             'success' => false,
//             'message' => 'Access denied'
//         ]
//     );
// }
