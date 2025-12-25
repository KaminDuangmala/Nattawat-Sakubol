<?php
// send_reset_link.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer files (Point to where you saved the folder)
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include('database.php');

if (isset($_POST['reset_request'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // 1. Generate Token & Save to DB
        $token = bin2hex(random_bytes(50));
        $update_query = "UPDATE users SET reset_token='$token' WHERE email='$email'";
        mysqli_query($conn, $update_query);

        // 2. Setup PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // SMTP server for Gmail
            $mail->SMTPAuth   = true;
            $mail->Username   = 'YOUR_GMAIL_ADDRESS@gmail.com'; // YOUR Gmail
            $mail->Password   = 'YOUR_16_DIGIT_APP_PASSWORD';   // YOUR App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    
            $mail->Port       = 465;

            // Recipients
            $mail->setFrom('YOUR_GMAIL_ADDRESS@gmail.com', 'Admin System');
            $mail->addAddress($email); // This sends to 66209010020@udontech.ac.th

            // Content
            $link = "http://localhost/YOUR_FOLDER/new_password.php?email=$email&token=$token";
            
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "Click this link to reset your password: <br> <a href='$link'>Click Here</a>";
            $mail->AltBody = "Copy this link: $link";

            $mail->send();
            echo 'Reset link has been sent to your email!';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email not found!";
    }
}
?>