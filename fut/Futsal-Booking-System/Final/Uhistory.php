<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
    <style>
        th, td {
            padding: 5px;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container-main {
            background-color: #eee;
            overflow: auto;
            border: 2px solid grey;
            box-shadow: 10px 10px 5px #DCDCDC;
            width: 90%;
            max-width: 1200px; /* Limits the width */
            padding: 20px;
            border-radius: 10px;
        }

        h3 {
            text-decoration: underline;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<?php
session_start();

if (isset($_SESSION['email'])) {
    date_default_timezone_set('Asia/Kathmandu');
    include("../Final/Assets/user_nav.php");

    $connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Server.");
    require 'config.php';

    // Fetch booking history for the user
    $historyQuery = "SELECT bookday FROM booking WHERE confirm_key = 11 AND email = '" . $_SESSION['email'] . "'";
    $result = $connect->query($historyQuery);

    if ($result) {
        $history = $result->fetch_assoc();

        if ($history) {
            $bookday = $history['bookday'];
            $timestamp = strtotime($bookday);
            $timecheck = $timestamp + 86400; // 24 hours
            $currentTime = time();

            // If booking day has passed, update confirm_key
            if ($currentTime >= $timecheck) {
                $updateQuery = "UPDATE booking SET confirm_key = 100 WHERE confirm_key = 11 AND email = '" . $_SESSION['email'] . "'";
                $connect->query($updateQuery);
            }
        }
    }

    // Fetch confirmed bookings for the user
    $historyQuery = "SELECT booking.id, booking.user, booking.bookday, payment.vno
                    FROM booking
                    LEFT JOIN payment ON booking.id = payment.booking_id
                    WHERE booking.confirm_key = 100 AND booking.email = '" . $_SESSION['email'] . "'";

    $allBookings = $connect->query($historyQuery);
    $numBookings = $allBookings->num_rows;

    echo '<div class="container-main">';
    echo '<h3>Your Bookings History</h3>';

    if ($numBookings > 0) {
        echo '<table>
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
                    <td>" . $booking['id'] . "</td>
                    <td>" . $booking['bookday'] . "</td>
                    <td>" . $booking['vno'] . "</td>
                  </tr>";
        }

        echo '</table>';
    } else {
        echo '<h5>No booking history available!</h5>';
    }

    echo '</div>';
} else {
    header("Location: 404-page.php");
    exit();
}
?>

</body>
</html>
