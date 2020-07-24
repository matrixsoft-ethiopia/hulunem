<?php include 'header.php'; ?>
<title>ሁሉንም│ የንግድ ድርጅት መግለጫ ለመቀየር</title>
<link rel="stylesheet" href="static/css/edit-shop.css">
<div class="container-fluid bg-color  full-body">
    <div class="row">
        <div class="col-md-6 ">
            <h2 class="register-h">መግለጫ</h2>
            <?php
            $id = $_GET["id"];

            $shop_check_query = "SELECT  * FROM shops WHERE id = '$id' LIMIT 1;";
            $result = mysqli_query($conn, $shop_check_query);
            $shops = mysqli_fetch_all($result);
            echo "<form method='POST' action='includes/edit_shop_h.php'>";
            echo "<div class='input-container'>";
            echo "<p>የድርጅቱ አይነት፡</p>";
            echo "<p name='ent_type' class='input'>" . $shops[0][2] . "</p>";
            echo "<p>ስም፡</p>";
            $name = $shops[0][3];
            echo "<input type='text' name='name' class='input' value='$name'>";
            echo "<p>መግለጫ፡</p>";
            $des = $shops[0][4];
            echo  "<textarea type='text' name='des' class='input'>$des</textarea>";
            echo "<p>አድራሻ፣ መለያ የአካባቢ ስም፣ ህንጻ፡</p>";
            $loc1 = $shops[0][5];
            echo "<input type='text' name='loc1' class='input' value='$loc1'>";
            echo "<p>ቀበሌ/ክፍለ ከተማ፡</p>";
            $loc2 = $shops[0][6];
            echo "<input type='text' name='loc2' class='input' value='$loc2'>";
            echo "<p>ከተማ፡</p>";
            echo "<select name='loc3' class='input'>";
            echo "<option class='container-bg'>" . $shops[0][7] . "</option>";
            echo "<option>አዲስ አበባ</option> ";
            echo   "<option>ባህር ዳር</option>";
            echo   "<option>መቀሌ</option>";
            echo    "<option>አዳማ</option>";
            echo   "<option>ሃዋሳ</option>";
            echo   "<option>ጎንደር</option>";
            echo "</select>";
            echo "<p>ስልክ ቁጥር፡</p>";
            echo "<input type='text' name='mobile' class='input' value=" . $shops[0][8] . ">";
            echo "<button type='submit' name = 'submit' class='register-btn'>ቀይር</button>";
            echo "</div>";
            echo "</form>";
            ?>
        </div>
        <div class="col-md-6 ">
            <div class="shop-card">
                <?php
                echo "<h3 class='text-center header-color'>" . $shops[0][3] . "</h3>";
                echo "<hr>";
                echo "<p>መግለጫ፡ " . $shops[0][4] . "</p>";
                echo "<hr>";
                echo "<p>የድርጅቱ አይነት፡ " . $shops[0][2] . "</p>";
                echo "<hr>";
                echo "<p>አድራሻ፣ መለያ የአካባቢ ስም፣ ህንጻ፡ " . $shops[0][5] . "</p>";
                echo "<hr>";
                echo "<p>ቀበሌ/ክፍለ ከተማ፡ " . $shops[0][6] . "</p>";
                echo "<hr>";
                echo "<p>ከተማ፡ " . $shops[0][7] . "</p>";
                echo "<hr>";
                echo "<p>ስልክ ቁጥር፡ " . $shops[0][8] . "</p>";
                echo "<hr>";
                echo "<p>የግብር ከፋይነት መለያ ቁጥር፡ " . $shops[0][9] . "</p>";
                echo "<hr>";
                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>