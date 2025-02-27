<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking</title>
    <script src="javascript/jvs.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Oxygen', sans-serif;
            color: #eee;
        }

        .content {
            margin: 150px 20% 0 20%;
            font-size: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="date"] {
            color: #222;
            height: 30px;
        }

        .btn {
            background-color: #28a745;
            color: black;
            height: 30px;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        table {
            margin-top: 50px;
            width: 100%;
            text-align: center;
            border-spacing: 40px;
        }

        td {
            height: 50px;
            font-size: 22px;
        }

        .available {
            background-color: rgb(80, 238, 62);
        }

        .reserved {
            background-color: rgb(226, 238, 49);
        }

        .btn-group-justified button {
            font-size: 22px;
        }
    </style>
</head>

<body>

<?php
    session_start();
    include($_SESSION['email'] ? "../Final/Assets/in_user_nav.php" : "../Final/Assets/out_user_nav.php");

    date_default_timezone_set('Asia/Kathmandu');
    $connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Server.");
    require 'config.php';

    if (isset($_POST['dSubmit'])) {
        $bookdate = $_POST['bookdate'];
        $timestamp = strtotime($bookdate);
        if ($timestamp < time()) {
            echo '<script>alert("Sorry, you entered an expired date value! Please select a valid date."); window.location.replace("booking.php");</script>';
            exit;
        }
    } else {
        $bookdate = date('Y-m-d');
    }

    $allshifts = ['6 TO 7 AM', '7 TO 8 AM', '8 TO 9 AM', '9 TO 10 AM', '10 TO 11 AM', '11 TO 12 AM', '12 TO 1 PM', '1 TO 2 PM', '2 TO 3 PM', '3 TO 4 PM', '4 TO 5 PM', '5 TO 6 PM', '6 TO 7 PM', '7 TO 8 PM'];
    $allbookings_result = $connect->query("SELECT shift FROM booking WHERE bookday = '$bookdate'");

    $bookedShifts = [];
    while ($row = $allbookings_result->fetch_assoc()) {
        $bookedShifts[] = $row['shift'];
    }

    $availableShifts = array_diff($allshifts, $bookedShifts);
?>

    <div class="content">
        <form name="booking" method="POST">
            <label>Select Date:</label>
            <input type="date" name="bookdate" value="<?= isset($_POST['dSubmit']) ? $_POST['bookdate'] : $bookdate ?>" required>
            <input type="submit" class="btn" value="Check" name="dSubmit">
        </form>

        <form name="shiftselect" action="customer.php" method="POST">
            <b>Select your Shift for <u><?= $bookdate ?></u></b>
            <table>
                <tr>
                    <?php foreach ($allshifts as $index => $shift): ?>
                        <td class="<?= in_array($shift, $availableShifts) ? 'available' : 'reserved' ?>">
                            <input type="radio" name="shift" value="<?= $shift ?>" <?= !in_array($shift, $availableShifts) ? 'disabled' : '' ?>>
                            <strong><?= $shift ?></strong>
                        </td>
                        <?php if ($index === 6): ?>
                            </tr><tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            </table>
            <input type="hidden" name="bookdate" value="<?= $bookdate ?>">
            <input type="submit" class="btn" value="Proceed" name="proceed">
        </form>
    </div><br><br><br><br><br><br><br>

    <?php include "footer.php"; ?>

</body>
</html>
