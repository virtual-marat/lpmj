<?php // Описание таблицы cats
require_once 'login.php';
require_once 'mysql_fatal_error.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die(mysq_fatal_error("Невозможно подключиться к сервеу базы данных"));

mysql_select_db($db_database) or
    die(mysql_fatal_error("Невозможно подключиться к базе данных"));

$query = "DESCRIBE cats";
$result = mysql_query($query);
if (!$result)
    die(mysql_fatal_error("Невозможно выполнить запрос к базе данных"));

echo <<<_END
<table>
<tr>
    <th>Column</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th>
</tr>
_END;

$rows = mysql_num_rows($result);
for ($i = 0; $i < $rows; $i++)
{
    $row = mysql_fetch_row($result);
    echo "<tr>" .
            "<td>" . $row[0] . "</td>" . "<td>" . $row[1] . "</td>" . "<td>" . $row[2] . "</td>" . "<td>" . $row[3] . "</td>" . "<td>" . $row[4] . "</td>" . "<td>" . $row[5] . "</td>" .
         "</tr>";
}

echo "</table>";

mysql_close($db_server);
