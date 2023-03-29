<?php

include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

//get categories from the database


// SELECT book.id,book.time,services.name FROM book join services on book.service_id


$shopid=$_GET['shopid'];
 $categories = "SELECT s.name AS service_name, b.status,b.time,s.price,b.id,u.username,u.email,u.contactno
 FROM book AS b
 JOIN services AS s ON b.service_id = s.id
 JOIN users AS u on b.user_id=u.id
 JOIN shops AS sh ON b.shop_id = sh.id
 WHERE b.shop_id = $shopid;
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