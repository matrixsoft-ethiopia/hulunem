<?php
include_once 'dbh.php';
session_start();

// check if button is clicked
if (isset($_POST['submit'])) {
    // register user
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $des = mysqli_real_escape_string($conn, $_POST['des']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $loc3 = mysqli_real_escape_string($conn, $_POST['loc3']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    $user_id = $_SESSION['user_id'];
    $salvaj_check_query = "SELECT * FROM salvajs WHERE salvaj_owner = '$user_id';";
    $result = mysqli_query($conn, $salvaj_check_query);
    $salvajs = mysqli_fetch_all($result);
    
    if (count($salvajs) < 3) {
        $sql = "INSERT INTO salvajs (salvaj_owner, category, pro_name, pro_des, pro_price, loc3, mobile) VALUES ('$user_id','$category', '$name', '$des', '$price', '$loc3', '$mobile');";
        mysqli_query($conn, $sql);
       
        $_SESSION['add_salvaj_msg'] = "በተሳካ ሁኔታ መዝግበዋል";
        header("Location:../add_salvaj.php?register=success");
    } else {
        $_SESSION['add_salvaj_msg'] = "ምዝገባው አልተሳካም። በስርዎ መመዝገብ የሚችሉት 2 ያገለገለ እቃ ብቻ ነው።";
        header("Location:../add_salvaj.php?register=failed");
    }
}
