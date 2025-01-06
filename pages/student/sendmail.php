<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

if (isset($_POST['send'])) {
    // Sanitize input data
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $user_email = trim($_POST["mail"]);
    $phone = trim($_POST["phone"]);
    $msg = trim($_POST["msg"]);

    // Input validation
    $errors = [];

    if (!preg_match("/^[a-zA-Z]+$/", $fname)) {
        $errors['fname'] = "Invalid first name. Please use letters only.";
    }
    if (!preg_match("/^[a-zA-Z]+$/", $lname)) {
        $errors['lname'] = "Invalid last name. Please use letters only.";
    }
    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = "Invalid email address.";
    }
    if (!preg_match("/^[0-9]+$/", $phone)) {
        $errors['phone'] = "Invalid phone number. Please use numbers only.";
    }
    if (empty($msg)) {
        $errors['msg'] = "Message cannot be empty.";
    }

    if (empty($errors)) {
        try {
            // Server settings
            $mail->SMTPDebug = 0; // or use 1 for less verbosity
    
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
          
            $mail->Username   = 'kumudu4746@gmail.com'; 
            $mail->Password   = 'psgv tavx ohpl hsdn'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
    
            $mail->setFrom('kumudu4746@gmail.com');
            $mail->addAddress('kumudu4746@gmail.com');
    
            $mail->isHTML(true);
            $mail->Subject = 'message recive';
            $mail->Body = "<h3>name: $fname <br> Lname: $lname <br> mail: $user_email <br> phone: $phone <br> message: $msg </h3>";

            // Send email
            if ($mail->send()) {
                $_SESSION['STATUS'] = "Thank you for contacting us!";
                unset($_SESSION['errors']); // Clear any previous errors
            } else {
                $_SESSION['STATUS'] = "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
            }
        } catch (Exception $e) {
            $_SESSION['STATUS'] = "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
        }
    } else {
        $_SESSION['errors'] = $errors; // Store errors in session
    }

    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit;
} else {
    header('Location: contact.php');
    exit;
}
