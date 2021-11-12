<?php
$uploader = "./image/";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $upload = $uploader . basename($_FILES['userfile']['name']);
    move_uploaded_file($_FILES['userfile']['tmp_name'],$upload);
    $filename = basename($_FILES['userfile']['name']);
    var_dump($filename);
}
?>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>テスト</title>
</head>
<body>
 <form enctype="multipart/form-data"  action="test.php" method="POST">
  <input type="hidden" name="name" value="value" />
  アップロード: <input name="userfile" type="file" />
  <input type="submit" value="ファイル送信" />
</form>
</body>
</html>