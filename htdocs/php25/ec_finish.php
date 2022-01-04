<?php
// 購入完了ページ

// 設定ファイル読み込み
require_once '../../ECinclude/const.php';
// 関数ファイル読み込み
require_once '../../ECinclude/model.php';
// セッション開始
session_start();

// セッション変数からuser_id取得
if (isset($_SESSION['user_id']) === TRUE) {
   $user_id = $_SESSION['user_id'];
}else{
     //取得できない場合 ログイン画面へ遷移
   header('Location:ec_login.php');
   exit;
}

// データベース接続
$pdo = get_db_connect();

// user_idからユーザ名を取得するSQL
$sql = 'SELECT user_name FROM user_info_table WHERE id = ' . $user_id;

// SQL実行し登録データを配列で取得
$data = get_as_array($pdo, $sql);


// ユーザ名を取得できたか確認
if (isset($data[0]['user_name'])) {
   $user_name = $data[0]['user_name'];
}


$sql = "SELECT * FROM item_info_table INNER JOIN cart_table ON item_info_table.id = cart_table.item_id WHERE user_id = $user_id";
$data = user_table($pdo,$sql);

// 購入完了関数
complete_shopping($pdo,$data,$user_id);

include_once '../../ECinclude/ec_finish_view.php';

$pdo = null;