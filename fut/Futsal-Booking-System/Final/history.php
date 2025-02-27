<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings History</title>
    <link rel="stylesheet" href="">
    <style type="text/CSS">
        th, td {
            padding: 5px;
        }

        .container-main {
            margin-top: 20px;
        }
        
    </style>
</head>
<body>
<?php
session_start();

if ($_SESSION['admin'] == 1) {
    include("../Final/Assets/admin_nav.php");
} else {
    include("../Final/Assets/out_user_nav.php");
}

date_default_timezone_set('Asia/Kathmandu');
?><br>

<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
    $connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Server.");
    require 'config.php';


    
        $history = "select bookday from booking where confirm_key = 11";
                $test = $connect->query($history);
                $history=$test->fetch_assoc();
                /// BUGGGGGGGGGGGGGGGGGGGGGGGGGGGgg
                $bookday=$history['bookday'];
        
            $timestamp = strtotime($bookday);
            $timecheck = $timestamp + 86400;
            $t = time();
    
            if ($t >= $timecheck) {
                $updateQuery = "UPDATE booking SET confirm_key = 100 WHERE confirm_key = 11 ";
                $connect->query($updateQuery);
            }
    

    $historyQuery = "SELECT booking.id, booking.user, booking.id AS booking_id, booking.bookday, payment.vno
                    FROM booking
                    LEFT JOIN payment ON booking.id = payment.booking_id
                    WHERE booking.confirm_key = 100";
    
    $allBookings = $connect->query($historyQuery);
    $numBookings = $allBookings->num_rows;

    echo '<div class="container container-main" style="background-color: #eee;
                                        overflow:auto; 
                                        border:2px solid grey;  
                                        box-shadow: 10px 10px 5px #DCDCDC;
                                        width:95%;">';

    echo '<h3><u>Bookings History</u></h3><br>';

    if ($numBookings > 0) {
        echo '<div class="container">
                <table border="2" width="90%">
                    <tr>
                        <th>History ID</th>
                        <th>User</th>
                        <th>Booking ID</th>
                        <th>Booked Date</th>
                        <th>Voucher Number</th>
                    </tr>';

        while ($booking = $allBookings->fetch_assoc()) {
            echo "<tr> 
                    <td>" . $booking['id'] . "</td>
                    <td>" . $booking['user'] . "</td>
                    <td>" . $booking['booking_id'] . "</td>
                    <td>" . $booking['bookday'] . "</td>
                    <td>" . $booking['vno'] . "</td>
                  </tr>";
        }

        echo '</table></div>';
    } else {
        echo '<h5 style="color:#777;">No record!</h5>';
    }

    echo '</div>';
} else {
    header("Location: 404-page.php");
    exit();
}
?>

</body>
</html>
