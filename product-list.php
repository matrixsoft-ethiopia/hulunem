<?php include 'header.php';
include_once 'includes/dbh.php';
?>
<title>ሁሉንም│ የእቃ ዝርዝር</title>
<link rel="stylesheet" href="static/css/products-list.css">
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
            <div class="logincontainer text-center">
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
                <div class="results inline-display ">
                    <?php
                    $category = $_GET["category"];
                    echo "<h1> $category </h1>";

                    $product_check_query = "SELECT  * FROM products WHERE category = '$category';";
                    $result = mysqli_query($conn, $product_check_query);
                    $products = mysqli_fetch_all($result);
                    echo "<h5>(ብዛት =" . count($products) . ")</h5>";

                    ?>
                </div>
                <?php
                if (empty($products)) {
                    echo "<h4> በስሩ የተመዘገበ እቃ የለም</h4>";
                } else {
                    for ($i = 0; $i < count($products); $i++) {
                        $id = $products[$i][0];
                        echo "<div class='product-items text-center'>";
                        echo " <a href='product_detail.php?id=$id'><img src='uploads/products/" . $products[$i][8] . "' alt='image' class='pro-img' default=></a>";
                        echo "<div class='product-info'>";
                        echo "<div class='pro-name text-left'>";
                        echo "<a class='pro-name' href='product_detail.php?id=$id'>" .  $products[$i][3]  . "</a>";
                        echo "</div>";
                        echo "<br>";
                        echo "<p class='pro-price'>" . $products[$i][5] . " ብር</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>
            </div>

        </div>
    </div>
</div>
</div>
<?php include 'footer.php'; ?>