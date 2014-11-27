<?php // Вставка и удаление данных с помощью программы example_10.8.php

require_once 'login.php';
require_once 'mysql_fatal_error.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die(mysql_fatal_error('Невозможно подключиться к MySQL'));

mysql_select_db($db_database)
    or die(mysql_fatal_error('Невозможно выбрать базу данных'));

if (isset($_POST['author']) &&
    isset($_POST['title']) &&
    isset($_POST['category']) &&
    isset($_POST['year']) &&
    isset($_POST['isbn']))
{
    $author = get_post('author');
    $title = get_post('title');
    $category = get_post('category');
    $year = get_post('year');
    $isbn = get_post('isbn');

    $query = "INSERT INTO classics VALUES " .
        "('$author', '$title', '$category', $year, '$isbn')";
    if (!mysql_query($query))
        die(mysql_fatal_error('Сбой при вставке данных'));
}

if (isset($_POST['delete']) && (get_post('isbn') != ''))
{
    $isbn = get_post('isbn');
    $query = "DELETE FROM classics WHERE isbn = '$isbn'";
    if(!(mysql_query($query)))
        die(mysql_fatal_error('Сбой при удалении данных'));
}

echo <<< _END
<form action="example_10.8.php" method="post">
<pre>
  Author: <input type="text" name="author" />
   Title: <input type="text" name="title" />
Category: <input type="text" name="category" />
    Year: <input type="text" name="year" />
    ISBN: <input type="text" name="isbn" />
          <input type="submit" value="Добавить запись" /> <!--Кнопка Добавить запись-->
</pre>
</form>
_END;

$query = 'SELECT * FROM classics';
$result = mysql_query($query);

if (!$result)
    die(mysql_fatal_error('Сбой при доступе к базе данных'));

for($j=0;$j<mysql_num_rows($result);$j++)
{
    $row = mysql_fetch_row($result);
    echo <<< _END
<pre>
Автор: $row[0];
Навзание: $row[1];
Категория: $row[2];
Год издания: $row[3];
ISBN: $row[4];
</pre>
<form action="example_10.8.php" method="post">
<input type="hidden" name="delete" value="yes" />
<input type="hidden" name="isbn" value="$row[4]" />
<input type="submit" value="Удалить запись" /> <!--Кнопка Удалить запись-->
</form>

_END;

}

mysql_close($db_server);

function get_post($var)
{
    return mysql_real_escape_string($_POST[$var]);
}
