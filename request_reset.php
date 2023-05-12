<?php

use PHPMailer\PHPMailer\PHPMailer;

header("Access-Control-Allow-Methods: POST");

include 'DatabaseConfig.php';
include 'helper_functions/authentication_functions.php';
$email = $_GET['email'];
$response = array();
$sql = "SELECT * FROM users WHERE email='$email'";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result(); // Get the mysqli_result object

if ($result->num_rows == 0) { // Use the "num_rows" property to get the number of rows
    echo json_encode(
        [
            'success' => false,
            'message' => 'Account with the email doesnot exist'
        ]
    );
}

else {

    $sql = "DELETE from otp_codes  WHERE email='$email'";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $token = rand(100000, 999999);
    $sql2 = "INSERT INTO otp_codes(email, otp) VALUES ('$email', '$token')";
    $stmt2 = $con->prepare($sql2);
    $stmt2->execute();
    $response[0] = array(
        "status" => $token,
    );


    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer;

    $mail->isSMTP();                      // Set mailer to use SMTP 
    $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
    $mail->SMTPAuth = true;               // Enable SMTP authentication 
    $mail->Username = 'someone24422@gmail.com';   // SMTP username 
    $mail->Password = 'ghj';   // SMTP password 
    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
    $mail->Port = 587;                    // TCP port to connect to 

    // Sender info 
    $mail->setFrom('someone24422@gmail.com', 'Go-Fresh UP');
    $mail->addReplyTo($email, 'App User');

    // Add a recipient 
    $mail->addAddress($email);

    //$mail->addCC('cc@example.com'); 
    //$mail->addBCC('bcc@example.com');
    
    // Set email format to HTML 
    $mail->isHTML(true);

    // Mail subject 
    $mail->Subject = 'Password Reset';

    // Mail body content 
    $bodyContent = '<h2>Dear User,</h2>';

    $bodyContent .= "This is the verification code for resetting your password.";
     
    $bodyContent .= "<h1><strong>" . $token . "</strong></h1>";
    $bodyContent .= "Enter this otp in the app for resetting your Password.";

    $mail->Body    = $bodyContent;
    if (!$mail->send()) {
        echo(json_encode(array("status"=>false,"message"=>"There was a problem while sending email")));
    } else {
        echo(json_encode(array("status"=>true,"message"=>"Enter otp code")));
    }
}
