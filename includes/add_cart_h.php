<?php
include_once 'dbh.php';
session_start();

if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $pro_id = $_GET["id"];
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);

    $shop_check_query = "SELECT * FROM products WHERE id = '$pro_id' LIMIT 1;";
    $result = mysqli_query($conn, $shop_check_query);
    $product = mysqli_fetch_all($result);

    $shop_id = $product[0][1];

    $sql = "INSERT INTO carts (user, product, shop, qty) VALUES ('$user_id','$pro_id','$shop_id','$qty');";
    mysqli_query($conn, $sql);

    header("Location:../product_detail.php?id=$pro_id");
}
