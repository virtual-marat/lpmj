<?php // Функция для предотвращения атак внедрения SQL и XSS

function mysql_entities_fix_string ($string)
{
    return htmlentities(mysql_fix_string($string));
}

function mysql_fix_string ($string)
{
    if (get_magic_quotes_gpc()) stripslashes($string);
    return mysql_real_escape_string($string);
}
