<?php
/**
 * Created by PhpStorm.
 * User: Marat
 * Date: 16.08.14
 * Time: 14:57
 */
require_once 'login.php';
require_once 'mysql_fatal_error.php';
echo '<p>' . 'Это файл example_10.3.php' . '</p>';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die(mysql_fatal_error('Невозможно подключиться к серверу MySQL'));
mysql_select_db($db_database)
    or die(mysql_fatal_error('Невозможно подключиться к базе данных'));
