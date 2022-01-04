<?php
/*
*  ログイン処理
*/

require_once '../../ECinclude/const.php';
require_once '../../ECinclude/model.php';
// リクエストメソッド確認
if (get_request_method() !== 'POST') {
   // POSTでなければログインページへリダイレクト
   header('Location:ec_login.php');
   exit;
}
// セッション開始
session_start();
// POST値取得
$user_name = get_post_data('user_name');  // ユーザー名
$passwd = get_post_data('passwd'); // パスワード
// をCookieへ保存
setcookie('user_name', $user_name, time() + 60 * 60 * 24 * 365);
// データベース接続
$pdo = get_db_connect();
// ユーザー名とパスワードからuser_idを取得するSQL
$sql = "SELECT id FROM user_info_table WHERE user_name = '$user_name' AND password = '$passwd'";
// SQL実行し登録データを配列で取得
$data = get_as_array($pdo,$sql);
// 登録データを取得できたか確認
if (isset($data[0]['id'])) {
   // セッション変数にuser_idを保存
   $_SESSION['user_id'] = $data[0]['id'];
   // 管理者用ページ　管理者のidは14
   if( $_SESSION['user_id'] === 14){
      header('Location:ec_itemregister.php');
      exit;
   }else{
   // ログイン済み商品一覧ページへリダイレクト
      header('Location:ec_index.php');
      exit;
   }
} else {
   // セッション変数にログインのエラーフラグを保存
   $_SESSION['login_err_flag'] = TRUE;
   // ログインページへリダイレクト
   header('Location:ec_login.php');
   exit;
}