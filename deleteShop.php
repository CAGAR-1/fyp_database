<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

$id=$_GET['id'];
$deleteUser="DELETE FROM shops where id='$id'";
$result=mysqli_query($con,$deleteUser);
if ($result) {
    $data=[];
    
    
    echo json_encode(
        [
            'success'=>true,
            
            'message'=>"Shop Delete Successfull"
        ]
        );
        
}
else {
    echo json_encode(
        
    
    [
        'success'=>false,
        'message'=>'Failed to Shop'
    ]
    );
   
}
