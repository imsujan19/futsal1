<html>
 <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

	
    <style type="text/CSS">
		th,td{
			padding:5px; 
		}
	</style>

</head>
<body>
<?php
	date_default_timezone_set('Asia/Kathmandu');
    session_start();
   
        if($_SESSION['admin'] == 1) {
            include("../Final/Assets/admin_nav.php");
    }

?><br><br><br>

<?php

	//session_start();
	if($_SESSION['admin'] == 1 )
	{
		
		$connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Server.");
require 'config.php';

if (isset($_POST['approve'])) {
    $book_id = $_POST['bookingid'];
    $approv = "update booking set confirm_key = 11 where id = '$book_id'";
    $connect->query($approv);

    $fetchUserQuery = "SELECT email FROM booking WHERE id = '$book_id'";
    $approve = $connect->query($fetchUserQuery);

    if ($approve) {
        $user = $approve->fetch_assoc();
        $to = $user['email'];
        $subject = "Booking Approval";
        $message = "Your booking with ID $book_id has been approved. Thank you!";
        $headers = "From: sujan@gmail.com";

        mail($to, $subject, $message, $headers);
    }
}

if (isset($_POST['decline'])) {
    $book_id = $_POST['bookingid'];
    $declin = "delete from booking where id ='$book_id'";
    $connect->query($declin);
}

if (isset($_POST['delete'])) {
    $del_id = $_POST['del_id'];
    $del = "delete from register where id ='$del_id'";
    $connect->query($del);

    $fetchUserQuery = "SELECT email FROM register WHERE id = '$del_id'";
    $delete = $connect->query($fetchUserQuery);

    if ($delete) {
        $user = $delete->fetch_assoc();
        $to = $user['email'];
        $subject = "Account Deletion";
        $message = "Your account has been deleted by the admin. If you have any concerns, please contact us.";
        $headers = "From: sujan@gmail.com";

        mail($to, $subject, $message, $headers);
    }
}

		
$reqPending = "SELECT booking.*, payment.vno, payment.vimgloc FROM booking
LEFT JOIN payment ON booking.id = payment.booking_id
WHERE booking.confirm_key = 10;";
	$res = $connect->query($reqPending);
	$i=1;
?>
	<div style = "background-color: #eee;
				overflow:auto; 
				border:2px solid grey; 
				margin: 50px; 
				box-shadow: 10px 10px 5px #DCDCDC;"
				class="container">

				<h3><a name="pending"> Pending requests:</h3></a>
	
			<?php
			while($row = $res->fetch_assoc())
			{
				$email=$row['email'];
				$bookingid=$row['id'];
				$deadLine=$row['timecheck']; 
				// if ($deadLine-time()<13500)	
				// 	$connect->query("delete from booking where id= '$bookingid'");
				
				$que = "select id, lname from register where email = '$email'";
				$sqlrun = $connect->query($que);
				$user = $sqlrun->fetch_assoc();
					echo "<br><div class = 'row' style = 'border:2px;'>
					<div class='col-md-6'>
					<form method = 'post' action = 'admin.php'>
					<table border = '0'>
					<u><tr><td> Booking ID </td><td>: <b>".$row['id']."</b></td></tr></u>
					<tr><td> Booked By  </td><td><b>: ".$row['user'].'&nbsp'. $user['lname']."</b></tr>
					<tr><td> Booked Date </td><td> 	: ".$row['bookday']."</td></tr>
					<tr><td> User ID </td><td>		: ".$user['id']."</td></tr>
					<tr><td> Booked at </td><td> 	: ".date("Y/M/d (H:i:s)",$row['timecheck'])."</td></tr>
					<tr><td> Shift </td><td> 		: ".$row['shift']."</td></tr>
				
					<tr><td> Contact </td><td> 		: ".$row['contact']."</td></tr>
					<tr><td> Email  </td><td> 		: ".$row['email']."</td></tr>
					<tr><td > Payment deadLine </td><td> 	:<b style='background-color:orange;'>".date("Y  M  d ( H:i:s )",$deadLine)."</b></td></tr>
					<tr><td> Voucher no. </td><td> 		: ".$row['vno']."</td></tr>
					</table><br>
					<input type = 'hidden' name = 'email' value = ".$row['email'].">
					<input type = 'hidden' name = 'bookingid' value = ".$row['id'].">

					<input type = 'submit' class='button' name = 'approve' value = 'Approve'>
					<input type = 'submit' name = 'decline' class='button' value = 'Decline'>
					</form> </div>
					<div class='col-md-6'>
					<img src = ".$row['vimgloc']." height = '250' width = '350'>
					</div>
					</div><br><br>";
				$i++;
			}
			$i--;

			echo "<hr><h4>&emsp;
				<b>Total number of booking requests = ".$i." </b>
				</h4></div>";

			

				$approved = "SELECT booking.*, payment.vno, payment.vimgloc FROM booking
				LEFT JOIN payment ON booking.id = payment.booking_id
				WHERE booking.confirm_key = 11;";			
				$res = $connect->query($approved);
			$i=1;
?>
				<div style = "background-color: #eee;
				overflow:auto; 
				border:2px solid grey; 
				margin: 50px; 
				box-shadow: 10px 10px 5px #DCDCDC;"
				class="container">
				<h3><a name="approved">Approved requests: </a></h3>
<?php
			while($row = $res->fetch_assoc())
			{
				$email=$row['email'];
				$bookingid=$row['id'];
				$que = "select id,lname from register where email = '$email'";
				$sqlrun = $connect->query($que);
				$user = $sqlrun->fetch_assoc();
					echo "<br><div class='row'>
					<div class='col-md-6'>
					<form method = 'post' action = 'admin.php'>
					<table border = '0' >
					<u><tr><td> Booking ID </td><td>: <b>".$row['id']."</b></td></tr></u>
					<tr><td> Booked By  </td><td> 	: ".$row['user'].'&nbsp'. $user['lname']."</tr>
					<tr><td> Booked Date </td><td> 	: ".$row['bookday']."</td></tr>
					<tr><td> User ID </td><td>		: ".$user['id']."</td></tr>
					<tr><td> Booked at </td><td> 	: ".date("Y/M/d (H:i:s)",$row['timecheck'])."</td></tr>
					<tr><td> Shift </td><td> 		: ".$row['shift']."</td></tr>
					
					<tr><td> Contact </td><td> 		: ".$row['contact']."</td></tr>
					<tr><td> Email  </td><td> 		: ".$row['email']."</td></tr>
					<tr><td> Voucher no. </td><td> 	: ".$row['vno']."</td></tr>
					</table><br>
					<input type = 'hidden' name = 'email' value = ".$row['email'].">
					<input type = 'hidden' name = 'bookingid' value = ".$row['id'].">

					<input type = 'submit' name = 'decline' class='button' value = 'Cancel Booking'>
					</form> </div>
					<div class='col-md-6'>
					<img src = ".$row['vimgloc']." height = '250' width = '350'>
					</div>
					</div><br><br>";
					
				$i++;
			}
			$i--;
			echo "<hr><h4> &emsp;
			<b>Total number of approved bookings = ".$i." </b></h4></div>";
	} 
	else
	{
		header("Location: 404-page.php");
		exit(); 
			}
	$connect->close();
?>
</body>
</html>
