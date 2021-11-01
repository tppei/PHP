<pre>
<?php
$random1 = mt_rand(0,2);
$random2 = mt_rand(0,2);

print 'random1:' . $random1 . "\n";

print 'random2:' . $random2 . "\n";


if($random1 > $random2){
    print 'random1の方が大きいです';
}else if($random2 > $random1){
    print 'random2の方が大きいです';
}else{
    print 'random1とrandom2は同じです';
}
?>
</pre>