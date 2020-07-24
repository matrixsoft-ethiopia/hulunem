<?php
include_once 'dbh.php';
session_start();

// check if button is clicked
if (isset($_POST['submit'])) {
    // register user
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $des = mysqli_real_escape_string($conn, $_POST['des']);
    $loc1 = mysqli_real_escape_string($conn, $_POST['loc1']);
    $loc2 = mysqli_real_escape_string($conn, $_POST['loc2']);
    $loc3 = mysqli_real_escape_string($conn, $_POST['loc3']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    // check database for existing user
    $user_id = $_SESSION['user_id'];
    $shop_check_query = "SELECT * FROM shops WHERE owner = '$user_id' LIMIT 1;";
    $result = mysqli_query($conn, $shop_check_query);
    $shop = mysqli_fetch_all($result);

    if ($shop) {
        $shop_id = $shop[0][0];
        $sql = "UPDATE shops SET shop_name = '$name', 
        shop_des = '$des', shop_loc1 = '$loc1', shop_loc2 = '$loc2', shop_loc3 = '$loc3', 
        mobile = '$mobile' WHERE id = '$shop_id';";
        mysqli_query($conn, $sql);

        header("Location:../shop_detail.php?id=".$shop_id);
    }
}
