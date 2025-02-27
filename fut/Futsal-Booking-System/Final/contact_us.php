
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact Us</title>

<?php
    session_start();
    if(isset($_SESSION['email'])){
            include("../Final/Assets/in_user_nav.php");
    } else {
        include("../Final/Assets/out_user_nav.php");
    }
   
?>

 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            
    <?php
    include "footer.php";
    ?>
</body>
</html>