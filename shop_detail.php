<?php include 'header.php'; ?>
<title>ሁሉንም│ የድርጅት መግልጫ </title>
<link rel="stylesheet" href="static/css/shop-detail.css">
<div class="container-fluid bg-color full-body">
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
            <div class="shops">
                <?php
                $id = $_GET["id"];

                $shop_check_query = "SELECT  * FROM shops WHERE id = '$id' LIMIT 1;";
                $result = mysqli_query($conn, $shop_check_query);
                $shops = mysqli_fetch_all($result);
                echo "<h1 class='color-gray'>" .  $shops[0][3]  . "</h1>";
                ?>
                <div class='container-fluid'>
                    <div class='row'>
                        <div class='col-md-7'>
                            <div class='shop-items'>
                                <div class='inline-display results'>
                                    <h2>
                                        የተመዘገቡ እቃዎች ዝርዝር
                                    </h2>
                                    <?php
                                    $product_check_query = "SELECT  * FROM products WHERE shop = '$id';";
                                    $result2 = mysqli_query($conn, $product_check_query);
                                    $products = mysqli_fetch_all($result2);
                                    echo "<h5>(ብዛት =" . count($products) . ")</h5>";
                                    ?>
                                </div>
                                <?php
                                if (empty($products)) {
                                    echo "<h3> በስሩ የተመዘገበ እቃ የለም</h3>";
                                } else {
                                    for ($i = 0; $i < count($products); $i++) {
                                        $id = $products[$i][0];
                                        echo "<div class='product-items text-center'>";
                                        echo " <a href='product_detail.php?id=$id'><img src='uploads/products/" . $products[$i][8] . "' alt='image' class='pro-img' default=></a>";
                                        echo "<div class='product-info' >";
                                        echo "<div class='pro-name text-left'>";
                                        echo "<a class='pro-name' href='product_detail.php?id=$id'>" .  $products[$i][3]  . "</a>";
                                        echo "</div>";
                                        echo "<br>";
                                        echo "<p class='pro-price'>" . $products[$i][5] . " ብር</p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if (isset($_SESSION['user_id'])) {
                                        if ($shops[0][1] == $_SESSION['user_id']) {
                                            echo "<div><a class='reg-pro-a' href='add_product.php'>አዲስ እቃ መዝግብ</a></div>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="shop-description">
                                <h3 class="shop-name bg-color" name='shopname'>
                                    የድርጅቱ መግልጫ
                                </h3>
                                <?php
                                echo "<p class='shop-detail'>" . $shops[0][4] . "</p><br>";
                                echo " <p class='shop-detail'>
                                    <img src='static/img/shop_detail/locaion-icon.png' width='25px' height='25px'>"
                                    . $shops[0][5] . ", " . $shops[0][6] . ", " . $shops[0][7] . " </p><br>";
                                echo "<p class='shop-detail'>
                                    <img src='static/img/shop_detail/phone-icon.png' width='25px' height='25px'>"
                                    . $shops[0][8] . "</p>";
                                if (isset($_SESSION['user_id'])) {
                                    if ($shops[0][1] == $_SESSION['user_id']) {
                                        echo "<a class='edit' href='edit_shop.php?id=" . $shops[0][0] . "'>ለመቀየር</a>";
                                        echo "<h3 class='shop-order bg-color'>በተጠቃሚዎች የተሰጡ ትእዛዞች</h3>";
                                        echo "<a class='shop-order-btn' href='order_received_summary.php'>የገቡ ትእዛዞች ዝርዝር</a>";

                                        $shop_id = $shops[0][0];
                                        $customer_check_query = "SELECT * FROM customers WHERE shop = '$shop_id' ;";
                                        $result_cus = mysqli_query($conn, $customer_check_query);
                                        $customer = mysqli_fetch_all($result_cus);

                                        if ($customer) {
                                            echo "<h3 class='shop-order bg-color'>ደንበኞች</h3>";
                                            for ($i = 0; $i < count($customer); $i++) {
                                                $user_id = $customer[$i][2];

                                                $user_check_query = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1 ;";
                                                $result = mysqli_query($conn, $user_check_query);
                                                $user = mysqli_fetch_all($result);
                                                echo "<img src= 'static/img/profile-icon.png' width='25px' height='25px'><a class='cus-list' href=''>" . $user[0][3] . " " . $user[0][4] . "</a><br>";
                                            }
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
<?php include 'footer.php'; ?>