<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page after login</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="">
   

    <link href='' rel='stylesheet'>

</head>

<body>

<?php
date_default_timezone_set('Asia/Kathmandu');

    session_start();
    if(isset($_SESSION['email'])){
        include("../Final/Assets/in_user_nav.php");
        }
     else {
        include("../Final/Assets/out_user_nav.php");
    }
?>
    
    <div class="containerr">
        <div class="slides-wrapper">
            <div class="slider">
                <img id="slide-1" src="../Final/img/manchester.jpg">
            </div>
        </div>
    </div>

    </div><br><br><br>

    <div class="welcome">
        <h1>Welcome to FBS</h1>
        </div>
              <div class="court2">
                <img src="../Final/img/futsalA.jpeg">
                    <p>FBS is shaping the future of futsal in Nepal, recognized for its commitment to player development. With a focus on both training and fun, futsal plays a crucial role in advancing soccer skills for players of every level.</p>                 
    </div><br><br><br>

    <div class="location">
        <h1>Some of the World-class athletes</h1>

    </div>

    

    <div class="court-container">
        <div class="court-box">
            <div class="court">
                <div class="court-img">
                    <img id="court-1" src="../Final/img/pele.jpg">
                    <h1 class="court-name">PELÉ</h1>
                </div>
                <div class="court-img">
                    <img id="court-1" src="../Final/img/messi.jpg">
                    <h1 class="court-name">MESSI</h1>
                </div>
                <div class="court-img">
                    <img id="court-1" src="../Final/img/rd.jpg">
                    <h1 class="court-name" >RONALDO</h1>
                </div>
             </div>
        </div>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
    </body>
    
    </html> 
    <?php include("footer.php"); ?>