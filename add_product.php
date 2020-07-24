<?php include 'header.php'; ?>
<title>ሁሉንም│ የእቃ ምዝገባ</title>
<link rel="stylesheet" href="static/css/add-products.css">
<div class="container-fluid bg-color container-bg full-body">
    <div class="row">
        <div class="col-md-6">
            <div class="container-h">
                <img src="static/img/product/icon.png" alt="shop" height="40px" width="40px">
                <h1 class="header">የእቃ መመዝገብያ</h1>
            </div>
            <br>
            <?php
            if (isset($_SESSION['pro_msg'])) {
                if ($_SESSION['pro_msg'] == 'በተሳካ ሁኔታ መዝግበዋል') {
                    echo "<p class = 'msg-success'>" . $_SESSION['pro_msg'] . "</p>";
                } else {
                    echo "<p class = 'msg-failed'>" . $_SESSION['pro_msg'] . "</p>";
                }
            }
            $_SESSION['pro_msg'] = "";
            ?>
            <form method="POST" class="form" action="includes/add_product_h.php" enctype="multipart/form-data">
                <select name="category" class="input" required>
                    <option>ኤሌክትሮኒክስ</option>
                    <option>የሴቶች አልባሳት</option>
                    <option>መዋብያ እቃዎች</option>
                    <option>የወንዶች አልባሳት</option>
                    <option>የልጆች</option>
                    <option>የቤት እቃዎች</option>
                    <option>ፈርኒቸሮች</option>
                    <option>የግምባታ እቃዎች</option>
                    <option>ማሽነሪዎች</option>
                    <option>የእጅ ስራዎች</option>
                    <option>መጽሐፎች</option>
                </select><br>
                <input class="input" type="text" name="name" placeholder="የእቃ ስም" required> <br>
                <textarea class="input" name="des" id="" rows="5" placeholder="መግለጫ"></textarea>
                <input class="input" type="text" name="price" placeholder="ዋጋ" required> <br>
                <input class="input" type="text" name="min_order" placeholder="ዝቅተኛ የትእዛዝ መጠን" required> <br>
                <p class="img-label">ምስል፡ የሚመርጡት ምስል ከ 1 ሜጋ ባይት መብለጥ የለበትም። የሚፈቀዱ የምስል አይነቶች .jpg,.jpeg,.png,.gif</p>
                <input class="input" type="file" accept="image/*" name="img"><br>
                <button type="submit" class="register-btn" name="submit">መዝግብ</button>
            </form>

        </div>
        <div class="col-md-6">
            <p class="reg-info-p">

            </p>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>