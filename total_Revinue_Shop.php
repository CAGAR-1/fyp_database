<?php

include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';


$shopId=$_GET['shopId'];
 $categories = "SELECT SUM(services.price) AS total_price
 FROM services
 INNER JOIN book ON services.id = book.service_id
 WHERE services.shop_id = '$shopId';
 ;
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
                'message' => "Revenue fetched successfully"
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