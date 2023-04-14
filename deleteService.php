<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

$Id=$_GET['Id'];
$deleteServices="DELETE FROM services where id='$Id'";
$result=mysqli_query($con,$deleteServices);
if ($result) {
    $data=[];
    
    
    echo json_encode(
        [
            'success'=>true,
            
            'message'=>"Services Delete Successfull"
        ]
        );
        
}
else {
    echo json_encode(
        
    
    [
        'success'=>false,
        'message'=>'Failed to Delete Services'
    ]
    );
   
}
