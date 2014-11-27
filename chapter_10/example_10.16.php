<?php // Добавление данных к таблице cats и отчет о вставленном id
require_once 'login.php';
require_once 'mysql_fatal_error.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die(mysql_fatal_error("Невозможно подключиться к серверу базы данных"));

mysql_select_db($db_database) or
    die(mysql_fatal_error("Невозможно выбрать базу данных"));

$query = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 5)";
$result = mysql_query($query);
if (!$result)
    die(mysql_fatal_error("Невозможно выполнить запрос"));

echo "Значение вставленного ID равно: " . mysql_insert_id();

mysql_close($db_server);
