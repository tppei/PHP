<?php
// 変数初期化
$new_name = "";
$new_price = 0;
$new_stock = 0;
$new_img = "";
$new_status = 1;
$query_details = "";
$query_stock = 0;

// 現在時刻を取得
$date = date('Y-m-d H:i:s');


$filename ="";
$input_err =[];
$err_msg = [];
$data = [];


$regexp_stock = '/^[0-9]+$/';       // 在庫数正規表現
$regexp_price = '/^[0-9]+$/';       // 値段正規表現
$regexp_file = '/\.png$|\.jpg$/i'; // 画像ファイル正規表現


$username = 'codecamp49497';
            $passwd = 'codecamp49497';