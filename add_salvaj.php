<?php include 'header.php'; ?>
<title>ሁሉንም│ ያገለገለ እቃ ምዝገባ</title>
<link rel="stylesheet" href="static/css/add-salvaj.css">
<h1 class="salvaj-h text-center">ያገለገሉ እቃዎች</h1>
<div class="container-fluid bg-color container-bg full-body">
    <div class="row">
        <div class="col-md-6">
            <div class="container-h">
                <img src="static/img/product/icon.png" alt="shop" height="40px" width="40px">
                <h1 class="header">መመዝገብያ</h1>
            </div><br>
            <?php
            if (isset($_SESSION['add_salvaj_msg'])) {
                if($_SESSION['add_salvaj_msg']=="በተሳካ ሁኔታ መዝግበዋል"){
                    echo "<p class = 'msg-success'>".$_SESSION['add_salvaj_msg']."</p>";
                }else{
                    echo "<p class = 'msg-failed'>".$_SESSION['add_salvaj_msg']."</p>";
                }
                $_SESSION['add_salvaj_msg'] = "";
            }
            ?>
            <form method="POST" class="form" action="includes/add_salvaj_h.php">
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
                <select name="loc3" class="input" required>
                    <option>አዲስ አበባ</option>
                    <option>ባህር ዳር</option>
                    <option>መቀሌ</option>
                    <option>አዳማ</option>
                    <option>ሃዋሳ</option>
                    <option>ጎንደር</option>
                </select><br>
                <input class="input" type="text" name="mobile" placeholder="ስልክ ቁጥር" required> <br>
                <button type="submit" class="register-btn" name="submit">መዝግብ</button>
            </form>
        </div>
        <div class="col-md-6">
            <p class="reg-info-p">
                - በነጻ 50 እቃዎችን መደርደር ይችላሉ። ተጨማሪ እቃዎችን ለመደርደር የአባልነት ምዝገባ መመዝገብ ይኖርቦታል <br>
                - የእቃውን ሙሉ መግልጫ በመሙላት በሱቁ ውስጥ መመዝገብ ይችላሉ <br>
                - የእቃው ስም አጭርና ገላጭ እንዲሁም በአማርኛና እንግሊዝኛ ቢሆን ተጠቃሚዎች በቀላሉ እንዲያገኙት ይረዳል <br>
                - የሚያያይዙት ፎቶ ጥራት ያልው 300px በ 400px እና በነጭ መደብ ላይ የተነሳ ቢሆን ይመረጣል። ምስሎችን ከ ጉግል ላይ በቀላሉ ማውረድና ማያያዝ
                ይችላሉ <br>
            </p>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>