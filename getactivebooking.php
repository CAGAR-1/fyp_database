<?php

include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

//get categories from the database


// SELECT book.id,book.time,services.name FROM book join services on book.service_id


$userid=$_GET['userid'];
 $categories = "SELECT s.name AS service_name, sh.image AS shop_image, b.status,b.time,s.price,sh.name,sh.location,b.id
 FROM book AS b
 JOIN services AS s ON b.service_id = s.id
 JOIN shops AS sh ON b.shop_id = sh.id
 WHERE b.user_id = $userid && b.status='active';
 ";
    $result = mysqli_query($con, $categories);
    if ($result) {
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode(
            [
                'success' => true,
                'data' => $data,
                'message' => "Mercahnts fetched successfully"
            ]
        );
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'Error fetching Merchants'
            ]
        );
    }