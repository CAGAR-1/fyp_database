<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

$Id=$_GET['Id'];
$cancelshop="DELETE FROM book where id='$Id'";
$result=mysqli_query($con,$cancelshop);
if ($result) {
    $data=[];
    
    
    echo json_encode(
        [
            'success'=>true,
            
            'message'=>"Shop Cancel Successfully"
        ]
        );
        
}
else {
    echo json_encode(
        
    
    [
        'success'=>false,
        'message'=>'Failed to Delete User'
    ]
    );
   
}
