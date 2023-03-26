<?php
include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

$Id=$_GET['Id'];
$deleteUser="DELETE FROM users where id='$Id'";
$result=mysqli_query($con,$deleteUser);
if ($result) {
    $data=[];
    
    
    echo json_encode(
        [
            'success'=>true,
            
            'message'=>"User Delete Successfull"
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
