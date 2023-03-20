<?php
// include 'DatabaseConfig.php';
// include 'helper_functions/authentication_functions.php';

// $shopId=$_GET['shopId'];
// $getServices="SELECT * FROM book where shop_id='$shopId'";
// $result=mysqli_query($con,$getServices);
// if ($result) {
//     $data=[];
//     while($row=mysqli_fetch_assoc($result)){
//         $data[]=$row;
//     }
    
//     echo json_encode(
//         [
//             'success'=>true,
//             'data'=>$data,
//             'message'=>"ShopDate Time Details fetched successfully"
//         ]
//         );
        
// }
// else {
//     echo json_encode(
        
    
//     [
//         'success'=>false,
//         'message'=>'Error'
//     ]
//     );
   
// }




include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';
//get categories from the database

$shopId=$_GET['shopId'];
// $getServices="SELECT * FROM book where shop_id='$shopId'";


 $categories = "SELECT * FROM book where shop_id='$shopId' AND available='0'";
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
                'message' => "Shops fetched successfully"
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
