<?php // Отправка запроса к базе данных MySQL

require_once('login.php');
require_once('mysql_fatal_error.php');

echo '<p>' . 'Это файл example_10.4.php' . '</p>';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die(mysql_fatal_error('Неовзможно подключиться к серверу MySQL'));

mysql_select_db($db_database)
    or die(mysql_fatal_error('Невозможно подключиться к базе данных MySQL'));

$query = 'SELECT * FROM classics';
$result = mysql_query($query);

if (!$result)
    die(mysql_fatal_error('Сбой при доступе к базе данных'));
