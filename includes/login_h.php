<?php
include_once 'dbh.php';
session_start();
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password1']));

    // check database for existing user
    $user_check_query = "SELECT * FROM users WHERE email = '$email' AND pwd = '$password' AND is_active = '1' LIMIT 1;";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['lname'] = $user['lname'];        

        header("Location:../index.php?login=success");
    } else {
        $_SESSION['login_error'] = 'ያስገቡት ኢሜይል ወይም የይለፍ ቃል የተሳሳተ ው';

        header("Location:../login.php?login=failed");
    }
}
