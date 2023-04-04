<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

$shopId = $_GET['shopId'];
$getServices = "SELECT s.id, s.name, s.description, s.price, c.name as category_name 
                FROM services s 
                INNER JOIN categories c ON s.category_id = c.id 
                WHERE s.shop_id = $shopId 
                ORDER BY s.category_id";

$result = mysqli_query($con, $getServices);

if ($result) {
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categoryName = $row['category_name'];
        if (!isset($data[$categoryName])) {
            $data[$categoryName] = [];
            $data[$categoryName]['categoryName'] = $categoryName; // add category name to the big bracket
        }
        $data[$categoryName]['services'][] = $row; // add services to the category's array
    }
    
    echo json_encode([
        'success' => true,
        'data' => array_values($data), // re-index the array to remove category names as keys
        'message' => "Services According to Category  fetched successfully"
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error'
    ]);
}

