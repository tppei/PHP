{"filter":false,"title":"ec_login.php","tooltip":"/htdocs/php25/ec_login.php","undoManager":{"mark":65,"position":65,"stack":[[{"start":{"row":0,"column":0},"end":{"row":44,"column":1},"action":"insert","lines":["<?php","/*","*  ログイン処理","*","*  セッションの仕組み理解を優先しているため、一部処理はModelへ分離していません","*  また処理はセッション関連の最低限のみ行っており、本来必要な処理も省略しています","*/","require_once '../include/conf/const.php';","require_once '../include/model/function.php';","// リクエストメソッド確認","if (get_request_method() !== 'POST') {","   // POSTでなければログインページへリダイレクト","   header('Location:session_sample_top.php');","   exit;","}","// セッション開始","session_start();","// POST値取得","$email  = get_post_data('email');  // メールアドレス","$passwd = get_post_data('passwd'); // パスワード","// メールアドレスをCookieへ保存","setcookie('email', $email, time() + 60 * 60 * 24 * 365);","// データベース接続","$link = get_db_connect();","// メールアドレスとパスワードからuser_idを取得するSQL","$sql = 'SELECT id FROM user_info_table","       WHERE user_name =\\'' . $email . '\\' AND password =\\'' . $passwd . '\\'';","// SQL実行し登録データを配列で取得","$data = get_as_array($link, $sql);","// データベース切断","close_db_connect($link);","// 登録データを取得できたか確認","if (isset($data[0]['id'])) {","   // セッション変数にuser_idを保存","   $_SESSION['user_id'] = $data[0]['id'];","   // ログイン済みユーザのホームページへリダイレクト","   header('Location:session_sample_home.php');","   exit;","} else {","   // セッション変数にログインのエラーフラグを保存","   $_SESSION['login_err_flag'] = TRUE;","   // ログインページへリダイレクト","   header('Location:session_sample_top.php');","   exit;","}"],"id":1}],[{"start":{"row":18,"column":5},"end":{"row":18,"column":6},"action":"remove","lines":["l"],"id":2},{"start":{"row":18,"column":4},"end":{"row":18,"column":5},"action":"remove","lines":["i"]},{"start":{"row":18,"column":3},"end":{"row":18,"column":4},"action":"remove","lines":["a"]},{"start":{"row":18,"column":2},"end":{"row":18,"column":3},"action":"remove","lines":["m"]},{"start":{"row":18,"column":1},"end":{"row":18,"column":2},"action":"remove","lines":["e"]}],[{"start":{"row":18,"column":1},"end":{"row":18,"column":2},"action":"insert","lines":["u"],"id":3},{"start":{"row":18,"column":2},"end":{"row":18,"column":3},"action":"insert","lines":["s"]},{"start":{"row":18,"column":3},"end":{"row":18,"column":4},"action":"insert","lines":["e"]},{"start":{"row":18,"column":4},"end":{"row":18,"column":5},"action":"insert","lines":["r"]},{"start":{"row":18,"column":5},"end":{"row":18,"column":6},"action":"insert","lines":["n"]},{"start":{"row":18,"column":6},"end":{"row":18,"column":7},"action":"insert","lines":["a"]},{"start":{"row":18,"column":7},"end":{"row":18,"column":8},"action":"insert","lines":["m"]},{"start":{"row":18,"column":8},"end":{"row":18,"column":9},"action":"insert","lines":["e"]}],[{"start":{"row":18,"column":32},"end":{"row":18,"column":33},"action":"remove","lines":["l"],"id":4},{"start":{"row":18,"column":31},"end":{"row":18,"column":32},"action":"remove","lines":["i"]},{"start":{"row":18,"column":30},"end":{"row":18,"column":31},"action":"remove","lines":["a"]},{"start":{"row":18,"column":29},"end":{"row":18,"column":30},"action":"remove","lines":["m"]},{"start":{"row":18,"column":28},"end":{"row":18,"column":29},"action":"remove","lines":["e"]}],[{"start":{"row":18,"column":28},"end":{"row":18,"column":29},"action":"insert","lines":["u"],"id":5},{"start":{"row":18,"column":29},"end":{"row":18,"column":30},"action":"insert","lines":["s"]},{"start":{"row":18,"column":30},"end":{"row":18,"column":31},"action":"insert","lines":["e"]},{"start":{"row":18,"column":31},"end":{"row":18,"column":32},"action":"insert","lines":["r"]},{"start":{"row":18,"column":32},"end":{"row":18,"column":33},"action":"insert","lines":["_"]}],[{"start":{"row":18,"column":33},"end":{"row":18,"column":34},"action":"insert","lines":["n"],"id":6},{"start":{"row":18,"column":34},"end":{"row":18,"column":35},"action":"insert","lines":["a"]},{"start":{"row":18,"column":35},"end":{"row":18,"column":36},"action":"insert","lines":["m"]},{"start":{"row":18,"column":36},"end":{"row":18,"column":37},"action":"insert","lines":["e"]}],[{"start":{"row":21,"column":24},"end":{"row":21,"column":25},"action":"remove","lines":["l"],"id":7},{"start":{"row":21,"column":23},"end":{"row":21,"column":24},"action":"remove","lines":["i"]},{"start":{"row":21,"column":22},"end":{"row":21,"column":23},"action":"remove","lines":["a"]},{"start":{"row":21,"column":21},"end":{"row":21,"column":22},"action":"remove","lines":["m"]},{"start":{"row":21,"column":20},"end":{"row":21,"column":21},"action":"remove","lines":["e"]}],[{"start":{"row":21,"column":20},"end":{"row":21,"column":21},"action":"insert","lines":["u"],"id":8},{"start":{"row":21,"column":21},"end":{"row":21,"column":22},"action":"insert","lines":["s"]},{"start":{"row":21,"column":22},"end":{"row":21,"column":23},"action":"insert","lines":["e"]},{"start":{"row":21,"column":23},"end":{"row":21,"column":24},"action":"insert","lines":["r"]},{"start":{"row":21,"column":24},"end":{"row":21,"column":25},"action":"insert","lines":["n"]},{"start":{"row":21,"column":25},"end":{"row":21,"column":26},"action":"insert","lines":["a"]},{"start":{"row":21,"column":26},"end":{"row":21,"column":27},"action":"insert","lines":["m"]},{"start":{"row":21,"column":27},"end":{"row":21,"column":28},"action":"insert","lines":["e"]}],[{"start":{"row":21,"column":15},"end":{"row":21,"column":16},"action":"remove","lines":["l"],"id":9},{"start":{"row":21,"column":14},"end":{"row":21,"column":15},"action":"remove","lines":["i"]},{"start":{"row":21,"column":13},"end":{"row":21,"column":14},"action":"remove","lines":["a"]},{"start":{"row":21,"column":12},"end":{"row":21,"column":13},"action":"remove","lines":["m"]},{"start":{"row":21,"column":11},"end":{"row":21,"column":12},"action":"remove","lines":["e"]}],[{"start":{"row":21,"column":11},"end":{"row":21,"column":12},"action":"insert","lines":["u"],"id":10},{"start":{"row":21,"column":12},"end":{"row":21,"column":13},"action":"insert","lines":["s"]},{"start":{"row":21,"column":13},"end":{"row":21,"column":14},"action":"insert","lines":["e"]},{"start":{"row":21,"column":14},"end":{"row":21,"column":15},"action":"insert","lines":["r"]},{"start":{"row":21,"column":15},"end":{"row":21,"column":16},"action":"insert","lines":["_"]}],[{"start":{"row":21,"column":16},"end":{"row":21,"column":17},"action":"insert","lines":["n"],"id":11},{"start":{"row":21,"column":17},"end":{"row":21,"column":18},"action":"insert","lines":["a"]},{"start":{"row":21,"column":18},"end":{"row":21,"column":19},"action":"insert","lines":["m"]},{"start":{"row":21,"column":19},"end":{"row":21,"column":20},"action":"insert","lines":["e"]}],[{"start":{"row":26,"column":35},"end":{"row":26,"column":36},"action":"remove","lines":["l"],"id":12},{"start":{"row":26,"column":34},"end":{"row":26,"column":35},"action":"remove","lines":["i"]},{"start":{"row":26,"column":33},"end":{"row":26,"column":34},"action":"remove","lines":["a"]},{"start":{"row":26,"column":32},"end":{"row":26,"column":33},"action":"remove","lines":["m"]},{"start":{"row":26,"column":31},"end":{"row":26,"column":32},"action":"remove","lines":["e"]}],[{"start":{"row":26,"column":31},"end":{"row":26,"column":32},"action":"insert","lines":["u"],"id":13},{"start":{"row":26,"column":32},"end":{"row":26,"column":33},"action":"insert","lines":["s"]},{"start":{"row":26,"column":33},"end":{"row":26,"column":34},"action":"insert","lines":["e"]},{"start":{"row":26,"column":34},"end":{"row":26,"column":35},"action":"insert","lines":["r"]},{"start":{"row":26,"column":35},"end":{"row":26,"column":36},"action":"insert","lines":["n"]},{"start":{"row":26,"column":36},"end":{"row":26,"column":37},"action":"insert","lines":["a"]},{"start":{"row":26,"column":37},"end":{"row":26,"column":38},"action":"insert","lines":["m"]},{"start":{"row":26,"column":38},"end":{"row":26,"column":39},"action":"insert","lines":["e"]}],[{"start":{"row":28,"column":25},"end":{"row":28,"column":26},"action":"remove","lines":["k"],"id":14},{"start":{"row":28,"column":24},"end":{"row":28,"column":25},"action":"remove","lines":["n"]},{"start":{"row":28,"column":23},"end":{"row":28,"column":24},"action":"remove","lines":["i"]},{"start":{"row":28,"column":22},"end":{"row":28,"column":23},"action":"remove","lines":["l"]}],[{"start":{"row":28,"column":22},"end":{"row":28,"column":23},"action":"insert","lines":["p"],"id":15},{"start":{"row":28,"column":23},"end":{"row":28,"column":24},"action":"insert","lines":["d"]},{"start":{"row":28,"column":24},"end":{"row":28,"column":25},"action":"insert","lines":["o"]}],[{"start":{"row":23,"column":4},"end":{"row":23,"column":5},"action":"remove","lines":["k"],"id":16},{"start":{"row":23,"column":3},"end":{"row":23,"column":4},"action":"remove","lines":["n"]},{"start":{"row":23,"column":2},"end":{"row":23,"column":3},"action":"remove","lines":["i"]},{"start":{"row":23,"column":1},"end":{"row":23,"column":2},"action":"remove","lines":["l"]}],[{"start":{"row":23,"column":1},"end":{"row":23,"column":2},"action":"insert","lines":["p"],"id":17},{"start":{"row":23,"column":2},"end":{"row":23,"column":3},"action":"insert","lines":["d"]},{"start":{"row":23,"column":3},"end":{"row":23,"column":4},"action":"insert","lines":["o"]}],[{"start":{"row":29,"column":0},"end":{"row":30,"column":24},"action":"remove","lines":["// データベース切断","close_db_connect($link);"],"id":18}],[{"start":{"row":12,"column":37},"end":{"row":12,"column":38},"action":"remove","lines":["p"],"id":19},{"start":{"row":12,"column":36},"end":{"row":12,"column":37},"action":"remove","lines":["o"]},{"start":{"row":12,"column":35},"end":{"row":12,"column":36},"action":"remove","lines":["t"]},{"start":{"row":12,"column":34},"end":{"row":12,"column":35},"action":"remove","lines":["_"]},{"start":{"row":12,"column":33},"end":{"row":12,"column":34},"action":"remove","lines":["e"]},{"start":{"row":12,"column":32},"end":{"row":12,"column":33},"action":"remove","lines":["l"]},{"start":{"row":12,"column":31},"end":{"row":12,"column":32},"action":"remove","lines":["p"]},{"start":{"row":12,"column":30},"end":{"row":12,"column":31},"action":"remove","lines":["m"]},{"start":{"row":12,"column":29},"end":{"row":12,"column":30},"action":"remove","lines":["a"]},{"start":{"row":12,"column":28},"end":{"row":12,"column":29},"action":"remove","lines":["s"]},{"start":{"row":12,"column":27},"end":{"row":12,"column":28},"action":"remove","lines":["_"]},{"start":{"row":12,"column":26},"end":{"row":12,"column":27},"action":"remove","lines":["n"]},{"start":{"row":12,"column":25},"end":{"row":12,"column":26},"action":"remove","lines":["o"]},{"start":{"row":12,"column":24},"end":{"row":12,"column":25},"action":"remove","lines":["i"]},{"start":{"row":12,"column":23},"end":{"row":12,"column":24},"action":"remove","lines":["s"]},{"start":{"row":12,"column":22},"end":{"row":12,"column":23},"action":"remove","lines":["s"]},{"start":{"row":12,"column":21},"end":{"row":12,"column":22},"action":"remove","lines":["e"]},{"start":{"row":12,"column":20},"end":{"row":12,"column":21},"action":"remove","lines":["s"]}],[{"start":{"row":12,"column":20},"end":{"row":12,"column":21},"action":"insert","lines":["e"],"id":20},{"start":{"row":12,"column":21},"end":{"row":12,"column":22},"action":"insert","lines":["c"]},{"start":{"row":12,"column":22},"end":{"row":12,"column":23},"action":"insert","lines":["_"]}],[{"start":{"row":12,"column":20},"end":{"row":12,"column":23},"action":"remove","lines":["ec_"],"id":21},{"start":{"row":12,"column":20},"end":{"row":12,"column":28},"action":"insert","lines":["ec_login"]}],[{"start":{"row":35,"column":38},"end":{"row":35,"column":39},"action":"remove","lines":["e"],"id":22},{"start":{"row":35,"column":37},"end":{"row":35,"column":38},"action":"remove","lines":["m"]},{"start":{"row":35,"column":36},"end":{"row":35,"column":37},"action":"remove","lines":["o"]},{"start":{"row":35,"column":35},"end":{"row":35,"column":36},"action":"remove","lines":["h"]},{"start":{"row":35,"column":34},"end":{"row":35,"column":35},"action":"remove","lines":["_"]},{"start":{"row":35,"column":33},"end":{"row":35,"column":34},"action":"remove","lines":["e"]},{"start":{"row":35,"column":32},"end":{"row":35,"column":33},"action":"remove","lines":["l"]},{"start":{"row":35,"column":31},"end":{"row":35,"column":32},"action":"remove","lines":["p"]},{"start":{"row":35,"column":30},"end":{"row":35,"column":31},"action":"remove","lines":["m"]},{"start":{"row":35,"column":29},"end":{"row":35,"column":30},"action":"remove","lines":["a"]},{"start":{"row":35,"column":28},"end":{"row":35,"column":29},"action":"remove","lines":["s"]},{"start":{"row":35,"column":27},"end":{"row":35,"column":28},"action":"remove","lines":["_"]},{"start":{"row":35,"column":26},"end":{"row":35,"column":27},"action":"remove","lines":["n"]},{"start":{"row":35,"column":25},"end":{"row":35,"column":26},"action":"remove","lines":["o"]},{"start":{"row":35,"column":24},"end":{"row":35,"column":25},"action":"remove","lines":["i"]},{"start":{"row":35,"column":23},"end":{"row":35,"column":24},"action":"remove","lines":["s"]},{"start":{"row":35,"column":22},"end":{"row":35,"column":23},"action":"remove","lines":["s"]},{"start":{"row":35,"column":21},"end":{"row":35,"column":22},"action":"remove","lines":["e"]},{"start":{"row":35,"column":20},"end":{"row":35,"column":21},"action":"remove","lines":["s"]}],[{"start":{"row":35,"column":20},"end":{"row":35,"column":21},"action":"insert","lines":["e"],"id":23},{"start":{"row":35,"column":21},"end":{"row":35,"column":22},"action":"insert","lines":["c"]}],[{"start":{"row":35,"column":20},"end":{"row":35,"column":22},"action":"remove","lines":["ec"],"id":24},{"start":{"row":35,"column":20},"end":{"row":35,"column":35},"action":"insert","lines":["ec_userregister"]}],[{"start":{"row":41,"column":37},"end":{"row":41,"column":38},"action":"remove","lines":["p"],"id":25},{"start":{"row":41,"column":36},"end":{"row":41,"column":37},"action":"remove","lines":["o"]},{"start":{"row":41,"column":35},"end":{"row":41,"column":36},"action":"remove","lines":["t"]},{"start":{"row":41,"column":34},"end":{"row":41,"column":35},"action":"remove","lines":["_"]},{"start":{"row":41,"column":33},"end":{"row":41,"column":34},"action":"remove","lines":["e"]},{"start":{"row":41,"column":32},"end":{"row":41,"column":33},"action":"remove","lines":["l"]},{"start":{"row":41,"column":31},"end":{"row":41,"column":32},"action":"remove","lines":["p"]},{"start":{"row":41,"column":30},"end":{"row":41,"column":31},"action":"remove","lines":["m"]},{"start":{"row":41,"column":29},"end":{"row":41,"column":30},"action":"remove","lines":["a"]},{"start":{"row":41,"column":28},"end":{"row":41,"column":29},"action":"remove","lines":["s"]},{"start":{"row":41,"column":27},"end":{"row":41,"column":28},"action":"remove","lines":["_"]},{"start":{"row":41,"column":26},"end":{"row":41,"column":27},"action":"remove","lines":["n"]},{"start":{"row":41,"column":25},"end":{"row":41,"column":26},"action":"remove","lines":["o"]},{"start":{"row":41,"column":24},"end":{"row":41,"column":25},"action":"remove","lines":["i"]},{"start":{"row":41,"column":23},"end":{"row":41,"column":24},"action":"remove","lines":["s"]},{"start":{"row":41,"column":22},"end":{"row":41,"column":23},"action":"remove","lines":["s"]},{"start":{"row":41,"column":21},"end":{"row":41,"column":22},"action":"remove","lines":["e"]},{"start":{"row":41,"column":20},"end":{"row":41,"column":21},"action":"remove","lines":["s"]}],[{"start":{"row":41,"column":20},"end":{"row":41,"column":21},"action":"insert","lines":["e"],"id":26},{"start":{"row":41,"column":21},"end":{"row":41,"column":22},"action":"insert","lines":["c"]},{"start":{"row":41,"column":22},"end":{"row":41,"column":23},"action":"insert","lines":["_"]}],[{"start":{"row":41,"column":23},"end":{"row":41,"column":24},"action":"insert","lines":["l"],"id":28},{"start":{"row":41,"column":24},"end":{"row":41,"column":25},"action":"insert","lines":["o"]},{"start":{"row":41,"column":25},"end":{"row":41,"column":26},"action":"insert","lines":["g"]},{"start":{"row":41,"column":26},"end":{"row":41,"column":27},"action":"insert","lines":["i"]},{"start":{"row":41,"column":27},"end":{"row":41,"column":28},"action":"insert","lines":["n"]}],[{"start":{"row":0,"column":0},"end":{"row":43,"column":1},"action":"remove","lines":["<?php","/*","*  ログイン処理","*","*  セッションの仕組み理解を優先しているため、一部処理はModelへ分離していません","*  また処理はセッション関連の最低限のみ行っており、本来必要な処理も省略しています","*/","require_once '../include/conf/const.php';","require_once '../include/model/function.php';","// リクエストメソッド確認","if (get_request_method() !== 'POST') {","   // POSTでなければログインページへリダイレクト","   header('Location:ec_login.php');","   exit;","}","// セッション開始","session_start();","// POST値取得","$username  = get_post_data('user_name');  // メールアドレス","$passwd = get_post_data('passwd'); // パスワード","// メールアドレスをCookieへ保存","setcookie('user_name', $username, time() + 60 * 60 * 24 * 365);","// データベース接続","$pdo = get_db_connect();","// メールアドレスとパスワードからuser_idを取得するSQL","$sql = 'SELECT id FROM user_info_table","       WHERE user_name =\\'' . $username . '\\' AND password =\\'' . $passwd . '\\'';","// SQL実行し登録データを配列で取得","$data = get_as_array($pdo, $sql);","","// 登録データを取得できたか確認","if (isset($data[0]['id'])) {","   // セッション変数にuser_idを保存","   $_SESSION['user_id'] = $data[0]['id'];","   // ログイン済みユーザのホームページへリダイレクト","   header('Location:ec_userregister.php');","   exit;","} else {","   // セッション変数にログインのエラーフラグを保存","   $_SESSION['login_err_flag'] = TRUE;","   // ログインページへリダイレクト","   header('Location:ec_login.php');","   exit;","}"],"id":29}],[{"start":{"row":0,"column":0},"end":{"row":35,"column":54},"action":"insert","lines":["<?php","/*","*  ログインページ","*","*  セッションの仕組み理解を優先しているため、一部処理はModelへ分離していません","*  また処理はセッション関連の最低限のみ行っており、本来必要な処理も省略しています","*/","require_once '../include/conf/const.php';","require_once '../include/model/function.php';","// セッション開始","session_start();","// セッション変数からログイン済みか確認","if (isset($_SESSION['user_id']) === TRUE) {","   // ログイン済みの場合、ホームページへリダイレクト","   header('Location:session_sample_home.php');","   exit;","}","// セッション変数からログインエラーフラグを確認","if (isset($_SESSION['login_err_flag']) === TRUE) {","   // ログインエラーフラグ取得","   $login_err_flag = $_SESSION['login_err_flag'];","   // エラー表示は1度だけのため、フラグをFALSEへ変更","   $_SESSION['login_err_flag'] = FALSE;","} else {","   // セッション変数が存在しなければエラーフラグはFALSE","   $login_err_flag = FALSE;","}","// Cookie情報からメールアドレスを取得","if (isset($_COOKIE['email']) === TRUE) {","   $email = $_COOKIE['email'];","} else {","   $email = '';","}","// 特殊文字をHTMLエンティティに変換","$email = entity_str($email);","include_once '../include/view/session_sample_top.php';"],"id":30}],[{"start":{"row":7,"column":0},"end":{"row":8,"column":45},"action":"remove","lines":["require_once '../include/conf/const.php';","require_once '../include/model/function.php';"],"id":31},{"start":{"row":7,"column":0},"end":{"row":8,"column":41},"action":"insert","lines":["require_once '../../ECinclude/const.php';","require_once '../../ECinclude/model.php';"]}],[{"start":{"row":14,"column":38},"end":{"row":14,"column":39},"action":"remove","lines":["e"],"id":32},{"start":{"row":14,"column":37},"end":{"row":14,"column":38},"action":"remove","lines":["m"]},{"start":{"row":14,"column":36},"end":{"row":14,"column":37},"action":"remove","lines":["o"]},{"start":{"row":14,"column":35},"end":{"row":14,"column":36},"action":"remove","lines":["h"]},{"start":{"row":14,"column":34},"end":{"row":14,"column":35},"action":"remove","lines":["_"]},{"start":{"row":14,"column":33},"end":{"row":14,"column":34},"action":"remove","lines":["e"]},{"start":{"row":14,"column":32},"end":{"row":14,"column":33},"action":"remove","lines":["l"]},{"start":{"row":14,"column":31},"end":{"row":14,"column":32},"action":"remove","lines":["p"]},{"start":{"row":14,"column":30},"end":{"row":14,"column":31},"action":"remove","lines":["m"]},{"start":{"row":14,"column":29},"end":{"row":14,"column":30},"action":"remove","lines":["a"]},{"start":{"row":14,"column":28},"end":{"row":14,"column":29},"action":"remove","lines":["s"]},{"start":{"row":14,"column":27},"end":{"row":14,"column":28},"action":"remove","lines":["_"]},{"start":{"row":14,"column":26},"end":{"row":14,"column":27},"action":"remove","lines":["n"]},{"start":{"row":14,"column":25},"end":{"row":14,"column":26},"action":"remove","lines":["o"]},{"start":{"row":14,"column":24},"end":{"row":14,"column":25},"action":"remove","lines":["i"]},{"start":{"row":14,"column":23},"end":{"row":14,"column":24},"action":"remove","lines":["s"]},{"start":{"row":14,"column":22},"end":{"row":14,"column":23},"action":"remove","lines":["s"]},{"start":{"row":14,"column":21},"end":{"row":14,"column":22},"action":"remove","lines":["e"]},{"start":{"row":14,"column":20},"end":{"row":14,"column":21},"action":"remove","lines":["s"]}],[{"start":{"row":14,"column":20},"end":{"row":14,"column":21},"action":"insert","lines":["e"],"id":33},{"start":{"row":14,"column":21},"end":{"row":14,"column":22},"action":"insert","lines":["c"]}],[{"start":{"row":14,"column":21},"end":{"row":14,"column":22},"action":"remove","lines":["c"],"id":34},{"start":{"row":14,"column":20},"end":{"row":14,"column":21},"action":"remove","lines":["e"]}],[{"start":{"row":14,"column":20},"end":{"row":14,"column":21},"action":"insert","lines":["E"],"id":35}],[{"start":{"row":14,"column":20},"end":{"row":14,"column":21},"action":"remove","lines":["E"],"id":36}],[{"start":{"row":14,"column":20},"end":{"row":14,"column":21},"action":"insert","lines":["e"],"id":37},{"start":{"row":14,"column":21},"end":{"row":14,"column":22},"action":"insert","lines":["c"]},{"start":{"row":14,"column":22},"end":{"row":14,"column":23},"action":"insert","lines":["_"]},{"start":{"row":14,"column":23},"end":{"row":14,"column":24},"action":"insert","lines":["u"]}],[{"start":{"row":14,"column":24},"end":{"row":14,"column":25},"action":"insert","lines":["s"],"id":38},{"start":{"row":14,"column":25},"end":{"row":14,"column":26},"action":"insert","lines":["e"]},{"start":{"row":14,"column":26},"end":{"row":14,"column":27},"action":"insert","lines":["r"]},{"start":{"row":14,"column":27},"end":{"row":14,"column":28},"action":"insert","lines":["r"]},{"start":{"row":14,"column":28},"end":{"row":14,"column":29},"action":"insert","lines":["e"]},{"start":{"row":14,"column":29},"end":{"row":14,"column":30},"action":"insert","lines":["t"]}],[{"start":{"row":14,"column":29},"end":{"row":14,"column":30},"action":"remove","lines":["t"],"id":39}],[{"start":{"row":14,"column":29},"end":{"row":14,"column":30},"action":"insert","lines":["g"],"id":40},{"start":{"row":14,"column":30},"end":{"row":14,"column":31},"action":"insert","lines":["i"]},{"start":{"row":14,"column":31},"end":{"row":14,"column":32},"action":"insert","lines":["s"]},{"start":{"row":14,"column":32},"end":{"row":14,"column":33},"action":"insert","lines":["t"]},{"start":{"row":14,"column":33},"end":{"row":14,"column":34},"action":"insert","lines":["e"]},{"start":{"row":14,"column":34},"end":{"row":14,"column":35},"action":"insert","lines":["r"]}],[{"start":{"row":28,"column":24},"end":{"row":28,"column":25},"action":"remove","lines":["l"],"id":41},{"start":{"row":28,"column":23},"end":{"row":28,"column":24},"action":"remove","lines":["i"]},{"start":{"row":28,"column":22},"end":{"row":28,"column":23},"action":"remove","lines":["a"]},{"start":{"row":28,"column":21},"end":{"row":28,"column":22},"action":"remove","lines":["m"]},{"start":{"row":28,"column":20},"end":{"row":28,"column":21},"action":"remove","lines":["e"]}],[{"start":{"row":28,"column":20},"end":{"row":28,"column":21},"action":"insert","lines":["u"],"id":42},{"start":{"row":28,"column":21},"end":{"row":28,"column":22},"action":"insert","lines":["s"]},{"start":{"row":28,"column":22},"end":{"row":28,"column":23},"action":"insert","lines":["e"]},{"start":{"row":28,"column":23},"end":{"row":28,"column":24},"action":"insert","lines":["r"]}],[{"start":{"row":28,"column":24},"end":{"row":28,"column":25},"action":"insert","lines":["_"],"id":43},{"start":{"row":28,"column":25},"end":{"row":28,"column":26},"action":"insert","lines":["n"]},{"start":{"row":28,"column":26},"end":{"row":28,"column":27},"action":"insert","lines":["a"]},{"start":{"row":28,"column":27},"end":{"row":28,"column":28},"action":"insert","lines":["m"]},{"start":{"row":28,"column":28},"end":{"row":28,"column":29},"action":"insert","lines":["e"]}],[{"start":{"row":29,"column":26},"end":{"row":29,"column":27},"action":"remove","lines":["l"],"id":44},{"start":{"row":29,"column":25},"end":{"row":29,"column":26},"action":"remove","lines":["i"]},{"start":{"row":29,"column":24},"end":{"row":29,"column":25},"action":"remove","lines":["a"]},{"start":{"row":29,"column":23},"end":{"row":29,"column":24},"action":"remove","lines":["m"]},{"start":{"row":29,"column":22},"end":{"row":29,"column":23},"action":"remove","lines":["e"]}],[{"start":{"row":29,"column":22},"end":{"row":29,"column":23},"action":"insert","lines":["u"],"id":45},{"start":{"row":29,"column":23},"end":{"row":29,"column":24},"action":"insert","lines":["s"]},{"start":{"row":29,"column":24},"end":{"row":29,"column":25},"action":"insert","lines":["e"]},{"start":{"row":29,"column":25},"end":{"row":29,"column":26},"action":"insert","lines":["r"]},{"start":{"row":29,"column":26},"end":{"row":29,"column":27},"action":"insert","lines":["_"]},{"start":{"row":29,"column":27},"end":{"row":29,"column":28},"action":"insert","lines":["n"]},{"start":{"row":29,"column":28},"end":{"row":29,"column":29},"action":"insert","lines":["a"]},{"start":{"row":29,"column":29},"end":{"row":29,"column":30},"action":"insert","lines":["m"]}],[{"start":{"row":29,"column":30},"end":{"row":29,"column":31},"action":"insert","lines":["e"],"id":46}],[{"start":{"row":29,"column":8},"end":{"row":29,"column":9},"action":"remove","lines":["l"],"id":47},{"start":{"row":29,"column":7},"end":{"row":29,"column":8},"action":"remove","lines":["i"]},{"start":{"row":29,"column":6},"end":{"row":29,"column":7},"action":"remove","lines":["a"]},{"start":{"row":29,"column":5},"end":{"row":29,"column":6},"action":"remove","lines":["m"]},{"start":{"row":29,"column":4},"end":{"row":29,"column":5},"action":"remove","lines":["e"]}],[{"start":{"row":29,"column":4},"end":{"row":29,"column":5},"action":"insert","lines":["u"],"id":48},{"start":{"row":29,"column":5},"end":{"row":29,"column":6},"action":"insert","lines":["s"]},{"start":{"row":29,"column":6},"end":{"row":29,"column":7},"action":"insert","lines":["e"]},{"start":{"row":29,"column":7},"end":{"row":29,"column":8},"action":"insert","lines":["r"]},{"start":{"row":29,"column":8},"end":{"row":29,"column":9},"action":"insert","lines":["e"]}],[{"start":{"row":29,"column":8},"end":{"row":29,"column":9},"action":"remove","lines":["e"],"id":49}],[{"start":{"row":29,"column":8},"end":{"row":29,"column":9},"action":"remove","lines":[" "],"id":50},{"start":{"row":29,"column":8},"end":{"row":29,"column":9},"action":"insert","lines":["_"]}],[{"start":{"row":29,"column":9},"end":{"row":29,"column":10},"action":"insert","lines":["n"],"id":51},{"start":{"row":29,"column":10},"end":{"row":29,"column":11},"action":"insert","lines":["a"]},{"start":{"row":29,"column":11},"end":{"row":29,"column":12},"action":"insert","lines":["m"]},{"start":{"row":29,"column":12},"end":{"row":29,"column":13},"action":"insert","lines":["e"]}],[{"start":{"row":31,"column":3},"end":{"row":31,"column":9},"action":"remove","lines":["$email"],"id":52},{"start":{"row":31,"column":3},"end":{"row":31,"column":13},"action":"insert","lines":["$user_name"]}],[{"start":{"row":34,"column":0},"end":{"row":34,"column":6},"action":"remove","lines":["$email"],"id":53},{"start":{"row":34,"column":0},"end":{"row":34,"column":10},"action":"insert","lines":["$user_name"]}],[{"start":{"row":34,"column":24},"end":{"row":34,"column":30},"action":"remove","lines":["$email"],"id":54},{"start":{"row":34,"column":24},"end":{"row":34,"column":34},"action":"insert","lines":["$user_name"]}],[{"start":{"row":35,"column":16},"end":{"row":35,"column":17},"action":"insert","lines":["."],"id":55},{"start":{"row":35,"column":17},"end":{"row":35,"column":18},"action":"insert","lines":["."]}],[{"start":{"row":35,"column":16},"end":{"row":35,"column":17},"action":"insert","lines":["/"],"id":56}],[{"start":{"row":35,"column":20},"end":{"row":35,"column":21},"action":"insert","lines":["E"],"id":57},{"start":{"row":35,"column":21},"end":{"row":35,"column":22},"action":"insert","lines":["C"]}],[{"start":{"row":35,"column":34},"end":{"row":35,"column":35},"action":"remove","lines":["/"],"id":58},{"start":{"row":35,"column":33},"end":{"row":35,"column":34},"action":"remove","lines":["w"]},{"start":{"row":35,"column":32},"end":{"row":35,"column":33},"action":"remove","lines":["e"]},{"start":{"row":35,"column":31},"end":{"row":35,"column":32},"action":"remove","lines":["i"]},{"start":{"row":35,"column":30},"end":{"row":35,"column":31},"action":"remove","lines":["v"]}],[{"start":{"row":35,"column":47},"end":{"row":35,"column":48},"action":"remove","lines":["p"],"id":59},{"start":{"row":35,"column":46},"end":{"row":35,"column":47},"action":"remove","lines":["o"]},{"start":{"row":35,"column":45},"end":{"row":35,"column":46},"action":"remove","lines":["t"]},{"start":{"row":35,"column":44},"end":{"row":35,"column":45},"action":"remove","lines":["_"]},{"start":{"row":35,"column":43},"end":{"row":35,"column":44},"action":"remove","lines":["e"]},{"start":{"row":35,"column":42},"end":{"row":35,"column":43},"action":"remove","lines":["l"]},{"start":{"row":35,"column":41},"end":{"row":35,"column":42},"action":"remove","lines":["p"]},{"start":{"row":35,"column":40},"end":{"row":35,"column":41},"action":"remove","lines":["m"]},{"start":{"row":35,"column":39},"end":{"row":35,"column":40},"action":"remove","lines":["a"]},{"start":{"row":35,"column":38},"end":{"row":35,"column":39},"action":"remove","lines":["s"]},{"start":{"row":35,"column":37},"end":{"row":35,"column":38},"action":"remove","lines":["_"]},{"start":{"row":35,"column":36},"end":{"row":35,"column":37},"action":"remove","lines":["n"]},{"start":{"row":35,"column":35},"end":{"row":35,"column":36},"action":"remove","lines":["o"]},{"start":{"row":35,"column":34},"end":{"row":35,"column":35},"action":"remove","lines":["i"]},{"start":{"row":35,"column":33},"end":{"row":35,"column":34},"action":"remove","lines":["s"]},{"start":{"row":35,"column":32},"end":{"row":35,"column":33},"action":"remove","lines":["s"]},{"start":{"row":35,"column":31},"end":{"row":35,"column":32},"action":"remove","lines":["e"]},{"start":{"row":35,"column":30},"end":{"row":35,"column":31},"action":"remove","lines":["s"]},{"start":{"row":35,"column":29},"end":{"row":35,"column":30},"action":"remove","lines":["/"]},{"start":{"row":35,"column":28},"end":{"row":35,"column":29},"action":"remove","lines":["e"]}],[{"start":{"row":35,"column":28},"end":{"row":35,"column":29},"action":"insert","lines":["/"],"id":60}],[{"start":{"row":35,"column":29},"end":{"row":35,"column":30},"action":"insert","lines":["e"],"id":61},{"start":{"row":35,"column":30},"end":{"row":35,"column":31},"action":"insert","lines":["c"]}],[{"start":{"row":35,"column":31},"end":{"row":35,"column":32},"action":"insert","lines":["_"],"id":62}],[{"start":{"row":35,"column":32},"end":{"row":35,"column":33},"action":"insert","lines":["l"],"id":63},{"start":{"row":35,"column":33},"end":{"row":35,"column":34},"action":"insert","lines":["o"]},{"start":{"row":35,"column":34},"end":{"row":35,"column":35},"action":"insert","lines":["g"]},{"start":{"row":35,"column":35},"end":{"row":35,"column":36},"action":"insert","lines":["i"]},{"start":{"row":35,"column":36},"end":{"row":35,"column":37},"action":"insert","lines":["n"]}],[{"start":{"row":35,"column":37},"end":{"row":35,"column":38},"action":"insert","lines":["_"],"id":64},{"start":{"row":35,"column":38},"end":{"row":35,"column":39},"action":"insert","lines":["v"]},{"start":{"row":35,"column":39},"end":{"row":35,"column":40},"action":"insert","lines":["i"]},{"start":{"row":35,"column":40},"end":{"row":35,"column":41},"action":"insert","lines":["e"]},{"start":{"row":35,"column":41},"end":{"row":35,"column":42},"action":"insert","lines":["w"]}],[{"start":{"row":35,"column":42},"end":{"row":35,"column":43},"action":"insert","lines":["."],"id":65},{"start":{"row":35,"column":43},"end":{"row":35,"column":44},"action":"insert","lines":["p"]},{"start":{"row":35,"column":44},"end":{"row":35,"column":45},"action":"insert","lines":["h"]},{"start":{"row":35,"column":45},"end":{"row":35,"column":46},"action":"insert","lines":["p"]}],[{"start":{"row":35,"column":45},"end":{"row":35,"column":46},"action":"remove","lines":["p"],"id":66},{"start":{"row":35,"column":44},"end":{"row":35,"column":45},"action":"remove","lines":["h"]},{"start":{"row":35,"column":43},"end":{"row":35,"column":44},"action":"remove","lines":["p"]},{"start":{"row":35,"column":42},"end":{"row":35,"column":43},"action":"remove","lines":["."]}],[{"start":{"row":35,"column":28},"end":{"row":35,"column":29},"action":"insert","lines":["e"],"id":67}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":35,"column":29},"end":{"row":35,"column":29},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1639620154967,"hash":"dec57afacbc738a2029613a24b57b2a346c1fc9c"}