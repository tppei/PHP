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

$regexp_stock = '/^[0-9]+$/';       // 在庫数正規表現
$regexp_price = '/^[0-9]+$/';       // 値段正規表現
$regexp_file = '/\.png$|\.jpg$/i'; // 画像ファイル正規表現
$regexp_user = '/^[\w]{6,}$/';  //パスワード　ユーザー名の正規表現

 
define('TAX', 1.05);  // 消費税
 
define('DB_HOST',   'localhost'); // データベースのホスト名又はIPアドレス
define('DB_USER',   'username');  // MySQLのユーザ名
define('DB_PASSWD', 'passwd');    // MySQLのパスワード
define('DB_NAME',   'dbname');    // データベース名
 
define('HTML_CHARACTER_SET', 'UTF-8');  // HTML文字エンコーディング
define('DB_CHARACTER_SET',   'UTF8');   // DB文字エンコーディング