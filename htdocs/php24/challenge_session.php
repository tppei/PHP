<pre>
<?php
$now = date('Y時m分d日 H:i:s');
session_start();
print 'セッション名: ' . session_name() . "\n";
print 'セッションID: ' . session_id() . "\n";

if (isset($_SESSION['count'])) {
   $_SESSION['count']++;
   $count = $_SESSION['count'];
   $visit_history = $_COOKIE['prelog'];
   setcookie('prelog', $now);
   print ($count . '回目の訪問です' . "\n");
   print("現在の日時は" . $now . "<br>");
   print("前回のアクセス日時は" . $visit_history . "<br>");
} else {
   $_SESSION['count'] = 1;
   setcookie('prelog',$now);
   $count = $_SESSION['count'];
   setcookie('prelog', $now);
   print ('初めての訪問です' . "\n");
   print("現在の日時は" . $now . "<br>");
}

?>
</pre>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Cookie</title>
</head>
<body>
 <form method = 'post'>
    <input type="submit" name="delete" value="履歴削除">
</form>
</body>
</html>
