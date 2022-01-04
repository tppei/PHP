<?php
// 登録ユーザー確認ページ

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
     // ログイン画面へ遷移
   header('Location:ec_login.php');
   exit;
}

// データベース接続
$pdo = get_db_connect();
$sql = "SELECT user_name,password FROM user_info_table";
$data = user_table($pdo,$sql);

include_once '../../ECinclude/ec_admin_user_view.php';