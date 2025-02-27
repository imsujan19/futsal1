<!DOCTYPE html>
<html>
    <head><title>About Futsal</title>
    	<script src="javascript/jvs.js"></script>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About</title> 
    </style>>
    </head>
<?php
    session_start();
    if(isset($_SESSION['email'])){
            include("../Final/Assets/in_user_nav.php");
    } else {
        include("../Final/Assets/out_user_nav.php");
    }
    date_default_timezone_set('Asia/Kathmandu');
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   <?php include "footer.php"; ?>