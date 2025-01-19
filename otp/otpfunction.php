<?php
include "../cors.php";
session_name('otpsession');
session_start();
include '../dbconnection.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function sendotp()
{
    global $conn;

    $env = parse_ini_file('.env');
    $apikey = $env["apikey"];
    echo $apikey;

    $otp = rand(100000, 999999);
    $_SESSION['otpcode'] = $otp;

    $recipientEmail = $_SESSION['signupemail'];
    $recipientName = $_SESSION['signupname'];

    $url = 'https://api.elasticemail.com/v2/email/send';

    try {
        $post = array(
            'from' => 'haminepali2093@gmail.com',
            'fromName' => 'Ecommerce application',
            'apikey' => "$apikey",
            'subject' => 'OTP VERIFICATION',
            'to' => "$recipientEmail",
            'bodyHtml' => "<h2> Hello, $recipientName Your OTP code is : $otp </h2>",
            'bodyText' => 'from the team ecommerce',
            'isTransactional' => false
        );
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_SSL_VERIFYPEER => false
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        $_SESSION['sentotp'] = 'true';
        echo "<script>alert('An otp code was sent check spam folder $recipientEmail')</script>";
        echo '<script>window.location.href="verifyotp.php"</script>';
        // header("content-type: application/json");
        // echo json_encode([
        //     'success' => true,
        //     'otpcode' => $otp,
        // ]);
        exit();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function verifyotp()
{
    $otpemail = $_SESSION['signupemail'];

    // echo "<script>alert(A code was sent to your email: $_SESSION[signupemail])</script>";
    global $conn;
    $enteredOTP = mysqli_real_escape_string($conn, $_POST['otp']);
    $otpcode = $_SESSION['otpcode'];
    if ($enteredOTP == $otpcode) {
        echo '<script>alert("OTP verified successfully")</script>';
        echo '<script>window.location.href="../sellers/sellersignup.php"</script>';
        // echo json_encode([
        //     'success' => true,
        //     'message' => 'OTP verified successfully',
        // ]);
        exit();
    } else {
        echo "<script>alert('Wrong otp code $otpcode check spam folder for $otpemail')</script>";
        echo '<script>window.location.href="verifyotp.php"</script>';
        // header("location: verifyotp.php");
        // header("content-type: application/json");
        // echo json_encode([
        //     'success' => false,
        //     'message' => 'OTP verification failed',
        // ]);
        // exit();
    }
}
