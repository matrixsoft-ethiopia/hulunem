<?php include 'header.php';?>
<title>ሁሉንም│ አስተያየት ለመስጠት</title>
<link rel="stylesheet" href="static/css/comments.css">
<div class="container-fluid bg-color  full-body">
    <div class="row">
        <div class="col-md-6 ">
            <h2 class="register-h">አስተያየትዎን ይላኩ</h2>
            <form method="POST" action="includes/comments_h.php">
                <div class="input-container">
                    <p>ስም፡</p><br>
                    <?php
                    echo "<h5>".$_SESSION['fname']." ".$_SESSION['lname']."</h5><br>";
                    ?>
                    <p>አስተያየት፡</p><br>
                    <textarea type="text" name="comment" class="input" placeholder="አስተያየት"></textarea><br>
                    <button type="submit" class="register-btn" name="submit">ላክ</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 ">
            <div class="shop-card">
                
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>