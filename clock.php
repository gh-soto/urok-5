<?php
header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="refresh" content="1">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link href='https://fonts.googleapis.com/css?family=Play:400,700' rel='stylesheet' type='text/css'>
	<title>PHP clock</title>
</head>
<body>
	<nav class="navbar navbar-default">
		<a class="btn btn-primary btn-block" href="index.php">головна</a>
		<a class="btn btn-default btn-block" href="clock.php">завдання 3 (годинник)</a>
	</nav>

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



	<div class="analog">
		<img id="tlo" src="clock/tlo.svg">
		<div>
		
			<?php 
				
			//розрахунок повороту стрілок (векторних зображень)

				function analog_clock($i) {
					$date_time_array = getdate(time());
					return $date_time_array[$i];
				}


				//стрілка для годин
				if (analog_clock(hours) >= 13) { 
					$analog_hour = 30 * (analog_clock(hours) - 12) + analog_clock(minutes)/2;
				}
				else {
					$analog_hour = 30 * analog_clock(hours) + analog_clock(minutes)/2;
				}
				print '<img style="-moz-transform: rotate(' . $analog_hour . 'deg);
					 -o-transform: rotate(' . $analog_hour . 'deg);
					 -webkit-transform: rotate(' . $analog_hour . 'deg);" id="second" src="clock/hour.svg">';


				//стрілка для хвилин
				print '<img style="-moz-transform: rotate(' . (6 * analog_clock(minutes) + analog_clock(seconds)/10) . 'deg);
					 -o-transform: rotate(' . (6 * analog_clock(minutes) + analog_clock(seconds)/10) . 'deg);
					 -webkit-transform: rotate(' . (6 * analog_clock(minutes) + analog_clock(seconds)/10) . 'deg);" id="second" src="clock/minute.svg">';


				//стрілка для секунд
				print '<img style="-moz-transform: rotate(' . (6 * analog_clock(seconds)) . 'deg);
					 -o-transform: rotate(' . (6 * analog_clock(seconds)) . 'deg);
					 -webkit-transform: rotate(' . (6 * analog_clock(seconds)) . 'deg);" id="second" src="clock/second.svg">';

			
			?>
		</div>

	</div>
</body>
</html>