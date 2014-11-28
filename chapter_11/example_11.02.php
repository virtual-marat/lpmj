<?php // Обновленная версия example_11.01.php
if (isset($_POST['name'])) $name = $_POST['name'];
	else $name = 'Не введено';
echo <<<_END
	<html>
		<head>
			<title>Form Test</title>
		</head>
		<body>
			Вас зовут: $name<br />
			<form method = "POST" action="example_11.02.php">
				Как Вас зовут?
				<input type="text" name="name">
				<input type="submit">
			</form>
		</body>
	</html>
_END;
?>
