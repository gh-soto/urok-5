<?php
header("Content-Type: text/html; charset=utf-8");
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
	<title>Завдання 2</title>
</head>
<body>
	<nav class="navbar navbar-default">
		<a class="btn btn-primary btn-block" href="index.php">головна</a>
		<a class="btn btn-default btn-block" href="task2.php">завдання 2</a>
	</nav>

	<div class="container container2">
		<form  role="form" action="task2.php" method="POST">
			<div class="form-group">

				<label for="file-title">File title:</label>
				<input class="form-control" type="text" name="file_title" id="file-title" placeholder="file title" required>

				<label for="comment">File content:</label>
				<textarea class="form-control" rows="5" name="file_content" id="comment" required></textarea>
				
				<input class="btn btn-info" type="submit" name="write_file" value="Write">

			<div>
		</form>
		<?php
		
			if ($_POST['file_title']) {

				if (!is_dir("task2-files/" . $_POST['file_title'])) {
					mkdir("task2-files/" . $_POST['file_title']);         
				}

				$fp = fopen("task2-files/" . $_POST['file_title'] . "/" . $_POST['file_title'] . ".txt", "a+");
				fwrite($fp, $_POST['file_content']);
				fclose($fp);
			}
						
		?>
	</div>
	
</body>
</html>