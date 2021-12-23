{"changed":true,"filter":false,"title":"ec_login_action.php","tooltip":"/htdocs/php25/ec_login_action.php","value":"<?php\n/*\n*  ログイン処理\n*\n*  セッションの仕組み理解を優先しているため、一部処理はModelへ分離していません\n*  また処理はセッション関連の最低限のみ行っており、本来必要な処理も省略しています\n*/\nrequire_once '../../ECinclude/const.php';\nrequire_once '../../ECinclude/model.php';\n// リクエストメソッド確認\nif (get_request_method() !== 'POST') {\n   // POSTでなければログインページへリダイレクト\n   header('Location:ec_login.php');\n   exit;\n}\n// セッション開始\nsession_start();\n// POST値取得\n$user_name = get_post_data('user_name');  // ユーザー名\n$passwd = get_post_data('passwd'); // パスワード\n// をCookieへ保存\nsetcookie('user_name', $user_name, time() + 60 * 60 * 24 * 365);\n// データベース接続\n$pdo = get_db_connect();\n// ユーザー名とパスワードからuser_idを取得するSQL\n$sql = \"SELECT id FROM user_info_table WHERE user_name = '$user_name' AND password = '$passwd'\";\n// SQL実行し登録データを配列で取得\n$data = get_as_array($pdo,$sql);\n// 登録データを取得できたか確認\nif (isset($data[0]['id'])) {\n   // セッション変数にuser_idを保存\n   $_SESSION['user_id'] = $data[0]['id'];\n   // 管理者用ページ　管理者のidは14\n   if($data[0]['id'] === 14){\n      header('Location:ec_itemregister.php');\n      exit;\n   }else{\n   // ログイン済み商品一覧ページへリダイレクト\n      header('Location:ec_index.php');\n      exit;\n   }\n} else {\n   // セッション変数にログインのエラーフラグを保存\n   $_SESSION['login_err_flag'] = TRUE;\n   // ログインページへリダイレクト\n   header('Location:ec_login.php');\n   exit;\n}","undoManager":{"mark":76,"position":78,"stack":[[{"start":{"row":7,"column":0},"end":{"row":8,"column":41},"action":"remove","lines":["require_once '../../ECinclude/const.php';","require_once '../../ECinclude/model.php';"],"id":144},{"start":{"row":7,"column":0},"end":{"row":8,"column":41},"action":"insert","lines":["require_once '../../ECinclude/const.php';","require_once '../../ECinclude/model.php';"]}],[{"start":{"row":31,"column":41},"end":{"row":32,"column":0},"action":"insert","lines":["",""],"id":145},{"start":{"row":32,"column":0},"end":{"row":32,"column":3},"action":"insert","lines":["   "]},{"start":{"row":32,"column":3},"end":{"row":32,"column":4},"action":"insert","lines":["k"]},{"start":{"row":32,"column":4},"end":{"row":32,"column":5},"action":"insert","lines":["o"]},{"start":{"row":32,"column":5},"end":{"row":32,"column":6},"action":"insert","lines":["k"]},{"start":{"row":32,"column":6},"end":{"row":32,"column":7},"action":"insert","lines":["o"]}],[{"start":{"row":32,"column":6},"end":{"row":32,"column":7},"action":"remove","lines":["o"],"id":146},{"start":{"row":32,"column":5},"end":{"row":32,"column":6},"action":"remove","lines":["k"]},{"start":{"row":32,"column":4},"end":{"row":32,"column":5},"action":"remove","lines":["o"]},{"start":{"row":32,"column":3},"end":{"row":32,"column":4},"action":"remove","lines":["k"]}],[{"start":{"row":32,"column":3},"end":{"row":32,"column":6},"action":"insert","lines":["ここに"],"id":147}],[{"start":{"row":32,"column":6},"end":{"row":32,"column":11},"action":"insert","lines":["管理者用の"],"id":148}],[{"start":{"row":32,"column":11},"end":{"row":32,"column":15},"action":"insert","lines":["ログイン"],"id":149}],[{"start":{"row":32,"column":15},"end":{"row":32,"column":17},"action":"insert","lines":["追加"],"id":150}],[{"start":{"row":32,"column":3},"end":{"row":32,"column":6},"action":"insert","lines":["// "],"id":151}],[{"start":{"row":33,"column":16},"end":{"row":33,"column":17},"action":"remove","lines":["録"],"id":152},{"start":{"row":33,"column":15},"end":{"row":33,"column":16},"action":"remove","lines":["登"]},{"start":{"row":33,"column":14},"end":{"row":33,"column":15},"action":"remove","lines":["ザ"]},{"start":{"row":33,"column":13},"end":{"row":33,"column":14},"action":"remove","lines":["ー"]},{"start":{"row":33,"column":12},"end":{"row":33,"column":13},"action":"remove","lines":["ユ"]}],[{"start":{"row":33,"column":12},"end":{"row":33,"column":16},"action":"insert","lines":["商品管理"],"id":153}],[{"start":{"row":34,"column":34},"end":{"row":34,"column":35},"action":"remove","lines":["r"],"id":154},{"start":{"row":34,"column":33},"end":{"row":34,"column":34},"action":"remove","lines":["e"]},{"start":{"row":34,"column":32},"end":{"row":34,"column":33},"action":"remove","lines":["t"]},{"start":{"row":34,"column":31},"end":{"row":34,"column":32},"action":"remove","lines":["s"]},{"start":{"row":34,"column":30},"end":{"row":34,"column":31},"action":"remove","lines":["i"]},{"start":{"row":34,"column":29},"end":{"row":34,"column":30},"action":"remove","lines":["g"]},{"start":{"row":34,"column":28},"end":{"row":34,"column":29},"action":"remove","lines":["e"]},{"start":{"row":34,"column":27},"end":{"row":34,"column":28},"action":"remove","lines":["r"]},{"start":{"row":34,"column":26},"end":{"row":34,"column":27},"action":"remove","lines":["r"]},{"start":{"row":34,"column":25},"end":{"row":34,"column":26},"action":"remove","lines":["e"]},{"start":{"row":34,"column":24},"end":{"row":34,"column":25},"action":"remove","lines":["s"]},{"start":{"row":34,"column":23},"end":{"row":34,"column":24},"action":"remove","lines":["u"]}],[{"start":{"row":34,"column":23},"end":{"row":34,"column":24},"action":"insert","lines":["i"],"id":155},{"start":{"row":34,"column":24},"end":{"row":34,"column":25},"action":"insert","lines":["t"]},{"start":{"row":34,"column":25},"end":{"row":34,"column":26},"action":"insert","lines":["e"]},{"start":{"row":34,"column":26},"end":{"row":34,"column":27},"action":"insert","lines":["m"]},{"start":{"row":34,"column":27},"end":{"row":34,"column":28},"action":"insert","lines":["r"]},{"start":{"row":34,"column":28},"end":{"row":34,"column":29},"action":"insert","lines":["e"]}],[{"start":{"row":34,"column":29},"end":{"row":34,"column":30},"action":"insert","lines":["g"],"id":156},{"start":{"row":34,"column":30},"end":{"row":34,"column":31},"action":"insert","lines":["i"]},{"start":{"row":34,"column":31},"end":{"row":34,"column":32},"action":"insert","lines":["s"]},{"start":{"row":34,"column":32},"end":{"row":34,"column":33},"action":"insert","lines":["t"]},{"start":{"row":34,"column":33},"end":{"row":34,"column":34},"action":"insert","lines":["e"]},{"start":{"row":34,"column":34},"end":{"row":34,"column":35},"action":"insert","lines":["r"]}],[{"start":{"row":33,"column":15},"end":{"row":33,"column":16},"action":"remove","lines":["理"],"id":157},{"start":{"row":33,"column":14},"end":{"row":33,"column":15},"action":"remove","lines":["管"]}],[{"start":{"row":33,"column":14},"end":{"row":33,"column":15},"action":"insert","lines":["i"],"id":158},{"start":{"row":33,"column":15},"end":{"row":33,"column":16},"action":"insert","lines":["t"]},{"start":{"row":33,"column":16},"end":{"row":33,"column":17},"action":"insert","lines":["i"]},{"start":{"row":33,"column":17},"end":{"row":33,"column":18},"action":"insert","lines":["t"]},{"start":{"row":33,"column":18},"end":{"row":33,"column":19},"action":"insert","lines":["a"]}],[{"start":{"row":33,"column":18},"end":{"row":33,"column":19},"action":"remove","lines":["a"],"id":159},{"start":{"row":33,"column":17},"end":{"row":33,"column":18},"action":"remove","lines":["t"]},{"start":{"row":33,"column":16},"end":{"row":33,"column":17},"action":"remove","lines":["i"]},{"start":{"row":33,"column":15},"end":{"row":33,"column":16},"action":"remove","lines":["t"]},{"start":{"row":33,"column":14},"end":{"row":33,"column":15},"action":"remove","lines":["i"]}],[{"start":{"row":33,"column":14},"end":{"row":33,"column":16},"action":"insert","lines":["一覧"],"id":160}],[{"start":{"row":34,"column":34},"end":{"row":34,"column":35},"action":"remove","lines":["r"],"id":161},{"start":{"row":34,"column":33},"end":{"row":34,"column":34},"action":"remove","lines":["e"]},{"start":{"row":34,"column":32},"end":{"row":34,"column":33},"action":"remove","lines":["t"]},{"start":{"row":34,"column":31},"end":{"row":34,"column":32},"action":"remove","lines":["s"]},{"start":{"row":34,"column":30},"end":{"row":34,"column":31},"action":"remove","lines":["i"]},{"start":{"row":34,"column":29},"end":{"row":34,"column":30},"action":"remove","lines":["g"]},{"start":{"row":34,"column":28},"end":{"row":34,"column":29},"action":"remove","lines":["e"]},{"start":{"row":34,"column":27},"end":{"row":34,"column":28},"action":"remove","lines":["r"]},{"start":{"row":34,"column":26},"end":{"row":34,"column":27},"action":"remove","lines":["m"]},{"start":{"row":34,"column":25},"end":{"row":34,"column":26},"action":"remove","lines":["e"]},{"start":{"row":34,"column":24},"end":{"row":34,"column":25},"action":"remove","lines":["t"]}],[{"start":{"row":34,"column":24},"end":{"row":34,"column":25},"action":"insert","lines":["n"],"id":162},{"start":{"row":34,"column":25},"end":{"row":34,"column":26},"action":"insert","lines":["d"]},{"start":{"row":34,"column":26},"end":{"row":34,"column":27},"action":"insert","lines":["e"]},{"start":{"row":34,"column":27},"end":{"row":34,"column":28},"action":"insert","lines":["x"]}],[{"start":{"row":32,"column":20},"end":{"row":33,"column":0},"action":"insert","lines":["",""],"id":163},{"start":{"row":33,"column":0},"end":{"row":33,"column":3},"action":"insert","lines":["   "]}],[{"start":{"row":33,"column":3},"end":{"row":33,"column":4},"action":"insert","lines":["i"],"id":164},{"start":{"row":33,"column":4},"end":{"row":33,"column":5},"action":"insert","lines":["f"]}],[{"start":{"row":33,"column":5},"end":{"row":33,"column":7},"action":"insert","lines":["()"],"id":165}],[{"start":{"row":33,"column":6},"end":{"row":33,"column":7},"action":"insert","lines":["$"],"id":166},{"start":{"row":33,"column":7},"end":{"row":33,"column":8},"action":"insert","lines":["d"]},{"start":{"row":33,"column":8},"end":{"row":33,"column":9},"action":"insert","lines":["a"]},{"start":{"row":33,"column":9},"end":{"row":33,"column":10},"action":"insert","lines":["t"]},{"start":{"row":33,"column":10},"end":{"row":33,"column":11},"action":"insert","lines":["a"]}],[{"start":{"row":33,"column":11},"end":{"row":33,"column":12},"action":"insert","lines":[" "],"id":167}],[{"start":{"row":33,"column":11},"end":{"row":33,"column":12},"action":"remove","lines":[" "],"id":168}],[{"start":{"row":33,"column":11},"end":{"row":33,"column":13},"action":"insert","lines":["[]"],"id":169}],[{"start":{"row":33,"column":12},"end":{"row":33,"column":13},"action":"insert","lines":["0"],"id":170}],[{"start":{"row":33,"column":14},"end":{"row":33,"column":16},"action":"insert","lines":["[]"],"id":171}],[{"start":{"row":33,"column":15},"end":{"row":33,"column":17},"action":"insert","lines":["''"],"id":172}],[{"start":{"row":33,"column":16},"end":{"row":33,"column":17},"action":"insert","lines":["i"],"id":173},{"start":{"row":33,"column":17},"end":{"row":33,"column":18},"action":"insert","lines":["d"]}],[{"start":{"row":33,"column":20},"end":{"row":33,"column":21},"action":"insert","lines":[" "],"id":174},{"start":{"row":33,"column":21},"end":{"row":33,"column":22},"action":"insert","lines":["="]},{"start":{"row":33,"column":22},"end":{"row":33,"column":23},"action":"insert","lines":["="]},{"start":{"row":33,"column":23},"end":{"row":33,"column":24},"action":"insert","lines":["="]}],[{"start":{"row":33,"column":24},"end":{"row":33,"column":25},"action":"insert","lines":["="],"id":175}],[{"start":{"row":33,"column":24},"end":{"row":33,"column":25},"action":"remove","lines":["="],"id":176}],[{"start":{"row":33,"column":24},"end":{"row":33,"column":25},"action":"insert","lines":[" "],"id":177}],[{"start":{"row":33,"column":25},"end":{"row":33,"column":27},"action":"insert","lines":["''"],"id":178}],[{"start":{"row":33,"column":26},"end":{"row":33,"column":27},"action":"insert","lines":["a"],"id":179},{"start":{"row":33,"column":27},"end":{"row":33,"column":28},"action":"insert","lines":["d"]},{"start":{"row":33,"column":28},"end":{"row":33,"column":29},"action":"insert","lines":["i"]}],[{"start":{"row":33,"column":28},"end":{"row":33,"column":29},"action":"remove","lines":["i"],"id":180}],[{"start":{"row":33,"column":28},"end":{"row":33,"column":29},"action":"insert","lines":["m"],"id":181},{"start":{"row":33,"column":29},"end":{"row":33,"column":30},"action":"insert","lines":["i"]},{"start":{"row":33,"column":30},"end":{"row":33,"column":31},"action":"insert","lines":["n"]}],[{"start":{"row":33,"column":33},"end":{"row":33,"column":34},"action":"insert","lines":["{"],"id":182}],[{"start":{"row":33,"column":34},"end":{"row":35,"column":4},"action":"insert","lines":["","      ","   }"],"id":183}],[{"start":{"row":34,"column":6},"end":{"row":34,"column":7},"action":"insert","lines":["h"],"id":184},{"start":{"row":34,"column":7},"end":{"row":34,"column":8},"action":"insert","lines":["e"]},{"start":{"row":34,"column":8},"end":{"row":34,"column":9},"action":"insert","lines":["a"]},{"start":{"row":34,"column":9},"end":{"row":34,"column":10},"action":"insert","lines":["d"]},{"start":{"row":34,"column":10},"end":{"row":34,"column":11},"action":"insert","lines":["e"]},{"start":{"row":34,"column":11},"end":{"row":34,"column":12},"action":"insert","lines":["r"]}],[{"start":{"row":34,"column":12},"end":{"row":34,"column":14},"action":"insert","lines":["()"],"id":185}],[{"start":{"row":34,"column":13},"end":{"row":34,"column":15},"action":"insert","lines":["''"],"id":186}],[{"start":{"row":34,"column":14},"end":{"row":34,"column":15},"action":"insert","lines":["L"],"id":187},{"start":{"row":34,"column":15},"end":{"row":34,"column":16},"action":"insert","lines":["O"]}],[{"start":{"row":34,"column":15},"end":{"row":34,"column":16},"action":"remove","lines":["O"],"id":188}],[{"start":{"row":34,"column":15},"end":{"row":34,"column":16},"action":"insert","lines":["o"],"id":189},{"start":{"row":34,"column":16},"end":{"row":34,"column":17},"action":"insert","lines":["c"]},{"start":{"row":34,"column":17},"end":{"row":34,"column":18},"action":"insert","lines":["a"]},{"start":{"row":34,"column":18},"end":{"row":34,"column":19},"action":"insert","lines":["t"]},{"start":{"row":34,"column":19},"end":{"row":34,"column":20},"action":"insert","lines":["i"]},{"start":{"row":34,"column":20},"end":{"row":34,"column":21},"action":"insert","lines":["o"]},{"start":{"row":34,"column":21},"end":{"row":34,"column":22},"action":"insert","lines":["n"]}],[{"start":{"row":34,"column":22},"end":{"row":34,"column":23},"action":"insert","lines":[":"],"id":190}],[{"start":{"row":34,"column":23},"end":{"row":34,"column":24},"action":"insert","lines":["i"],"id":191},{"start":{"row":34,"column":24},"end":{"row":34,"column":25},"action":"insert","lines":["t"]},{"start":{"row":34,"column":25},"end":{"row":34,"column":26},"action":"insert","lines":["e"]},{"start":{"row":34,"column":26},"end":{"row":34,"column":27},"action":"insert","lines":["m"]}],[{"start":{"row":34,"column":27},"end":{"row":34,"column":28},"action":"insert","lines":["r"],"id":192},{"start":{"row":34,"column":28},"end":{"row":34,"column":29},"action":"insert","lines":["e"]},{"start":{"row":34,"column":29},"end":{"row":34,"column":30},"action":"insert","lines":["g"]},{"start":{"row":34,"column":30},"end":{"row":34,"column":31},"action":"insert","lines":["i"]},{"start":{"row":34,"column":31},"end":{"row":34,"column":32},"action":"insert","lines":["s"]},{"start":{"row":34,"column":32},"end":{"row":34,"column":33},"action":"insert","lines":["t"]},{"start":{"row":34,"column":33},"end":{"row":34,"column":34},"action":"insert","lines":["e"]},{"start":{"row":34,"column":34},"end":{"row":34,"column":35},"action":"insert","lines":["r"]}],[{"start":{"row":34,"column":35},"end":{"row":34,"column":36},"action":"insert","lines":["."],"id":193},{"start":{"row":34,"column":36},"end":{"row":34,"column":37},"action":"insert","lines":["p"]},{"start":{"row":34,"column":37},"end":{"row":34,"column":38},"action":"insert","lines":["h"]},{"start":{"row":34,"column":38},"end":{"row":34,"column":39},"action":"insert","lines":["p"]}],[{"start":{"row":35,"column":4},"end":{"row":35,"column":5},"action":"insert","lines":["e"],"id":194},{"start":{"row":35,"column":5},"end":{"row":35,"column":6},"action":"insert","lines":["l"]},{"start":{"row":35,"column":6},"end":{"row":35,"column":7},"action":"insert","lines":["s"]},{"start":{"row":35,"column":7},"end":{"row":35,"column":8},"action":"insert","lines":["e"]},{"start":{"row":35,"column":8},"end":{"row":35,"column":9},"action":"insert","lines":["{"]}],[{"start":{"row":37,"column":0},"end":{"row":37,"column":3},"action":"insert","lines":["   "],"id":195},{"start":{"row":38,"column":0},"end":{"row":38,"column":3},"action":"insert","lines":["   "]}],[{"start":{"row":38,"column":11},"end":{"row":39,"column":0},"action":"insert","lines":["",""],"id":196},{"start":{"row":39,"column":0},"end":{"row":39,"column":6},"action":"insert","lines":["      "]}],[{"start":{"row":39,"column":3},"end":{"row":39,"column":6},"action":"remove","lines":["   "],"id":197}],[{"start":{"row":39,"column":3},"end":{"row":39,"column":4},"action":"insert","lines":["}"],"id":198}],[{"start":{"row":34,"column":41},"end":{"row":34,"column":42},"action":"insert","lines":[";"],"id":199}],[{"start":{"row":34,"column":42},"end":{"row":35,"column":0},"action":"insert","lines":["",""],"id":200},{"start":{"row":35,"column":0},"end":{"row":35,"column":6},"action":"insert","lines":["      "]},{"start":{"row":35,"column":6},"end":{"row":35,"column":7},"action":"insert","lines":["e"]},{"start":{"row":35,"column":7},"end":{"row":35,"column":8},"action":"insert","lines":["x"]},{"start":{"row":35,"column":8},"end":{"row":35,"column":9},"action":"insert","lines":["i"]},{"start":{"row":35,"column":9},"end":{"row":35,"column":10},"action":"insert","lines":["t"]}],[{"start":{"row":35,"column":10},"end":{"row":35,"column":11},"action":"insert","lines":["."],"id":201}],[{"start":{"row":35,"column":10},"end":{"row":35,"column":11},"action":"remove","lines":["."],"id":202}],[{"start":{"row":35,"column":10},"end":{"row":35,"column":11},"action":"insert","lines":[";"],"id":203}],[{"start":{"row":33,"column":30},"end":{"row":33,"column":31},"action":"remove","lines":["n"],"id":204}],[{"start":{"row":33,"column":30},"end":{"row":33,"column":31},"action":"insert","lines":["\\"],"id":205},{"start":{"row":33,"column":30},"end":{"row":33,"column":31},"action":"remove","lines":["\\"]},{"start":{"row":33,"column":29},"end":{"row":33,"column":30},"action":"remove","lines":["i"]},{"start":{"row":33,"column":28},"end":{"row":33,"column":29},"action":"remove","lines":["m"]},{"start":{"row":33,"column":27},"end":{"row":33,"column":28},"action":"remove","lines":["d"]}],[{"start":{"row":33,"column":27},"end":{"row":33,"column":28},"action":"remove","lines":["'"],"id":206},{"start":{"row":33,"column":26},"end":{"row":33,"column":27},"action":"remove","lines":["a"]},{"start":{"row":33,"column":25},"end":{"row":33,"column":26},"action":"remove","lines":["'"]}],[{"start":{"row":33,"column":25},"end":{"row":33,"column":26},"action":"insert","lines":["1"],"id":207},{"start":{"row":33,"column":26},"end":{"row":33,"column":27},"action":"insert","lines":["4"]}],[{"start":{"row":34,"column":23},"end":{"row":34,"column":24},"action":"insert","lines":["e"],"id":208},{"start":{"row":34,"column":24},"end":{"row":34,"column":25},"action":"insert","lines":["c"]},{"start":{"row":34,"column":25},"end":{"row":34,"column":26},"action":"insert","lines":["?"]}],[{"start":{"row":34,"column":25},"end":{"row":34,"column":26},"action":"remove","lines":["?"],"id":209}],[{"start":{"row":34,"column":25},"end":{"row":34,"column":26},"action":"insert","lines":["_"],"id":210}],[{"start":{"row":32,"column":19},"end":{"row":32,"column":20},"action":"remove","lines":["加"],"id":211},{"start":{"row":32,"column":18},"end":{"row":32,"column":19},"action":"remove","lines":["追"]},{"start":{"row":32,"column":17},"end":{"row":32,"column":18},"action":"remove","lines":["ン"]},{"start":{"row":32,"column":16},"end":{"row":32,"column":17},"action":"remove","lines":["イ"]},{"start":{"row":32,"column":15},"end":{"row":32,"column":16},"action":"remove","lines":["グ"]},{"start":{"row":32,"column":14},"end":{"row":32,"column":15},"action":"remove","lines":["ロ"]},{"start":{"row":32,"column":13},"end":{"row":32,"column":14},"action":"remove","lines":["の"]},{"start":{"row":32,"column":12},"end":{"row":32,"column":13},"action":"remove","lines":["用"]},{"start":{"row":32,"column":11},"end":{"row":32,"column":12},"action":"remove","lines":["者"]},{"start":{"row":32,"column":10},"end":{"row":32,"column":11},"action":"remove","lines":["理"]},{"start":{"row":32,"column":9},"end":{"row":32,"column":10},"action":"remove","lines":["管"]},{"start":{"row":32,"column":8},"end":{"row":32,"column":9},"action":"remove","lines":["に"]},{"start":{"row":32,"column":7},"end":{"row":32,"column":8},"action":"remove","lines":["こ"]},{"start":{"row":32,"column":6},"end":{"row":32,"column":7},"action":"remove","lines":["こ"]}],[{"start":{"row":32,"column":6},"end":{"row":32,"column":10},"action":"insert","lines":["管理者用"],"id":212}],[{"start":{"row":32,"column":10},"end":{"row":32,"column":13},"action":"insert","lines":["ページ"],"id":213}],[{"start":{"row":32,"column":13},"end":{"row":32,"column":14},"action":"insert","lines":["　"],"id":214}],[{"start":{"row":32,"column":14},"end":{"row":32,"column":18},"action":"insert","lines":["管理者の"],"id":215},{"start":{"row":32,"column":18},"end":{"row":32,"column":19},"action":"insert","lines":["i"]},{"start":{"row":32,"column":19},"end":{"row":32,"column":20},"action":"insert","lines":["d"]}],[{"start":{"row":32,"column":20},"end":{"row":32,"column":21},"action":"insert","lines":["h"],"id":216},{"start":{"row":32,"column":21},"end":{"row":32,"column":22},"action":"insert","lines":["a"]}],[{"start":{"row":32,"column":21},"end":{"row":32,"column":22},"action":"remove","lines":["a"],"id":217},{"start":{"row":32,"column":20},"end":{"row":32,"column":21},"action":"remove","lines":["h"]}],[{"start":{"row":32,"column":20},"end":{"row":32,"column":21},"action":"insert","lines":["は"],"id":218},{"start":{"row":32,"column":21},"end":{"row":32,"column":22},"action":"insert","lines":["⑭"]}],[{"start":{"row":32,"column":21},"end":{"row":32,"column":22},"action":"remove","lines":["⑭"],"id":219}],[{"start":{"row":32,"column":21},"end":{"row":32,"column":23},"action":"insert","lines":["14"],"id":220}],[{"start":{"row":25,"column":17},"end":{"row":25,"column":18},"action":"insert","lines":[" "],"id":221}],[{"start":{"row":25,"column":18},"end":{"row":25,"column":19},"action":"remove","lines":[" "],"id":222}]]},"ace":{"folds":[],"scrolltop":473.5,"scrollleft":0,"selection":{"start":{"row":25,"column":18},"end":{"row":25,"column":18},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":30,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1640232217415}