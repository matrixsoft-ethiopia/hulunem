<?php include 'header.php'; ?>
<title>ሁሉንም│ የእቃ መግለጫ ለመቀየር</title>
<link rel="stylesheet" href="static/css/edit-product.css">
<div class="container-fluid bg-color  full-body">
    <div class="row">
        <div class="col-md-6 ">
            <h2 class="register-h">መግለጫ</h2>
            <?php
            $id = $_GET["id"];

            $product_check_query = "SELECT  * FROM products WHERE id = '$id' LIMIT 1;";
            $result = mysqli_query($conn, $product_check_query);
            $product = mysqli_fetch_all($result);
            echo "<form method='POST' action='includes/edit_product_h.php?id=$id.php'>";
            echo "<div class='input-container'>";
            echo "<p>ስም፡</p>";
            $name =  $product[0][3];
            echo "<input type='text' name='name' class='input' value='$name' >";
            echo "<p>የእቃው አይነት፡</p>";
            echo "<select name='category' class='input'>";
            echo "<option class='container-bg'>" . $product[0][2] . "</option>";
            echo "<option>ኤሌክትሮኒክስ</option>";
            echo  "<option>የሴቶች አልባሳት</option>";
            echo "<option>መዋብያ እቃዎች</option>";
            echo "<option>የወንዶች አልባሳት</option>";
            echo "<option>የልጆች</option>";
            echo "<option>የቤት እቃዎች</option>";
            echo " <option>ፈርኒቸሮች</option>";
            echo "<option>የግምባታ እቃዎች</option>";
            echo "<option>ማሽነሪዎች</option>";
            echo "<option>የእጅ ስራዎች</option>";
            echo "<option>መጽሐፎች</option>";
            echo "</select>";
            echo "<p>መግለጫ፡</p>";
            $des = $product[0][4];
            echo  "<textarea type='text' name='des' class='input'>$des</textarea>";
            echo "<p>ዋጋ፡</p>";
            echo "<input type='text' name='price' class='input' value=" . $product[0][5] . ">";
            echo "<p>ዝቅተኛ የትእዛዝ መጠን፡</p>";
            echo "<input type='text' name='min_order' class='input' value=" . $product[0][6] . ">";
            echo "<button type='submit' name = 'submit' class='register-btn'>ቀይር</button>";
            echo "</div>";
            echo "</form>";
            ?>
        </div>
        <div class="col-md-6">
            <div class="shop-card">
                <?php
                echo "<h3 class='text-center header-color'>" . $product[0][3] . "</h3>";
                echo " <img src='' alt='image' class='pro-img'><br>";
                echo "<hr>";
                echo "<div class='pro-detail-cont'>";
                echo  "<p class='pro-detail'>" . $product[0][4] . "</p><br>";
                echo "</div>";
                echo "<hr>";
                echo "<p>" . $product[0][5] . " ብር</p>";
                echo "<hr>";
                echo "<p>ዝቅተኛ የትእዛዝ መጠን፡ " . $product[0][6] . "</p>";
                echo "<hr>";
                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>