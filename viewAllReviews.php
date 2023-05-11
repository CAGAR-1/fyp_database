<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

$getServices="SELECT review.id,shops.name,
review.user_id,review.reviews,
review.rating_bar FROM review JOIN shops 
ON review.shop_id=shops.id";
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
            'message'=>"Reviews According to shops fetched successfully"
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
