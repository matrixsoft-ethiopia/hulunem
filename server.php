<?php 
include_once 'includes/dbh.php';
session_start();


// initializing variables
$username = "";
$password = "";

$errors = array();

// connecting to the database
$db = mysqli_connect('localhost', 'root', '123', 'hulunem') or die('couldnot connect to the database');

// register user
$email = mysqli_real_escape_string($db, $_POST['email']);
$password1 = mysqli_real_escape_string($db, $_POST['password1']);
$password2 = mysqli_real_escape_string($db, $_POST['password2']);
$fname = mysqli_real_escape_string($db, $_POST['fname']);
$lname = mysqli_real_escape_string($db, $_POST['lname']);

// form validation
if(empty($email)) {
    array_push($errors, "የኢሜይል አድራሻ አስፈላጊ ነው"); }
else { 
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {array_push($errors,"ያስገቡት ኢሜይል የተሳሳተ ነው");}
}
if(empty($password1)){array_push($errors,'የይለፍ ቃል አስፈላጊ ነው');}
else{ 
    if($password1 != $password2){array_push($error, 'ያስገቡት የይለፍ ቃል ተመሳሳይ አይደለም');}
}
if(empty($fname)){array_push($errors,'ስም አስፈላጊ ነው');}
if(empty($lname)){array_push($errors,'የአባት ስም አስፈላጊ ነው');}

// check database for existing user
$user_check_query = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user){
    if ($user['email'] === $email) {array_push($errors,'ያስገቡት ኢሜይል ከዚህ በፊት የተመዘገበ ነው');}
}

// register the user if no error
if(count($error) == 0){
    $password = md5($password1);
    $query = "INSERT INTO user (email, password, fname, lname) VALUES ('$email', '$password', '$fname', '$lname')";
    mysqli_query($db, $query);
    
}
