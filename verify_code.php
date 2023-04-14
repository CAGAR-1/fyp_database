<?php
header("Access-Control-Allow-Methods: POST");

include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';

$input_email = $_GET['email'];
$otp_code = $_GET['token'];

$sql = "SELECT * FROM otp_codes WHERE email='$input_email'";
$stmt = $con->prepare($sql);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0) {
    echo (json_encode(array(
        'status' => true,
        "message" => "Email Not Found",
    )));
} else {
    $stmt->bind_result($email, $otp, $id);
    $stmt->fetch();

    if ($email == $input_email && $otp == $otp_code) {
        echo (json_encode(array(
            'status' => true,
            "message" => "OTP code verified",
        )));
    } else {
        echo (json_encode(array(
            'status' => false,
            "message" => "Please enter valid OTP",
        )));
    }
}
?>
