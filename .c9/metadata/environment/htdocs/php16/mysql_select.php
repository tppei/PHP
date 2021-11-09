{"filter":false,"title":"mysql_select.php","tooltip":"/htdocs/php16/mysql_select.php","undoManager":{"mark":11,"position":11,"stack":[[{"start":{"row":0,"column":0},"end":{"row":30,"column":6},"action":"insert","lines":["<pre>","<?php","$host = 'localhost'; // データベースのホスト名又はIPアドレス ※CodeCampでは「localhost」で接続できます","$username = 'username';  // MySQLのユーザ名","$passwd   = 'passwd';    // MySQLのパスワード","$dbname   = 'dbname';    // データベース名","$link = mysqli_connect($host, $username, $passwd, $dbname);","// 接続成功した場合","if ($link) {","   // 文字化け防止","   mysqli_set_charset($link, 'utf8');","   $query = 'SELECT goods_id, goods_name, price FROM goods_table';","   // クエリを実行します","   $result = mysqli_query($link, $query);","   // 1行ずつ結果を配列で取得します","   while ($row = mysqli_fetch_array($result)) {","       print $row['goods_id'];","       print $row['goods_name'];","       print $row['price'];","       print \"\\n\";","   }","   // 結果セットを開放します","   mysqli_free_result($result);","   // 接続を閉じます","   mysqli_close($link);","// 接続失敗した場合","} else {","   print 'DB接続失敗';","}","?>","</pre>"],"id":1}],[{"start":{"row":3,"column":13},"end":{"row":3,"column":21},"action":"remove","lines":["username"],"id":2},{"start":{"row":3,"column":13},"end":{"row":3,"column":26},"action":"insert","lines":["codecamp49497"]}],[{"start":{"row":4,"column":13},"end":{"row":4,"column":19},"action":"remove","lines":["passwd"],"id":3},{"start":{"row":4,"column":13},"end":{"row":4,"column":26},"action":"insert","lines":["codecamp49497"]}],[{"start":{"row":5,"column":13},"end":{"row":5,"column":19},"action":"remove","lines":["dbname"],"id":4},{"start":{"row":5,"column":13},"end":{"row":5,"column":22},"action":"insert","lines":["localhost"]}],[{"start":{"row":5,"column":21},"end":{"row":5,"column":22},"action":"remove","lines":["t"],"id":5},{"start":{"row":5,"column":20},"end":{"row":5,"column":21},"action":"remove","lines":["s"]},{"start":{"row":5,"column":19},"end":{"row":5,"column":20},"action":"remove","lines":["o"]},{"start":{"row":5,"column":18},"end":{"row":5,"column":19},"action":"remove","lines":["h"]},{"start":{"row":5,"column":17},"end":{"row":5,"column":18},"action":"remove","lines":["l"]},{"start":{"row":5,"column":16},"end":{"row":5,"column":17},"action":"remove","lines":["a"]},{"start":{"row":5,"column":15},"end":{"row":5,"column":16},"action":"remove","lines":["c"]},{"start":{"row":5,"column":14},"end":{"row":5,"column":15},"action":"remove","lines":["o"]},{"start":{"row":5,"column":13},"end":{"row":5,"column":14},"action":"remove","lines":["l"]}],[{"start":{"row":5,"column":13},"end":{"row":5,"column":23},"action":"insert","lines":["user_table"],"id":6}],[{"start":{"row":2,"column":9},"end":{"row":2,"column":18},"action":"remove","lines":["localhost"],"id":7},{"start":{"row":2,"column":9},"end":{"row":2,"column":22},"action":"insert","lines":["codecamp49497"]}],[{"start":{"row":2,"column":21},"end":{"row":2,"column":22},"action":"remove","lines":["7"],"id":9},{"start":{"row":2,"column":20},"end":{"row":2,"column":21},"action":"remove","lines":["9"]},{"start":{"row":2,"column":19},"end":{"row":2,"column":20},"action":"remove","lines":["4"]},{"start":{"row":2,"column":18},"end":{"row":2,"column":19},"action":"remove","lines":["9"]},{"start":{"row":2,"column":17},"end":{"row":2,"column":18},"action":"remove","lines":["4"]},{"start":{"row":2,"column":16},"end":{"row":2,"column":17},"action":"remove","lines":["p"]},{"start":{"row":2,"column":15},"end":{"row":2,"column":16},"action":"remove","lines":["m"]},{"start":{"row":2,"column":14},"end":{"row":2,"column":15},"action":"remove","lines":["a"]},{"start":{"row":2,"column":13},"end":{"row":2,"column":14},"action":"remove","lines":["c"]},{"start":{"row":2,"column":12},"end":{"row":2,"column":13},"action":"remove","lines":["e"]},{"start":{"row":2,"column":11},"end":{"row":2,"column":12},"action":"remove","lines":["d"]},{"start":{"row":2,"column":10},"end":{"row":2,"column":11},"action":"remove","lines":["o"]},{"start":{"row":2,"column":9},"end":{"row":2,"column":10},"action":"remove","lines":["c"]}],[{"start":{"row":2,"column":9},"end":{"row":2,"column":10},"action":"insert","lines":["l"],"id":11},{"start":{"row":2,"column":10},"end":{"row":2,"column":11},"action":"insert","lines":["o"]}],[{"start":{"row":2,"column":9},"end":{"row":2,"column":11},"action":"remove","lines":["lo"],"id":12},{"start":{"row":2,"column":9},"end":{"row":2,"column":18},"action":"insert","lines":["localhost"]}],[{"start":{"row":5,"column":22},"end":{"row":5,"column":23},"action":"remove","lines":["e"],"id":13},{"start":{"row":5,"column":21},"end":{"row":5,"column":22},"action":"remove","lines":["l"]},{"start":{"row":5,"column":20},"end":{"row":5,"column":21},"action":"remove","lines":["b"]},{"start":{"row":5,"column":19},"end":{"row":5,"column":20},"action":"remove","lines":["a"]},{"start":{"row":5,"column":18},"end":{"row":5,"column":19},"action":"remove","lines":["t"]},{"start":{"row":5,"column":17},"end":{"row":5,"column":18},"action":"remove","lines":["_"]},{"start":{"row":5,"column":16},"end":{"row":5,"column":17},"action":"remove","lines":["r"]},{"start":{"row":5,"column":15},"end":{"row":5,"column":16},"action":"remove","lines":["e"]},{"start":{"row":5,"column":14},"end":{"row":5,"column":15},"action":"remove","lines":["s"]},{"start":{"row":5,"column":13},"end":{"row":5,"column":14},"action":"remove","lines":["u"]}],[{"start":{"row":5,"column":13},"end":{"row":5,"column":26},"action":"insert","lines":["codecamp49497"],"id":14}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":11,"column":48},"end":{"row":11,"column":48},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"hash":"772ac4737c02e29934eaf68a3ff53bbef8c4f021","mime":"application/octet-stream","timestamp":1634275846532}