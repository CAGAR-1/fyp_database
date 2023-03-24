<?php

include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

//get categories from the database


// SELECT book.id,book.time,services.name FROM book join services on book.service_id



$shopId=$_GET['shopId'];
 $categories = "SELECT book.id, book.time, services.name,services.seat, COUNT(*) AS count
 FROM book
 JOIN services ON book.service_id = services.id
 WHERE book.shop_id = $shopId
 GROUP BY book.time
 HAVING COUNT(*) > services.seat;

 ;";
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