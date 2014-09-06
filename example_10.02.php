<?php // Подключение к базе данных MySQL

require_once 'login.php';
require_once 'mysql_fatal_error.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if (!$db_server) 
  die(mysql_fatal_error('Невозможно подключиться к MySQL'));

echo '<p>' . 'Это файл example_10.2.php' . '</p>';
