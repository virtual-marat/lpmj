<!-- Файл example_12.04.tpl -->
<html>
    <head>
        <title>Smarty Test</title>
    </head>
    <body>
        <form method="post" action="example_12.03.php"><pre>
              Author: <input type="text" name="author" />
               Title: <input type="text" name="title" />
            Category: <input type="text" name="category" />
                Year: <input type="text" name="year" />
                ISBN: <input type="text" name="isbn" />
                      <input type="submit" value="ADD RECORD"
        </pre></form>

        {section name=row loop=$results}
            <form method="post" action="example_12.03.php"><pre>
                <input type="hidden" name="delete" value="yes" />
                <input type="hidden" name="isbn" value="{$results[row].isbn}" />
                Author:     {$results[row].author}
                Title:      {$results[row].title}
                Category:   {$results[row].category}
                Year:       {$results[row].year}
                ISBN:       {$results[row].isbn}
                            <input type="submit" value="DELETE RECORD" />
            </pre></form>
        {/section}
    </body>
</html>