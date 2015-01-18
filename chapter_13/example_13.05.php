<?php // Открытие сессии после успешной аутентификации

require_once $_SERVER['DOCUMENT_ROOT'] . "/lpmj/chapter_10/login.php";

$db_server = mysql_connect($db_hostname, $db_username, $db_password) or
    die("Невозможно подключиться к MySQL: " . mysql_error());

mysql_select_db($db_database) or
    die("Невозможно выбрать базу данных: " . mysql_error());

if (isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER["PHP_AUTH_PW"])) {
    $un_temp    = mysql_entities_fix_string($_SERVER['PHP_AUTH_USER']);
    $pw_temp    = mysql_entities_fix_string($_SERVER['PHP_AUTH_PW']);

    $query      = "SELECT * FROM users WHERE username = '$un_temp'";
    $result     = mysql_query($query);

    if (!$result)
        die('Сбой при доступе к базе данных: ' . mysql_error());
    elseif (mysql_num_rows($result))
    {
        $row    = mysql_fetch_row($result);
        $salt1  = "qm&h*";
        $salt2  = "pg!@";
        $token  = md5("$salt1$pw_temp$salt2");
        if ($token == $row[3])
        {
            session_start();
            $_SESSION['username']   = $un_temp;
            $_SESSION['password']   = $pw_temp;
            $_SESSION['forename']   = $row[0];
            $_SESSION['surname']    = $row[1];
            echo "$row[0] $row[1]: Привет $row[0], теперь Вы зарегистрированы под именем '$row[2]'";
            die("<p><a href='example_13.08.php'>Щелкните здесь для продолжения</a></p>");
        }
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
    die("Пожалуйста введите имя пользователя и пароль.");
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