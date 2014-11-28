<?php // Функции sanitizeString и sanitizeMySQL

function sanitizeString($var)
{
	$var = stripcslashes($var); // избавляемся от слэш-символов
	$var = htmlentities($var);	// избавляемся от любого HTML-кодв
	$var = strip_tags($var);	// избавляемся от HTML
	return $var;
}

function sanitizeMySQL($var)
{
	$var = mysql_real_escape_string($var);	// избавляемся от escape-символов
	$var = sanitizeString($var);
	return $var;
}
?>
