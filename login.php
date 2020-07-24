<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>አዴተራ│ መግብያ</title>
    <link rel="icon" href="static/header/img/icon.jpg" type="image/gif" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="static/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/login-style.css">
</head>

<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a  href="index.php">
                        <img src="static/img/logo.jpg" alt="hulunem.com" class="logo ">
                        <p class="hulunem">HULUNEM.COM</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 justify-content-center text-center ">
                    <?php
                    if (isset($_SESSION['login_error'])) {
                        echo "<p class='signup'>" . $_SESSION['login_error'] . "</p>";
                        $_SESSION['login_error'] = "";
                    }
                    ?>
                    <form method="POST" action="includes/login_h.php">
                        <input class="input" type="text" name="email" placeholder="ኢሜይል" required> <br>
                        <input class="input" type="password" name="password1" placeholder="የይለፍ ቃል" required> <br>
                        <button type="submit" class="button" name="submit">ግባ</button>
                    </form>
                    <a class="fb-button" href="{% url 'social:begin' 'facebook' %}">በ facebook ግባ</a>
                    <hr class="line">
                    <p class="info-p">አዲስ ተጠቃሚ ከሆኑ በነጻ ይመዝገቡ</p>
                    <a class="signup" href="register.php">መመዝገብያ</a>

                </div>
            </div>
        </div>
    </section>
</body>