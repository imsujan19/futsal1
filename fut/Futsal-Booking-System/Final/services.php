<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="">

    <title>Home</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Oxygen", sans-serif;
        }

        body {
            background-color: #1d1d1d;
            color: white;
            text-align: center;
            padding: 40px;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h2 {
            color: #a1fe6b;
            font-size: 35px;
            margin-bottom: 30px;
            font-weight: 700;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .container {
            width: 70%;
            max-width: 800px;
            background-color: rgba(43, 43, 43, 0.9);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        button.down {
            background-color: rgba(43, 43, 43, 1);
            color: rgba(161, 254, 107, 1);
            cursor: pointer;
            padding: 15px 20px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 18px;
            transition: 0.4s;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .panel {
            padding: 0 18px;
            background-color: rgba(43, 43, 43, 1);
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            width: 100%;
        }

        .panel p {
            color: white;
            font-size: 18px;
        }

        img {
            height: 200px;
            width: 200px;
        }

        /* Responsive design for smaller screens */
        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            button.down {
                font-size: 16px;
                padding: 12px;
            }

            h2 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['email'])) {
        include("../Final/Assets/in_user_nav.php");
    } else {
        include("../Final/Assets/out_user_nav.php");
    }
    date_default_timezone_set('Asia/Kathmandu');
    ?>

    <div class="container">
        <span style="color:#eee">
            <h2>SERVICES</h2>
                <p>Major services:</p>
        </span>

        <button class="down">1. SWIMMING POOL</button>
        <button class="down">2. SHOPPING</button>
        <button class="down">3. BIG PARKING</button>
        <button class="down">4. FREE WIFI</button>
        <button class="down">5. CAFE</button>

    </div>

</body>

</html>
