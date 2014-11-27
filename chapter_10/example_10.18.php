<?php // Способ обезвреживания данных, введенных пользователем, приемлимый для MySQL
function mysql_fix_string($string)
{
    if (get_magic_quotes_gpc())
    {
        echo 'Волшебные кавычки включены<br />';
        stripslashes($string);
    } else
    {
        echo "Волшебные кавычки отключены<br />";
    }
    return mysql_real_escape_string($string);
}

echo mysql_fix_string("Привет мир!'");
