<?php include 'header.php';
?>
<title>ሁሉንም│ የሱቅ ምዝገባ</title>
<link rel="stylesheet" href="static/css/add-shop.css">
<div class="container-fluid bg-color container-bg full-body">
    <div class="row">
        <div class="col-md-6">
            <div class="container-h">
                <img src="static/img/add-shop/shop.png" alt="shop" height="40px" width="40px">
                <h1 class='header'>የንግድ ድርጅት መመዝገብያ</h1>
            </div>
            <?php
            if (isset($_SESSION['msg'])) {
                if ($_SESSION['msg'] == 'ድርጅትዎን በተሳካ ሁኔታ መዝግበዋል') {
                    echo "<p class = 'msg-success'>".$_SESSION['msg']."</p>";
                } else {
                    echo "<p class = 'msg-failed'>".$_SESSION['msg']."</p>";
                }
            }
            $_SESSION['msg'] = "";
            ?>
            <form action="includes/add_shop_h.php" method="POST">
                <select name="enterprise_type" class=" input">
                    <option>ሱቅ</option>
                    <option>ማከፋፈያ</option>
                    <option>ፋብሪካ</option>
                </select>
                <input class="input" type="text" name="name" placeholder="የድርጅት ስም" required> <br>
                <textarea class="input" name="des" id="" rows="5" placeholder="መግለጫ"></textarea>
                <input class="input" type="text" name="loc1" placeholder="አድራሻ፣ መለያ የአካባቢ ስም፣ ህንጻ" required> <br>
                <input class="input" type="text" name="loc2" placeholder="ቀበሌ/ክፍለ ከተማ" required> <br>
                <select name="loc3" class="input" required>
                <option>አዲስ አበባ</option>    
                <option>ባህር ዳር</option>
                <option>መቀሌ</option>
                <option>አዳማ</option>
                <option>ሃዋሳ</option>
                <option>ጎንደር</option>
                </select><br>
                <input class="input" type="text" name="mobile" placeholder="ስልክ ቁጥር" required> <br>
                <input class="input" type="text" name="tin_no" placeholder="TIN NO" required> <br>
                <button type="submit" class="register-btn" name="submit">መዝግብ</button>
            </form>
        </div>
        <div class="col-md-6">
            <p class="reg-info-p">
                ህጋዊ የሱቅ ባለቤት ከሆኑ የሱቁን ሙሉ መረጃ በተዘጋጀው የመሙያ ቅጽ ላይ ሞልተው ማስመዝገብ ይችላሉ። የሱቁን ህጋዊነት በላኩት ፎቶ አማካኝነት ከ 1-2 ቀን
                በሚወስድ
                ጊዜ ውስጥ የሚረጋገጥ ይሆናል። የማረጋገጡን ስራ ስንጨርስ መልእክት ይደርስዎታል። ሱቁ ከተረጋገጠ በስሩ እቃዎችን መመዝገብ ይችላሉ። አንድ ደንበኛ አንድ
                ሱቅ በነጻ ማስመዝገብ የሚችል ሲሆን ከአንድ በላይ ሱቆችን ለማስመዝገብ የአባልነት ምዝገባ ማከናወን ይኖርበታል።
            </p>
        </div>
    </div>
</div>

</section>
<?php include 'footer.php'; ?>