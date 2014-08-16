<?php // Поячеечное извлечение результата
require_once('login.php');
require_once('mysql_fatal_error.php');

echo 'Это файл example_10.5.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die(mysql_fatal_error('Невозможно подключиться к серверу MySQL'));

mysql_select_db($db_database)
    or die(mysql_fatal_error('Невозможно выбрать базу данных MySQL'));

$query = 'SELECT * FROM classics';
$result = mysql_query($query);
if (!$result) die(mysql_fatal_error('Сбой при доступе к базе данных'));

$row = mysql_num_rows($result);
for($j = 0; $j < $row; $j++) {
    echo 'Автор: ' . mysql_result($result, $j, 'author') . '<br />';
    echo 'Название: ' . mysql_result($result, $j, 'title') . '<br />';
    echo 'Категория: ' . mysql_result($result, $j, 'category') . '<br />';
    echo 'Год издания: ' . mysql_result($result, $j, 'year') . '<br />';
    echo 'ISBN: ' . mysql_result($result, $j, 'isbn') . '<br />' . '<br />';
}
