<?php // Удаление сведений о пуме Growler из таблицы cats
require_once 'login.php';
require_once 'mysql_fatal_error.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die(mysql_fatal_error("Невозможно подключиться к серверу базы данных"));

mysql_select_db($db_database) or
    die(mysql_fatal_error("Невозможно выбрать базу данных"));

$query = "DELETE FROM cats WHERE name='Growler'";
$result = mysql_query($query);
if (!$result)
    die(mysql_fatal_error("Невозможно выполнить запрос"));

mysql_close($db_server);
