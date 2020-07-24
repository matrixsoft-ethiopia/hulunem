<?php include 'header.php'; ?>
<title>አዴተራ│ የእቃ ዝርዝር</title>
<link rel="stylesheet" href="static/css/order-received-detail.css">
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="product-items">
                                <?php
                                $cart_id = $_GET["cart_id"];
                                $cart_check_query = "SELECT * FROM carts WHERE id = '$cart_id' AND is_ordered = '1' LIMIT 1 ;";
                                $result = mysqli_query($conn, $cart_check_query);
                                $carts = mysqli_fetch_all($result);

                                $sql = "UPDATE carts SET is_seen = '1' WHERE id = '$cart_id';";
                                mysqli_query($conn, $sql);

                                if ($carts) {
                                    $user_id = $carts[0][1];
                                    $pro_id = $carts[0][2];

                                    $user_check_query = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1 ;";
                                    $result = mysqli_query($conn, $user_check_query);
                                    $user = mysqli_fetch_all($result);

                                    $product_check_query = "SELECT * FROM products WHERE id = '$pro_id' LIMIT 1 ;";
                                    $result = mysqli_query($conn, $product_check_query);
                                    $product = mysqli_fetch_all($result);


                                    echo "<h1 class='results'>" . $product[0][3] . "</h1>";
                                    echo "<img src='' alt='pic' class='pro-img'><br>";
                                    echo "<p class='pro-detail'>" . $product[0][4] . "</p><br>";
                                    echo "<p class='pro-price'>" . $product[0][5] . " ብር</p><br>";
                                } else {
                                    echo "<h2>የገባ ትእዛዝ የለም</h2>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="shop-description">
                                <?php
                                if ($carts) {
                                    echo "<h3 class='shop-name bg-color' name='shopname'>ትእዛዝ ሰጭ</h3>";
                                    echo "<p class='shop-detail'><img src= 'static/img/profile-icon.png' width='25px' height='25px'>" . $user[0][3] . " " . $user[0][4] . "</p>";
                                    $shop_id = $carts[0][3];
                                    $user_id = $carts[0][1];
                                    $customer_check_query = "SELECT * FROM customers WHERE shop = '$shop_id' AND user='$user_id' LIMIT 1 ;";
                                    $result_cus = mysqli_query($conn, $customer_check_query);
                                    $customer = mysqli_fetch_all($result_cus);
                                    echo "<form method='POST' action='includes/add_customer_h.php?cart_id=$cart_id'>";
                                    if ($customer) {
                                        echo "<button type = 'submit' class='customer-btn-checked' name = 'rem-cus' >ደንበኛ</button>";
                                    } else {
                                        echo "<button type = 'submit' class='customer-btn-unchecked' name = 'add-cus'>ደንበኛ</button>";
                                    }
                                    echo "</form>";
                                    echo "<hr><br>";
                                    echo "<h3 class='shop-name bg-color' name='shopname'>የትእዛዝ መጠን</h3>";
                                    echo "<p class='shop-detail'>" . $carts[0][4] . "</p>";
                                    echo "<hr><br>";
                                    echo "<h5 class='bg-color'>የማድረሻ ቦታ </h5>";
                                    echo "<p class='shop-detail'><img src='static/img/shop_detail/locaion-icon.png' width='25px' height='25px'>
                                " . $carts[0][7] . ", " . $carts[0][8] . ", " . $carts[0][9] . "</p><br>";
                                    echo "<p class='shop-detail'><img src='static/img/shop_detail/phone-icon.png' width='25px' height='25px'>
                                " . $carts[0][10] . "</p>";
                                }
                                ?>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>