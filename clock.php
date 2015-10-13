<?php
header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="refresh" content="1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>analog clock</title>
</head>
<body>
	<div class="container">
		<img id="tlo" src="clock/tlo.svg">
		<div>
			<?php

				function analog_clock ($i) {
					$date_time_array = getdate(time());
					return $date_time_array[$i];
				}

				if (analog_clock (hours) >= 13) { 
					$analog_hour = analog_clock (hours) - 12;
				}

				print '<img style="-moz-transform: rotate(' . 30*$analog_hour . 'deg);
					 -o-transform: rotate(' . 30*$analog_hour . 'deg);
					 -webkit-transform: rotate(' . 30*$analog_hour . 'deg);" id="second" src="clock/hour.svg">';

				print '<img style="-moz-transform: rotate(' . 6*analog_clock (minutes) . 'deg);
					 -o-transform: rotate(' . 6*analog_clock (minutes) . 'deg);
					 -webkit-transform: rotate(' . 6*analog_clock (minutes) . 'deg);" id="second" src="clock/minute.svg">';

				print '<img style="-moz-transform: rotate(' . 6*analog_clock (seconds) . 'deg);
					 -o-transform: rotate(' . 6*analog_clock (seconds) . 'deg);
					 -webkit-transform: rotate(' . 6*analog_clock (seconds) . 'deg);" id="second" src="clock/second.svg">';

				/*
				<img id="hour" src="clock/hour.svg">
				<img id="minute" src="clock/minute.svg">
				<img id="second" src="clock/second.svg">
				*/
			?>
		</div>

	</div>

	<div class="digital">
		<ul>
			<?php 

				function digital_clock ($i) {
					$date_time_array = getdate(time());
					
					if ($date_time_array[$i] < 10) {
						$number = '0' . $date_time_array[$i];
					}
					else {
						$number = $date_time_array[$i];
					}

					return $number;
				}

				print 	'<li>' . digital_clock(hours) . '</li>
						<li>:</li>
						<li>' . digital_clock(minutes) . '</li>
						<li>:</li>
						<li>' . digital_clock(seconds) . '</li>';
			
			?>
		</ul>
	</div>
</body>
</html>