<?php
include_once 'dbh.php';
session_start();

// check if button is clicked
if (isset($_POST['submit'])) {
    // register user
    $claims = mysqli_real_escape_string($conn, $_POST['claim']);

    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO claims (user, claim) VALUES ('$user_id', '$claims');";
    mysqli_query($conn, $sql);

    header("Location:../claims.php?send=success");
}
