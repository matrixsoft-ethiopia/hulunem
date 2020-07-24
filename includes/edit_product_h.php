<?php
include_once 'dbh.php';
session_start();

// check if button is clicked
if (isset($_POST['submit'])) {
    // register user
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $des = mysqli_real_escape_string($conn, $_POST['des']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $min_order = mysqli_real_escape_string($conn, $_POST['min_order']);

    // check database for existing user
    $pro_id = $_GET['id'];

    $sql = "UPDATE products SET category = '$category', 
        pro_name = '$name', pro_des = '$des', price = '$price', min_order = '$min_order' WHERE id = '$pro_id';";
    mysqli_query($conn, $sql);

    header("Location:../product_detail.php?id=" . $pro_id."?edit=success");
}
