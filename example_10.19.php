<?php // Способ безопасного доступа к MySQL при использовании данных, введенных пользователем

function mysql_fix_string($string)
{
    if (get_magic_quotes_gpc()) stripslashes($string);
    return mysql_real_escape_string($string);
}

$user = mysql_fix_string($_POST['user']);
$pass = mysql_fix_string($_POST['pass']);
$query = "SELECT * FROM users WHERE user = '$user' AND pass = '$pass'";
