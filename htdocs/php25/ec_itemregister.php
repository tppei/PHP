<?php
// 商品登録ページ

// 設定ファイル読み込み
require_once '../../ECinclude/const.php';
// 関数ファイル読み込み
require_once '../../ECinclude/model.php';

// セッション開始
session_start();
// セッション変数からuser_id取得、
// 取得できない場合もしくは取得したidが管理者ではない場合
if (isset($_SESSION['user_id']) === FALSE || $_SESSION['user_id'] !== 14) {
    // ログイン画面へ遷移
   header('Location:ec_login.php');
   exit;
}

// DB接続
// MySQLへの接続
$pdo = get_db_connect();

// 入力文字チェック
$input_err = input_blank_check('new_name');
$input_err = input_charnumcheck('new_name');
$input_err = input_blank_check('new_price');
$input_err = input_charnumcheck('new_price');
$input_err = input_blank_check('new_stock');
$input_err = input_charnumcheck('new_stock');
$input_err = file_check();
$input_err = input_blank_check('update_stock');
$input_err = input_charnumcheck('update_stock');

// 商品登録関数
detail_insert($pdo,$input_err);

// 在庫数変更関数
stock_change($pdo,$input_err);

// 公開ステータス変更関数
status_change($pdo);

// 商品削除関数
delete_iteminfo($pdo);

// テーブル情報
$data = table_display($pdo);

include_once '../../ECinclude/ec_tool_view.php';
                
$pdo = null;