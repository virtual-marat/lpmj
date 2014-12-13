<?php // PHP-аутентификация
if (isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER['PHP_AUTH_PW']))
{
    echo    "Добро пожаловать, пользователь: " . $_SERVER['PHP_AUTH_USER'] .
            ", имеющий пароль: "               . $_SERVER['PHP_AUTH_PW'];
}
else
{
    header('WWW-Authenticate: Basic realm="Restricted Section"');   // Окно с приглашением
    header('HTTP/1.0 401 Unauthorized');                            // Если пользователь щелкнет на кнопке Отмена
    die("Пожалуйста, введите имя пользователя и пароль");
}
