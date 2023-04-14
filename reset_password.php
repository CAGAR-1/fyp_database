<?php
include('../../connection.php');

$otp_code = $_POST["token"];
$password = md5($_POST["password"]);

// Checking
$sql = "SELECT * FROM otp_codes WHERE otp=$otp_code";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$email = $result['email'];
if ($email) {
    $sql2 = "UPDATE users SET password='$password' WHERE email='$email'";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $sql3 = "DELETE FROM otp_codes WHERE otp=$otp_code";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->execute();

    echo (json_encode(array(
        'status' => true,
        "message" => "Password has been changed",
    )));
} else {
    echo (json_encode(array(
        'status' => false,
        "message" => "Problem while changing password",
    )));
}
