<?php
include 'DatabaseConfig.php';


if (isset($_POST['reviews'])&& isset($_POST['shop_id'])&& isset($_POST['user_id'])&& isset($_POST['rating_bar']) ) {

    $reviews=$_POST['reviews'];
    $shop_id=$_POST['shop_id'];
    $user_id=$_POST['user_id'];
    $rating_bar=$_POST['rating_bar'];
    $addReview="INSERT INTO review(reviews,shop_id,user_id,rating_bar)VALUES('$reviews','$shop_id','$user_id','$rating_bar')";
    $result=mysqli_query($con,$addReview);
    if ($result) { 
        echo json_encode(
            [
                'success' => true,
                'message' => 'Review Submitted'
            ]
        );
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'Error adding Reviw'
            ]
        );
    }
} else {
    echo json_encode(
        [
            'success' => false,
            'message' => 'Please fill all the fields.'
        ]
    );
}










