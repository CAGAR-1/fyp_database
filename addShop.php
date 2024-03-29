<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';


$isAdmin = checkIfAdmin($_POST['token'] ?? null);
if ($isAdmin) {
    if (isset($_POST['name']) 
    && isset($_POST['location']) 
    && isset($_POST['owner_name']) 
    && isset($_POST['pan_no']) 
    && isset($_POST['user_id']) 
    && isset($_FILES["image"])) {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $owner_name= $_POST['owner_name'];
        $pan_no = $_POST['pan_no'];
        $user_id = $_POST['user_id'];
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
                  $sql = "INSERT INTO shops (name, location, owner_name, pan_no, image,user_id) VALUES ('$name', '$location', '$owner_name', '$pan_no', '$image_path', '$user_id')";
                  $query = mysqli_query($con, $sql);
                  if ($query) {
                    $data=['success'=>true, 'message'=>'Shop added Successfully'];
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
} else {
    echo json_encode(
        [
            'success' => false,
            'message' => 'Access denied'
        ]
    );
}
