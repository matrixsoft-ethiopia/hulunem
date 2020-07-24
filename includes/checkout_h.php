<?php
include_once 'dbh.php';
session_start();

// check if button is clicked
if (isset($_POST['submit'])) {
    // register user
    $loc1 = mysqli_real_escape_string($conn, $_POST['loc1']);
    $loc2 = mysqli_real_escape_string($conn, $_POST['loc2']);
    $loc3 = mysqli_real_escape_string($conn, $_POST['loc3']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    // check database for existing user

    $user_id = $_SESSION['user_id'];
    $cart_check_query = "SELECT * FROM carts WHERE user = '$user_id' AND is_ordered = '0' ;";
    $result = mysqli_query($conn, $cart_check_query);
    $carts = mysqli_fetch_all($result);

    // register the user if no error
    if ($carts) {
        for ($i = 0; $i < count($carts); $i++) {
            $cart_id = $carts[$i][0];
            $sql = "UPDATE carts SET is_ordered = '1' , loc1 = '$loc1' ,loc2 = '$loc2',loc3 = '$loc3',mobile = '$mobile' WHERE id = '$cart_id';";
            mysqli_query($conn, $sql);
        }
        header("Location:../order_given_summary.php?cart=success");
    }
}
