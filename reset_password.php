<?php
require_once 'DatabaseConfig.php';
require_once 'helper_functions/authentication_functions.php';

$otp_code = $_POST["token"];
$password = $_POST["password"];
$encrypted_password = password_hash($password, PASSWORD_DEFAULT);

// Checking
$stmt = $con->prepare("SELECT * FROM otp_codes WHERE otp=?");
$stmt->bind_param("i", $otp_code);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$email = $row['email'];

if ($email) {
    $stmt2 = $con->prepare("UPDATE users SET password=? WHERE email=?");
    $stmt2->bind_param("ss", $encrypted_password, $email);
    $stmt2->execute();

    $stmt3 = $con->prepare("DELETE FROM otp_codes WHERE otp=?");
    $stmt3->bind_param("i", $otp_code);
    $stmt3->execute();

    echo json_encode(array(
        'status' => true,
        'message' => 'Password has been changed',
    ));
} else {
    echo json_encode(array(
        'status' => false,
        'message' => 'Problem while changing password',
    ));
}

?>
