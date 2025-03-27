<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link rel="stylesheet" href="verifyemail.css">
    <style>
        /* Additional CSS for enhanced design */
        body {
            font-family: Arial, sans-serif;
            background-image:url('img/12.jpg');
            background-size: cover;
        }
        .container2 {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .head {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        .input-field {
            margin-bottom: 20px;
        }
        .input-field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        .submit {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php 
session_start();

if(isset($_POST["verify_email"])){
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];

    $conn = mysqli_connect("localhost", "root", "", "sparkle_db");

    $email = mysqli_real_escape_string($conn, $email);
    $verification_code = mysqli_real_escape_string($conn, $verification_code);

    $sql = "UPDATE client_list SET email_verified = NOW() WHERE email = '$email' AND verification_code = '$verification_code'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) == 0) {
        $encoded_email = urlencode($email);
        header("Location: email-verification.php?error=Verification%20Code%20is%20invalid&email=$encoded_email");
        exit();
    }

    $_SESSION['registration_successful'] = true;

    header("Location: index.php?success=Your%20Email%20has%20been%20verified%20successfully");
    exit();
}
?>

<div class="container2">
    <div class="head">OTP Verification</div>
    <?php if (isset($_GET['error'])) {?>
        <p class="error">
        <?php echo $_GET['error']; ?>
        </p>
    <?php } ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="input-field">
            <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
            <input type="text" name="verification_code" placeholder="Enter Verification Code" required>
        </div>
        <button type="submit" name="verify_email" class="submit">
            Submit
        </button>
    </form>
        <?php if (isset($_SESSION['registration_successful']) && $_SESSION['registration_successful']) { ?>
            <script>
                window.onload = function() {
                    alert("Registration successful!");
                    <?php unset($_SESSION['registration_successful']); ?>
                    window.location.href = "index.php";
                };
            </script>
        <?php } ?>
    </div>
</div>
