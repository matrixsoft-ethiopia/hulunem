<?php
include_once 'dbh.php';
session_start();


$user_id = $_SESSION['user_id'];
$pro_id = $_GET["id"];


$sql = "DELETE carts WHERE user='$user_id' AND product='$pro_id';";
mysqli_query($conn, $sql);

header("Location:../cart_summary.php?cart=deleted");
