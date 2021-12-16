<pre>
<?php
$now = date('Y時m分d日 H:i:s');
session_start();
print 'セッション名: ' . session_name() . "\n";
print 'セッションID: ' . session_id() . "\n";

if (isset($_SESSION['count'])) {
   $_SESSION['count']++;
   $count = $_SESSION['count'];
   print ($count . '回目の訪問です' . "\n");
}else{
    $_SESSION['count'] = 1;
    print ('初めての訪問です' . "\n");
}