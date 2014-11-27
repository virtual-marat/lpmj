<?php // Извлечение строк из таблицы cats
require_once 'login.php';
require_once 'mysql_fatal_error.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die(mysql_fatal_error("Невозможно подключиться к серверу базы данных"));

mysql_select_db($db_database) or
    die(mysql_fatal_error("Невозможно выбрать базу данных"));

$query = "SELECT * FROM cats";
$result = mysql_query($query);
if (!$result)
    die("Невозможно выполнить запрос");

echo <<< _END
<table>
<tr>
    <th>ID</th><th>Family</th><th>Name</th><th>Age</th>
</tr>
_END;

$rows = mysql_num_rows($result);
for ($i = 0; $i < $rows; $i++)
{
    $row = mysql_fetch_row($result);
    echo "<tr>";
    for ($j = 0; $j < 4; $j++)
    {
        echo "<td>" . $row[$j] . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

mysql_close($db_server);
