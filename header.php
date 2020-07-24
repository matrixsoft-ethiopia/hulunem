<?php
include 'includes/login_h.php';
?>
<!DOCTYPE html>

<head>
    <link rel="icon" href="static/img/icon.jpg" type="image/gif" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="static/css/header.css">
</head>

<body>
    <div class="container-fluid null-margin">
        <!-- Top bar -->
        <div class="row ">
            <div class="col-md-12 custom-topbar justify">
                <a href="index.php">
                    <img src="static/img/logo.jpg" alt="hulunem.com" class="logo ">
                    <p class="hulunem">HULUNEM.COM</p>
                </a>
                <div class="user-profile">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $fullname = $_SESSION['fname'] . " " . $_SESSION['lname'];
                        echo "<a class='login' href='user_page.php?user=$fullname'>" . $_SESSION['fname'] . "</a>";

                        $user_id = $_SESSION['user_id'];
                        $shop_check_query = "SELECT * FROM shops WHERE owner = '$user_id' LIMIT 1 ;";
                        $result = mysqli_query($conn, $shop_check_query);
                        $shop =  mysqli_fetch_all($result);
                        if ($shop) {
                            $shop_id = $shop[0][0];
                            $cart_check_query = "SELECT * FROM carts WHERE shop = '$shop_id' AND is_seen='0' ;";
                            $result = mysqli_query($conn, $cart_check_query);
                            $carts = mysqli_fetch_all($result);
                            if ($carts) {
                                echo "<a class='notification' href='order_received_summary.php'>" . count($carts) . "</a>";
                            }
                        }
                        echo "<a class='useror der' href='order_given_summary.php'> ትእዛዝ</a>";
                        echo "<a href='cart_summary.php'><img class='cart-img' src='static/header/img/cart.png' alt='cart'></a>";
                    } else {
                        echo "<a class='login' href='login.php'>መግብያ</a>";
                        echo "<a class='useror der' href='login.php'>ትእዛዝ</a>";
                        echo "<a href='login.php'><img class='cart-img' src='static/header/img/cart.png' alt='cart'></a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid null-margin">
        <div class="row ">
            <div class="col-md-12">
                <!-- Navigation -->
                <nav class="navbar navbar-expand-md custom-navbar nav-pd  text-left ">
                    <!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </button>
                    <!-- Navbar links -->
                    <div class="collapse navbar-collapse  nav-pd txt-color-white" id="collapsibleNavbar">
                        <ul class="navbar-nav ">
                            <li class="nav-item ">
                                <a class="nav-link white-text " href="index.php">ዋና ገጽ</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link white-text" href="product_categories.php">እቃዎች</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link white-text" href="organizations.php">የንግድ ድርጅቶች</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link white-text" href="salvaj.php">ሳልቫጅ</a>
                            </li>
                            <li class="nav-item ">
                                <?php
                                if (!isset($_SESSION['user_id'])) {
                                    echo "<a class='nav-link white-text' href='register.php'>ለመመዝገብ</a>";
                                } else {
                                    if ($shop) {
                                        $shop_id = $shop[0][0];
                                        echo "<a class='nav-link white-text' href='shop_detail.php?id=$shop_id'>" . $shop[0][3] . "</a>";
                                    }
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                    <!-- search -->
                    <form class="form-inline search-container " action="{% url 'product:search-results' %}" method="get">
                        <img class="search-icon" src="static/header/img/search-icon.png">
                        <input class='search-input' placeholder="የሚፈልጉትን እቃ ስም ያስገቡ" type="text" name="search-input" />
                        <button class="search-btn" type="submit">ፈልግ</button>
                    </form>
                </nav>
            </div>

        </div>
    </div>
</body>