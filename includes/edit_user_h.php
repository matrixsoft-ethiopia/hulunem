<?php
include_once 'dbh.php';
session_start();

// check if button is clicked
if (isset($_POST['submit'])) {
    // register user
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);

    // check database for existing user

    $user_id = $_SESSION['user_id'];
    $user_check_query = "SELECT * FROM users WHERE id = '$user_id' AND is_active = '1' ;";
    $result = mysqli_query($conn, $user_check_query);
    $users = mysqli_fetch_all($result);

    // register the user if no error
    if ($users) {
        $sql = "UPDATE users SET fname = '$fname' , lname = '$lname' WHERE id = '$user_id';";
        mysqli_query($conn, $sql);
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['msg2'] = "መግለጫዎን በተሳካ ሁኔታ ቀይረዋል";
        header("Location:../edit_user.php?edit=success");
    }
}

if (isset($_POST['submit2'])) {
    // register user
    $old_pass = mysqli_real_escape_string($conn, $_POST['old_pass']);
    $new_pass1 = mysqli_real_escape_string($conn, $_POST['new_pass_1']);
    $new_pass2 = mysqli_real_escape_string($conn, $_POST['new_pass_2']);

    // check database for existing user

    $user_id = $_SESSION['user_id'];
    $pass_hash = md5($old_pass);
    $user_check_query = "SELECT * FROM users WHERE id = '$user_id' AND is_active = '1' AND pwd = '$pass_hash' ;";
    $result = mysqli_query($conn, $user_check_query);
    $users = mysqli_fetch_all($result);

    // register the user if no error
    if ($users) {
        if ($new_pass1 == $new_pass2) {
            $pass_hash2 = md5($new_pass1);
            $sql = "UPDATE users SET pwd = '$pass_hash2' WHERE id = '$user_id';";
            mysqli_query($conn, $sql);
            $_SESSION['msg'] = "የይለፍ ቃልዎን በተሳካ ሁኔታ ቀይረዋል";
            header("Location:../edit_user.php?edit=success");
        } else {
            $_SESSION['msg'] = "ያስገቡት የይለፍ ቃል ተመሳሳይ አይደለም";
            header("Location:../edit_user.php?edit=failed");
        }
    } else {
        $_SESSION['msg'] = "ያስገቡት የይለፍ ቃል የተሳሳተ ነው";
        header("Location:../edit_user.php?edit=failed");
    }
}
