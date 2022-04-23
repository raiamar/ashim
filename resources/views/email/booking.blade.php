<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Table Reservation</title>
</head>
<body>
	<b>Dear Mr/Mrs {{$mail['full_name']}}</b>
	<br>
	<p>Thank You for making reservation of {{$mail['booking_seat']}} at Helmetsss.</p>
	<p>We will be awiting your arriavle on {{$mail ['booking_date']}}.</p>
	<br>
	<b>Thank You</b>
	<br>
	<u>Helmetsss</u>
</body>
</html>