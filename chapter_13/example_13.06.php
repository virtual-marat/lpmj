<?php // Извлечение переменных сессии
session_start();

if (isset($_SESSION['username']))
{
    $username   = $_SESSION['username'];
    $password   = $_SESSION['password'];
    $forename   = $_SESSION['forename'];
    $surname    = $_SESSION['surname'];

    echo "С возвращением, $forename. <br />
      Ваше полное имя $forename $surname. <br />
      Ваше имя пользователя $username и ваш пароль $password.";
}
else
    echo "Пожалуйста, для входа <a href=\"example_13.05.php\">щелкните здесь</a>.";
