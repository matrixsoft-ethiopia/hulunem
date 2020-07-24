<?php include 'header.php'; ?>
<title>ሁሉንም│ የንግድ ድርጅቶች ዝርዝር</title>
<link rel="stylesheet" href="static/css/shops-list.css">
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
                    echo "<h1 class='reg-pro-h'>የንግድ ድርጅት ለመመዝገብ</h1>";
                    echo "<a class='reg-pro-a' href='add_shop.php'>አዲስ ድርጅት መዝግብ</a>";
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
        <div class="col-md-5">
            <div class="shops">
                <h2 class="results">
                    የተመዘገቡ ድርጅቶች ዝርዝር
                </h2>
                <?php
                $ent_type = $_GET["ent_type"];
                echo "<h4>$ent_type</h4>";
                echo "<hr class='horizontal'>";
                $shop_check_query = "SELECT  * FROM shops WHERE enterprise_type = '$ent_type';";
                $result = mysqli_query($conn, $shop_check_query);
                $shops = mysqli_fetch_all($result);
                if (empty($shops)) {
                    echo "<h5> በስሩ የተመዘገበ ድርጅት የለም</h5>";
                    echo "<a class='signup' href='add_shop.php'>አዲስ ድርጅት መዝግብ</a>";
                } else {
                    for ($i = 0; $i < count($shops); $i++) {
                        $id = $shops[$i][0];
                        echo "<a class='shop-link' href='shop_detail.php?id=$id'>";
                        echo "<div class='shop-info'>";                        
                        echo "<h2 class='shop-name'>" .  $shops[$i][3]  . "</h2>";
                        echo "<p class='shop-tin'>" . $shops[$i][4] . "</p>";
                        echo "</div>";
                        echo "<hr class='horizontal'>";
                    }
                   
                }
                ?>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>
<?php include 'footer.php'; ?>