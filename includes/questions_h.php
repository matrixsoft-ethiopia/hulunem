<?php
include_once 'dbh.php';
session_start();


// check if button is clicked
if (isset($_POST['submit'])) {
    // register user
    $question = mysqli_real_escape_string($conn, $_POST['question']);

    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO questions (user, question) VALUES ('$user_id', '$question');";
    mysqli_query($conn, $sql);

    header("Location:../questions.php?send=success");
}
