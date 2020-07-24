<?php
include_once 'dbh.php';
session_start();

// check if button is clicked
if (isset($_POST['submit'])) {
    // register user
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO comments (user, comment) VALUES ('$user_id', '$comment');";
    mysqli_query($conn, $sql);

    header("Location:../comments.php?send=success");
}
