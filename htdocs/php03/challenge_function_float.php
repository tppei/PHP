<?php
// $valueの値を定義
$value = 55.5555;
 
// 小数切り捨て値の処理を記述
 $floor = floor($value);
 
// 小数切り上げの処理を記述
 $ceil = ceil($value);
 
// 小数四捨五入の処理を記述
 $round = round($value);
 
// 小数点以下第三位四捨五入の処理を記述
 $round2 = round($value,2)
 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>課題</title>
</head>
<body>
    <p>元の値: <?php echo $value ?></p>
    <p>小数切り捨て:<?php echo $floor ?> </p>
    <p>小数切り上げ:<?php echo $ceil ?> </p>
    <p>小数四捨五入:<?php echo $round ?> </p>
    <p>小数第二位で四捨五入:<?php echo $round2 ?> </p>
</body>
</html>