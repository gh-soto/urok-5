<?php
header("Content-Type: text/html; charset=utf-8");
header("X-XSS-Protection: 0");
session_start();
$admin_login = 'admin';
$admin_password = '012345';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link href='https://fonts.googleapis.com/css?family=Play:400,700' rel='stylesheet' type='text/css'>
	<title>Завдання 1</title>
</head>
<body>
	<nav class="navbar navbar-default">
		<a class="btn btn-primary btn-block" href="index.php">головна</a>
		<a class="btn btn-default btn-block" href="task1.php">завдання 1</a>
	</nav>

	<div class="container">

		<?php

			if (isset($_POST['login']) && isset($_POST['password'])) {
				if ($_POST['login'] == $admin_login && $_POST['password'] == $admin_password) {
					$_SESSION['login'] = $_POST['login'];
					
				}
				else {
					print 'Wrong username or password';
				}
			}

			if (!isset($_SESSION['login'])) {
				print '<form  class="form-inline " role="form" action="task1.php" method="POST">
						<div class="form-group">
							<input class="form-control" type="text" name="login" placeholder="login: admin" required>
							<input class="form-control" type="password" name="password" placeholder="password: 012345" required>
							
							<input class="btn btn-danger" type="submit" name="submit" value="log in">
						<div>
						</form>' ;
			}
			else {
				print '<h3>Welcome!</h3><p><a href="session-destroy.php">log out</a>';
			}

		?>

	</div>
	
</body>
</html>