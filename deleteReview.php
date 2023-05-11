<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

$Id=$_GET['Id'];
$deleteServices="DELETE FROM review where id='$Id'";
$result=mysqli_query($con,$deleteServices);
if ($result) {
    $data=[];
    
    
    echo json_encode(
        [
            'success'=>true,
            
            'message'=>"Review Delete Successfull"
        ]
        );
        
}
else {
    echo json_encode(
        
    
    [
        'success'=>false,
        'message'=>'Failed to Delete Review'
    ]
    );
   
}
