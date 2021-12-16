{"filter":false,"title":"ec_user.php","tooltip":"/htdocs/php25/ec_user.php","undoManager":{"mark":65,"position":65,"stack":[[{"start":{"row":0,"column":0},"end":{"row":37,"column":55},"action":"insert","lines":["<?php","/*","*  ログイン済みユーザのホームページ","*","*  セッションの仕組み理解を優先しているため、一部処理はModelへ分離していません","*  また処理はセッション関連の最低限のみ行っており、本来必要な処理も省略しています","*/","require_once '../include/conf/const.php';","require_once '../include/model/function.php';","// セッション開始","session_start();","// セッション変数からuser_id取得","if (isset($_SESSION['user_id']) === TRUE) {","   $user_id = $_SESSION['user_id'];","} else {","   // 非ログインの場合、ログインページへリダイレクト","   header('Location: http://codecamp.lesson.codecamp.jp/session_sample_top.php');","   exit;","}","// データベース接続","$link = get_db_connect();","// user_idからユーザ名を取得するSQL","$sql = 'SELECT user_name FROM user_table WHERE user_id = ' . $user_id;","// SQL実行し登録データを配列で取得","$data = get_as_array($link, $sql);","// データベース切断","close_db_connect($link);","// ユーザ名を取得できたか確認","if (isset($data[0]['user_name'])) {","   $user_name = $data[0]['user_name'];","} else {","   // ユーザ名が取得できない場合、ログアウト処理へリダイレクト","   header('Location: http://codecamp.lesson.codecamp.jp/session_sample_logout.php');","   exit;","}"," ","// ログイン済みユーザのホームページ表示","include_once '../include/view/session_sample_home.php';"],"id":1}],[{"start":{"row":7,"column":0},"end":{"row":8,"column":45},"action":"remove","lines":["require_once '../include/conf/const.php';","require_once '../include/model/function.php';"],"id":2},{"start":{"row":7,"column":0},"end":{"row":8,"column":38},"action":"insert","lines":["require_once '../ECinclude/const.php';","require_once '../ECinclude/model.php';"]}],[{"start":{"row":16,"column":21},"end":{"row":16,"column":72},"action":"remove","lines":["http://codecamp.lesson.codecamp.jp/session_sample_t"],"id":3},{"start":{"row":16,"column":21},"end":{"row":16,"column":45},"action":"insert","lines":["'Location:./ec_login.php"]}],[{"start":{"row":16,"column":50},"end":{"row":16,"column":51},"action":"remove","lines":["p"],"id":4},{"start":{"row":16,"column":49},"end":{"row":16,"column":50},"action":"remove","lines":["h"]},{"start":{"row":16,"column":48},"end":{"row":16,"column":49},"action":"remove","lines":["p"]},{"start":{"row":16,"column":47},"end":{"row":16,"column":48},"action":"remove","lines":["."]},{"start":{"row":16,"column":46},"end":{"row":16,"column":47},"action":"remove","lines":["p"]},{"start":{"row":16,"column":45},"end":{"row":16,"column":46},"action":"remove","lines":["o"]}],[{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"insert","lines":["'"],"id":5}],[{"start":{"row":16,"column":22},"end":{"row":16,"column":23},"action":"remove","lines":["'"],"id":6},{"start":{"row":16,"column":21},"end":{"row":16,"column":22},"action":"remove","lines":[" "]},{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"remove","lines":["'"]}],[{"start":{"row":16,"column":19},"end":{"row":16,"column":20},"action":"remove","lines":[":"],"id":7},{"start":{"row":16,"column":18},"end":{"row":16,"column":19},"action":"remove","lines":["n"]},{"start":{"row":16,"column":17},"end":{"row":16,"column":18},"action":"remove","lines":["o"]},{"start":{"row":16,"column":16},"end":{"row":16,"column":17},"action":"remove","lines":["i"]},{"start":{"row":16,"column":15},"end":{"row":16,"column":16},"action":"remove","lines":["t"]},{"start":{"row":16,"column":14},"end":{"row":16,"column":15},"action":"remove","lines":["a"]},{"start":{"row":16,"column":13},"end":{"row":16,"column":14},"action":"remove","lines":["c"]},{"start":{"row":16,"column":12},"end":{"row":16,"column":13},"action":"remove","lines":["o"]},{"start":{"row":16,"column":11},"end":{"row":16,"column":12},"action":"remove","lines":["L"]}],[{"start":{"row":20,"column":4},"end":{"row":20,"column":5},"action":"remove","lines":["k"],"id":8},{"start":{"row":20,"column":3},"end":{"row":20,"column":4},"action":"remove","lines":["n"]},{"start":{"row":20,"column":2},"end":{"row":20,"column":3},"action":"remove","lines":["i"]},{"start":{"row":20,"column":1},"end":{"row":20,"column":2},"action":"remove","lines":["l"]}],[{"start":{"row":20,"column":1},"end":{"row":20,"column":2},"action":"insert","lines":["p"],"id":9},{"start":{"row":20,"column":2},"end":{"row":20,"column":3},"action":"insert","lines":["d"]},{"start":{"row":20,"column":3},"end":{"row":20,"column":4},"action":"insert","lines":["o"]}],[{"start":{"row":22,"column":35},"end":{"row":22,"column":36},"action":"insert","lines":["_"],"id":10},{"start":{"row":22,"column":36},"end":{"row":22,"column":37},"action":"insert","lines":["i"]},{"start":{"row":22,"column":37},"end":{"row":22,"column":38},"action":"insert","lines":["n"]}],[{"start":{"row":22,"column":38},"end":{"row":22,"column":39},"action":"insert","lines":["f"],"id":11},{"start":{"row":22,"column":39},"end":{"row":22,"column":40},"action":"insert","lines":["o"]}],[{"start":{"row":22,"column":35},"end":{"row":22,"column":36},"action":"remove","lines":["_"],"id":12}],[{"start":{"row":22,"column":39},"end":{"row":22,"column":40},"action":"insert","lines":["_"],"id":13}],[{"start":{"row":24,"column":25},"end":{"row":24,"column":26},"action":"remove","lines":["k"],"id":14},{"start":{"row":24,"column":24},"end":{"row":24,"column":25},"action":"remove","lines":["n"]},{"start":{"row":24,"column":23},"end":{"row":24,"column":24},"action":"remove","lines":["i"]},{"start":{"row":24,"column":22},"end":{"row":24,"column":23},"action":"remove","lines":["l"]}],[{"start":{"row":24,"column":22},"end":{"row":24,"column":23},"action":"insert","lines":["p"],"id":15},{"start":{"row":24,"column":23},"end":{"row":24,"column":24},"action":"insert","lines":["d"]},{"start":{"row":24,"column":24},"end":{"row":24,"column":25},"action":"insert","lines":["o"]}],[{"start":{"row":26,"column":23},"end":{"row":26,"column":24},"action":"remove","lines":[";"],"id":16},{"start":{"row":26,"column":22},"end":{"row":26,"column":23},"action":"remove","lines":[")"]},{"start":{"row":26,"column":21},"end":{"row":26,"column":22},"action":"remove","lines":["k"]},{"start":{"row":26,"column":20},"end":{"row":26,"column":21},"action":"remove","lines":["n"]},{"start":{"row":26,"column":19},"end":{"row":26,"column":20},"action":"remove","lines":["i"]},{"start":{"row":26,"column":18},"end":{"row":26,"column":19},"action":"remove","lines":["l"]},{"start":{"row":26,"column":17},"end":{"row":26,"column":18},"action":"remove","lines":["$"]},{"start":{"row":26,"column":16},"end":{"row":26,"column":17},"action":"remove","lines":["("]},{"start":{"row":26,"column":15},"end":{"row":26,"column":16},"action":"remove","lines":["t"]},{"start":{"row":26,"column":14},"end":{"row":26,"column":15},"action":"remove","lines":["c"]},{"start":{"row":26,"column":13},"end":{"row":26,"column":14},"action":"remove","lines":["e"]},{"start":{"row":26,"column":12},"end":{"row":26,"column":13},"action":"remove","lines":["n"]},{"start":{"row":26,"column":11},"end":{"row":26,"column":12},"action":"remove","lines":["n"]},{"start":{"row":26,"column":10},"end":{"row":26,"column":11},"action":"remove","lines":["o"]},{"start":{"row":26,"column":9},"end":{"row":26,"column":10},"action":"remove","lines":["c"]},{"start":{"row":26,"column":8},"end":{"row":26,"column":9},"action":"remove","lines":["_"]},{"start":{"row":26,"column":7},"end":{"row":26,"column":8},"action":"remove","lines":["b"]},{"start":{"row":26,"column":6},"end":{"row":26,"column":7},"action":"remove","lines":["d"]},{"start":{"row":26,"column":5},"end":{"row":26,"column":6},"action":"remove","lines":["_"]},{"start":{"row":26,"column":4},"end":{"row":26,"column":5},"action":"remove","lines":["e"]},{"start":{"row":26,"column":3},"end":{"row":26,"column":4},"action":"remove","lines":["s"]}],[{"start":{"row":26,"column":2},"end":{"row":26,"column":3},"action":"remove","lines":["o"],"id":17}],[{"start":{"row":26,"column":1},"end":{"row":26,"column":2},"action":"remove","lines":["l"],"id":18},{"start":{"row":26,"column":0},"end":{"row":26,"column":1},"action":"remove","lines":["c"]},{"start":{"row":25,"column":11},"end":{"row":26,"column":0},"action":"remove","lines":["",""]},{"start":{"row":25,"column":10},"end":{"row":25,"column":11},"action":"remove","lines":["断"]},{"start":{"row":25,"column":9},"end":{"row":25,"column":10},"action":"remove","lines":["切"]},{"start":{"row":25,"column":8},"end":{"row":25,"column":9},"action":"remove","lines":["ス"]},{"start":{"row":25,"column":7},"end":{"row":25,"column":8},"action":"remove","lines":["ー"]},{"start":{"row":25,"column":6},"end":{"row":25,"column":7},"action":"remove","lines":["ベ"]},{"start":{"row":25,"column":5},"end":{"row":25,"column":6},"action":"remove","lines":["タ"]},{"start":{"row":25,"column":4},"end":{"row":25,"column":5},"action":"remove","lines":["ー"]},{"start":{"row":25,"column":3},"end":{"row":25,"column":4},"action":"remove","lines":["デ"]},{"start":{"row":25,"column":2},"end":{"row":25,"column":3},"action":"remove","lines":[" "]}],[{"start":{"row":25,"column":1},"end":{"row":25,"column":2},"action":"remove","lines":["/"],"id":19},{"start":{"row":25,"column":0},"end":{"row":25,"column":1},"action":"remove","lines":["/"]},{"start":{"row":24,"column":33},"end":{"row":25,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":30,"column":21},"end":{"row":30,"column":81},"action":"remove","lines":["http://codecamp.lesson.codecamp.jp/session_sample_logout.php"],"id":20}],[{"start":{"row":30,"column":21},"end":{"row":30,"column":22},"action":"insert","lines":["."],"id":21},{"start":{"row":30,"column":22},"end":{"row":30,"column":23},"action":"insert","lines":["/"]}],[{"start":{"row":30,"column":23},"end":{"row":30,"column":24},"action":"insert","lines":["e"],"id":22},{"start":{"row":30,"column":24},"end":{"row":30,"column":25},"action":"insert","lines":["c"]},{"start":{"row":30,"column":25},"end":{"row":30,"column":26},"action":"insert","lines":["_"]},{"start":{"row":30,"column":26},"end":{"row":30,"column":27},"action":"insert","lines":[";"]},{"start":{"row":30,"column":27},"end":{"row":30,"column":28},"action":"insert","lines":["o"]},{"start":{"row":30,"column":28},"end":{"row":30,"column":29},"action":"insert","lines":["g"]}],[{"start":{"row":30,"column":29},"end":{"row":30,"column":30},"action":"insert","lines":["p"],"id":23},{"start":{"row":30,"column":30},"end":{"row":30,"column":31},"action":"insert","lines":["i"]}],[{"start":{"row":30,"column":30},"end":{"row":30,"column":31},"action":"remove","lines":["i"],"id":24},{"start":{"row":30,"column":29},"end":{"row":30,"column":30},"action":"remove","lines":["p"]},{"start":{"row":30,"column":28},"end":{"row":30,"column":29},"action":"remove","lines":["g"]},{"start":{"row":30,"column":27},"end":{"row":30,"column":28},"action":"remove","lines":["o"]},{"start":{"row":30,"column":26},"end":{"row":30,"column":27},"action":"remove","lines":[";"]}],[{"start":{"row":30,"column":26},"end":{"row":30,"column":27},"action":"insert","lines":["l"],"id":25},{"start":{"row":30,"column":27},"end":{"row":30,"column":28},"action":"insert","lines":["o"]},{"start":{"row":30,"column":28},"end":{"row":30,"column":29},"action":"insert","lines":["g"]},{"start":{"row":30,"column":29},"end":{"row":30,"column":30},"action":"insert","lines":["o"]},{"start":{"row":30,"column":30},"end":{"row":30,"column":31},"action":"insert","lines":["u"]},{"start":{"row":30,"column":31},"end":{"row":30,"column":32},"action":"insert","lines":["t"]}],[{"start":{"row":30,"column":32},"end":{"row":30,"column":33},"action":"insert","lines":["."],"id":26},{"start":{"row":30,"column":33},"end":{"row":30,"column":34},"action":"insert","lines":["p"]},{"start":{"row":30,"column":34},"end":{"row":30,"column":35},"action":"insert","lines":["h"]},{"start":{"row":30,"column":35},"end":{"row":30,"column":36},"action":"insert","lines":["p"]}],[{"start":{"row":35,"column":16},"end":{"row":35,"column":17},"action":"insert","lines":["."],"id":27},{"start":{"row":35,"column":17},"end":{"row":35,"column":18},"action":"insert","lines":["."]},{"start":{"row":35,"column":18},"end":{"row":35,"column":19},"action":"insert","lines":["/"]}],[{"start":{"row":35,"column":16},"end":{"row":35,"column":17},"action":"insert","lines":["/"],"id":28}],[{"start":{"row":35,"column":20},"end":{"row":35,"column":21},"action":"remove","lines":["/"],"id":29}],[{"start":{"row":35,"column":20},"end":{"row":35,"column":21},"action":"insert","lines":["E"],"id":30},{"start":{"row":35,"column":21},"end":{"row":35,"column":22},"action":"insert","lines":["C"]}],[{"start":{"row":35,"column":34},"end":{"row":35,"column":35},"action":"remove","lines":["/"],"id":31},{"start":{"row":35,"column":33},"end":{"row":35,"column":34},"action":"remove","lines":["w"]},{"start":{"row":35,"column":32},"end":{"row":35,"column":33},"action":"remove","lines":["e"]},{"start":{"row":35,"column":31},"end":{"row":35,"column":32},"action":"remove","lines":["i"]},{"start":{"row":35,"column":30},"end":{"row":35,"column":31},"action":"remove","lines":["v"]}],[{"start":{"row":35,"column":48},"end":{"row":35,"column":49},"action":"remove","lines":["e"],"id":32},{"start":{"row":35,"column":47},"end":{"row":35,"column":48},"action":"remove","lines":["m"]},{"start":{"row":35,"column":46},"end":{"row":35,"column":47},"action":"remove","lines":["o"]},{"start":{"row":35,"column":45},"end":{"row":35,"column":46},"action":"remove","lines":["h"]},{"start":{"row":35,"column":44},"end":{"row":35,"column":45},"action":"remove","lines":["_"]},{"start":{"row":35,"column":43},"end":{"row":35,"column":44},"action":"remove","lines":["e"]},{"start":{"row":35,"column":42},"end":{"row":35,"column":43},"action":"remove","lines":["l"]},{"start":{"row":35,"column":41},"end":{"row":35,"column":42},"action":"remove","lines":["p"]},{"start":{"row":35,"column":40},"end":{"row":35,"column":41},"action":"remove","lines":["m"]},{"start":{"row":35,"column":39},"end":{"row":35,"column":40},"action":"remove","lines":["a"]},{"start":{"row":35,"column":38},"end":{"row":35,"column":39},"action":"remove","lines":["s"]},{"start":{"row":35,"column":37},"end":{"row":35,"column":38},"action":"remove","lines":["_"]},{"start":{"row":35,"column":36},"end":{"row":35,"column":37},"action":"remove","lines":["n"]},{"start":{"row":35,"column":35},"end":{"row":35,"column":36},"action":"remove","lines":["o"]},{"start":{"row":35,"column":34},"end":{"row":35,"column":35},"action":"remove","lines":["i"]},{"start":{"row":35,"column":33},"end":{"row":35,"column":34},"action":"remove","lines":["s"]},{"start":{"row":35,"column":32},"end":{"row":35,"column":33},"action":"remove","lines":["s"]},{"start":{"row":35,"column":31},"end":{"row":35,"column":32},"action":"remove","lines":["e"]},{"start":{"row":35,"column":30},"end":{"row":35,"column":31},"action":"remove","lines":["s"]}],[{"start":{"row":35,"column":30},"end":{"row":35,"column":31},"action":"insert","lines":["e"],"id":33},{"start":{"row":35,"column":31},"end":{"row":35,"column":32},"action":"insert","lines":["c"]}],[{"start":{"row":35,"column":32},"end":{"row":35,"column":33},"action":"insert","lines":["_"],"id":34},{"start":{"row":35,"column":33},"end":{"row":35,"column":34},"action":"insert","lines":["u"]},{"start":{"row":35,"column":34},"end":{"row":35,"column":35},"action":"insert","lines":["s"]},{"start":{"row":35,"column":35},"end":{"row":35,"column":36},"action":"insert","lines":["e"]},{"start":{"row":35,"column":36},"end":{"row":35,"column":37},"action":"insert","lines":["r"]}],[{"start":{"row":35,"column":37},"end":{"row":35,"column":38},"action":"remove","lines":["."],"id":35}],[{"start":{"row":35,"column":37},"end":{"row":35,"column":38},"action":"insert","lines":["_"],"id":36},{"start":{"row":35,"column":38},"end":{"row":35,"column":39},"action":"insert","lines":["v"]},{"start":{"row":35,"column":39},"end":{"row":35,"column":40},"action":"insert","lines":["i"]}],[{"start":{"row":35,"column":40},"end":{"row":35,"column":41},"action":"insert","lines":["e"],"id":37},{"start":{"row":35,"column":41},"end":{"row":35,"column":42},"action":"insert","lines":["w"]},{"start":{"row":35,"column":42},"end":{"row":35,"column":43},"action":"insert","lines":["."]}],[{"start":{"row":7,"column":14},"end":{"row":7,"column":15},"action":"insert","lines":["."],"id":38},{"start":{"row":7,"column":15},"end":{"row":7,"column":16},"action":"insert","lines":["."]},{"start":{"row":7,"column":16},"end":{"row":7,"column":17},"action":"insert","lines":["/"]}],[{"start":{"row":8,"column":14},"end":{"row":8,"column":15},"action":"insert","lines":["."],"id":39},{"start":{"row":8,"column":15},"end":{"row":8,"column":16},"action":"insert","lines":["."]},{"start":{"row":8,"column":16},"end":{"row":8,"column":17},"action":"insert","lines":["/"]}],[{"start":{"row":30,"column":21},"end":{"row":30,"column":22},"action":"remove","lines":["."],"id":40}],[{"start":{"row":30,"column":21},"end":{"row":30,"column":48},"action":"insert","lines":["http://44.200.223.201:8000/"],"id":41}],[{"start":{"row":30,"column":47},"end":{"row":30,"column":48},"action":"remove","lines":["/"],"id":42}],[{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"remove","lines":["."],"id":43}],[{"start":{"row":16,"column":20},"end":{"row":16,"column":47},"action":"insert","lines":["http://44.200.223.201:8000/"],"id":44}],[{"start":{"row":16,"column":46},"end":{"row":16,"column":47},"action":"remove","lines":["/"],"id":45}],[{"start":{"row":17,"column":8},"end":{"row":17,"column":9},"action":"insert","lines":["/"],"id":46}],[{"start":{"row":17,"column":8},"end":{"row":17,"column":9},"action":"remove","lines":["/"],"id":47}],[{"start":{"row":17,"column":8},"end":{"row":17,"column":9},"action":"insert","lines":["/"],"id":48}],[{"start":{"row":17,"column":8},"end":{"row":17,"column":9},"action":"remove","lines":["/"],"id":49}],[{"start":{"row":17,"column":8},"end":{"row":17,"column":9},"action":"insert","lines":["/"],"id":50}],[{"start":{"row":17,"column":8},"end":{"row":17,"column":9},"action":"remove","lines":["/"],"id":51}],[{"start":{"row":17,"column":8},"end":{"row":17,"column":34},"action":"insert","lines":["/htdocs/php25/ec_login.php"],"id":52}],[{"start":{"row":17,"column":8},"end":{"row":17,"column":34},"action":"remove","lines":["/htdocs/php25/ec_login.php"],"id":53}],[{"start":{"row":16,"column":27},"end":{"row":16,"column":59},"action":"remove","lines":["44.200.223.201:8000/ec_login.php"],"id":54},{"start":{"row":16,"column":27},"end":{"row":16,"column":53},"action":"insert","lines":["/htdocs/php25/ec_login.php"]}],[{"start":{"row":16,"column":26},"end":{"row":16,"column":27},"action":"remove","lines":["/"],"id":55}],[{"start":{"row":30,"column":27},"end":{"row":30,"column":61},"action":"remove","lines":["/44.200.223.201:8000/ec_logout.php"],"id":56}],[{"start":{"row":30,"column":27},"end":{"row":30,"column":54},"action":"insert","lines":["/htdocs/php25/ec_logout.php"],"id":57}],[{"start":{"row":16,"column":25},"end":{"row":16,"column":26},"action":"remove","lines":["/"],"id":58},{"start":{"row":16,"column":24},"end":{"row":16,"column":25},"action":"remove","lines":[":"]},{"start":{"row":16,"column":23},"end":{"row":16,"column":24},"action":"remove","lines":["p"]},{"start":{"row":16,"column":22},"end":{"row":16,"column":23},"action":"remove","lines":["t"]},{"start":{"row":16,"column":21},"end":{"row":16,"column":22},"action":"remove","lines":["t"]},{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"remove","lines":["h"]}],[{"start":{"row":16,"column":26},"end":{"row":16,"column":27},"action":"remove","lines":["s"],"id":59},{"start":{"row":16,"column":25},"end":{"row":16,"column":26},"action":"remove","lines":["c"]},{"start":{"row":16,"column":24},"end":{"row":16,"column":25},"action":"remove","lines":["o"]},{"start":{"row":16,"column":23},"end":{"row":16,"column":24},"action":"remove","lines":["d"]},{"start":{"row":16,"column":22},"end":{"row":16,"column":23},"action":"remove","lines":["t"]},{"start":{"row":16,"column":21},"end":{"row":16,"column":22},"action":"remove","lines":["h"]},{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"remove","lines":["/"]}],[{"start":{"row":30,"column":33},"end":{"row":30,"column":34},"action":"remove","lines":["s"],"id":60},{"start":{"row":30,"column":32},"end":{"row":30,"column":33},"action":"remove","lines":["c"]},{"start":{"row":30,"column":31},"end":{"row":30,"column":32},"action":"remove","lines":["o"]},{"start":{"row":30,"column":30},"end":{"row":30,"column":31},"action":"remove","lines":["d"]},{"start":{"row":30,"column":29},"end":{"row":30,"column":30},"action":"remove","lines":["t"]},{"start":{"row":30,"column":28},"end":{"row":30,"column":29},"action":"remove","lines":["h"]},{"start":{"row":30,"column":27},"end":{"row":30,"column":28},"action":"remove","lines":["/"]},{"start":{"row":30,"column":26},"end":{"row":30,"column":27},"action":"remove","lines":["/"]},{"start":{"row":30,"column":25},"end":{"row":30,"column":26},"action":"remove","lines":[":"]},{"start":{"row":30,"column":24},"end":{"row":30,"column":25},"action":"remove","lines":["p"]},{"start":{"row":30,"column":23},"end":{"row":30,"column":24},"action":"remove","lines":["t"]},{"start":{"row":30,"column":22},"end":{"row":30,"column":23},"action":"remove","lines":["t"]},{"start":{"row":30,"column":21},"end":{"row":30,"column":22},"action":"remove","lines":["h"]}],[{"start":{"row":30,"column":27},"end":{"row":30,"column":28},"action":"remove","lines":["/"],"id":61},{"start":{"row":30,"column":26},"end":{"row":30,"column":27},"action":"remove","lines":["5"]},{"start":{"row":30,"column":25},"end":{"row":30,"column":26},"action":"remove","lines":["2"]},{"start":{"row":30,"column":24},"end":{"row":30,"column":25},"action":"remove","lines":["p"]},{"start":{"row":30,"column":23},"end":{"row":30,"column":24},"action":"remove","lines":["h"]},{"start":{"row":30,"column":22},"end":{"row":30,"column":23},"action":"remove","lines":["p"]},{"start":{"row":30,"column":21},"end":{"row":30,"column":22},"action":"remove","lines":["/"]},{"start":{"row":30,"column":20},"end":{"row":30,"column":21},"action":"remove","lines":[" "]}],[{"start":{"row":16,"column":26},"end":{"row":16,"column":27},"action":"remove","lines":["/"],"id":62},{"start":{"row":16,"column":25},"end":{"row":16,"column":26},"action":"remove","lines":["5"]},{"start":{"row":16,"column":24},"end":{"row":16,"column":25},"action":"remove","lines":["2"]},{"start":{"row":16,"column":23},"end":{"row":16,"column":24},"action":"remove","lines":["p"]},{"start":{"row":16,"column":22},"end":{"row":16,"column":23},"action":"remove","lines":["h"]},{"start":{"row":16,"column":21},"end":{"row":16,"column":22},"action":"remove","lines":["p"]},{"start":{"row":16,"column":20},"end":{"row":16,"column":21},"action":"remove","lines":["/"]}],[{"start":{"row":22,"column":56},"end":{"row":22,"column":57},"action":"remove","lines":["_"],"id":63},{"start":{"row":22,"column":55},"end":{"row":22,"column":56},"action":"remove","lines":["r"]},{"start":{"row":22,"column":54},"end":{"row":22,"column":55},"action":"remove","lines":["e"]},{"start":{"row":22,"column":53},"end":{"row":22,"column":54},"action":"remove","lines":["s"]},{"start":{"row":22,"column":52},"end":{"row":22,"column":53},"action":"remove","lines":["u"]}],[{"start":{"row":12,"column":26},"end":{"row":12,"column":27},"action":"remove","lines":["i"],"id":64},{"start":{"row":12,"column":25},"end":{"row":12,"column":26},"action":"remove","lines":["_"]},{"start":{"row":12,"column":24},"end":{"row":12,"column":25},"action":"remove","lines":["r"]},{"start":{"row":12,"column":23},"end":{"row":12,"column":24},"action":"remove","lines":["e"]},{"start":{"row":12,"column":22},"end":{"row":12,"column":23},"action":"remove","lines":["s"]},{"start":{"row":12,"column":21},"end":{"row":12,"column":22},"action":"remove","lines":["u"]}],[{"start":{"row":12,"column":21},"end":{"row":12,"column":22},"action":"insert","lines":["i"],"id":65}],[{"start":{"row":13,"column":29},"end":{"row":13,"column":30},"action":"remove","lines":["_"],"id":66},{"start":{"row":13,"column":28},"end":{"row":13,"column":29},"action":"remove","lines":["r"]},{"start":{"row":13,"column":27},"end":{"row":13,"column":28},"action":"remove","lines":["e"]},{"start":{"row":13,"column":26},"end":{"row":13,"column":27},"action":"remove","lines":["s"]},{"start":{"row":13,"column":25},"end":{"row":13,"column":26},"action":"remove","lines":["u"]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":23,"column":13},"end":{"row":23,"column":13},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1639459578978,"hash":"a2d1bf75a195384e460977716939ed363a23aeb8"}