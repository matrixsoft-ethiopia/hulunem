<?php include 'header.php';
?>
<title>ሁሉንም│ መግለጫ</title>
<link rel="stylesheet" href="static/css/user-page.css">
<div class="container-fluid bg-color container-bg full-body">
    <div class="row">
        <div class="col-md-6">
            <?php
            echo "<h1 class='user-name'>" . $_SESSION['fname'] . " " . $_SESSION['lname'] . "</h1>";
            ?>
            <a class="custom-link" href="cart_summary.php">
                <div class="cart" id="cart">
                    <img src="static/img/product/cart2.png" alt="Cart" width="60px" height="60px">
                    <div>
                        <h2 class="cart1">ዘምቢል</h2>
                        <h5 class="cart2">በዘምቢል የተከተቱና ትእዛዝ የሚጠብቁ እቃዎች</h5>
                    </div>
                </div>
            </a>
            <a class="custom-link" href="order_given_summary.php">
                <div class="order" id="order">
                    <img src="static/img/product/order2.png" alt="Cart" width="50px" height="50px">
                    <div>
                        <h2 class="order1">ትእዛዝ</h2>
                        <h5 class="order2">የታዘዙ እቃዎች</h5>
                    </div>
                </div>
            </a>
            <?php
            $user_id = $_SESSION["user_id"];

            $shop_check_query = "SELECT  * FROM shops WHERE owner = '$user_id' LIMIT 1;";
            $result = mysqli_query($conn, $shop_check_query);
            $shops = mysqli_fetch_all($result);
            if ($shops) {
                $shop_id = $shops[0][0];
                echo "<a href='shop_detail.php?id=$shop_id'><div class='order'>";
                echo "<h1 class = 'text-left'>" . $shops[0][3] . "</h1>";
                echo "</div></a>";
            }
            ?>
        </div>
        <div class="col-md-6">
            <div class="min-hieght">
                <h3 class="profile-h">መግለጫ</h3>
                <?php
                echo "<h5 class='name-h'>ስም፡</h5>";
                echo "<p class='full-name'>" . $_SESSION['fname'] . " " . $_SESSION['lname'] . "</p>";

                echo "<hr>";
                echo "<h5 class='email-h'>ኢሜይል፡</h5>";
                echo "<p class='email'>" . $_SESSION['email'] . "</p>";
                ?>
                <hr>
                <div class="text-right">
                    <a class="edit" href="edit_user.php">ለመቀየር</a>
                    <div class="dropdown">
                        <button class="dropbtn">ለመውጣት</button>
                        <div class="dropdown-content">
                            <a href="includes/logout_h.php">ውጣ</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-left bottom-mrgn">
                    <h2 class="shop-h">የንግድ ድርጅት ባለቤት ነዎት?</h2>
                    <div class="display">
                        <?php
                        $user_id = $_SESSION["user_id"];

                        $shop_check_query = "SELECT  * FROM shops WHERE owner = '$user_id' LIMIT 1;";
                        $result = mysqli_query($conn, $shop_check_query);
                        $shops = mysqli_fetch_all($result);
                        if ($shops) {
                            $shop_id = $shops[0][0];
                            echo "<a href='shop_detail.php?id=$shop_id'><div class='open-shop-btn'>የተመዘገበ ለመክፈት</div></a>";
                        }
                        ?>
                        <a href="add_shop.php">
                            <div class="new-shop-btn"> አዲስ ለመመዝገብ </div>
                        </a>
                        <?php
                        $user_id = $_SESSION["user_id"];

                        $salvajs_check_query = "SELECT  * FROM salvajs WHERE salvaj_owner = '$user_id';";
                        $salvaj_result = mysqli_query($conn, $salvajs_check_query);
                        $salvajs = mysqli_fetch_all($salvaj_result);

                        if ($salvajs) {
                            echo "<h2 class='shop-h'>በስርዎ የተመዘገቡ ያገለገሉ እቃዎች</h2>";
                            echo "<div class='display'>";
                            for ($i = 0; $i < count($salvajs); $i++) {
                                echo "<div class='product-items text-center'>";
                                echo "<div class='product-info' >";
                                echo "<div class='pro-name text-left'>";
                                $id = $salvajs[$i][0];
                                echo "<a class='pro-name' href='salvaj_detail.php?id=$id'>" .  $salvajs[$i][3]  . "</a>";
                                echo "</div>";
                                echo "<br>";
                                echo "<p class='pro-price'>" . $salvajs[$i][5] . " ብር</p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>