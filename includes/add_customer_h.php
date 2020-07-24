<?php
include_once 'dbh.php';
session_start();

if (isset($_POST['add-cus'])) {
    $cart_id = $_GET["cart_id"];
    $cart_check_query = "SELECT * FROM carts WHERE id = '$cart_id' AND is_ordered = '1' LIMIT 1 ;";
    $result = mysqli_query($conn, $cart_check_query);
    $carts = mysqli_fetch_all($result);

    $user_id = $carts[0][1];
    $shop_id = $carts[0][3];

    $sql = "INSERT INTO customers (shop, user) VALUES ('$shop_id','$user_id');";
    mysqli_query($conn, $sql);

    header("Location:../order_received_detail.php?cart_id=$cart_id");
}

if (isset($_POST['rem-cus'])) {
    $cart_id = $_GET["cart_id"];
    $cart_check_query = "SELECT * FROM carts WHERE id = '$cart_id' AND is_ordered = '1' LIMIT 1 ;";
    $result = mysqli_query($conn, $cart_check_query);
    $carts = mysqli_fetch_all($result);

    $user_id = $carts[0][1];
    $shop_id = $carts[0][3];

    $sql = "DELETE FROM customers WHERE shop = '$shop_id' AND user= '$user_id';";
    mysqli_query($conn, $sql);

    header("Location:../order_received_detail.php?cart_id=$cart_id");
}
