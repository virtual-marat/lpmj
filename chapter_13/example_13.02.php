<?php // PHP-аутентификация с проверкой вводимой инофрмации

$username   = "admin";
$password   = "letmein";

if (isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER['PHP_AUTH_PW']))
{
    if ($_SERVER['PHP_AUTH_USER'] == $username &&
        $_SERVER['PHP_AUTH_PW'] == $password)
    {
        echo "Регистрация прошла успешно.";
    }
    else
    {
        die("Неверная комбинация имя пользователя-пароль.");
    }
}
else
{
    header('WWW-Authenticate: Basic relam="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    echo("Пожалуйтса, введите имя пользователя и пароль.");
}
