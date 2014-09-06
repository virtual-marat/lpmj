<?php // Выполнение запроса с видом объединения NATURAL JOIN
require_once 'login.php';
require_once 'mysql_fatal_error.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die(mysql_fatal_error("Невозможно подключиться к серверу базы данных"));

mysql_select_db($db_database) or
    die(mysql_fatal_error("Невозможно выбрать базу данных"));

$query = "SELECT name, isbn, title, author FROM customers NATURAL JOIN classics";
$result = mysql_query($query);
if (!$result)
    die("Невозможно выполнить запрос");

$num_rows = mysql_num_rows($result);
for ($i = 0; $i < $num_rows; $i++)
{
    $row = mysql_fetch_row($result);
    echo "Клиент $row[0] приобрел книги: <br /> $row[3] '$row[2]' <br />";
}

mysql_close($db_server);
