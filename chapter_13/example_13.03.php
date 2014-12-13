<?php // Создание таблицы users и добавление к ней двух учетных записей

require_once $_SERVER['DOCUMENT_ROOT'] . '/lpmj/chapter_10/login.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if (!$db_server)
    die('Невозможно подключиться к MySQL: ' . mysql_error());

mysql_select_db($db_database) or
    die('Невозможно выбрать базу данных: ' . mysql_error());

$query = "CREATE TABLE users (
            forename  VARCHAR(32) NOT NULL,
            surname   VARCHAR(32) NOT NULL,
            username  VARCHAR(32) NOT NULL,
            password  VARCHAR(32) NOT NULL)";

$result = mysql_query($query);
if (!$result)
    die('Сбой при доступе к базе данных: ' . mysql_error());

$salt1 = "qm&h*";
$salt2 = "pg!@";

$forename   = 'Bill';
$surname    = 'Smith';
$username   = 'bsmith';
$password   = "mysecret";
$token      = md5("$salt1$password$salt2");
add_user($forename, $surname, $username, $token);

$forename   = 'Pauline';
$surname    = 'Jones';
$username   = 'pjones';
$password   = 'acrobat';
$token      = md5("$salt1$password$salt2");
add_user($forename, $surname, $username, $token);

function add_user ($fn, $sn, $un, $pw)
{
    $query = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";
    $result = mysql_query($query);
    if (!$result)
        die('Сбой при доступе к базе данных: ' . mysql_error());
}
