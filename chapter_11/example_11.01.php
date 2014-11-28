<?php // exmaple_11.01.php - простой обработчик формы на PHP
echo <<<_END
<html>
	<head>
		<title>Form Test</title>
	</head>
	<body>
		<form method="POST" action="example_11.01.php">
			Как Вас зовут?
			<input type="text" name="name">
			<input type="submit">
		</form>
	</body>
</html>
_END;
?>
