<?php // Использование указателей мест заполнения с PHP
require_once 'login.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die("Невозможно подключиться к серверу базы данных: " . mysql_error());

mysql_select_db($db_database) or
    die("Невозможно подключиться к базе данных: " . mysql_error());

$query = "PREPARE statement FROM 'INSERT INTO classics VALUES(?, ?, ?, ?, ?)'";
mysql_query($query);

$query = "SET @author = 'Emily Bronte',
              @title = 'Wuthering Heihgts',
              @category = 'Classic Fiction',
              @year = '1897',
              @isbn = '9780553212587'";
mysql_query($query);

$query = "EXECUTE statement USING @author, @title, @category, @year, @isbn";
mysql_query($query);

$query = "DEALLOCATE PREAPRE statement";
mysql_query($query);
