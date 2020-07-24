<!DOCTYPE html>
<html>

<head>
  <title>ሁሉንም│ መመዝገብያ</title>
</head>

<body>
  <form action="includes/register.php" method="POST">
    <input type="text" name="email"><br>
    <input type="password" name="password"><br>
    <button type="submit" name="submit">register</button>
    <?php 
    echo "test123";
    echo "<br>";
    echo password_hash("test123", PASSWORD_DEFAULT);    
    ?>
  </form>  
</body>

</html>