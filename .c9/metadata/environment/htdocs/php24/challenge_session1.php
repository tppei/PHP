{"filter":false,"title":"challenge_session1.php","tooltip":"/htdocs/php24/challenge_session1.php","undoManager":{"mark":10,"position":10,"stack":[[{"start":{"row":0,"column":0},"end":{"row":8,"column":24},"action":"insert","lines":["<pre>","<?php","$now = date('Y時m分d日 H:i:s');","session_start();","print 'セッション名: ' . session_name() . \"\\n\";","print 'セッションID: ' . session_id() . \"\\n\";","","if (isset($_SESSION['count'])) {","   $_SESSION['count']++;"],"id":11}],[{"start":{"row":8,"column":24},"end":{"row":9,"column":0},"action":"insert","lines":["",""],"id":12},{"start":{"row":9,"column":0},"end":{"row":9,"column":3},"action":"insert","lines":["   "]}],[{"start":{"row":9,"column":3},"end":{"row":9,"column":31},"action":"insert","lines":["$count = $_SESSION['count'];"],"id":13}],[{"start":{"row":9,"column":31},"end":{"row":10,"column":0},"action":"insert","lines":["",""],"id":14},{"start":{"row":10,"column":0},"end":{"row":10,"column":3},"action":"insert","lines":["   "]}],[{"start":{"row":10,"column":3},"end":{"row":10,"column":37},"action":"insert","lines":["print ($count . '回目の訪問です' . \"\\n\");"],"id":15}],[{"start":{"row":10,"column":37},"end":{"row":11,"column":0},"action":"insert","lines":["",""],"id":16},{"start":{"row":11,"column":0},"end":{"row":11,"column":3},"action":"insert","lines":["   "]},{"start":{"row":11,"column":3},"end":{"row":11,"column":4},"action":"insert","lines":["}"]},{"start":{"row":11,"column":0},"end":{"row":11,"column":3},"action":"remove","lines":["   "]}],[{"start":{"row":11,"column":1},"end":{"row":11,"column":2},"action":"insert","lines":["e"],"id":17},{"start":{"row":11,"column":2},"end":{"row":11,"column":3},"action":"insert","lines":["l"]},{"start":{"row":11,"column":3},"end":{"row":11,"column":4},"action":"insert","lines":["s"]},{"start":{"row":11,"column":4},"end":{"row":11,"column":5},"action":"insert","lines":["e"]},{"start":{"row":11,"column":5},"end":{"row":11,"column":6},"action":"insert","lines":["{"]}],[{"start":{"row":11,"column":6},"end":{"row":13,"column":1},"action":"insert","lines":["","    ","}"],"id":18}],[{"start":{"row":12,"column":4},"end":{"row":12,"column":27},"action":"insert","lines":["$_SESSION['count'] = 1;"],"id":19}],[{"start":{"row":12,"column":27},"end":{"row":13,"column":0},"action":"insert","lines":["",""],"id":20},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":13,"column":4},"end":{"row":13,"column":30},"action":"insert","lines":["print ('初めての訪問です' . \"\\n\");"],"id":21}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":13,"column":30},"end":{"row":13,"column":30},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1638859388512,"hash":"c5efc985c7ed5fcd580aa6c47e4c0f9a80e67f0f"}