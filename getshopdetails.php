<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

$shopId=$_GET['shopId'];
$getServices="SELECT * FROM shop_details where shop_id='$shopId'";
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
