<?php include 'header.php';
include_once 'includes/dbh.php';
?>
<title>ሁሉንም│ ያገለገለ እቃ ዝርዝር</title>
<link rel="stylesheet" href="static/css/salvaj_detail.css">
<h1 class="salvaj-h text-center">ያገለገሉ እቃዎች</h1>
<div class="container-fluid bg-color">
    <div class="row">
        <div class="col-md-3">
            <div class="category1">
                <h1 class='reg-pro-h text-center'>ያገለገሉ እቃዎች</h1>
                <a class='list2' href="salvaj_list.php?category=ኤሌክትሮኒክስ">ኤሌክትሮኒክስ</a>
                <a class='list2' href="salvaj_list.php?category=የሴቶች አልባሳት">የሴቶች አልባሳት </a>
                <a class='list2' href="salvaj_list.php?category=የወንዶች አልባሳት">የወንዶች አልባሳት</a>
                <a class='list2' href="salvaj_list.php?category=የልጆች">የልጆች</a>
                <a class='list2' href="salvaj_list.php?category=የቤት እቃዎች">የቤት እቃዎች </a>
                <a class='list2' href="salvaj_list.php?category=ፈርኒቸሮች">ፈርኒቸሮች</a>
                <a class='list2' href="salvaj_list.php?category=የግምባታ እቃዎች">የግምባታ እቃዎች</a>
                <a class='list2' href="salvaj_list.php?category=ማሽነሪዎች">ማሽነሪዎች</a>
            </div>
            <div class="logincontainer">
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo "<h1 class='reg-pro-h'>ያገለገሉ እቃዎችን ለመመዝገብ</h1>";
                    echo "<a class='reg-pro-a' href='add_salvaj.php'>ያገለገለ እቃ መዝግብ</a>";
                } else {
                    echo "<h1 class='reg-pro-h'>መግብያ</h1>";
                    echo "<form method='POST' action='includes/login_h.php'>";
                    echo "<input class='email-input' type='text' name = 'email' placeholder='ኢሜይል'>";
                    echo "<input class='password-input' type='password' name = 'password1' placeholder='የይለፍ ቃል'>";
                    echo "<button class='login-btn' type = 'submit' name = 'submit' >ግባ</button>";
                    echo "</form><br>";
                    echo "<p class='info-p'>አዲስ ተጠቃሚ ከሆኑ በነጻ ይመዝገቡ</p>";
                    echo "<a class='signup-btn' href='register.php'>መመዝገብያ</a>";
                }
                ?>
            </div>
        </div>
        <div class="col-md-9">
            <div class="products">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-7">
                            <?php
                            $pro_id = $_GET["id"];
                            $product_check_query = "SELECT  * FROM salvajs WHERE id = '$pro_id' LIMIT 1;";
                            $result = mysqli_query($conn, $product_check_query);
                            $product = mysqli_fetch_all($result);
                            echo "<h1 class='results'>" . $product[0][3] . "</h1>";
                            echo "<pre class='pro-detail'>" . $product[0][4] . "</pre><br>";
                            echo "<p class='pro-price'>" . $product[0][5] . "ብር</p>";
                            ?>
                        </div>
                        <div class="col-md-5">
                            <div class="shop-description">
                                <?php
                                $user_id = $product[0][1];
                                $user_check_query = "SELECT  * FROM users WHERE id = '$user_id';";
                                $result2 = mysqli_query($conn, $user_check_query);
                                $users = mysqli_fetch_all($result2);
                                echo "<p class='shop-name'>" . $users[0][3] . " " . $users[0][4] . "</p><br>";
                                echo " <p class='shop-detail'>
                                        <img src='static/img/shop_detail/locaion-icon.png' width='25px' height='25px'>"
                                    . $product[0][6] . " </p><br>";
                                echo "<p class='shop-detail'>
                                        <img src='static/img/shop_detail/phone-icon.png' width='25px' height='25px'>"
                                    . $product[0][7] . "</p>";
                                ?>
                                <div class="cart-btn-container">
                                    <?php
                                    if (isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];

                                        if ($user_id == $product[0][1]) {
                                            echo "<a class='edit' href=''>ለመቀየር</a>";
                                        } else {
                                            $cart_check_query = "SELECT  * FROM carts WHERE user = '$user_id' AND product = '$pro_id' LIMIT 1;";
                                            $result3 = mysqli_query($conn, $cart_check_query);
                                            $carts = mysqli_fetch_all($result3);

                                            if ($carts) {
                                                echo "<a class='goto-cart-btn' href='cart_summary.php'>ዘምቢሉን ለመክፈት</a>";
                                            } else {
                                                echo "<a class='cart-btn' href='includes/add_cart_h.php?id=$pro_id'>ወደ ዘምቢል ለመጨመር</a>";
                                            }
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>