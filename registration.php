<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor1/autoload.php';

if (isset($_POST['submit'])) { 

    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : '';
    $middlename = isset($_POST["middlename"]) ? $_POST["middlename"] : '';
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : '';
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : '';
    $contact = isset($_POST["contact"]) ? $_POST["contact"] : ''; 
    $address = isset($_POST["address"]) ? $_POST["address"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';
    
    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        exit();
    }

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0; // Set to 0 for production
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'santiagojanjan07@gmail.com';
        $mail->Password = 'akjoorsdomhmheaz';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom('santiagojanjan07@gmail.com', 'Sparkle');
        $mail->addAddress($email, $lastname);
        $mail->isHTML(true);

        // Generate verification code
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        
        // Email subject and body
        $mail->Subject = 'Email Verification for User Registration';
        $mail->Body = '
            <div style="background-color: #f4f4f4; padding: 20px;">
                <h2 style="color: #333333;">Welcome to Sparkle!</h2>
                <p style="color: #555555;">To complete your registration, please use the following verification code:</p>
                <div style="background-color: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
                    <h3 style="color: #333333; margin-bottom: 10px;">Verification Code:</h3>
                    <p style="font-size: 24px; font-weight: bold; color: #007bff; margin: 0;">' . $verification_code . '</p>
                </div>
                <p style="color: #555555; margin-top: 20px;">Thank you for choosing Sparkle!</p>
            </div>';
        
        // Send email
        if ($mail->send()) {
            // Email sent successfully, proceed with database insertion
            $hashed_password = md5($password);
            $conn = mysqli_connect("localhost", "root", "", "sparkle_db");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $sql = "INSERT INTO client_list (
                        firstname,
                        middlename,
                        lastname,
                        gender,
                        contact,
                        address, 
                        email,
                        password,
                        verification_code,
                        email_verified
                    ) VALUES (
                        '$firstname',
                        '$middlename',
                        '$lastname',
                        '$gender',
                        '$contact',
                        '$address',
                        '$email',
                        '$hashed_password',
                        '$verification_code',
                        NULL
                    )";
            
            if (mysqli_query($conn, $sql)) {
                // Redirect to email verification page
                header("Location: email-verification.php?email=" . $email);
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
            mysqli_close($conn);
        } else {
            // Email sending failed
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
