{"filter":false,"title":"receive.php","tooltip":"/htdocs/php07/receive.php","undoManager":{"mark":0,"position":0,"stack":[[{"start":{"row":0,"column":0},"end":{"row":6,"column":2},"action":"insert","lines":["<?php","if( isset( $_GET['my_name'] ) === TRUE && $_GET['my_name'] !== '' ) {","   print 'ここに入力した名前を表示： ' . htmlspecialchars($_GET['my_name'], ENT_QUOTES, 'UTF-8');","} else {","   print '名前が未入力です';","}","?>"],"id":1}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":6,"column":2},"end":{"row":6,"column":2},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1632719217388,"hash":"5442d1564870627dc66505e638d10a24f5a2d079"}