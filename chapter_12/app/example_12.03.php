 <?php // Программа example_10.08.php, переделанная для использования Smarty и сохраненная в файле example_12.03.php
 $path = $_SERVER['DOCUMENT_ROOT'];
 require "$path/lpmj/chapter_12/smarty/Smarty.class.php";

 $smarty = new Smarty();
 $smarty->template_dir = "$path/lpmj/chapter_12/app/templates";
 $smarty->compile_dir = "$path/lpmj/chapter_12/app/templates_c";
 $smarty->cache_dir = "$path/lpmj/chapter_12/app/cache";
 $smarty->config_dir = "$path/lpmj/chapter_12/app/configs";

 require "$path/lpmj/chapter_10/login.php";
 $db_server = mysql_connect($db_hostname, $db_username, $db_password);

 if (!$db_server) die("Невозможно подключиться к MySQL-серверу: " . mysql_error());

 mysql_select_db($db_database)
     or die("Невозможно выбрать базу данных: " . mysql_error());

 if (isset($_POST['author']) &&
     isset($_POST['title']) &&
     isset($_POST['category']) &&
     isset($_POST['year']) &&
     isset($_POST['isbn']))
 {
     $author = get_post('author');
     $title = get_post('title');
     $category = get_post('category');
     $year = get_post('year');
     $isbn = get_post('isbn');

     $query = "INSERT INTO classics VALUES" . "('$author', '$title', '$category', '$year', '$isbn')";

     if(!mysql_query($query))
         echo "Сбой при вставке данных: $query<br/>" . mysql_error();
 }

 if (isset($_POST['delete']))
 {
     $isbn = $_POST['isbn'];
     $query = "DELETE FROM classics WHERE isbn='$isbn'";
     if (!mysql_query($query))
         echo "Сбой при удалении данных: $query<br />" . mysql_error();
 }

 $query = "SELECT * FROM classics";

 $result = mysql_query($query);
 if (!$result) die("Сбой при доступе к базе данных: $query<br />" . mysql_error());
 $rows = mysql_num_rows($result);

 for ($i = 0; $i < $rows; ++$i)
     $results[] = mysql_fetch_array($result);

 mysql_close($db_server);

 $smarty->assign('results', $results);
 $smarty->display("$path/lpmj/chapter_12/app/templates/example_12.04.tpl");

 function get_post($var)
 {
     return mysql_real_escape_string($_POST[$var]);
 }