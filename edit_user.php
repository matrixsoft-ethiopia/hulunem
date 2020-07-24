<?php include 'header.php';
?>
<title>ሁሉንም│ መግለጫ ለመቀየር</title>
<link rel="stylesheet" href="static/css/edit-user.css">
<div class="container-fluid bg-color container-bg full-body">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6 text-center justify-content-center">
            <h2 class="register-h">መግለጫ</h2>
            <?php
            if (isset($_SESSION['msg2'])) {
                if ($_SESSION['msg2'] == 'መግለጫዎን በተሳካ ሁኔታ ቀይረዋል') {
                    echo "<p class = 'msg-success'>" . $_SESSION['msg2'] . "</p>";
                } else {
                    echo "<p class = 'msg-failed'>" . $_SESSION['msg2'] . "</p>";
                }
            }
            $_SESSION['msg2'] = "";
            ?>
            <form method="POST" action="includes/edit_user_h.php">
                <?php
                $fname = $_SESSION['fname'];
                $lname = $_SESSION['lname'];
                echo "<input type='text' name='fname' class='input' value='$fname'> <br>";
                echo "<input type='text' name='lname' class='input' value='$lname'> <br>";
                ?>
                <button type="submit" name="submit" class="register-btn">ቀይር</button>
            </form>
            <h2 class="register-h">የይለፍ ቃል</h2>
            <?php
            if (isset($_SESSION['msg'])) {
                if ($_SESSION['msg'] == 'የይለፍ ቃልዎን በተሳካ ሁኔታ ቀይረዋል') {
                    echo "<p class = 'msg-success'>" . $_SESSION['msg'] . "</p>";
                } else {
                    echo "<p class = 'msg-failed'>" . $_SESSION['msg'] . "</p>";
                }
            }
            $_SESSION['msg'] = "";
            ?>
            <form method="POST" action="includes/edit_user_h.php">
                <input type='password' name='old_pass' class='input' placeholder="ነባሩን የይለፍ ቃል ያስገቡ" required> <br>
                <input type='password' name='new_pass_1' class='input' placeholder="አዲሱን የይለፍ ቃል ያስገቡ" required> <br>
                <input type='password' name='new_pass_2' class='input' placeholder="አዲሱን የይለፍ ቃል በድጋሚ ያስገቡ" required> <br>
                <button type="submit" name="submit2" class="register-btn">ቀይር</button>
            </form>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>
<?php include 'footer.php'; ?>