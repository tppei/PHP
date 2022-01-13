<?php


// 現在時刻を取得
$date = date('Y-m-d H:i:s');

// 変数初期化
$filename ="";
$input_err =[];
$err_msg = [];
$data = [];
$user_name = '';
$user_id =0;
$amount = [];
$item_id = 0;
$sum_price = 0;
$sql = "";

$regexp_stock = '/^[0-9]+$/';       // 在庫数正規表現
$regexp_price = '/^[0-9]+$/';       // 値段正規表現
$regexp_file = '/\.png$|\.jpg$/i'; // 画像ファイル正規表現
$regexp_user = '/^[\w]{6,}$/';  //パスワード　ユーザー名の正規表現

// 1/13修正　pdo接続の定数
define('DB_HOST',   'localhost'); // データベースのホスト名又はIPアドレス
define('DB_USER',   'codecamp49497');  // MySQLのユーザ名
define('DB_PASSWD', 'codecamp49497');    // MySQLのパスワード
define('DB_NAME',   'codecamp49497');    // データベース名

$dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=utf8';
 
define('HTML_CHARACTER_SET', 'UTF-8');  // HTML文字エンコーディング
define('DB_CHARACTER_SET',   'UTF8');   // DB文字エンコーディング