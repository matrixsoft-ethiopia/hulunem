<?php
include_once 'dbh.php';
session_start();

// check if button is clicked
if (isset($_POST['submit'])) {
    // register user
    $enterprise_type = mysqli_real_escape_string($conn, $_POST['enterprise_type']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $des = mysqli_real_escape_string($conn, $_POST['des']);
    $loc1 = mysqli_real_escape_string($conn, $_POST['loc1']);
    $loc2 = mysqli_real_escape_string($conn, $_POST['loc2']);
    $loc3 = mysqli_real_escape_string($conn, $_POST['loc3']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $tin_no = mysqli_real_escape_string($conn, $_POST['tin_no']);

    // check database for existing user
    $shop_check_query = "SELECT * FROM shops WHERE tin_no = '$tin_no' LIMIT 1;";
    $result = mysqli_query($conn, $shop_check_query);
    $shop = mysqli_fetch_all($result);

    if (!$shop) {
        $owner = $_SESSION['user_id'];
        $sql = "INSERT INTO shops (owner, enterprise_type, shop_name, shop_des, shop_loc1, shop_loc2, shop_loc3, mobile, tin_no) VALUES ('$owner', '$enterprise_type', '$name', '$des', '$loc1', '$loc2', '$loc3', '$mobile', '$tin_no');";
        mysqli_query($conn, $sql);
        $_SESSION['msg'] = "ድርጅትዎን በተሳካ ሁኔታ መዝግበዋል";
        header("Location:../add_shop.php?register=success");
    } else {
        $_SESSION['msg'] = "ያስገቡት TIN No ከዚህ በፊት የተመዘገበ ነው";
        header("Location:../add_shop.php?register=failed");
    }
}
