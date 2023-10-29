<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptcha_secret = '6LeMWoknAAAAADT_0je-_c4Z9pogsW5keeAmdLwW'; // Replace with your secret key
    $response = $_POST['g-recaptcha-response'];
    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$response");
    $captcha_success = json_decode($verify);

    if ($captcha_success->success) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $referral_source = $_POST['referral_source'];
        echo "Registration successful!<br>";
        echo "Referral Source: $referral_source";
    } else {
        echo "reCAPTCHA verification failed. Please try again.";
    }
} else {
    echo "Invalid request method. This page only supports POST requests.";
}
?>