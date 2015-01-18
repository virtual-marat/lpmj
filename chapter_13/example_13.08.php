<?php // Извлечение переменных сессии перед ее уничтожением

session_start();

if (isset($_SESSION['username']))
{
    $username   = $_SESSION['username'];
    $password   = $_SESSION['password'];
    $forename   = $_SESSION['forename'];
    $surname    = $_SESSION['surname'];

    echo "С возвращением, $forename. <br />
          Ваше полное имя $forename $surname. <br />
          Ваше имя пользователя $username  и Ваш пароль $password.";
    destroy_session_and_data();
}
else
{
    echo "Пожалуйса, для входа <a href=\"example_13.05.php\">щелкните здесь</a>.";
}

function destroy_session_and_data()
{
    $_SESSION = array();
    setcookie(session_name(), "", time()-2592000, '/');
    session_destroy();
}