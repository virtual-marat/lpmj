<?php // Выполнение вторичного запроса
require_once 'login.php';
require_once 'mysql_fatal_error.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die(mysql_fatal_error("Невозможно подключиться к серверу базы данных"));

mysql_select_db($db_database) or
    die(mysql_fatal_error("Невозможно подключиться к базе данных"));

$query = "SELECT * FROM customers";
$result = mysql_query($query);
if (!$query)
    die("Невозможно выполнить запрос");

$num_rows = mysql_num_rows($result);

for ($i = 0; $i < $num_rows; $i++)
{
    $row = mysql_fetch_row($result);
    $isbn = $row[1];

    $sub_query = "SELECT author, title FROM classics WHERE isbn=$isbn";
    $sub_result = mysql_query($sub_query);
    if (!$sub_result)
        die(mysql_fatal_error("Невозможно выполнить запрос"));
    $sub_row = mysql_fetch_row($sub_result);

    echo "Клиент $row[0] приобрел книги:<br /> $sub_row[0] '$sub_row[1]' <br />";
}

mysql_close($db_server);
