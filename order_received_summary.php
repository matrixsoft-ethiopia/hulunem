<?php include 'header.php'; ?>
<title>አዴተራ│ የገቡ ትእዛዞች ዝርዝር</title>
<link rel="stylesheet" href="static/css/order_received_summary.css">
<div class="container-fluid bg-color">
    <div class="row">
        <div class="col-md-3">
            <div class="category1">
                <a class='list2' href="product-list.php?category=ኤሌክትሮኒክስ">ኤሌክትሮኒክስ</a>
                <a class='list2' href="product-list.php?category=የሴቶች አልባሳት">የሴቶች አልባሳት </a>
                <a class='list2' href="product-list.php?category=መዋብያ እቃዎች">መዋብያ እቃዎች</a>
                <a class='list2' href="product-list.php?category=የወንዶች አልባሳት">የወንዶች አልባሳት</a>
                <a class='list2' href="product-list.php?category=የልጆች">የልጆች</a>
                <a class='list2' href="product-list.php?category=የሴቶች የቤት እቃዎች">የቤት እቃዎች </a>
                <a class='list2' href="product-list.php?category=ፈርኒቸሮች">ፈርኒቸሮች</a>
                <a class='list2' href="product-list.php?category=የግምባታ እቃዎች">የግምባታ እቃዎች</a>
                <a class='list2' href="product-list.php?category=ማሽነሪዎች">ማሽነሪዎች</a>
                <a class='list2' href="product-list.php?category=የእጅ ስራዎች">የእጅ ስራዎች</a>
                <a class='list2' href="product-list.php?category=መጽሐፎች">መጽሐፎች</a>
            </div>
            <div class="logincontainer">
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo "<h1 class='reg-pro-h'>እቃዎችን ለመመዝገብ</h1>";
                    echo "<a class='reg-pro-a' href='add_product.php'>አዲስ እቃ መዝግብ</a>";
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
                <h1 class="results-h" name='shopname'>
                    የገቡ ትእዛዞች ዝርዝር
                </h1>
                <div class="product-items">
                    <p class="pro-img-h">ፎቶ </p>
                    <p class="pro-name-h">የእቃው አይነት</p>
                    <p class="pro-price-h">ዋጋ</p>
                    <p class="pro-price-h">የታዘዘ ብዛት</p>
                    <p class="pro-shop-h">ትእዛዝ ሰጭ</p>
                </div>
                <hr class="hr">
                <?php
                $user_id = $_SESSION['user_id'];
                $shop_check_query = "SELECT * FROM shops WHERE owner = '$user_id' LIMIT 1 ;";
                $result = mysqli_query($conn, $shop_check_query);
                $shop =  mysqli_fetch_all($result);
                if ($shop) {
                    $shop_id = $shop[0][0];
                }
                $cart_check_query = "SELECT * FROM carts WHERE shop = '$shop_id' ;";
                $result = mysqli_query($conn, $cart_check_query);
                $carts =  mysqli_fetch_all($result);
                if ($carts) {
                    $sum = 0;
                    for ($i = 0; $i < count($carts); $i++) {
                        $pro_id = $carts[$i][2];
                        $product_check_query = "SELECT * FROM products WHERE id = '$pro_id' LIMIT 1 ;";
                        $result = mysqli_query($conn, $product_check_query);
                        $products = mysqli_fetch_all($result);
                        $user_id = $carts[$i][1];
                        $user_check_query = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1 ;";
                        $result2 = mysqli_query($conn, $user_check_query);
                        $users = mysqli_fetch_all($result2);
                        $cart_id = $carts[$i][0];
                        if($carts[$i][11]==0){
                        echo "<a class='pro-items-a' href='order_received_detail.php?cart_id=$cart_id'>";
                        }else{
                            echo "<a class='pro-items-a-checked' href='order_received_detail.php?cart_id=$cart_id'>";
                        }
                        echo "<div class='product-items'>";
                        echo "<img class='pro-img' src='' alt='pic' height=30px width=30px/><br>";
                        echo "<p class='pro-name'>" . $products[0][3] . "</p>";
                        echo " <p class='pro-price'>" . $products[0][5] . "</p>";
                        echo " <p class='pro-price'>" . $carts[$i][4] . "</p>";
                        echo " <p class='pro-shop'>" . $users[0][3] . " " . $users[0][4] . "</p>";
                        echo "</div>";
                        echo "</a>";
                        $sum = $sum + $products[0][5];
                    }
                    echo "<hr>";
                    echo "<p class='total-price'> ድምር፡$sum </p>";
                } else {
                    echo "<h3>የገባ ትእዛዝ የለም</h3>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>