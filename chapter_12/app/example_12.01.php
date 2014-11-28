<?php // Программа example_12.01.php
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/lpmj/chapter_12/smarty/Smarty.class.php";

$smarty = new Smarty();
$smarty->template_dir   =   "$path/lpmj/chapter_12/app/templates";
$smarty->compile_dir    =   "$path/lpmj/chapter_12/app/templates_c";
$smarty->cache_dir      =   "$path/lpmj/chapter_12/app/cache";
$smarty->config_dir     =   "$path/lpmj/chapter_12/app/configs";

$smarty->assign('title', 'Тестовая веб-станица');
$smarty->display("$path/lpmj/chapter_12/app/templates/example_12.02.tpl");

