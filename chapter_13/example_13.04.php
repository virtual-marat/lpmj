<?php // PHP-аутентификация с использованием MySQL
require_once $_SERVER['DOCUMENT_ROOT'] . "/lpmj/chapter_10/login.php";

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server)
    die('Невозможно подключиться к MySQL: ' . mysql_error());

mysql_select_db($db_database) or
    die('Невозможно выбрать базу данных: ' . mysql_error());

if (isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER['PHP_AUTH_PW']))
{
    $un_temp    = mysql_entities_fix_string($_SERVER['PHP_AUTH_USER']);
    $pw_temp    = mysql_entities_fix_string($_SERVER['PHP_AUTH_PW']);

    $query      = "SELECT * FROM users WHERE username='$un_temp'";
    $result     = mysql_query($query);
    if (!$result)
        die("Сбой при доступе к базе данных: " . mysql_error());
    elseif (mysql_num_rows($result))
    {
        $row    = mysql_fetch_row($result);
        $salt1  = "qm&h*";
        $salt2  = "pg!@";
        $token  = md5("$salt1$pw_temp$salt2");

        if ($token == $row[3])
            echo "$row[0] $row[1] : Привет $row[0], теперь Вы зарегистрированы под именем $row[2]";
        else
            die("Неверная комбинация имя пользователя-пароль.");
    }
    else
        die("Неверная комбинация имя пользователя-пароль.");
}
else
{
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die("Пожалуйста, введите имя пользователя и пароль.");
}

function mysql_entities_fix_string($string)
{
    return htmlentities(mysql_fix_string($string));
}

function mysql_fix_string($string)
{
    if (get_magic_quotes_gpc())
        $string = stripcslashes($string);
    return mysql_real_escape_string($string);
}
