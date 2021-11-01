<pre>
<?php
$time = date("s");
if($time == 0){
    print "ジャストタイム!! \n アクセスした時間は" . $time .'でした。';
}else if ($time == 11 || $time == 22 || $time == 33 || $time == 44 || $time == 55){
    print "ゾロ目! \n  アクセスした時間は" . $time . 'でした。';
}else{
    print "はずれ \n アクセスした時間は" . $time . 'でした。';
}
?>
</pre>
