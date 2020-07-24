<?php include 'header.php'; ?>
<title>ሁሉንም</title>
<link rel="stylesheet" href="static/css/home-style.css">
<div class="container-fluid margin-null full-body">
    <div class="row">
        <img class="bk-img" src="static/homepage/img/background.jpg" width=100%>
    </div>
    <div class="row ">
        <div class="col-md-4">
            <div class="category1">
                <h1 class="category">እቃዎች</h1>
                <a class='list3' href="salvaj.php">ሁሉንም-ሳልቫጅ</a>
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
        </div>
        <div class="col-md-4">
            <div class='container1'>
                <div class='overlay1'>
                    <div class='text1'>ተወዳጅ እቃዎች</div>
                </div>
                <div class='slide'>
                    <img class='animate-fadding' src="static/homepage/img/slide1.jpg" alt="ተወዳጅ እቃዎች" width=100%>
                </div>
                <div class='slide'>
                    <img class='animate-fadding' src="static/homepage/img/slide2.jpg " alt="ተወዳጅ እቃዎች" width=100%>
                </div>
                <div class='slide'>
                    <img class='animate-fadding' src="static/homepage/img/slide3.jpg " alt="ተወዳጅ እቃዎች" width=100%>
                </div>
                <div class='slide'>
                    <img class='animate-fadding' src="static/homepage/img/slide4.jpg" alt="ተወዳጅ እቃዎች" width=100%>
                </div>
                <div class='slide'>
                    <img class='animate-fadding' src="static/homepage/img/slide5.jpg" alt="ተወዳጅ እቃዎች" width=100%>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class='container2'>
                <div class='overlay2'>
                    <div class='text2'>አዳዲስ እቃዎች</div>
                </div>
                <div class='slide2'>
                    <img src="static/homepage/img/slide6.jpg" alt="ተወዳጅ እቃዎች " width=100%>
                </div>
                <div class='slide2'>
                    <img src="static/homepage/img/slide7.jpg" alt="ተወዳጅ እቃዎች" width=100%>
                </div>
                <div class='slide2'>
                    <img src="static/homepage/img/slide8.jpg" alt="ተወዳጅ እቃዎች" width=100%>
                </div>
                <div class='slide2'>
                    <img src="static/homepage/img/slide9.jpg" alt="ተወዳጅ እቃዎች" width=100%>
                </div>
                <div class='slide2'>
                    <img src="static/homepage/img/slide10.jpg" alt="ተወዳጅ እቃዎች" width=100%>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="jumbotron  text-center custom-jumbotron">
                <h1>ለመግዛት ይመዝገቡ</h1>
                <p>ማንኛውም አይነት እቃዎች በአካባቢዎ ከሚገኙ ሻጮች ያገኛሉ፣ በነፃ ይመዝገቡ።</p>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo $_SESSION['fname'] . " " . $_SESSION['lname'];
                } else {
                    echo "<a class='reg1' href='register.php'>ይመዝገቡ</a>";
                }
                ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="jumbotron  text-center custom-jumbotron">
                <h1>ለመሸጥ ይመዝገቡ</h1>
                <p>እቃዎችን በአለም ላይ ለሚገኙ ገዥዎች ያቀርባሉ፣ በነፃ ይመዝገቡ።</p>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo $_SESSION['fname'] . " " . $_SESSION['lname'];
                } else {
                    echo "<a class='reg1' href='register.php'>ይመዝገቡ</a>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script src="static/homepage/homescript.js"></script>
<?php include 'footer.php'; ?>