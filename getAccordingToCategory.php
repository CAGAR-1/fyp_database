<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

$category_Id=$_GET['category_Id'];
$getServices="SELECT services.id, services.name, services.category_id, services.description, services.price, services.image, services.shop_id, shops.name as shop_name, shops.status as shop_status
FROM services
JOIN shops ON services.shop_id = shops.id
WHERE services.category_id = '$category_Id'
";
$result=mysqli_query($con,$getServices);
if ($result) {
    $data=[];
    while($row=mysqli_fetch_assoc($result)){
        $data[]=$row;
    }
    
    echo json_encode(
        [
            'success'=>true,
            'data'=>$data,
            'message'=>"All Categories Fetched Successfully"
        ]
        );
        
}
else {
    echo json_encode(
        
    
    [
        'success'=>false,
        'message'=>'Error'
    ]
    );
   
}
