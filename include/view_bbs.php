<!DOCTYPE html>
<html lang='ja'>
    <head>
        <meta charset="UTF-8">
        <title>ひとこと掲示板サイト</title>
    </head>
    <body>
        <h1>ひとこと掲示板</h1>
        <form method="post">
            <label for="name">名前：<input type="text" name="name"></label>
            <label for="hitokoto">ひとこと：<input type="text" name="hitokoto"></label>
            <input type="submit" value="送信">
        </form>
       <?php 
            foreach ($data as $go) {
        ?>
        
        <tr>
            <td><?php print htmlspecialchars($go['name'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php print htmlspecialchars($go['comment'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php print htmlspecialchars($go['time'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>

        <?php
            }
        ?>
    </body>
</html>