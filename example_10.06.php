<?php // Замена цикла for для построчного извлечения результата 

require_once 'login.php';
require_once 'mysql_fatal_error.php';

echo 'p' . 'Это файл example_10.6.php' . '</p>';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die(mysql_fatal_error('Невозможно подключиться к серверу MySQL'));

mysql_select_db($db_database)
    or die(mysql_fatal_error('Невозможно выбрать базу данных MySQL'));

$query = 'SELECT * FROM classics';
$result = mysql_query($query);
if (!$result)
    die(mysql_fatal_error('Сбой при доступе к базе данных'));

for($j=0; $j < mysql_num_rows($result); $j++){
    $row = mysql_fetch_row($result);
    echo 'Автор: ' . $row[0] . '<br />';
    echo 'Название:' . $row[1] . '<br />';
    echo 'Категория: ' . $row[2] . '<br />';
    echo 'Год издания: ' . $row[3] . '<br />';
    echo 'ISBN: ' . $row[4] . '<br />' . '<br />';
}
