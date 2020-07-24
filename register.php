<?php include 'header.php';
?>

<title>ሁሉንም│ መመዝገብያ</title>
<link rel="stylesheet" href="static/css/register-style.css">
<div class="container-fluid bg-color container-bg full-body">
    <div class="row">
        <div class="col-md-12 full">
            <div class="cont text-center">
                <h2 class="register-h font">መመዝገብያ</h2>           
                <hr>
                <div>
                    <?php
                    if (isset($_SESSION['reg_msg'])) {                     
                        foreach ($_SESSION['reg_msg'] as  $error) {
                            echo "<p class='msg-failed'>".$error."</p>";                           
                        }
                        $_SESSION['reg_msg'] = array();
                    }
                    ?>
                </div>
                <form action="includes/register_h.php" class= 'form' method="POST">
                    <input class="input" type="text" name="fname" placeholder="ስም" required> <br>
                    <input class="input" type="text" name="lname" placeholder="የአባት ስም" required> <br>
                    <input class="input2" type="text" name="email" placeholder="ኢሜይል" required> <br>
                    <input class="input2" type="password" name="password1" placeholder="የይለፍ ቃል" required> <br>
                    <input class="input2" type="password" name="password2" placeholder="የይለፍ ቃልዎን በድጋሚ ያስገቡ" required> <br>
                    <button type="submit" class="button" name = "submit">መዝግብ</button>
                </form>                
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>