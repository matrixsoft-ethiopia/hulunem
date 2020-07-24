<?php
include_once 'dbh.php';
session_start();

// check if button is clicked
if (isset($_POST['submit'])) {
    $owner = $_SESSION['user_id'];
    $shop_check_query = "SELECT * FROM shops WHERE owner = '$owner' LIMIT 1;";
    $result = mysqli_query($conn, $shop_check_query);
    $shop = mysqli_fetch_all($result);

    if ($shop) {
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $des = mysqli_real_escape_string($conn, $_POST['des']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $min_order = mysqli_real_escape_string($conn, $_POST['min_order']);
        $shop_id = $shop[0][0];
        //image uploading
        $img =  $_FILES['img'];

        $fileName =  $_FILES['img']['name'];
        $fileTmpName =  $_FILES['img']['tmp_name'];
        $fileSize =  $_FILES['img']['size'];
        $fileError =  $_FILES['img']['error'];
        $fileType =  $_FILES['img']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('hulunem', true) . "." . $fileActualExt;
                    $fileDestination = "../uploads/products/" . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);                    
                } else {
                    $_SESSION['pro_msg'] = "የመረጡት ምስል ከ 1 ሜጋ ባይት በላይ ነው";
                }
            } else {
                $_SESSION['pro_msg'] = "ምስሉን ለመጫን ችግር ስላጋጠመ እባክዎን እንደገና ይሞክሩ";
            }
        } else {
            $_SESSION['pro_msg'] = "የመረጡት የምስል አይነት አይታወቅም";
        }
        if (!$_SESSION['pro_msg']) {

            $sql = "INSERT INTO products (shop, category, pro_name, pro_des, price, min_order,img) VALUES ('$shop_id','$category', '$name', '$des', '$price', '$min_order', '$fileNameNew');";
            mysqli_query($conn, $sql);

            $_SESSION['pro_msg'] = "በተሳካ ሁኔታ መዝግበዋል";
            header("Location:../add_product.php?register=success");
        } else {
            header("Location:../add-shop.php?register=failed");
        }
    } else {
        $_SESSION['pro_msg'] = "እቃዎችን ለመመዝገብ በስርዎ የተመዘገበ ድርጅት ሊኖር ይገባል";
        header("Location:../add-shop.php?register=failed");
    }
}
