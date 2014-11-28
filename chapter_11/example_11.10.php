<?php // Программа перевода значений между шкалами Цельсия и Фаренгейта
require_once('example_11.09.php');
$f = $c = 0;

if (isset($_POST['f'])) $f = sanitizeString($_POST['f']);
if (isset($_POST['c'])) $c = sanitizeString($_POST['c']);

if ($f != '')
	{
		$c = intval((5 / 9) * ($f - 32));
		$out = "$f равно $c C";
	}
elseif ($c != '') 
	{
		$f = intval((9 / 5) * ($c + 32));
		$out = "$c равно $f F";
	}
else
	$out = "";

echo <<<_END
<html>
	<head>
		<title>Программа перевода температуры</title>
	</head>
	<body><pre>
	Введите температуру по Фаренгейту и Цельсию и щелкните на кнопке Перевести

	<b>$out</b>
	<form method="post" action="example_11.10.php">
	По Фаренгейту: <input type="text" name="f" />
	   По Цельсию: <input type="text" name="c" />
		<input type="submit" value="Перевести" />
	</form>
	</pre></body>
</html>
_END;
?>