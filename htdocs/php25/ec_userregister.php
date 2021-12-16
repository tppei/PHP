<?php
$username ='';

// 設定ファイル読み込み
require_once '../../ECinclude/const.php';
// 関数ファイル読み込み
require_once '../../ECinclude/model.php';

// セッション開始
session_start();
// セッション変数からuser_id取得
if (isset($_SESSION['user_id']) === TRUE) {
   $user_id = $_SESSION['user_id'];
} else {
   // 非ログインの場合、ログインページへリダイレクト
   header('Location:ec_login.php');
   exit;
}

// MySQLへの接続
$pdo = get_db_connect();
// user_idからユーザ名を取得するSQL
$sql = 'SELECT user_name FROM user_info_table WHERE id = ' . $user_id;
// SQL実行し登録データを配列で取得
$data = get_as_array($pdo, $sql);
// ユーザ名を取得できたか確認
if (isset($data[0]['user_name'])) {
   $user_name = $data[0]['user_name'];
} else {
   // ユーザ名が取得できない場合、ログアウト処理へリダイレクト
   header('Location:ec_logout.php');
   exit;
}
$input_err = userinfo_input_charcheck($pdo);

$register_err = check_same_user($pdo,$username);

user_register($input_err,$register_err,$pdo);



include_once '../../ECinclude/ec_user_view.php';