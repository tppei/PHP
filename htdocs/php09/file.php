<?php
 
$filename = './file_write.txt';
$comment = '';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
 
    if (isset($_POST['comment'])) {
        $comment = $_POST['comment'];
    }
    $fp = fopen($filename, 'a');
    if ($fp) {
        if (!fwrite($fp, $comment)) {
            print 'ファイル書き込み失敗:  ' . $filename;
        }
        fclose($fp);
    }
}
 
$data = [];
 
if (is_readable($filename)) {
    $fp = fopen($filename, 'r');
    if ($fp) {
        while (($tmp = fgets($fp)) !== FALSE) {
            $data[] = htmlspecialchars($tmp, ENT_QUOTES, 'UTF-8');
        }
        fclose($fp);
    }
} else {
    $data[] = 'ファイルがありません';
}
 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ファイル操作</title>
</head>
<body>
    <h1>ファイル操作</h1>
 
    <form method="post">
        <input type="text" name="comment">
        <input type="submit" name="submit" value="送信">
    </form>
 
    <p>以下に<?php print $filename; ?>の中身を表示</p>
<?php foreach ($data as $read) { ?>
    <p><?php print $read; ?></p>
<?php } ?>
</body>
</html>