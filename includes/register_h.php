<?php
include_once 'dbh.php';
session_start();
// variable
$errors = array();

// check if button is clicked
if (isset($_POST['submit'])) {
    // register user
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);

    // form validation
    if (empty($email)) {
        array_push($errors, "የኢሜይል አድራሻ አስፈላጊ ነው");
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "ያስገቡት ኢሜይል የተሳሳተ ነው");
        }
    }
    if (empty($password1)) {
        array_push($errors, 'የይለፍ ቃል አስፈላጊ ነው');
    } else {
        if ($password1 != $password2) {
            array_push($errors, 'ያስገቡት የይለፍ ቃል ተመሳሳይ አይደለም');
        }
    }
    if (empty($fname)) {
        array_push($errors, 'ስም አስፈላጊ ነው');
    }
    if (empty($lname)) {
        array_push($errors, 'የአባት ስም አስፈላጊ ነው');
    }

    // check database for existing user
    $user_check_query = "SELECT * FROM users WHERE email = '$email' AND is_active = '1' LIMIT 1;";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['email'] === $email) {
            array_push($errors, 'ያስገቡት ኢሜይል ከዚህ በፊት የተመዘገበ ነው');
        }
    }


    // register the user if no error
    if (count($errors) == 0) {
        // Generating verification key
        $vkey = md5(time() . $email);

        $password = md5($password1); // passowrd encryption
        $sql = "INSERT INTO users (email, pwd, fname, lname, vkey) VALUES ('$email', '$password', '$fname', '$lname', '$vkey');";
        mysqli_query($conn, $sql);
        
        header("Location:../welcome.php?register=success");
    } else {
        $_SESSION['reg_msg'] = $errors;
        header("Location:../register.php?register=failed");
    }
}
